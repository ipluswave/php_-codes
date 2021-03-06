<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version132 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('campaign', 'campaign_order_id_orders_id', array(
             'name' => 'campaign_order_id_orders_id',
             'local' => 'order_id',
             'foreign' => 'id',
             'foreignTable' => 'orders',
             'onUpdate' => '',
             'onDelete' => 'SET NULL',
             ));
        $this->createForeignKey('campaign', 'campaign_quota_id_quota_id', array(
             'name' => 'campaign_quota_id_quota_id',
             'local' => 'quota_id',
             'foreign' => 'id',
             'foreignTable' => 'quota',
             'onUpdate' => '',
             'onDelete' => 'SET NULL',
             ));
        $this->addIndex('campaign', 'campaign_order_id', array(
             'fields' => 
             array(
              0 => 'order_id',
             ),
             ));
        $this->addIndex('campaign', 'campaign_quota_id', array(
             'fields' => 
             array(
              0 => 'quota_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('campaign', 'campaign_order_id_orders_id');
        $this->dropForeignKey('campaign', 'campaign_quota_id_quota_id');
        $this->removeIndex('campaign', 'campaign_order_id', array(
             'fields' => 
             array(
              0 => 'order_id',
             ),
             ));
        $this->removeIndex('campaign', 'campaign_quota_id', array(
             'fields' => 
             array(
              0 => 'quota_id',
             ),
             ));
    }
}