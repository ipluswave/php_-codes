<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version68 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('petition', 'start_at', 'date', '25', array(
             'notnull' => '',
             ));
        $this->addColumn('petition', 'end_at', 'date', '25', array(
             'notnull' => '',
             ));
    }

    public function down()
    {
        $this->removeColumn('petition', 'start_at');
        $this->removeColumn('petition', 'end_at');
    }
}