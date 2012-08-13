(function() {
  (function($, window, document, undefined_) {
    return $("#feature-slides").each(function() {
      var $allSlides, activeSlide, hovering, scope, setActive, slide, slideCount, speed;
      scope = $(this);
      speed = 5000;
      activeSlide = $(this).attr("data-active-slide");
      slideCount = $(".slide-images li", scope).length;
      $allSlides = $(".slide", scope);
      hovering = false;
      $(this).hover(function() {
        return hovering = true;
      }, function() {
        return hovering = false;
      });
      setActive = function() {
        $allSlides.removeClass("active");
        return $("[data-slide=" + activeSlide + "]", scope).addClass("active");
      };
      slide = function() {
        if (!hovering) {
          setActive();
          if (activeSlide === slideCount) {
            activeSlide = 1;
          } else {
            activeSlide = parseInt(activeSlide) + 1;
          }
        }
        return setTimeout(slide, speed);
      };
      slide();
      $('ol.slide-tabs li.slide').click(function() {
        activeSlide = $(this).attr('data-slide');
        return setActive();
      });
      return $('ol.slide-tabs a').click(function(e) {
        return e.preventDefault();
      });
    });
  })(jQuery, window, document, undefined);
}).call(this);
jQuery(document).ready(function(){
  activePage = location.href;
  jQuery('nav.main-navigation a').each(function(){
     if (jQuery(this).attr('href') == activePage) {
       jQuery(this).addClass('current');
     }
  });
  jQuery('ul.filter li a').bind('click', function(e){
    e.preventDevault;
    activeGenre = jQuery(this).attr('rel');
    jQuery('ul.filter li a').removeClass('selected');
    jQuery(this).addClass('selected');
    if(activeGenre == 'all')
      jQuery('ul.grid li').show();
    else
      jQuery('ul.grid li').hasClass(activeGenre).fadeOut();
  });
    
  
});