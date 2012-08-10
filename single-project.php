<?php 
global $pageID;
global $pageClass;
global $page;
global $numpages;
$pageClass = "work-page";
$pageID = "project";
get_header(); ?>
  <div id='content' role="main">
    <div id='primary' class="site-content">
      <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <div class='sub-header'>
        <h2 class='page-heading'>
          <span class='section'>Work /</span>
          <span class='subsection'><?php echo get_the_title(); ?></span>
        </h2>

        <div class='projects-pagination'>
          <?php turing_content_nav( 'nav-above' ); ?>
          <!-- <a class="previous end" href="#"><</a>
          <a class="next" href="#">></a>
          <p>Project 1 of 9</p> -->
        </div>
      </div>
      <div class='project-highlights'>
        <div class='highlights-slideshow'>
          <ul class='slides'>
            <li><img class="white-border" src="http://lorempixel.com/956/396/" /></li>
            <li><img class="white-border" src="http://lorempixel.com/956/396/" /></li>
            <li><img class="white-border" src="http://lorempixel.com/956/396/" /></li>
            <li><img class="white-border" src="http://lorempixel.com/956/396/" /></li>
          </ul>
          <ul class='navigation'>
            <li><a class="selected" href="#">Slide</a></li>
            <li><a href="#">Slide</a></li>
            <li><a href="#">Slide</a></li>
            <li><a href="#">Slide</a></li>
          </ul>
        </div>
      </div>
      <div class='project-details'>
        <div class='text-content'>
          <h3>Not sure what this top paragraph will be in terms of project content. ColorFlow post is the best equipped and technoligically advanced post-production and finishing studio in Norther California. Situated in the center of filmmaking and animation, it gets a ton of cool stuff happening.</h3>
          <?php the_content(); ?>
        </div>
        <dl class='overview'>
          <?php
          $custom_fields = get_post_custom();
          $p_year = $custom_fields['year_completed'][0];
          $p_director = $custom_fields["director"][0];
          $p_producer = $custom_fields["producer"][0];
          $p_ographer = $custom_fields["ographer"][0]; ?>
          <dt class='services'>Services</dt>
          <dd class='services'>Not Wired, Not Wired, Not Wired</dd>
          <dt class='colorist'>Colorist</dt>
          <dd class='colorist'>Not Wired</dd>
          <dt class='source'>Source</dt>
          <dd class='source'>Not Wired</dd>
          <dt class='director'>Director</dt>
          <dd class='director'><?php echo $p_director; ?></dd>
          <dt class='cinematographer'>Cinematographer</dt>
          <dd class='cinematographer'><?php echo $p_ographer ?></dd>
        </dl>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>