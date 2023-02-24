<?php

namespace Beon\IntranetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Beon\IntranetBundle\Entity\Repository\CustomerRepository;


class ExcelImportController extends Controller
{
    private $columns = array();
    private $rows = array();
    private $unmatchedRows = array();
    
    public function uploadAction()
    {       
        return $this->render(
            'IntranetBundle:ExcelImport:upload.html.twig',
            array(
                'form' => $this->createUploadForm()->createView(),
            )
        );   
    }
    
    public function getUploadFileName() {
        return 'excelimport' . $this->get('security.context')->getToken()->getUser()->getId() . '.xlsx';
    }
    
    public function saveUploadAction(Request $request)
    {   
        $form = $this->createUploadForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $form['file']->getData()->move($this->container->getParameter('def.upload_path'), $this->getUploadFileName());
            return $this->redirect($this->generateUrl('excelimport_select'));
	    }

        return $this->render(
            'IntranetBundle:ExcelImport:upload.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
    
    private function createUploadForm() {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('excelimport_save_upload'))
            ->add('file', 'file')
            ->add(
                'submit',
                'submit',
                array('label' => 'Upload file', 'attr' => array('class' => 'btn btn-table-actions'))
            )
            ->getForm();
    }
    
    public function selectAction(Request $request)
    {
        $file = $this->container->getParameter('def.upload_path') . '/' . $this->getUploadFileName();
        if (!file_exists($file)) {
            return $this->redirect($this->generateUrl('excelimport_upload'));
        }
        
        $objPHPExcel = \PHPExcel_IOFactory::load($file);
        $objPHPExcel->setActiveSheetIndex($objPHPExcel->getSheetCount() - 1);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $this->prepareColumns($objWorksheet);
        
        $form = $this->createMappingForm();        
        $form->handleRequest($request);

        $done = false;
        if ($form->isValid()) {
            $output = $this->process($objWorksheet, $form->getData());
            $done = $output['done'];
            unset($output['done']);
        }
        
        return $this->render(
            'IntranetBundle:ExcelImport:select.html.twig',
            array(
                'form' => $form->createView(),
                'columns' => $this->columns,
                'unmatchedRows' => $this->unmatchedRows,
                'output' => isset($output) ? $output : null,
                'done' => $done,
            )
        );
    }
    
    private function process($objWorksheet, $data) {
        $ret = array();
        $test = $data['action'] != 'run';
        
        $actions = array();
        foreach (array(true, false) as $firstRun) {
            foreach ($this->columns as $column) {
                $column->setType($data['col' . $column->getCol() . 'type']);
                
                if ($task = $data['col' . $column->getCol() . 'task']) {
                    $intType = $column->getType() == 'integer' || $column->getType() == 'integerString' || $column->getType() == 'booleanInt';

                    if (($firstRun && $intType) || (!$firstRun && !$intType && !isset($actions[$task->getId()]))) {
                        $actions[$task->getId()][] = $action = new Action($task);
                        if ($intType) {
                            $action->addColumn($column);
                        }
                    }

                    if (!$firstRun && !$intType) {
                        foreach ($actions[$task->getId()] as $action) {
                            $action->addColumn($column);
                        }
                    }
                }
            }
        }
        
        foreach ($this->columns as $column) {
            if ($column->getType() == 'comment') {
                foreach($actions as $temp) {
                    foreach ($temp as $action) {
                        $action->addComment($column);
                    }
                }
            }
        }
        
        $all_valid = true;
        /*
        foreach ($actions as $action) {
            $errors = $action->getErrors();
            if ($errors) {
                $all_valid = false;
                $ret[$action->getId()]['err'] = $errors;
            }
        }
        */
        
        if ($all_valid) {
            foreach($actions as $temp) {
                foreach ($temp as $action) {
                    if (!isset($ret[$action->getId()])) {
                        $ret[$action->getId()] = array('actions' => array(), 'task' => $action->getTask());
                    }
                    $ret[$action->getId()]['actions'] = array_merge($ret[$action->getId()]['actions'], $action->run($objWorksheet, $this->rows, $test));
                }
            }
            $ret['done'] = !$test;
        } else {
            $ret['done'] = false;
        }
        
        return $ret;
    }
    
