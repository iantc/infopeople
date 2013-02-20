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

function infopeople_mymodule_js_alter(&$javascript) {
  unset($javascript[drupal_get_path('theme', 'zenstrap') . '/bootstrap/js/bootstrap.js']);
}

function infopeople_preprocess_page(&$vars) {
  $page = $vars['page'];

  // Connect Twitter's Bootstrap framework using Libraries API.
  if (module_exists('libraries') && $bootstrap_path = libraries_get_path('bootstrap')) {
    //unset($css[$bootstrap_path . '/css/bootstrap.css']);
    drupal_add_css($bootstrap_path . '/css/bootstrap.min.css', array('media' => 'all'));
    drupal_add_css($bootstrap_path . '/css/bootstrap-responsive.min.css', array('media' => 'screen'));
    drupal_add_css($bootstrap_path . '/css/font-awesome.min.css', array('media' => 'screen'));
    drupal_add_js($bootstrap_path . '/js/bootstrap.min.js');
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

function infopeople_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] = '<div class="btn-group pull-right"><a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Page Options<span class="caret"></span></a>';
    $variables['primary']['#prefix'] .= '<ul class="dropdown-menu" id="page-tabs">';
    $variables['primary']['#suffix'] = '</ul></div>';
    $output .= drupal_render($variables['primary']);
  }

  return $output;
}
