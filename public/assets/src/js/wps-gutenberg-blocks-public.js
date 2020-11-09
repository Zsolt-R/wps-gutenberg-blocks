import {filterYTid} from './helpers';

(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 //const filterYTId = (data) =>{
	//	let output; 
	//			
	//	return output;
	 //}

	   //Youtube Video
  	// ref: https://github.com/rochestb/jQuery.YoutubeBackground
  	$('.wps-ytube-video').each(function() {
				
		var urlSource = $(this).data('video-bg-id');		

		let match = filterYTid(urlSource);		
		
  		$(this).YTPlayer({
			fitToBackground: true,
			videoId: match,
			pauseOnScroll: true,
			repeat: true,
			playerVars: {
				autoplay: 1,
				//enablejsapi: 1,
				modestbranding: 1,
				autoplay: 1,
				controls: 0,
				showinfo: 0,
				wmode: 'transparent',
				//playsinline: 1,
				//branding: 0,
				rel: 0,
				origin: window.location.origin
			}
  		});
	});

})( jQuery );
