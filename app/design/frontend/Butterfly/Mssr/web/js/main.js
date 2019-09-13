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
    pager: true,
    controls: false,
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



// Use the conventional $ prefix for variables that hold jQuery objects.
var $slider1;

// If the only purpose of the windowWidth() function is to set the slide variables,
// it can be renamed and rewritten to supply the full configuration object instead.
function buildSliderConfiguration1() {
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
    numberOfVisibleSlides = 1;
  }
  else {
    numberOfVisibleSlides = 1;
  }

  return {
    pager: true,
    controls: false,
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
function configureSlider1() {
  var config = buildSliderConfiguration1();

  if ($slider1 && $slider1.reloadSlider) {
    // If the slider has already been initialized, reload it.
    $slider1.reloadSlider(config);
  }
  else {
    // Otherwise, initialize the slider.
    $slider1 = $('.washing-slider').bxSlider(config);
  }
}

$('.slider-prev').click(function () {
  var current = $slider1.getCurrentSlide();
  $slider1.goToPrevSlide(current) - 1;
});
$('.slider-next').click(function () {
  var current = $slider1.getCurrentSlide();
  $slider1.goToNextSlide(current) + 1;
});

// Configure the slider every time its size changes.
$(window).on("orientationchange resize", configureSlider1);
// Configure the slider once on page load.
configureSlider1();



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


/*** Acton Calculator ****/

jQuery(".arrow").click(function(){     
     jQuery(".action-calculator-body").toggleClass("calculator-full");  
     jQuery(".arrow-close").css({'z-index':'99','display':'block'});
     jQuery(".arrow").hide(); 
});
  
  jQuery(".arrow-close").click(function(){
    jQuery(".action-calculator-body").toggleClass("calculator-full");
    jQuery(".arrow").show();
    jQuery(".arrow-close").hide();
  });




/**** Compare product ****/
jQuery(document).ready(function(){
  jQuery(".collaps-all").click(function(){
    jQuery(".sub-catagory-outer").toggle();
  });
  jQuery(".catagory-main-title").click(function(){
    jQuery(".sub-catagory-outer").toggle();
  jQuery(this).toggleClass("arrow-open");
  });
  
 /* jQuery(".arrow").click(function(){
    jQuery(".action-calculator-body").toggleClass("calculator-full");
  }); */
  
});

jQuery('body').on('click','.sub-catagory-title',function(){

  jQuery(this).closest('table').toggleClass('hidden-area');

})

jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();

     //>=, not <=
    if (scroll >= 300) {
        //clearHeader, not clearheader - caps H
        jQuery(".compare-pro-list").addClass("com-fixed");
    jQuery(".fixed-com-print").addClass("com-fixed");
    jQuery(".compare-item-info").addClass("com-fixed");
    }else if(scroll < 300) {
        //clearHeader, not clearheader - caps H
        jQuery(".compare-pro-list").removeClass("com-fixed");
    jQuery(".fixed-com-print").removeClass("com-fixed");
    jQuery(".compare-item-info").removeClass("com-fixed");
    }
});





     

     








  



        });