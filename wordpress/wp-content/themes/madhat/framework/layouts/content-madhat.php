<?php
/**
 * @package MadHat
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-12 madhat'); ?>>
	<div class="madhat-content">
		<div class="featured-thumb col-md-5 col-sm-4">
			<?php if (has_post_thumbnail()) : ?>	
				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail('pop-thumb'); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
			<?php endif; ?>
		</div><!--.featured-thumb-->
			
		<div class="out-thumb col-md-7 col-sm-8">
			<header class="entry-header">
				<h1 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div class="postedon"><?php madhat_posted_on_icons(); ?></div>
				
			</header><!-- .entry-header -->
		</div><!--.out-thumb-->
			
	</div>	
		
</article><!-- #post-## -->