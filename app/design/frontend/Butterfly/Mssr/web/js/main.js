define([
    "jquery",
    "lgsign"
],
        function ($, lgsign) {
            

           // Use the conventional $ prefix for variables that hold jQuery objects.
var $slider2;

// If the only purpose of the windowWidth() function is to set the slide variables,
// it can be renamed and rewritten to supply the full configuration object instead.
function buildSliderConfiguration2() {
  // When possible, you should cache calls to jQuery functions to improve performance.
  var windowWidth = $(window).width();
  var numberOfVisibleSlides;

  if (windowWidth < 420) {
    numberOfVisibleSlides = 1;
  }
  else if (windowWidth < 768) {
    numberOfVisibleSlides = 1;
  }
  else if (windowWidth < 1200) {
    numberOfVisibleSlides = 3;
  }
  else {
    numberOfVisibleSlides = 3;
  }

  return {
    pager: false,
    controls: true,
    auto: true,
    slideWidth: 5000,
    startSlide: 0,
    nextText: ' ',
    prevText: ' ',
    adaptiveHeight: true,
    moveSlides: 1,
    slideMargin: 20,
    minSlides: numberOfVisibleSlides,
    maxSlides: numberOfVisibleSlides
  };
}

// This function can be called either to initialize the slider for the first time
// or to reload the slider when its size changes.
function configureSlider2() {
  var config = buildSliderConfiguration2();

  if ($slider2 && $slider2.reloadSlider) {
    // If the slider has already been initialized, reload it.
    $slider2.reloadSlider(config);
  }
  else {
    // Otherwise, initialize the slider.
    $slider2 = $('.explore-slider').bxSlider(config);
  }
}

$('.slider-prev').click(function () {
  var current = $slider2.getCurrentSlide();
  $slider2.goToPrevSlide(current) - 1;
});
$('.slider-next').click(function () {
  var current = $slider2.getCurrentSlide();
  $slider2.goToNextSlide(current) + 1;
});

// Configure the slider every time its size changes.
$(window).on("orientationchange resize", configureSlider2);
// Configure the slider once on page load.
configureSlider2();

/** menu tab footer script**/
                
          
jQuery(document).ready(function(){
  jQuery(".menu").click(function(){
    jQuery(".navbar").toggle();
  });

  jQuery(".footer-arrow").click(function(){
    jQuery(".footer-bottom-innr").toggle();
  });

  jQuery(".tab-cl").click(function(){
    var clid=jQuery(this).attr("id");
  var id=clid.split("-");
  jQuery(".offer-tab-con").hide();
  jQuery(".tab-cl").removeClass("active");
  jQuery("#tabcon-"+id[1]).show();
  jQuery("#cl-"+id[1]).addClass("active");

  });

});

        

/*** toggle nav **/


/***** Home page tab  ****/

jQuery('#tabs li a').click(function(){
  var t = jQuery(this).attr('id');

  if(jQuery(this).hasClass('inactive')){ //this is the start of our condition 
    jQuery('#tabs li a').addClass('inactive');           
    jQuery(this).removeClass('inactive');

    jQuery('.container').hide();
    jQuery('#'+ t + 'C').fadeIn('slow');
 }
});








     

     








  



        });