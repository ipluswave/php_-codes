<?php

/**
 * BaseWidgetPetition
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $widget_id
 * @property integer $petition_id
 * @property integer $petition_text_id
 * @property clob $target
 * @property clob $background
 * @property clob $intro
 * @property clob $footer
 * @property Widget $Widget
 * @property Petition $Petition
 * @property PetitionText $PetitionText
 * 
 * @method integer        getId()               Returns the current record's "id" value
 * @method integer        getWidgetId()         Returns the current record's "widget_id" value
 * @method integer        getPetitionId()       Returns the current record's "petition_id" value
 * @method integer        getPetitionTextId()   Returns the current record's "petition_text_id" value
 * @method clob           getTarget()           Returns the current record's "target" value
 * @method clob           getBackground()       Returns the current record's "background" value
 * @method clob           getIntro()            Returns the current record's "intro" value
 * @method clob           getFooter()           Returns the current record's "footer" value
 * @method Widget         getWidget()           Returns the current record's "Widget" value
 * @method Petition       getPetition()         Returns the current record's "Petition" value
 * @method PetitionText   getPetitionText()     Returns the current record's "PetitionText" value
 * @method WidgetPetition setId()               Sets the current record's "id" value
 * @method WidgetPetition setWidgetId()         Sets the current record's "widget_id" value
 * @method WidgetPetition setPetitionId()       Sets the current record's "petition_id" value
 * @method WidgetPetition setPetitionTextId()   Sets the current record's "petition_text_id" value
 * @method WidgetPetition setTarget()           Sets the current record's "target" value
 * @method WidgetPetition setBackground()       Sets the current record's "background" value
 * @method WidgetPetition setIntro()            Sets the current record's "intro" value
 * @method WidgetPetition setFooter()           Sets the current record's "footer" value
 * @method WidgetPetition setWidget()           Sets the current record's "Widget" value
 * @method WidgetPetition setPetition()         Sets the current record's "Petition" value
 * @method WidgetPetition setPetitionText()     Sets the current record's "PetitionText" value
 * 
 * @package    policat
 * @subpackage model
 * @author     Martin
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseWidgetPetition extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('widget_petition');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('widget_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('petition_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('petition_text_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('target', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('background', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('intro', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('footer', 'clob', null, array(
             'type' => 'clob',
             ));

        $this->option('symfony', array(
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Widget', array(
             'local' => 'widget_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Petition', array(
             'local' => 'petition_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('PetitionText', array(
             'local' => 'petition_text_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}