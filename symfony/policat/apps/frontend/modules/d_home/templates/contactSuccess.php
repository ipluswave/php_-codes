<div class="page-header">
    <h1><?php echo $contact_title ?></h1>
</div>
<?php echo UtilMarkdown::transform($sf_data->getRaw('contact_content'), true, true) ?>
<?php if ($form): ?>
<form id="contactticket" class="form-horizontal ajax_form" method="post" action="<?php echo url_for('contact') ?>">
    <div style="display: none"><?php echo $form->renderRows(array('name', 'message')) ?></div>
    <?php echo $form->renderOtherRows() ?>
    <div class="form-actions"><button class="btn btn-primary">Send</button></div>
</form>
<?php endif ?>
