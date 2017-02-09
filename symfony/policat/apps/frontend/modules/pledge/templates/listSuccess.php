<ul class="breadcrumb">
  <li><a href="<?php echo url_for('dashboard') ?>">Dashboard</a></li><span class="divider">/</span>
  <li><a href="<?php echo url_for('campaign_edit_', array('id' => $petition->getCampaignId())) ?>"><?php echo $petition->getCampaign()->getName() ?></a></li><span class="divider">/</span>
  <li><a href="<?php echo url_for('petition_overview', array('id' => $petition->getId())) ?>"><?php echo $petition->getName() ?></a></li><span class="divider">/</span>
  <li class="active">Pledges</li>
</ul>
<?php include_component('d_action', 'notice', array('petition' => $petition)) ?>
<?php include_partial('d_action/tabs', array('petition' => $petition, 'active' => 'pledges')) ?>
<div class="row">
  <div class="span8">
    <table id="pledge_items" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Status</th>
          <th>Pledges</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pledge_items as $pledge_item): /* @var $pledge_item PledgeItem */ ?>
          <?php include_partial('item_row', array('pledge_item' => $pledge_item, 'petition' => $petition)) ?>
        <?php endforeach ?>
      </tbody>
    </table>
    <a class="ajax_link btn btn-mini" href="<?php echo url_for('pledge_new', array('id' => $petition->getId())) ?>">Add new pledge</a>
    <?php if ($pledge_items->count()): ?>
      <a class="btn btn-mini" href="<?php echo url_for('petition_translations', array('id' => $petition->getId())) ?>">Edit pledge translations</a>
    <?php endif ?>
    <a target="_blank" class="btn btn-mini" href="<?php echo url_for('pledge_contact_test', array('petition_id' => $petition->getId())) ?>">Test pledge page</a>
  </div>
</div>