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

/*
var el = document.body; //Parent Element. Text is centered inside.
var mainText = "THIS IS THE FIRST LINE"; //Header Text.
var subText = "THIS TEXT HAS A KNOCKOUT EFFECT"; //Knockout Text.
var fontF = "Roboto, Arial"; //Font to use.
var mSize = 42; //Text size.

//Centered text display:
var tBox = centeredDiv(el), txtMain = mkDiv(tBox, mainText), txtSub = mkDiv(tBox),
	ts = tBox.style, stLen = textWidth(subText, fontF, mSize)+5; ts.color = "#fff";
ts.font = mSize+"pt "+fontF; ts.fontWeight = 100; txtSub.style.fontWeight = 400;

//Generate subtext SVG for knockout effect:
txtSub.innerHTML =
	"<svg xmlns='http://www.w3.org/2000/svg' width='"+stLen+"px' height='"+(mSize+11)+"px' viewBox='0 0 "+stLen+" "+(mSize+11)+"'>"+
	"<rect x='0' y='0' width='100%' height='100%' fill='#fff' rx='4px' ry='4px' mask='url(#txtSubMask)'></rect>"+
	"<mask id='txtSubMask'>"+
	"<rect x='0' y='0' width='100%' height='100%' fill='#fff'></rect>"+
	"<text x='"+(stLen/2)+"' y='"+(mSize+6)+"' font='"+mSize+"pt "+fontF+"' text-anchor='middle' fill='#000'>"+subText+"</text>"+
	"</mask>"+
	"</svg>";

//Relevant Helper Functions:
function centeredDiv(parent) {
	//Container:
	var d = document.createElement('div'), s = d.style;
	s.display = "table"; s.position = "relative"; s.zIndex = 999;
	s.top = s.left = 0; s.width = s.height = "100%";
	//Content Box:
	var k = document.createElement('div'), j = k.style;
	j.display = "table-cell"; j.verticalAlign = "middle";
	j.textAlign = "center"; d.appendChild(k);
	parent.appendChild(d); return k;
}

function mkDiv(parent, tCont) {
	var d = document.createElement('div');
	if(tCont) d.textContent = tCont;
	parent.appendChild(d); return d;
}

function textWidth(text, font, size) {
	var canvas = window.textWidthCanvas || (window.textWidthCanvas = document.createElement("canvas")),
		context = canvas.getContext("2d"); context.font = size+(typeof size=="string"?" ":"pt ")+font;
	return context.measureText(text).width;

}

	*/
