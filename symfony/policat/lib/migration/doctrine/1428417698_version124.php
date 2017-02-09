<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version124 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('orders', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'autoincrement' => '1',
              'length' => '4',
             ),
             'status' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'default' => '1',
              'length' => '4',
             ),
             'paid_at' => 
             array(
              'type' => 'date',
              'notnull' => '',
              'length' => '25',
             ),
             'user_id' => 
             array(
              'type' => 'integer',
              'notnull' => '',
              'length' => '4',
             ),
             'first_name' => 
             array(
              'type' => 'string',
              'length' => '40',
             ),
             'last_name' => 
             array(
              'type' => 'string',
              'length' => '40',
             ),
             'organisation' => 
             array(
              'type' => 'string',
              'length' => '120',
             ),
             'street' => 
             array(
              'type' => 'string',
              'length' => '120',
             ),
             'city' => 
             array(
              'type' => 'string',
              'length' => '120',
             ),
             'post_code' => 
             array(
              'type' => 'string',
              'length' => '100',
             ),
             'country' => 
             array(
              'type' => 'string',
              'length' => '2',
             ),
             'vat' => 
             array(
              'type' => 'string',
              'length' => '40',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_general_ci',
             'charset' => 'utf8',
             ));
        $this->addColumn('quota', 'order_id', 'integer', '4', array(
             'notnull' => '',
             ));
    }

    public function down()
    {
        $this->dropTable('orders');
        $this->removeColumn('quota', 'order_id');
    }
}