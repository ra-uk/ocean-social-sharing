// Sticky header
var $j = jQuery.noConflict();

/* ==============================================
ON CLICK
============================================== */
function oss_onClick( href ) {
	var windowWidth 	= '640',
		windowHeight 	= '480',
		windowTop 		= screen.height / 2 - windowHeight / 2,
		windowLeft 		= screen.width / 2 - windowWidth / 2,
		shareWindow 	= 'toolbar=0,status=0,width=' + windowWidth + ',height=' + windowHeight + ',top=' + windowTop + ',left=' + windowLeft;

	var isPlainLink = /^https?:\/\//.test( href ),
		windowName  = isPlainLink ? '' : '_self';

	open( href, windowName, shareWindow );
}