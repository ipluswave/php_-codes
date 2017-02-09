<?php
/* @var $sf_content string */
/* @var $sf_user myUser */
?><!DOCTYPE html>
<html>
  <head>
    <?php 
    $portal_name = StoreTable::value(StoreTable::PORTAL_NAME);
    $title = $sf_response->getTitle();
    $sf_response->setTitle(($title ? $title . ' - ' : '') . $portal_name);
    $sf_response->addMeta('description', StoreTable::value(StoreTable::PORTAL_META_DESCRIPTION));
    $sf_response->addMeta('keywords', StoreTable::value(StoreTable::PORTAL_META_KEYWORDS));
    include_http_metas();
    include_metas();
    include_title() ?>
    <link rel="shortcut icon" href="<?php echo public_path('favicon.ico') ?>" />
    <?php include_stylesheets(); include_javascripts() ?>
  </head>
  <body class="container">
    <header class="row">
      <div class="span3">
        <a href="<?php echo url_for('homepage') ?>"><img src="<?php echo image_path('store/' . StoreTable::value(StoreTable::PORTAL_LOGO)) ?>?<?php echo StoreTable::version(StoreTable::PORTAL_LOGO) ?>" alt="<?php echo $portal_name ?>" /></a>
      </div>
    </header>
    <?php echo $sf_content ?>
    <?php include_component('home', 'footer') ?>
    <div id="waiting"><b></b><i></i><div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div></div>
  </body>
</html>