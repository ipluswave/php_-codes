<?php if ($no_target_list): ?>
  <p>Set a target list first.</p>
  <?php
else:
  if ($pledges instanceof sfOutputEscaperArrayDecorator)
    $pledges = $pledges->getRawValue();
  ?>
  <ul class="breadcrumb">
    <li><a href="<?php echo url_for('dashboard') ?>">Dashboard</a></li><span class="divider">/</span>
    <li><a href="<?php echo url_for('campaign_edit_', array('id' => $petition->getCampaignId())) ?>"><?php echo $petition->getCampaign()->getName() ?></a></li><span class="divider">/</span>
    <li><a href="<?php echo url_for('petition_overview', array('id' => $petition->getId())) ?>"><?php echo $petition->getName() ?></a></li><span class="divider">/</span>
    <li><a href="<?php echo url_for('pledge_list', array('id' => $petition->getId())) ?>">Pledges</a></li><span class="divider">/</span>
    <li class="active"><?php // echo $pledge_item->getName()     ?></li>
  </ul>
  <?php include_component('d_action', 'notice', array('petition' => $petition)) ?>
  <?php include_partial('d_action/tabs', array('petition' => $petition, 'active' => 'pledge_stats')) ?>
  <form method="get" class="form-inline ajax_form filter_form" action="<?php echo url_for('pledge_stats_pager', array('page' => 1, 'id' => $petition->getId())) ?>">
    <?php echo $form ?>
    <button class="btn btn-primary top15" type="submit">Filter</button>
    <button class="filter_reset btn btn-small top15">Reset filter</button>
  </form>
  <?php
  include_partial('contacts', array(
      'contacts' => $contacts,
      'petition_id' => $petition->getId(),
      'active_pledge_item_ids' => $active_pledge_item_ids,
      'pledges' => $pledges,
      'pledge_items' => $pledge_items
  ))
  ?>
<?php endif;