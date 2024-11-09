<?php

/**
 * Adds theme support for various features.
 *
 * This function is hooked into the 'after_setup_theme' action, which runs
 * after the theme is initialized. It enables support for block styles,
 * wide alignment, editor styles, and enqueues the editor stylesheet.
 *
 * @return void
 */
function lbt_theme_supports()
{
  // add_theme_support('wp-block-styles');
  add_theme_support('align-wide');
  add_theme_support('editor-styles');
  add_editor_style('build/css/editor.css');
}

add_action('after_setup_theme', 'lbt_theme_supports');

/**
 * Enqueues theme styles and scripts for the frontend.
 *
 * This function hooks into the 'wp_enqueue_scripts' action to load the theme's
 * CSS and JavaScript files. It uses the theme's version number to ensure that
 * the browser loads the most recent version of the files.
 *
 * @return void
 */
function lbt_enqueue_frontend()
{
  $theme_version = wp_get_theme()->get('Version');

  wp_enqueue_style(
    'learn-block-themes-styles',
    get_template_directory_uri() . '/build/css/styles.css',
    array(),
    $theme_version
  );

  wp_enqueue_script(
    'learn-block-themes-scripts',
    get_template_directory_uri() . '/build/js/scripts.js',
    array(),
    $theme_version
  );
}

add_action('wp_enqueue_scripts', 'lbt_enqueue_frontend');
