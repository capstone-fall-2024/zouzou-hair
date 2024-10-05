<?php
/**
 * This file adds functions to the Zouzou Hair theme.
 *
 * @package Zouzou Hair Theme
 * @author  SER Solutions
 */

if ( ! function_exists( 'zh_setup' ) ) {
	function zh_setup() {
		add_editor_style( get_template_directory_uri() . '/style.css' );

	}
}

add_action( 'after_setup_theme', 'zh_setup' );

function zh_enqueue_stylesheet() {
	wp_enqueue_style(
		'zh-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get('Version')
	);
}

add_action( 'wp_enqueue_scripts', 'zh_enqueue_stylesheet' );