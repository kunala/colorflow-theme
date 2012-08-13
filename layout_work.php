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
        <li><a class="selected" href="#" rel="all">All</a></li>
        <?php 
        $filters = get_terms( "genre", $args );
        if($filters) {
          foreach ($filters as $filter ) { ?>
            <li><a href="#" rel="<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></a></li>
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
        $p_genres =     get_the_terms( $custom->ID, 'Genre');
        $p_sources =    get_the_terms( $custom->ID, 'Source');
        $p_colorists =  get_the_terms( $custom->ID, 'person');
        $p_services =   get_the_terms( $custom->ID, 'service');
        $p_year = $custom_fields['year_completed'][0];
        $p_director = $custom_fields["director"][0];
        $p_producer = $custom_fields["producer"][0];
        $p_ographer = $custom_fields["ographer"][0]; ?>
        <li class='cell <?php foreach ( $p_genres as $p_genre ) { echo $p_genre->slug.' '; }  ?>'>
          <div class='image'><img src="<?php echo $image_url; ?>"/></div>
          <div class='details'>
            <h3><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h3>      
            <dl>
              <dt><?php foreach ( $p_genres as $p_genre ) { echo $p_genre->name; } ?></dt>
              <dd><?php echo $p_year; ?></dd>
              <dt>Colorist</dt>
              <dd><?php foreach ( $p_colorists as $p_colorist ) { echo $p_colorist->name; }?></dd>
              <dt>Source</dt>
              <dd><?php foreach ($p_sources as $p_source) { echo $p_source->name; } ?></dd>
            </dl>
          </div>
        </li>
        <?php endwhile; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
