<?php

/**
 * @file
 * Provides preprocess logic and other functionality for theming.
 */

/**
 * Implements hook_preprocess_page().
 */
function infopeople_css_alter(&$css) {
  unset($css[libraries_get_path('bootstrap') . '/css/bootstrap.css']);
  unset($css[libraries_get_path('bootstrap') . '/css/bootstrap-responsive.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/bootstrap/css/bootstrap.css']);
}

function infopeople_preprocess_page(&$vars) {
  $page = $vars['page'];

  // Connect Twitter's Bootstrap framework using Libraries API.
  if (module_exists('libraries') && $bootstrap_path = libraries_get_path('bootstrap')) {
    //unset($css[$bootstrap_path . '/css/bootstrap.css']);
    drupal_add_css($bootstrap_path . '/css/bootstrap.min.css', array('media' => 'all'));
    drupal_add_css($bootstrap_path . '/css/bootstrap-responsive.min.css', array('media' => 'screen'));
    drupal_add_css($bootstrap_path . '/css/font-awesome.min.css', array('media' => 'screen'));
    //drupal_add_js($bootstrap_path . '/js/bootstrap.min.js');
  }
  else {
    // Notify a user if Bootstrap library was not found.
    drupal_set_message(t('Bootstrap library was not found. Download it <a href="http://twitter.github.com/bootstrap/">here</a> and put inside <code>sites/all/libraries/</code> folder.'), 'error');
  }
}
// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('infopeople_rebuild_registry') && !defined('MAINTENANCE_MODE')) {
  // Rebuild .info data.
  system_rebuild_theme_data();
  // Rebuild theme registry.
  drupal_theme_rebuild();
}

