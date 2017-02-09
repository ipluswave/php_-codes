<?php
use_helper('I18N');
$stylings['url'] = $url;
$stylings['title'] = $title;
$stylings['keyvisual'] = $keyvisual;
$stylings['sprite'] = $sprite;
$stylings['count'] = number_format($count, 0, '.', ',') . ' ' . __('people so far');
$stylings['target'] = $target;
$stylings['button_text'] = __('Take action');
switch ($kind) {
  case Petition::KIND_EMAIL_TO_LIST:
  case Petition::KIND_EMAIL_ACTION:
  case Petition::KIND_PLEDGE:
    $stylings['headline'] = __('Email action');
    break;
  default:
    $stylings['headline'] = $label_mode == PetitionTable::LABEL_MODE_PETITION ? __('Petition') : __('Initiative');
}
$css = array(
    'text-align' => 'center',
    'font-weight' => 'normal',
    'font-size' => '12px',
    'line-height' => '20px',
    'color' => $stylings['title_color'],
    'background-color' => $stylings['bg_right_color'],
    'text-transform' => 'none',
    'margin' => '0',
    'overflow' => 'hidden',
    'height' => 'auto',
    'width' => 'auto',
    'cursor' => 'pointer',
    'font-family' => 'Lucida Sans Unicode',
    'padding' => '0',
    'border' => '0'
);

ob_start();
?>
<div onclick="<?php echo UtilWidget::getWidgetHereJs($widget['id'], true) ?>" <?php UtilPolicat::style($css, array('font-size' => '0', 'line-height' => '0', 'max-width' => '1000px'), $stylings['width'] == 'auto' ? null : array('max-width' => ($stylings['width'] . 'px')) )?>>
  <p <?php
  UtilPolicat::style($css, array('line-height' => '18px', 'text-transform' => 'uppercase', 'overflow' => 'visible',
      'color' => $stylings['bg_right_color'], 'background-color' => $stylings['title_color'], 'letter-spacing' => '1px', 'float' => 'none'))
  ?>><?php echo $stylings['headline'] ?></p>
  <img alt="" src="<?php echo $keyvisual ?>" <?php UtilPolicat::style($css, array('line-height' => '12px', 'max-width' => '100%', 'float' => 'none')) ?>>
  <p <?php UtilPolicat::style($css, array('text-align' => 'left', 'font-weight' => 'bold', 'line-height' => '12px', 'margin' => '10px', 'float' => 'none')) ?>>
    <?php echo $title ?>
  </p>
  <div <?php
  UtilPolicat::style($css, array('font-size' => '20px', 'color' => '#fff', 'background-color' => $stylings['button_color'], 'margin' => '0 10px',
      'height' => '40px', 'line-height' => '40px', 'font-weight' => 'bold', 'font-size' => '20px', 'text-transform' => 'uppercase',
      'background-image' => 'linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3))',
      '-webkit-border-radius' => '3px', '-moz-border-radius' => '3px', 'border-radius' => '3px', 'float' => 'none'
  ))
  ?> onmouseover="this.style.backgroundImage = 'linear-gradient(to bottom, rgba(200, 200, 200, 0.2), rgba(100, 100, 100, 0.3))';" onmouseout="this.style.backgroundImage = 'linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3))';">
      <?php echo __('Take action') ?>
  </div>
  <p <?php UtilPolicat::style($css, array('font-size' => '11px', 'line-height' => '11px', 'color' => $stylings['body_color'], 'margin' => '10px', 'float' => 'none')) ?>>
    <?php echo $stylings['count'] ?>
  </p>
</div>
<?php
$stylings['markup'] = ob_get_contents();
ob_end_clean();
$stylings = json_encode($stylings);
?>
<?php echo UtilWidget::getInitJS() ?>
<?php echo UtilWidget::getAddStyleJS($widget['id'], $stylings) ?>
<?php echo (file_get_contents(sfConfig::get('sf_web_dir') . '/js/dist/policat_widget_outer.js')); ?>
if (typeof(policat_later_<?php echo $widget['id'] ?>) === 'undefined')
<?php echo UtilWidget::getWidgetHereJs($widget['id'], false) ?>