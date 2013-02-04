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
    <meta name="viewport" content="width=device-width">
  <?php endif; ?>
  <meta http-equiv="cleartype" content="on">

  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('#block-nice-menus-1 ul#nice-menu-1').addClass('nav');
    jQuery('#toboggan-login-link').addClass('btn btn-info');
    jQuery('#block-system-user-menu .menu').addClass('nav nav-pills');
    jQuery('#block-search-form').addClass('form-search');
    jQuery('#edit-block-search-form--2').addClass('search-query');
    jQuery('#block-search-form #edit-actions').removeClass('form-actions');
    jQuery('#toboggan-login #edit-actions').removeClass('form-actions');
    jQuery('#edit-actions--2').removeClass('form-actions');
    jQuery('#block-search-form .form-submit').removeClass('btn-primary');
    jQuery('#block-book-navigation').addClass('well');
    jQuery('#block-book-navigation .expanded').prepend('<i class="icon-angle-down"></li> ');
    jQuery('#block-book-navigation .collapsed').prepend('<i class="icon-angle-right"></li> ');
    jQuery('ul.nice-menu-down li.menuparent a').append(' <b class="caret"></b>');
    jQuery('ul.nice-menu-down li.menuparent ul').addClass('dropdown-menu');
    jQuery('ul.nice-menu-down li.menuparent ul a b').remove();
    jQuery('#block-book-navigation .leaf').prepend('<i class="icon-file"></li> ');
    jQuery('#block-book-navigation li a').prepend(this.prev('i'));
    jQuery('#block-system-navigation').addClass('well');
    jQuery('#social-media-links').prepend('<div id="facebook"></div><div id="twitter"></div><div id="google"></div><div id="rssfeeds"></div>')
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
    <p id="skip-link">
      <a href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable"><?php print $skip_link_text; ?></a>
    </p>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
