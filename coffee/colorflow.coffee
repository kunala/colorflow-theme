(($, window, document, undefined_) ->

  # Feature slides
  # ==========================================================================
  $("#feature-slides").each ->
    scope = $(this)
    speed = 5000
    activeSlide = $(this).attr("data-active-slide")
    slideCount = $(".slide-images li", scope).length

    $allSlides = $(".slide", scope)
    
    # Set hovering state
    hovering = false
    $(this).hover(->
      hovering = true
    , ->
      hovering = false
    )

    # Set active tab
    setActive = ->
      $allSlides.removeClass("active")
      $("[data-slide=#{activeSlide}]", scope).addClass("active")

    # Recursively slide through every slide
    slide = ->
      unless hovering
        setActive()
        if activeSlide == slideCount
          activeSlide = 1
        else
          activeSlide = parseInt(activeSlide)+1
      setTimeout slide, speed
    slide()

    # Slide navigation
    $('ol.slide-tabs li.slide').click ->
      activeSlide = $(this).attr('data-slide')
      setActive()

    # Prevent links from making the page jump
    $('ol.slide-tabs a').click (e) ->
      e.preventDefault()




) jQuery, window, document, `undefined`