<?php
/**
 * Template Name: Template Sidebars Only
 *
 * @package Longevity
 * 
 *
 */

get_header(); ?>

<div class="container">

<?php get_sidebar( 'cta' ); ?>

<?php get_sidebar( 'breadcrumbs' ); ?>

<?php get_sidebar( 'top' ); ?>

<?php get_sidebar( 'content-bottom' ); ?>
        
</div>
    
<?php get_footer(); ?>    