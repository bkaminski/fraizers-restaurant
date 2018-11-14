//READY...
jQuery(document).ready(function() {

//KEN BURNS CAROUSEL EFFECT
  jQuery('.inactiveUntilOnLoad').removeClass('inactiveUntilOnLoad');
// END KEN BURNS EFFECT

//LAYERED NAVBAR 
    //hides gold upper nav on scroll
    var header = jQuery('.navbar');
    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();

        if (scroll >= 30) {
        //fixed main nav
            header.removeClass('navbar-static-top').addClass('navbar-fixed-top');
        } else {
        //static main nav
            header.removeClass('navbar-fixed-top').addClass('navbar-static-top');
        }
    });
    
//Shrinks Main navbar
    //hides gold upper nav on scroll
    var header = jQuery('.navbar');
    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();

        if (scroll >= 125) {
        //fixed main nav
            header.addClass('mini-nav');
            jQuery(".navbar-inverse .navbar-brand").css({ 'margin-bottom' : '0px'});
            jQuery('.nav-container').css({ 'padding-top' : '0px' , 'margin-top' : '-2px'});
            jQuery('#mainLogo').css({ 'width' : '90px', 'height' : '40px' , 'padding-top' : '10px' , 'transition' : '0.4s ease-in-out' });
            jQuery('.navbar-collapse').css({ 'padding-top' : '0px' });
            jQuery('.navbar-right').css({ 'margin-top' : '0px'});
        } else {
        //static main nav
            header.removeClass('mini-nav');
            jQuery(".navbar-inverse .navbar-brand").css({ 'margin-bottom' : '25px'});
            jQuery(".nav-container").css({ 'padding-top' : '20px' });
            jQuery('#mainLogo').css({ 'width' : '150px', 'height' : '56px' , 'padding-top' : '0px' , 'transition' : '0.4s ease-in-out' });
            jQuery('.navbar-collapse').css({ 'padding-top' : '24px' });
            jQuery('.navbar-right').css({ 'margin-top' : '-24px' , 'margin-right' : '-15px' });
        }
    });

//Parallax Background
jQuerywindow = jQuery(window);
   jQuery('section[data-type="background"]').each(function(){
     // declare the variable to affect the defined data-type
     var jQueryscroll = jQuery(this);
      jQuery(window).scroll(function() {
        // HTML5 proves useful for helping with creating JS functions!
        // also, negative value because we're scrolling upwards                            
        var yPos = -(jQuerywindow.scrollTop() / jQueryscroll.data('speed'));
        // background position
        var coords = '50% '+ yPos + 'px';
        // move the background
        jQueryscroll.css({ backgroundPosition: coords });   
      }); // end window scroll
   });  // end section function
   
}); //END READY