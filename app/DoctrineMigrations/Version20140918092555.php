<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140918092555 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $campaigns = $this->connection->fetchAll("SELECT *  FROM Campaign");
        $pressreleases = $this->connection->fetchAll("SELECT *  FROM PressRelease");
        $tasks = $this->connection->fetchAll("SELECT *  FROM Task");

        $this->insertLog($schema,$campaigns,'campaign_id');
        $this->insertLog($schema,$pressreleases,'pressrelease_id');
        $this->insertLog($schema,$tasks,'task_id');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }

    private function insertLog(Schema $schema, $entities, $entity_id){


        foreach($entities as $entity){
              if($entity['approved']== true && $entity['approvedAt']< '2014-09-11' && $entity['approved_by_id']){
                    $approveBy = $entity['approved_by_id'];
                    $approveAt = $entity['approvedAt'];
                    $Id = $entity['id'];
                    $this->addSql("INSERT INTO `Log` (`user_id`, `action`,`created_at`,`$entity_id`) VALUES ($approveBy,'7','$approveAt',$Id)");
                }

               if(isset($entity['approvalMailSent']) && $entity['approvalMailSent']== true && isset($entity['approvalMailSentAt']) && $entity['approvalMailSentAt']< '2014-09-11' && $entity['approvement_sender_id']){
                    $approvementSenderId = $entity['approvement_sender_id'];
                    $approvalMailSentAt = $entity['approvalMailSentAt'];
                    $Id = $entity['id'];
                    $this->addSql("INSERT INTO `Log` (`user_id`, `action`,`created_at`,`$entity_id`) VALUES ($approvementSenderId,'6','$approvalMailSentAt',$Id)");
                }

/*
              //for task internal approval sent
              if(isset($entity['internalApprovalMailSent'])&& $entity['internalApprovalMailSent']== true && $entity['lastApprovalMailSentAt']< '2014-09-11' && $entity['internal_approvement_sender_id']){
                    $internalapprovementSenderId = $entity['internal_approvement_sender_id'];
                    $internalapprovalMailSentAt = $entity['lastApprovalMailSentAt'];
                    $Id = $entity['id'];
                    $this->addSql("INSERT INTO `Log` (`user_id`, `action`,`created_at`,`$entity_id`) VALUES ($internalapprovementSenderId,'5','$internalapprovalMailSentAt',$Id)");
              }
*/
          }
    }


}
