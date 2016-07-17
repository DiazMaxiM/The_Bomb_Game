<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Longevity
 */

 ?>
 
 <!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <section id="primary" class="content-area valign-wrapper">
        <main id="main" class="site-main" role="main">
            
            <div class="entry-content">
            
                   <header class="entry-header">
                   	<h1 class="page-title"><?php esc_html_e( 'Page not found', 'longevity' ); ?></h1>
                  </header>
                  
              <h2 class="entry-title"><?php esc_html_e( 'This is also somewhat embarrassing for us.', 'longevity' ); ?></h2>
            <p><?php esc_html_e( 'It looks like something went wrong somewhere. Perhaps try doing a search with keywords related to what you were looking for?', 'longevity' ); ?></p>

            <p><?php get_search_form(); ?></p>
            
            <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link"><?php esc_html_e( 'Return to the Homepage here', 'longevity' ); ?></a></p>
    
		</div>
                 
             </main>
</section>

</body>
</html>