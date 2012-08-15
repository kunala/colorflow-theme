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
          $p_ographer = $custom_fields["ographer"][0]; 
          ?>
          <?php if ($p_services) { ?>
          <dt class='services'>Services</dt>
          <dd class='services'><?php foreach ( $p_services as $p_service ) { echo $p_service->name.', '; } ?></dd>
          <?php } ?>
          <?php if ($p_colorists) { ?>
          <dt class='colorist'>Colorist</dt>
          <dd class='colorist'><?php foreach ( $p_colorists as $p_colorist ) { echo $p_colorist->name; } ?></dd>
          <?php } ?>
          <?php if ($p_sources) { ?>
          <dt class='source'>Source</dt>
          <dd class='source'><?php foreach ( $p_sources as $p_source ) { echo $p_source->name; } ?></dd>
          <?php } ?>
          <?php if ($p_director) { ?>
          <dt class='director'>Director</dt>
          <dd class='director'><?php echo $p_director; ?></dd>
          <?php } ?>
          <?php if ($p_ographer) { ?>
          <dt class='cinematographer'>Cinematographer</dt>
          <dd class='cinematographer'><?php echo $p_ographer; ?></dd>
          <?php } ?>
        </dl>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>