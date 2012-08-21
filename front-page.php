<?php get_header('home'); ?>
<?php 
$i = 1;
?>

<div data-active-slide='1' id='feature-slides'>
  <div class='slides'>
    <ol class='slide-images'>
    <?php 
    $slides_query = array('posts_per_page'=> -1, 'numberposts'=> 0,'offset'=> 0,'orderby'=> 'post_date','order'=> 'DESC','post_type'=> 'project','post_status'=> 'publish'); 
    $feature_slides = new WP_Query($slides_query);
    if($feature_slides) : while ($feature_slides ->have_posts()) : $feature_slides->the_post(); 
      $featured_focused = get_post_meta($post->ID, '_cmb_focused_image', true);
      $featured_blurred = get_post_meta($post->ID, '_cmb_blur_image', true);
      if($featured_focused) { ?>
        <li class='slide' data-slide='<?php echo $i ?>' style='background: url(<?php echo $featured_focused; ?>) center 60px no-repeat;'>
          <div class="blur" style="background: url(<?php echo $featured_blurred; ?>) center top no-repeat;">&nbsp;</div>
          <?php echo get_the_title(); ?> 
        </li>
        <?php 
        $i = $i + 1; 
      }
    endwhile;
    endif;
    rewind_posts();
    $i = 1;
    ?>
    </ol>
    <!-- Slide Tabs -->
    <ol class='slide-tabs'>
    <?php 
    $tabs_query = array('posts_per_page'=> -1, 'numberposts'=> 0,'offset'=> 0,'orderby'=> 'post_date','order'=> 'DESC','post_type'=> 'project','post_status'=> 'publish'); 
    $feature_tabs = new WP_Query($tabs_query);
    if($feature_tabs) : while ($feature_tabs ->have_posts()) : $feature_tabs->the_post(); 
      $featured_focused = get_post_meta($post->ID, '_cmb_focused_image', true);
      if($featured_focused) { ?>
        <li class='slide slide-<?php echo $i; ?>' data-slide='<?php echo $i ?>'><a href="#">Tab <?php echo $i; ?></a></li>
        <?php 
        $i = $i + 1; 
      } 
    endwhile; 
    endif;
    $i = 1;
    ?>
    </ol>
  </div>
  <div class='inner-container'>
    <!-- Slide details -->
    <ol class='slide-details'>
    <?php 
    $details_query = array('posts_per_page'=> -1, 'numberposts'=> 0,'offset'=> 0,'orderby'=> 'post_date','order'=> 'DESC','post_type'=> 'project','post_status'=> 'publish'); 
    $feature_details = new WP_Query($details_query);
    if($feature_details) : while ($feature_details ->have_posts()) : $feature_details->the_post(); 
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
      #$featured_image_details = kd_mfi_get_featured_image_url('project-featured-image', 'project', 'full');
      $featured_focused = get_post_meta($post->ID, '_cmb_focused_image', true);
      if($featured_focused) : ?>
        <li class='slide' data-slide='<?php echo $i ?>'>
          <h2>
            <?php echo get_the_title(); ?> 
            <span>
              <?php if($p_year) { echo $p_year; } ?>
              <?php if($p_genre) { foreach($p_genre as $the_genre) echo $the_genre->name; } ?>
            </span>
          </h2>
          <div class='cols'>
            <?php if($p_colorist) : ?>
            <div class='col'>
              <h3 class='title'>Colorist</h3>
              <div class='details'>
                <ul>
                  <?php foreach ( $p_colorist as $the_colorist ) { ?>
                  <li><?php echo $the_colorist->name; ?></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <?php endif; ?>
          
            <?php if ($p_services) : ?>
            <div class='col'>
              <h3 class='title'>Services</h3>
              <div class='details'>
                <ul>
                  <?php foreach ( $p_services as $p_service ) { ?>
                  <li><?php echo $p_service->name; ?></li>
                  <?php } ?>
                </ul>
            </div>
            <?php endif; ?>
          </div>
        </li>
        <?php 
        $i = $i + 1;
      endif;
    endwhile; 
    endif;
    $i = 1;
    ?>
    </ol>
  </div>
</div>

<div id='content'>
  <div class='inner-container'>
    <div class='cta-columns'>
      <div class='col services'>
        <div class='inner'>
          <h3>Digital Intermediate &amp; HD Finishing</h3>
          <h2>Services</h2>
          <?php 
          $service_query = array('posts_per_page'=> 5,'offset'=> 0,'orderby'=> 'post_date','order'=> 'ASC','post_type'=> 'service','post_status'=> 'publish');
          $services = new WP_Query($service_query);
          ?>
          <ul class='cta-list'>
            <?php while ( $services->have_posts() ) : $services->the_post();  ?>
            <li class="<?php echo $post->post_name; ?>"><?php echo get_the_title(); ?></li>
            <?php endwhile; ?>
          </ul>
          <a class='more' href='services'>View All Services</a>
        </div>
      </div>
      <div class='col amenities'>
        <div class='inner'>
          <h3>Finest Coffee in the West</h3>
          <h2>Amenities</h2>
          <?php
          $amenity_query = array('numberposts'=> 5,'offset'=> 0,'orderby'=> 'post_date','order'=> 'ASC','post_type'=> 'amenity','post_status'=> 'publish'); 
          $amenities = new WP_Query($amenity_query);
          ?>
          <ul class='cta-list'>
            <?php while ( $amenities->have_posts() ) : $amenities->the_post();  ?>
            <li class="<?php echo $post->post_name; ?>"><?php echo get_the_title(); ?></li>
            <?php endwhile; ?>
          </ul>
          <!-- <a class='more' href='amenities'>See The Facility</a> -->
        </div>
      </div>
      <div class='col location'>
        <div class='inner'>
          <?php 
            $t_options = turing_get_theme_options();
            $email = $t_options['company_email'];
          ?>
          <h2><?php echo $t_options['company_phone']; ?></h2>
          <p><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
          <h4><?php echo $t_options['company_address_1']; ?></h4>
          <p>
            <?php echo $t_options['company_address_2'].' '.$t_options['company_address_2b'];; ?>
            <br/>
            <?php echo $t_options['company_address_3']; ?>
          </p>
        </div>
        <div class="building"> </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>