    private function createMappingForm() {
        $form = $this->createFormBuilder()->setAction($this->generateUrl('excelimport_select'));
        
        foreach ($this->columns as $column) {
            $form->add('col' . $column->getCol() . 'type', 'choice', array(
                'choices' => array('string' => 'Zellen-Inhalt ins Kommentarfeld (nur bei folgender Aufgabe)', 'comment' => 'Zellen-Inhalt ins Kommentarfeld (bei allen Aufgaben)', 'integer' => 'Zellen-Inhalt als Anzahl (nur bei folgender Aufgabe)', 'integerString' => 'Zellen-Inhalt als Anzahl und Spaltenüberschrift ins Kommentarfeld (nur bei folgender Aufgabe)', 'boolean' => 'Wenn "X", dann Spaltenüberschrift ins Kommentarfeld (nur bei folgender Aufgabe)', 'booleanInt' => 'Wenn "X", dann Spaltenüberschrift als Anzahl (nur bei folgender Aufgabe)'),
                'data' => $column->guessType(),
                'label' => 'Spalte ' . $column->getCol() . ': ' . $column->getCaption(),
            ));
            $form->add('col' . $column->getCol() . 'task', 'entity', array(
                'class' => 'IntranetBundle:Task',
                'attr' => array('class' => 'searchSelect', 'data-placeholder' => 'Duplikat erstellen von ...'),
                'required' => false,
                'label' => ' ',
            ));
        }
        
        $form->add('action', 'choice', array(
            'choices' => array('test' => 'Testlauf', 'run' => 'Ausführen'),
        ));
        
        $form->add(
            'submit',
            'submit',
            array('label' => 'Ok', 'attr' => array('class' => 'btn btn-table-actions'))
        );
        
        return $form->getForm();
    }

    private function prepareColumns($objWorksheet) {
        /** @var $repository CustomerRepository */
        $repository = $this->getDoctrine()->getManager()->getRepository('IntranetBundle:Customer');
        
        foreach ($repository->findAll() as $stakeholder) {
            if ($stakeholder->getLevel() == 2) {
                $stakeholders[$this->processStakeholderName($stakeholder->getName())] = $stakeholder;
            }
        }
        
        foreach ($objWorksheet->getRowIterator() as $row) {
            foreach ($row->getCellIterator() as $cell) {
                if ($row->getRowIndex() == 1) {
                    if ($cell->getValue()) {
                        $this->columns[$cell->getColumn()] = new Column($cell->getColumn(), $cell->getValue());
                    }
                } else {
                    if ($cell->getColumn() == 'A') {
                        $value = $this->processStakeholderName($cell->getValue());
                        if ($value) {
                            if (isset($stakeholders[$value])) {
                                $this->rows[$row->getRowIndex()] = $stakeholders[$value];
                            } else {
                                $this->unmatchedRows[] = $cell->getValue();
                                break;
                            }
                        }
                    } else if (isset($this->columns[$cell->getColumn()])) {
                        $this->columns[$cell->getColumn()]->scanValue($cell->getValue());
                    }
                }
            }
        }
    }
    
    private function processStakeholderName($name) {
        return trim(str_replace(' gmbh', '', strtolower($name)));
    }
}

class Action {
    private $columns = array();
    private $comments = array();
    private static $noDuplicate = array();
    private $task;
    
    public function __toString() {
        return $this->task->__toString();
    }
    
    public function __construct($task) {
        $this->task = $task;
    }
    
    public function getId() {
        return $this->task->getId();
    }

    public function getTask() {
        return $this->task;
    }
    
    public function addColumn($column) {
        $this->columns[$column->getCol()] = $column;
    }

    public function addComment($column) {
        if (!isset($this->columns[$column->getCol()])) {
            $this->comments[$column->getCol()] = true;
            $this->columns[$column->getCol()] = $column;
        }
    }
    
