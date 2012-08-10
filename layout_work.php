<?php
/*
Template Name: Work Index Page
*/
global $pageID;
global $pageClass;
$pageClass = "work-index";
$pageID = " ";
get_header();
?>
<?php 
  $custom_query = array('numberposts'=> 0,'offset'=> 0,'orderby'=> 'post_date','order'=> 'DESC','post_type'=> 'project','post_status'=> 'publish'); 
  $custom = new WP_Query($custom_query);
?>
 <div id='content'>
    <div id='primary'>
      <h2 class='page-heading'>
        <span class='section'><?php the_title(); ?></span>
      </h2>
      <ul class='filter'>
        <li><a class="all selected" href="#">All</a></li>
        <?php 
        $filters = get_terms( "genre", $args );
        if($filters) {
          foreach ($filters as $filter ) { ?>
            <li><a href="#" class="<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></a></li>
          <?php } 
        } ?>
      </ul>
      <div class="text-content">
        <?php 
        while ( have_posts() ) : the_post();
        the_content(); 
        endwhile;
        ?>
      </div>
      <ul class='grid'>
        <?php 
        while ( $custom->have_posts() ) : $custom->the_post(); 
        $image_url = gallery_first_image($post->ID);
        // $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
        $custom_fields = get_post_custom();
        $p_year = $custom_fields['year_completed'][0];
        $p_director = $custom_fields["director"][0];
        $p_producer = $custom_fields["producer"][0];
        $p_ographer = $custom_fields["ographer"][0];
        $p_genre = get_the_term_list( $post->ID, 'genre', '', ', ', '');
        $p_source = get_the_term_list( $post->ID, 'source', '', ', ', '');
        $p_services = get_the_terms( $post->ID, 'service' );
        // $p_colorists = get_the_terms( $post->ID, 'person' );
        $p_colorists = get_the_term_list( $post->ID, 'person', '', ', ', '');
        ?>
        <li class='cell'>
          <div class='image'>
            <img src="<?php echo $image_url; ?>"/>
          </div>
          <div class='details'>
            <h3>
              <a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h3>
            <dl>
              <?php if($p_genre): ?>
              <dt><?php echo $p_genre; ?></dt>
              <?php else: ?>
              <dt>Year:</dt>
              <?php endif; ?>
              <dd><?php if($p_year) { echo $p_year; } ?></dd>
              
              <?php if($p_colorists): ?>
              <dt>Colorist</dt>
              <dd> <?php $p_colorists;  ?></dd>
              <?php endif; ?>
              
              <?php if($p_source): ?>
              <dt>Source</dt>
              <dd><?php $p_source ?></dd>
              <?php endif; ?>
            </dl>
          </div>
        </li>
        <?php endwhile; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
