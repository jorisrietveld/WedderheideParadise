/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-07-2017 13:57
 * Licence: GPLv3 - General Pulbic Licence version 3
 */

(function ($) {
	"use strict"; // Start of use strict

	// Smooth scrolling using jQuery easing
	$('a[href*="#"]:not([href="#"])').click(function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: (target.offset().top + 20)
				}, 1000, "easeInOutExpo");
				return false;
			}
		}
	});

	// Activate scrollspy to add active class to navbar items on scroll
	$('body').scrollspy({
		target: '#mainNav',
		offset: 54
	});

	// Closes responsive menu when a link is clicked
	$('.navbar-collapse>ul>li>a').click(function () {
		$('.navbar-collapse').collapse('hide');
	});

})(jQuery); // End of use strict

$(document).ready(function () {
	var $headerTitle = $(".header-title");
	var position = $headerTitle.position();
	var padding = 10;
	var left = position.left + padding;
	var top = position.top + padding;
	$headerTitle.find(".header-title-container").css("background-position", "-" + left + "px -" + top + "px");
});