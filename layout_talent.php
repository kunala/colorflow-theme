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
  $custom_query = array('posts_per_page'=>-1,'numberposts'=>0,'offset'=>0,'orderby'=>'post_date','order'=>'DESC','post_type'=>'talent','post_status'=>'publish'); 
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
        $job_title = get_post_meta( $post->ID, '_cmb_job_title', true );
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
        ?>
        <li class="person">
          <div class="headshot">
            <?php echo get_the_post_thumbnail( $post_id, 'thumbnail'); ?>
          </div>
          <div class="bio">
            <h3><?php the_title(); ?></a></h3>
            <h4><?php echo $job_title; ?></h4>
            <a class="button" href="<?php the_permalink(); ?>">Learn More</a>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>
    