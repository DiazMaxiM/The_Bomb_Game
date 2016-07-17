<?php

/**
 * Header sidebar above the main menu 
 * @package Longevity
 * 
 */


if (   ! is_active_sidebar( 'header'  )	)

		return;
	// If we get this far, we have widgets. Let do this.
?>

<aside id="header-sidebar-group" class="widget-area">

        <div class="row">
        			
                <div class="col-md-12">
                    <?php dynamic_sidebar( 'header' ); ?>
                </div>
  
        </div>
</aside>