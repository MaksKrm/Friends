$(document).ready(function() {
"use strict";
  // FlexSlider
  $('.slider .container').flexslider({
    animation: 'slide',
    selector: '.slides > li',
    controlNav: true,
    directionNav: false,
    slideshowSpeed: 3600,
    animationSpeed: 1200,
    prevText: '',
    nextText: ''
  });

  // FlexSlider
  $('.success-story .container').flexslider({
    animation: 'slide',
    selector: 'ul > li',
    controlNav: true,
    directionNav: false,
    slideshowSpeed: 3600,
    animationSpeed: 1200,
    prevText: '',
    nextText: ''
  });

  // FlexSlider
  $('.volunteers').flexslider({
    slideshow: false,
    animation: 'slide',
    selector: 'ul > li',
    controlNav: false,
    directionNav: true,
    slideshowSpeed: 3600,
    animationSpeed: 1200,
    itemWidth: 250,
    itemMargin: 50,
    minItems: 1,
    maxItems: 3,
    prevText: '',
    nextText: '',
    move: 1
  });

  // FlexSlider
  $('.help.flexslider').flexslider({
    animation: 'slide',
    selector: 'ul > li',
    controlNav: false,
    directionNav: true,
    itemWidth: 220,
    itemMargin: 50,
    minItems: 1,
    maxItems: 3,
    prevText: '',
    nextText: '',
    move: 1
  });


});

