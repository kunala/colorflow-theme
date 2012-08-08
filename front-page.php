<?php get_header('home'); ?>
<?php 
  $feature_query = array('numberposts'=> 0,'offset'=> 0,'orderby'=> 'post_date','order'=> 'DESC','post_type'=> 'project','post_status'=> 'publish'); 
  $service_query = array('numberposts'=> 0,'offset'=> 0,'orderby'=> 'post_date','order'=> 'DESC','post_type'=> 'service','post_status'=> 'publish');
  $amenity_query = array('numberposts'=> 0,'offset'=> 0,'orderby'=> 'post_date','order'=> 'DESC','post_type'=> 'amenity','post_status'=> 'publish'); 
  $features = new WP_Query($feature_query);
  $amenities = new WP_Query($amenity_query);
  $services = new WP_Query($service_query);
  $i = 1;
?>
<div data-active-slide='1' id='feature-slides'>
  <div class='slides'>
    <!-- Slide Images -->
    <ol class='slide-images'>
    <?php 
    while ( $features->have_posts() ) : $features->the_post(); 
      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'original');
      ?>
      <li class='slide' data-slide='<?php echo $i ?>' style='background-image: url(<?php echo $image_url[0]; ?>);'>
        <?php echo get_the_title(); ?> 
      </li>
      <?php $i = $i + 1; ?>
    <?php endwhile; $i = 1 ?>
    </ol>
    <!-- Slide Tabs -->
    <ol class='slide-tabs'>
    <?php 
    while ( $features->have_posts() ) : $features->the_post(); ?>
      <li class='slide slide-<?php echo $i; ?>' data-slide='<?php echo $i ?>'><a href="#">Tab <?php echo $i; ?></a></li>
      <?php $i = $i + 1; ?>
    <?php endwhile; $i = 1 ?>
    </ol>
  </div>
  <div class='inner-container'>
    <!-- Slide details -->
    <ol class='slide-details'>
      <?php 
      while ( $features->have_posts() ) : $features->the_post(); 
      $custom_fields = get_post_custom();
      $p_year = $custom_fields['year_completed'][0];
      $p_director = $custom_fields["director"][0];
      $p_producer = $custom_fields["producer"][0];
      $p_ographer = $custom_fields["ographer"][0];
      $p_genre = get_the_term_list( $post->ID, 'Genre', '', ', ', '');
      $p_services = get_the_terms( $post->ID, 'service' );
      $p_colorists = get_the_terms( $post->ID, 'person' ); ?>
      <li class='slide' data-slide='<?php echo $i ?>'>
        <h2>
          <?php echo get_the_title(); ?> 
          <span>
            <?php if($p_year) { echo $p_year; } ?>
            <?php if($p_genre) { echo $p_genre; } ?>
          </span>
        </h2>
        <div class='cols'>
          <?php if ($p_colorists) : ?>
          <div class='col'>
            <h3 class='title'>Colorist</h3>
            <div class='details'>
              <ul>
                <?php foreach ( $p_colorists as $p_colorist ) { ?>
                <li><?php echo $p_colorist->name ?></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <?php endif; ?>
          
          <div class='col'>
            <h3 class='title'>Cinematographer</h3>
            <div class='details'><?php echo $p_ographer ?></div>
          </div>
          <?php if ($p_services) : ?>
          <div class='col'>
            <h3 class='title'>Services</h3>
            <div class='details'>
              <ul>
                  <?php foreach ( $p_services as $p_service ) { ?>
                  <li><?php echo $p_service->name ?></li>
                  <?php } ?>
              </ul>
          </div>
          <?php endif; ?>
        </div>
      </li>
      <?php $i = $i + 1; ?>
      <?php endwhile; $i = 1 ?>
      <!-- Slide 1 -->
    </ol>
  </div>
</div>

<div id='content'>
  <div class='inner-container'>
    <div class='cta-columns'>
      <div class='col services'>
        <div class='inner'>
          <h3>Digital Intermetiate & HD Finishing</h3>
          <h2>Services</h2>
          <ul class='cta-list'>
            <?php while ( $services->have_posts() ) : $services->the_post();  ?>
            <li><?php echo get_the_title(); ?></li>
            <?php endwhile; ?>
          </ul>
          <a class='more' href='services'>View All Services</a>
        </div>
      </div>
      <div class='col amenities'>
        <div class='inner'>
          <h3>Finest Coffee in the West</h3>
          <h2>Amenities</h2>
          <ul class='cta-list'>
            <?php while ( $amenities->have_posts() ) : $amenities->the_post();  ?>
            <li><?php echo get_the_title(); ?></li>
            <?php endwhile; ?>
          </ul>
          <a class='more' href='amenities'>See The Facility</a>
        </div>
      </div>
      <div class='col location'>
        <div class='inner'>
          <?php $t_options = turing_get_theme_options(); ?>
          <h4>Zaentz Media Center</h4>
          <p>
            <?php echo $t_options['company_address_1']; ?>
            <br/>
            <?php echo $t_options['company_address_2']; ?>
            <br/>
            <?php echo $t_options['company_address_3']; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>