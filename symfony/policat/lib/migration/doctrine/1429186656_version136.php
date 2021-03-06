<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version136 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('quota', 'quota_upgrade_of_id_quota_id', array(
             'name' => 'quota_upgrade_of_id_quota_id',
             'local' => 'upgrade_of_id',
             'foreign' => 'id',
             'foreignTable' => 'quota',
             'onUpdate' => '',
             'onDelete' => 'SET NULL',
             ));
        $this->addIndex('quota', 'quota_upgrade_of_id', array(
             'fields' => 
             array(
              0 => 'upgrade_of_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('quota', 'quota_upgrade_of_id_quota_id');
        $this->removeIndex('quota', 'quota_upgrade_of_id', array(
             'fields' => 
             array(
              0 => 'upgrade_of_id',
             ),
             ));
    }
}