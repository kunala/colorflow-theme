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


jQuery(document).ready(function($) {
  activePage = location.href;
  $('nav.main-navigation a').each(function(){
     if ($(this).attr('href') == activePage) {
       $(this).addClass('current');
     }
  });
  
  // get the action filter option item on page load
  var $filterType = $('#filterOptions li.active a').attr('class');
  // get and assign the ourHolder element to the $holder varible for use later
  var $holder = $('ul.grid');
  // clone all items within the pre-assigned $holder element
  var $data = $holder.clone();
  // attempt to call Quicksand when a filter option item is clicked
	$('#filterOptions li a').click(function(e) {
		// reset the active class on all the buttons
		$('#filterOptions li').removeClass('active');
		// assign the class of the clicked filter option element to our $filterType variable
		var $filterType = $(this).attr('class');
		$(this).parent().addClass('active');
		// swap the page title with active filter
		$('#filter_title').html($filterType);
		if ($filterType == 'all') {
			// assign all li items to the $filteredData var when the 'All' filter option is clicked
			var $filteredData = $data.find('li');
		} 
		else {
			// find all li elements that have our required $filterType values for the data-type element
			var $filteredData = $data.find('li[data-type=' + $filterType + ']');
		}
		// call quicksand and assign transition parameters
		$holder.quicksand($filteredData, {
			duration: 800
		});
		return false;
	});

  // $('ul.filter li a').bind('click', function(e){
  //   e.preventDevault;
  //   activeGenre = $(this).attr('rel');
  //   $('ul.filter li a').removeClass('selected');
  //   $(this).addClass('selected');
  //   if(activeGenre == 'all')
  //     $('ul.grid li').show();
  //   else
  //     $('ul.grid li').hasClass(activeGenre).fadeOut();
  // });
    
  
});