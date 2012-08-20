<?php
/*
Template Name: Services Page
*/
global $pageID;
global $pageClass;
$pageClass = "two-column";
$pageID = "services";
get_header();
?>
<?php 
  $custom_query = array('numberposts'=> 0,'offset'=> 0,'orderby'=> 'post_date','order'=> 'DESC','post_type'=> 'service','post_status'=> 'publish'); 
  $custom = new WP_Query($custom_query);
?>
 <div id='content'>
    <div id='primary'>
      <h2 class='page-heading'><span class='section'><?php the_title(); ?></span></h2>
      <div class="text-content">
        <?php 
        while ( have_posts() ) : the_post();
        the_content(); 
        endwhile;
        ?>
      </div>
      <ul class="services_list">
        <?php 
        while ( $custom->have_posts() ) : $custom->the_post(); 
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
        ?>
        <li>
          <?php echo get_the_post_thumbnail( $post_id, 'thumbnail'); ?>
          <h3><?php the_title(); ?></h3>
          <div class="text-content">
            <?php the_content() ?>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
