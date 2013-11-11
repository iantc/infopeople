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
  unset($css[libraries_get_path('bootstrap') . '/css/font-awesome.min.css']);
  unset($css[drupal_get_path('module', 'civicrm') . '/css/civicrm.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/bootstrap/css/bootstrap.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/css/normalize.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/css/wireframes.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/css/fields.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/css/blocks.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/css/nodes.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/css/pages.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/css/tabs.css']);
  unset($css[drupal_get_path('theme', 'zenstrap') . '/css/layouts/responsive-sidebars.css']);
}

function infopeople_js_alter(&$javascript) {
  unset($javascript[drupal_get_path('theme', 'zenstrap') . '/bootstrap/js/bootstrap.js']);
}

function infopeople_preprocess_html(&$variables) {
  drupal_add_css('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css', array('group' => CSS_DEFAULT, 'weight' => -50,'type' => 'external'));
  drupal_add_css('//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css', array('group' => CSS_DEFAULT, 'weight' => -48,'type' => 'external'));
  drupal_add_js('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js', array('weight' => '-1000','type' => 'external'));
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
    $variables['primary']['#prefix'] = '<div class="btn-group pull-right" id="page-options"><a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Page Options<span class="caret"></span></a>';
    $variables['primary']['#prefix'] .= '<ul class="dropdown-menu" id="page-tabs">';
    $variables['primary']['#suffix'] = '</ul></div>';
    $output .= drupal_render($variables['primary']);
  }

  return $output;
}
function infopeople_form_user_login_block_alter(&$form, &$form_state) {
  $pre = '<div id="toboggan-container" class="toboggan-container">';
  $options = array(
    'attributes' => array(
      'id' => 'toboggan-login-link',
      'class' => array('toboggan-login-link','btn','btn-info'),
    ),
    'query' => drupal_get_destination(),
    'html' => TRUE
  );
  $pre .= '<div id="toboggan-login-link-container" class="toboggan-login-link-container">';
  $pre .= l('<i class="icon-user visible-phone"></i><span class="hidden-phone"> ' . theme('lt_login_link') . "</span>", 'user/login', $options);
  $pre .= '</div>';

  //the block that will be toggled
  $pre .= '<div id="toboggan-login" class="user-login-block">';

  $form['pre'] = array('#markup' => $pre, '#weight' => -300);
  return $form;
}
