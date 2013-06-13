<?php

/**
 * @file
 * Custom theme implementation to display the basic html structure of a single
 * Drupal page.
 */

?>
<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  <?php if ($default_mobile_metatags): ?>
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php endif; ?>
  <meta http-equiv="cleartype" content="on">

  <?php print $styles; ?>
  <style type="text/css">
  <?php
  /** randomize front images **/
  $rotating_image = rand(1,3);
  echo "#front-collage-inner{background:url(/sites/all/themes/infopeople/images/rotate"
    . $rotating_image . ".jpg) no-repeat 0 0;";
  ?>
  </style>
  <?php print $scripts; ?>
  <script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('#block-nice-menus-1 ul#nice-menu-1').addClass('nav nav-tabs');
    jQuery('#toboggan-login-link').addClass('btn btn-info');
    jQuery('#block-system-user-menu .menu').addClass('nav nav-pills');
    jQuery('#block-search-form').addClass('form-search');
    jQuery('#edit-block-search-form--2').addClass('search-query');
    jQuery('#block-search-form #edit-actions').removeClass('form-actions');
    jQuery('#toboggan-login #edit-actions').removeClass('form-actions');
    jQuery('#edit-actions--2').removeClass('form-actions');
    jQuery('#block-search-form .form-submit').removeClass('btn-primary');
    jQuery('#block-book-navigation').addClass('well well-small');
    jQuery('#block-book-navigation .expanded').prepend('<i class="icon-angle-down"></li> ');
    jQuery('#block-book-navigation .collapsed').prepend('<i class="icon-angle-right"></li> ');
    jQuery('.book-nav-horizontal .nav a').prepend('<i class="icon-angle-right"></li> ');
    jQuery('ul.nice-menu-down li.menuparent a').append(' <b class="caret"></b>');
    jQuery('ul.nice-menu-down li.menuparent ul').addClass('dropdown-menu');
    jQuery('ul.nice-menu-down li.menuparent ul a b').remove();
    jQuery('#block-book-navigation .leaf').prepend('<i class="icon-file"></li> ');
    jQuery('#block-system-navigation').addClass('well well-small');
    jQuery('#gplus-wrapper').appendTo('#navbar .service-links');
    jQuery('.messages.help').addClass('alert alert-info');
    jQuery('.messages.status').addClass('alert alert-info');
    jQuery('#user-register-form .messages.help').removeClass('alert-info').addClass('alert-warning');
    jQuery('#page-tabs li a[href$="/edit"]').prepend('<i class="icon-edit"></i>  ');
    jQuery('#page-tabs li a:contains("View")').prepend('<i class="icon-eye-open"></i>  ');
    jQuery('#page-tabs li a:contains("Devel")').prepend('<i class="icon-beaker"></i>  ');
    jQuery('#page-tabs li a:contains("Track")').prepend('<i class="icon-signal"></i>  ');
    jQuery('#page-tabs li a:contains("Log")').prepend('<i class="icon-filter"></i>  ');
    jQuery('#printer-friendly .ui-icon-print').addClass('icon-print').removeClass('ui-icon ui-icon-print');
    jQuery('#crm-submit-buttons .crm-button').removeClass('crm-button');
    jQuery('#crm-submit-buttons .form-submit').addClass('btn btn-info').removeClass('form-submit');
    jQuery('#crm-submit-buttons .crm-button-type-back .btn').removeClass('btn-info');
    jQuery('span.mailto').addClass('icon-envelope').removeClass('mailto');
    jQuery('#crm-container #Register').addClass('well well-small');
    jQuery('#_qf_Register_reload').addClass('btn').removeClass('form-submit');
    jQuery('#event-login-link').click(function() {
      jQuery('#toboggan-login').toggleClass('lower').toggle('fast');
      return false;
    });
    jQuery('.crm-actions-ribbon .helpicon').addClass('icon-question-sign');
  });
  </script>  <?php if ($add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5-respond.js"></script>
    <![endif]-->
  <?php elseif ($add_html5_shim): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js"></script>
    <![endif]-->
  <?php endif; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php if ($skip_link_text && $skip_link_anchor): ?>
    <div id="skip-link">
      <a href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable"><?php print $skip_link_text; ?></a>
    </div>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
