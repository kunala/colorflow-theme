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
  $projects_query = array('posts_per_page'=>-1,'numberposts'=>0,'offset'=>0,'orderby'=>'post_date','order'=>'DESC','post_type'=>'project','post_status'=>'publish'); 
  $projects = new WP_Query($projects_query);
?>
 <div id='content'>
    <div id='primary'>
      <h2 class='page-heading'>
        <span class='section'><?php the_title(); ?> /</span>
        <span id="filter_title">All</span>
      </h2>
      <ul id="filterOptions">
        <li class="active"><a href="#" class="all">All</a></li>
        <?php 
        $filters = get_terms( "genre", $args );
        if($filters) {
          foreach ($filters as $filter ) { ?>
            <li class=""><a href="#" class="<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></a></li>
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
          global $i; 
          $i = 1;
        ?>
        <?php 
        while ( $projects->have_posts() ) : $projects->the_post(); 
        global $i;
        $custom_fields = get_post_custom();
        $image_url = gallery_first_image($post->ID);
        // $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
        $custom_fields = get_post_custom();
        $p_genres =     get_the_terms( $post->ID, 'Genre'); // is_wp_error works
        $p_sources =    get_the_terms( $post->ID, 'Source'); // is_wp_error works
        $p_colorists =  get_the_terms( $post->ID, 'person'); // is_wp_error DONT WORK!
        // $p_colorists =  get_the_terms( $post->ID, 'person');
        $p_services =   get_the_terms( $post->ID, 'service');
        $p_year = $custom_fields['year_completed'][0];
        $p_director = $custom_fields["director"][0];
        $p_producer = $custom_fields["producer"][0];
        $p_ographer = $custom_fields["ographer"][0]; 
        ?>
        <li class='item' data-type='<?php foreach ( $p_genres as $p_genre ) { echo $p_genre->slug; }  ?>' data-id="id-<?php echo $i; ?>">
          <a class="click" href="<?php echo get_permalink() ?>"> </a>
          <div class='image'><img src="<?php echo $image_url; ?>"/></div>
          <div class='details'>
            <h3><?php the_title(); ?></a></h3>      
            <dl>
              <?php if (is_wp_error( $p_genres )) { ?>
              <dt>Year</dt>
              <?php } else { ?>
              <dt><?php foreach ( $p_genres as $p_genre ) { echo $p_genre->name; } ?></dt>
              <?php } ?>
              
              <?php if (is_wp_error($p_year)) { ?>
              <dd>&nbsp;</dd>
              <?php } else { ?>
              <dd><?php echo $p_year; ?></dd>
              <?php } ?>
              
              <dt>Colorist</dt>
              <dd><?php foreach ($p_colorists as $p_colorist) { echo $p_colorist->name; } ?></dd>
              
              <?php if (is_wp_error($p_sources)) { ?>
              <dt>&nbsp;</dt>
              <dd>&nbsp;</dd>
              <?php } else { ?>
              <dt>Source</dt>
              <dd><?php foreach ($p_sources as $p_source) { echo $p_source->name; } ?></dd>
              <?php } ?>
            </dl>
          </div>
        </li>
        <?php $i = $i + 1;  ?>
        <?php endwhile; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
