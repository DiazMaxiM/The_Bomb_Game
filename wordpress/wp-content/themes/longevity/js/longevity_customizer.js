jQuery(document).ready(function() {

	/* Upsells in customizer (Documentation, Reviews and Support links */
	if( !jQuery( ".longevity-info" ).length ) {
		
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section longevity-info">');
	
		jQuery('.longevity-info').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://www.shapedpixels.com/setup-longevity/" class="button" target="_blank">{setup}</a>'.replace('{setup}', longevityCustomizerObject.setup));
		
		jQuery('.longevity-info').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/longevity" class="button" target="_blank">{review}</a>'.replace('{review}', longevityCustomizerObject.review));
		
		jQuery('.longevity-info').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/theme/longevity" class="button" target="_blank">{support}</a>'.replace('{support}', longevityCustomizerObject.support));
		
		jQuery('.longevity-info').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://www.shapedpixels.com/longevity-pro" class="button" target="_blank">{pro}</a>'.replace('{pro}',longevityCustomizerObject.pro));

		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}
	
});