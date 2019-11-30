jQuery(function($){

//Automatically generate filler content height to ensure footer is on bottom of the page
$(document).ready(function() {
	$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');
});

$(document).ready(function(){
  $('#testimonials').slick({
   centerMode: true,
   centerPadding: '250px',
   slidesToShow: 2,
   slidesToSscroll: 1,
   prevArrow: false,
   nextArrow: false,
   responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
  });
});

//end of file
});