    public function isComment($column) {
        return isset($this->comments[$column->getCol()]);
    }
    
    public function getErrors() {
        $ret = array();
/*
        $count_integer = 0;
        foreach ($this->columns as $column) {
            if ($column->getType() == 'integer') {
                $count_integer++;
            }
        }
        if ($count_integer > 1) {
            $ret[] = 'Es ist nur max. 1 Anzahl-Feld zugelassen';
        }
*/
        return $ret;
    }
    
    public function run($objWorksheet, $rows, $test) {
        $ret = array();
        foreach ($objWorksheet->getRowIterator() as $row) {
            if (isset($rows[$row->getRowIndex()])) {
                $stakeholder = $rows[$row->getRowIndex()];
                $comment = '';
                $count = 0;
                $hasNonComment = false;
                foreach ($row->getCellIterator() as $cell) {
                    if (isset($this->columns[$cell->getColumn()])) {
                        $column = $this->columns[$cell->getColumn()];
                        if ($value = $column->processValue($cell->getValue())) {
                            if (!$this->isComment($column)) {
                                $hasNonComment = true;
                            }
                            if (is_int($value)) {
                                $count = $value;
                                if ($column->getType() == 'integerString') {
                                    $comment .= $column->getCaption() . "\n";
                                }
                            } else if ($column->getType() == 'boolean') {
                                $comment .= $value . "\n";
                            } else {
                                $comment .= $column->getCaption() . ': ' . $value . "\n";
                            }
                        }
                    }
                }
                if ($hasNonComment) {
                    $out = array('stakeholder' => $stakeholder, 'out' => array());
                    if ($this->task && $this->task->getCustomer() && $this->task->getCustomer()->getId() == $stakeholder->getId() && !isset(self::$noDuplicate[$this->task->getId()])) {
                        $out['out'][] = 'Es wird kein Duplikat angelegt, sondern der bestehende Task ggf. verändert.';
                        self::$noDuplicate[$this->task->getId()] = true;
                    }
                    if ($count) {
                        $out['out'][] = 'Anzahl: ' . $count;
                    }
                    if ($comment) {
                        $out['out'][] = '"' . trim($comment) . '"';
                    }
                    $ret[] = $out;
                }
            }
        }
        return $ret;
    }
}

class Column {
    private $col;
    private $name;
    private $type;
    
    private $seenEmpty;
    private $seenNonEmpty;
    private $seenString;
    private $seenInteger;
    private $seenBoolean;
        
    public function __construct($col, $caption) {
        $this->col = $col;
        $this->caption = $caption;
    }
    
    public function scanValue($value) {
        $value = trim($value);
        if (!$value) {
            $this->seenEmpty = true;
        } else if ($value == '""') {
            $this->seenString = true;
            $this->seenEmpty = true;
        } else if ($value == 'X') {
            $this->seenBoolean = true;
            $this->seenNonEmpty = true;
        } else if (ctype_digit($value)) {
            $this->seenInteger = true;
            $this->seenNonEmpty = true;
        } else {
            $this->seenString = true;
            $this->seenNonEmpty = true;
        }
    }
    
    public function processValue($value, $type = null) {
        if (!$type) {
            $type = $this->type;
        }
        if ($type == 'integer' || $type == 'integerString') {
            return intval(preg_replace('/[^0-9]/', '', $value));
        } else if ($type == 'boolean' || $type == 'booleanInt') {
            if ($value == 'X') {
                return $this->processValue($this->caption, $type == 'booleanInt' ? 'integer' : 'string');
            } else {
                return false;
            }
        } else {
            return trim(trim($value, '"'));
        }
    }
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getCol() {
        return $this->col;
    }
    
    public function getCaption() {
        return $this->caption;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function guessType() {
        if ($this->seenString || ($this->seenInteger && $this->seenBoolean)) {
            return 'string';
        } else if ($this->seenInteger) {
            return 'integer';
        } else if ($this->seenBoolean) {
            return 'boolean';
        } else {
            return null;
        }
    }
}
