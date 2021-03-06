<?php
/*
 * Copyright (c) 2016, webvariants GmbH <?php Co. KG, http://www.webvariants.de
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class CampaignPublicEnableForm extends BaseCampaignForm {

  public function configure() {
    $this->widgetSchema->setFormFormatterName('bootstrapInline');
    $this->widgetSchema->setNameFormat('campaign_public[%s]');
    
    $this->useFields(array('public_enabled'));
    
    $this->setWidget('public_enabled', new WidgetBootstrapRadio(array('choices' => Campaign::$PUBLIC_ENABLED_SHOW, 'label' => 'Community campaign')));
    $this->setValidator('public_enabled', new sfValidatorChoice(array('choices' => array_keys(Campaign::$PUBLIC_ENABLED_SHOW))));
  }

}