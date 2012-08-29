<?php 
global $pageID;
global $pageClass;
$pageClass = "work-page";
$pageID = "project";
$the_page = (get_query_var('paged')) ? get_query_var('paged') : 1; 
query_posts($query_string."&posts_per_page=1&paged='.$paged.'");

get_header(); ?>
  <div id='content' role="main">
    <div id='primary' class="site-content">
      <?php if ( have_posts() ) : 
      while ( have_posts() ) : the_post(); ?>
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
      $p_imdb = get_post_meta($post->ID, '_cmb_project_imdb', true);
      $p_website = get_post_meta($post->ID, '_cmb_project_website', true);
      ?>
      <div class='project-details'>
        <div class='text-content'>
          <?php the_content(); ?>
        </div>
        <dl class='overview'>
          <?php if($p_services) { ?>
          <dt class='services'>Services</dt>
          <dd class='services'>
            <ul>
            <?php foreach($p_services as $service) 
              echo '<li>'.get_the_post_thumbnail($service->term_id).' '.$service->name.'<li/>'
            ?>
            </ul>
          </dd>
          <?php } ?>
          <?php if($p_colorist) { ?>
          <dt class='colorist'>Colorist</dt>
          <dd class='colorist'>
            <?php foreach($p_colorist as $colorist) echo "<a href='".get_permalink($colorist->term_id)."'>".$colorist->name."</a>"; ?>
            <?php # if($p_colorist) foreach($p_colorist as $colorist) print_r($colorist); ?>
          </dd>
          <?php } ?>
          <?php if($p_camera) { ?>
          <dt class='source'>Source</dt>
          <dd class='source'><?php foreach($p_camera as $camera) echo $camera->name.'<br/>'?></dd>
          <?php } ?>
          <?php if($p_director) { ?>
          <dt class='director'>Director</dt>
          <dd class='director'><?php echo $p_director; ?></dd>
          <?php } ?>
          <?php if($p_cinematographer) { ?>
          <dt class='cinematographer'>Cinematographer</dt>
          <dd class='cinematographer'><?php echo $p_cinematographer ?></dd>
          <?php } ?>
          <?php if($p_imdb || $p_website) { ?>
          <dt class='links'>Links</dt>
          <dd class='links'>
            <?php if($p_imdb) echo '<a class="imdb" href="'.$p_imdb.'">IMDB</a>' ?>
            <?php if($p_website) echo '<a class="website" href="'.$p_website.'">Website</a>' ?>
          </dd>
          <?php } ?>
        </dl>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>