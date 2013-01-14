<?php

/**
 * @file
 * Custom theme implementation to display the basic html structure of a single
 * Drupal page.
 */

?>
<!DOCTYPE html>
<html lang="<?php print $language->language ?>">
<head profile="<?php print $grddl_profile ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
  <?php print $scripts ?>
  <script type="text/javascript">
	jQuery(document).ready(function(){
	  jQuery('#toboggan-login-link').addClass('btn btn-info');
    jQuery('#block-system-user-menu .menu').addClass('nav nav-pills');
	  jQuery('#search-block-form').addClass('form-search');
	  jQuery('#edit-search-block-form--2').addClass('search-query');
    jQuery('#search-block-form #edit-actions').removeClass('form-actions');
    jQuery('#toboggan-login #edit-actions').removeClass('form-actions');
	  jQuery('#edit-actions--2').removeClass('form-actions');
    jQuery('#search-block-form .form-submit').removeClass('btn-primary');
    jQuery('#block-book-navigation').addClass('well');
    jQuery('#block-book-navigation .expanded').prepend('<i class="icon-angle-down"></li> ');
    jQuery('#block-book-navigation .collapsed').prepend('<i class="icon-angle-right"></li> ');
    jQuery('#block-book-navigation .leaf').prepend('<i class="icon-file"></li> ');
    jQuery('#block-system-navigation').addClass('well');
    jQuery('#social-media-links').prepend('<div id="facebook"></div><div id="twitter"></div><div id="google"></div><div id="rssfeeds"></div>')
	});
  </script>
</head>
<body class="<?php print $classes ?>"<?php print $attributes ?>>
  <?php print $page_top ?>
  <?php print $page ?>
  <?php print $page_bottom ?>
</body>
</html>
