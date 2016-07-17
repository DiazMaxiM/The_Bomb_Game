<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package madhat
 */
?>

		</div><!-- #content -->
	
	</div><!--.mega-container-->
	
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'bottom' ) ); ?>
		</div>
	</nav><!-- #site-navigation -->

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php printf( __( 'Theme Designed by %1$s.', 'madhat' ), '<a href="'.esc_url("http://inkhive.com/").'" rel="nofollow">InkHive.com</a>' ); ?>
			<span class="sep"></span>
			<?php echo ( get_theme_mod('madhat_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','madhat')) : get_theme_mod('madhat_footer_text'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
