<?php
/**
 * @package madhat
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		
		<div class="entry-meta">
			<div class="postdate">
            	<span class="month"><?php echo the_time(__('M','madhat'))); ?></span>
				<span class="day"><?php echo the_time(__('j','madhat'))); ?></span>
            </div>
            
            <div class="author">
            	<span class="author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fa fa-user"></i><?php the_author() ?></a></span>
            </div>
            
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div id="featured-image">
			<?php the_post_thumbnail('full'); ?>
		</div>
			
			
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'madhat' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php madhat_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
