/**
 * navigation.js
 * @package Longevity
 * Handles toggling the navigation menu for small screens.
 */	
	// Enable menu toggle for small screens.
( function( $ ) {
	var body    = $( 'body' ),
		_window = $( window );	
  
		 var $body = $('body');
			imagesLoaded( $body, function() {
			  $body.addClass('loaded');
			});		
				
		var nav = $( '#site-navigation' ), button, menu;
		if ( ! nav ) {
			return;
		}

		button = nav.find( '.menu-toggle' );
		if ( ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.longevity', function() {
			nav.toggleClass( 'toggled-on' );
		} );
} )( jQuery );