<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package madhat
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if ( madhat_load_sidebar() ) : ?>
<div id="secondary" class="widget-area <?php echo esc_attr( apply_filters( 'madhat_secondary-width', '' ) ); ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
<?php endif; ?>
