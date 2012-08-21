<?php 
global $pageID;
global $pageClass;
global $page;
global $numpages;
global $query_string;
query_posts( $query_string . '&posts_per_page =-1' );
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
        $grid_thumb = get_post_thumbnail_id( $post->ID );
        $focused = get_post_meta($post->ID, '_cmb_focused_image_id', true);
        $blurred = get_post_meta($post->ID, '_cmb_blur_image_id', true);
        $excluded = array($grid_thumb, $focused, $blurred);
        $args = array(
          'post_type' => 'attachment',
          'numberposts' => null,
          'post_status' => null,
          'post_parent' => $post->ID,
          'exclude' => $excluded
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
      <?php
      global $post;
      $p_year = get_post_meta( $post->ID, '_cmb_year_completed', true );
      $p_director = get_post_meta( $post->ID, '_cmb_director', true );
      $p_director_imdb = get_post_meta( $post->ID, '_cmb_director-imdb', true );
      $p_producer = get_post_meta( $post->ID, '_cmb_producer', true );
      $p_producer_imdb = get_post_meta( $post->ID, '_cmb_producer-imdb', true );
      $p_cinematographer = get_post_meta( $post->ID, '_cmb_cinematographer', true );
      $p_cinematographer_imdb = get_post_meta( $post->ID, '_cmb_cinematographer-imdb', true );
      $p_colorist = get_the_terms( $post->ID, 'talent');
      $p_camera = get_the_terms( $post->ID, 'camera');
      $p_genre = get_the_terms( $post->ID, 'genres');
      $p_services = get_the_terms( $post->ID, 'service');
      $p_imdb = get_post_meta($post->ID, '_cmb_project_imdb', true)
      ?>
      <?php # echo $p_year ?>
      <?php # echo $p_director ?>
      <?php # echo $p_director_imdb ?>
      <?php # echo $p_producer; ?>
      <?php # echo $p_producer_imdb ?>
      <?php # echo $p_cinematographer_imdb ?>
      <?php # if($p_genre) foreach($p_genre as $genre) echo $genre->name ?>
      <div class='project-details'>
        <div class='text-content'>
          <?php the_content(); ?>
          <?php # foreach($p_services as $service) print_r($service); ?>
          <div class="service_icons">
            <?php if($p_services) foreach($p_services as $service) echo get_the_post_thumbnail($service->term_id); ?>
          </div>
        </div>
        <dl class='overview'>
          <div style="margin-bottom: 10px; ">
            <?php if($p_imdb) echo '<a class="project_imdb" href="'.$p_imdb.'">'.get_the_title().'</a>'; ?>
          </div>
          <dt class='services'>Services</dt>
          <dd class='services'><?php if($p_services) foreach($p_services as $service) echo $service->name.'<br/>' ?></dd>
          <dt class='colorist'>Colorist</dt>
          <dd class='colorist'>
            <?php if($p_colorist) foreach($p_colorist as $colorist) echo "<a href='".get_permalink($colorist->term_id)."'>".$colorist->name."</a>"; ?>
            <?php # if($p_colorist) foreach($p_colorist as $colorist) print_r($colorist); ?>
          </dd>
          <dt class='source'>Source</dt>
          <dd class='source'><?php if($p_camera) foreach($p_camera as $camera) echo $camera->name ?></dd>
          <dt class='director'>Director</dt>
          <dd class='director'><?php echo $p_director; ?></dd>
          <dt class='cinematographer'>Cinematographer</dt>
          <dd class='cinematographer'><?php echo $p_cinematographer ?></dd>
        </dl>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>