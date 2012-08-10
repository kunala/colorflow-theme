<?php
/*
Template Name: Talent Page
*/
global $pageID;
global $pageClass;
$pageClass = "two-column";
$pageID = "talent";
get_header();?>
<?php 
  $custom_query = array('numberposts'=> 0,'offset'=> 0,'orderby'=> 'post_date','order'=> 'DESC','post_type'=> 'person','post_status'=> 'publish'); 
  $custom = new WP_Query($custom_query);
?>
  <div id='content'>
    <div id='primary'>
      <h2 class='page-heading'>
        <span class='section'><?php the_title(); ?></span>
      </h2>
      <div class="text-content">
        <?php 
        while ( have_posts() ) : the_post();
        the_content(); 
        endwhile;
        ?>
      </div>
      <ul class="talent_list">
        <?php 
        while ( $custom->have_posts() ) : $custom->the_post(); 
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
        ?>
        <li>
          <div class="headshot">
            <?php echo get_the_post_thumbnail( $post_id, 'thumbnail'); ?>
          </div>
          <div class="bio">
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>
    