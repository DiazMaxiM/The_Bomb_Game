<?php
/**
 * Longevity back compat functionality
 *
 * Prevents Longevity from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * Special thanks and credit to the default theme Twenty Fifteen 
 *
 * @package WordPress
 * @subpackage Longevity
 */

/**
 * Prevent switching to Longevity on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Longevity 1.0
 */
function longevity_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'longevity_upgrade_notice' );
}
add_action( 'after_switch_theme', 'longevity_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Longevity on WordPress versions prior to 4.1.
 *
 * @since Longevity 1.0
 */
function longevity_upgrade_notice() {
	$message = sprintf( esc_html__( 'Longevity requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'longevity' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since Longevity 1.0
 */
function longevity_customize() {
	wp_die( sprintf( esc_html__( 'Longevity requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'longevity' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'longevity_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since Longevity 1.0
 */
function longevity_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Longevity requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'longevity' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'longevity_preview' );
