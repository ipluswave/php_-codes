<div class="page-header">
  <h1>Create new account</h1>
</div>
<div id="register_form">
  <form class="ajax_form form-horizontal" action="<?php echo url_for('register') ?>" method="post" autocomplete="off">
    <div class="row">
      <div class="span6">
        <?php echo $form->renderHiddenFields() ?>
        <?php echo $form->renderRows('email_address', 'password', 'password_again', 'first_name', 'last_name', 'phone', 'mobile', 'language_id') ?>
      </div>
      <div class="span6">
        <?php echo $form->renderRows('organisation', 'vat', 'website', 'street', 'post_code', 'city', 'country') ?>
      </div>
      <div class="span12">
        <?php echo $form['terms']->renderRow() ?>
        <fieldset><div class="control-group"><div class="controls">
              <?php include_partial('account/captcha') ?>
            </div></div></fieldset>
      </div>
    </div>
    <div class="form-actions">
      <button class="btn btn-primary" type="submit">Create account</button>
      <a class="btn" href="<?php echo url_for('homepage') ?>">Cancel</a>
    </div>
  </form>
</div>