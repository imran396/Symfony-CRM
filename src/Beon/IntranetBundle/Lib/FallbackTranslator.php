<?php

namespace Beon\IntranetBundle\Lib;

use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\HttpFoundation\Request;

class FallbackTranslator extends Translator
{
    /**
     * {@inheritdoc}
     *
     * @api
     */
    public function trans($id, array $parameters = array(), $domain = null, $locale = null)
    {
        $locale = $this->getFallbackLocales()[0];

        if (!isset($this->catalogues[$locale])) {
            $this->loadCatalogue($locale);
        }

        if (null === $domain || 'messages' === $domain) {
            foreach ($this->getCatalogueList() as $domain) {
                if ($this->catalogues[$locale]->has((string) $id, $domain) !== false) {
                    break;
                }
            }
        }

        return strtr($this->catalogues[$locale]->get((string) $id, $domain), $parameters);
    }

    protected $catalogueList;
    public function getCatalogueList() {
        if (!$this->catalogueList) {
            $request = $this->container->get('request');
            $pattern = "#Controller\\\([a-zA-Z]*)Controller#";
            $matches = array();
            preg_match($pattern, $request->get('_controller'), $matches);
            $controllerName = strtolower($matches[1]);
            list($dummy, $actionName) = explode('::',substr($request->get('_controller'),0,-6));
            $this->catalogueList = array(
                $controllerName . '_' . $actionName,
                $controllerName,
                'messages'
            );
        }
        return $this->catalogueList;
    }
}
