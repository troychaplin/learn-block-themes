<?php

/**
 * Enqueues the theme's stylesheet.
 *
 * This function registers the theme's main stylesheet with WordPress, using the theme's version number
 * as the stylesheet version to ensure proper cache busting.
 *
 * @return void
 */
function learn_block_themes_styles()
{
  $theme_version = wp_get_theme()->get('Version');

  wp_register_style(
    'learn-block-themes-styles',
    get_template_directory_uri() . '/assets/styles.css',
    array(),
    $theme_version
  );

  wp_enqueue_style('learn-block-themes-styles');
}
add_action('wp_enqueue_scripts', 'learn_block_themes_styles');

/**
 * Enqueues theme scripts.
 *
 * This function enqueues the JavaScript file for the theme.
 * It uses the theme version to ensure the browser loads the most recent version of the script.
 *
 * @return void
 */
function learn_block_themes_scripts()
{
  $theme_version = wp_get_theme()->get('Version');

  wp_enqueue_script(
    'learn-block-themes-scripts',
    get_template_directory_uri() . '/assets/js/scripts.js',
    array(),
    $theme_version,
    true
  );
}
add_action('wp_enqueue_scripts', 'learn_block_themes_scripts');
