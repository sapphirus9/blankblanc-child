<?php
/**
 * Theme Name: BlankBlanc Child
 * Author: Naoki Yamamoto
 */

/**
 * 設定
 * 子テーマオプションの初期設定値
 * 親テーマのfunctions.phpにあるbb_config_default()の各項目より
 * 子テーマとして変更の必要な項目をコピーして追加してください。
 */
function bb_config() {
  return array(
    // '{key}' => '{value}'
  );
}

/**
 * MW WP FormのCSSを無効化
 */
function mwwpform_wp_enqueue_scripts() {
  wp_deregister_style('mw-wp-form');
}
add_action('wp_enqueue_scripts','mwwpform_wp_enqueue_scripts');

/**
 * ブロックエディターによるコード追加を無効化
 */
function wpblockeditor_after_setup_theme() {
  // [remove] global-styles-inline-css
  remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
  // [remove] svg
  remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
  // [remove] <style>...</style>
  remove_filter('render_block', 'wp_render_layout_support_flag');
  remove_filter('render_block', 'wp_render_duotone_support');
}
// add_action('after_setup_theme', 'wpblockeditor_after_setup_theme');

function wpblocklibrary_wp_enqueue_scripts() {
  wp_deregister_style('wp-block-library');
}
// add_action('wp_enqueue_scripts', 'wpblocklibrary_wp_enqueue_scripts');
