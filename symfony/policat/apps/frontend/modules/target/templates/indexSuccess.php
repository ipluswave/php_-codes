<?php
/* @var $campaign Campaign */
?>
<?php if (isset($campaign)): ?>
  <ul class="breadcrumb">
    <li><a href="<?php echo url_for('dashboard') ?>">Dashboard</a></li><span class="divider">/</span>
    <li><a href="<?php echo url_for('campaign_edit_', array('id' => $campaign->getId())) ?>"><?php echo $campaign->getName() ?></a></li><span class="divider">/</span>
    <li class="active">Target-lists</li>
  </ul>
  <?php include_partial('d_campaign/tabs', array('campaign' => $campaign, 'active' => 'targets')) ?>
  <h2>Target-lists</h2>
  <?php include_component('target', 'list', array('campaign' => $campaign)) ?>
  <a class="btn" href="<?php echo url_for('target_new', array('id' => $campaign->getId())) ?>">New</a>
  <a class="btn ajax_link" href="<?php echo url_for('target_copy_global', array('id' => $campaign->getId())) ?>">Copy from global pool</a>
<?php else: ?>
  <?php include_partial('dashboard/admin_tabs', array('active' => 'target')) ?>
  <p>Only active Target-lists are available inside campaigns.</p>
  <?php include_component('target', 'list') ?>
<?php endif; ?>
