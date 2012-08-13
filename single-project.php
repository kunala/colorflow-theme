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
      <?php
        $args = array(
          'post_type' => 'attachment',
          'numberposts' => null,
          'post_status' => null,
          'post_parent' => $post->ID
        ); 
        $attachments = get_posts($args);
        if ($attachments) {
          echo '<div class="nivoSlider">';
          foreach ($attachments as $attachment) {
            echo wp_get_attachment_image( $attachment->ID, 'gallery' );
          }
          echo '</div>';
        }
      ?>
      <div class='project-details'>
        <div class='text-content'>
          <h3>Not sure what this top paragraph will be in terms of project content. ColorFlow post is the best equipped and technoligically advanced post-production and finishing studio in Norther California. Situated in the center of filmmaking and animation, it gets a ton of cool stuff happening.</h3>
          <?php the_content(); ?>
        </div>
        <dl class='overview'>
          <?php
          $p_genre = get_the_terms( $post->ID, 'Genre');
          $p_sources = get_the_terms( $post->ID, 'Source');
          $p_colorists = get_the_terms( $post->ID, 'person');
          $p_services = get_the_terms( $post->ID, 'service');
          $custom_fields = get_post_custom();
          $p_year = $custom_fields['year_completed'][0];
          $p_director = $custom_fields["director"][0];
          $p_producer = $custom_fields["producer"][0];
          $p_ographer = $custom_fields["ographer"][0]; ?>
          <dt class='services'>Services</dt>
          <dd class='services'><?php foreach ( $p_services as $p_service ) { echo $p_service->name.', '; }?></dd>
          <dt class='colorist'>Colorist</dt>
          <dd class='colorist'><?php foreach ( $p_colorists as $p_colorist ) { echo $p_colorist->name; }?></dd>
          <dt class='source'>Source</dt>
          <dd class='source'><?php foreach ( $p_sources as $p_source ) { echo $p_source->name; }?></dd>
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