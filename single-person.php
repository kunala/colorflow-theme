<?php 
global $pageID;
global $pageClass;
global $page;
global $numpages;
$pageClass = "work-page two-column";
$pageID = "talent";
get_header(); ?>
  <div id='content' role="main">
    <div id='primary' class="site-content">
      <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <div class='sub-header'>
        <h2 class='page-heading'>Talent</h2>
      </div>
      <div class="talent_list">
        <?php 
        $custom_fields = get_post_custom();
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
        $job_title = $custom_fields['job_title'][0];
        $imdb = $custom_fields["imdb"][0];
        $linkedin = $custom_fields["linkedin"][0];
        ?>
        <div class="person">
          <div class="headshot">
            <?php echo get_the_post_thumbnail( $post_id, 'thumbnail'); ?>
          </div>
          <div class="bio">
            <h3><?php the_title(); ?></a></h3>
            <h4><?php echo $custom_fields['job_title'][0]; ?></h4>
            <div class="talent_links">
              <a href="" class="imdb">IMDB</a>
              <a href="" class="linkedin">LinkedIn</a>
            </div>
          </div>
        </div>
      </div>
      <div class='text-content'>
        <?php the_content(); ?>
      </div>
      <div class="credits">
        <h3>Credits</h3>
        <ul class='grid'>
          <?php 
          $projects_query = array('posts_per_page'=>-1,'numberposts'=>0,'offset'=>0,'orderby'=>'post_date','order'=>'DESC','post_type'=>'project','post_status'=>'publish'); 
          $projects = new WP_Query($projects_query);
          while ( $projects->have_posts() ) : $projects->the_post(); 
          $image_url = gallery_first_image($post->ID);
          ?>
          <li class='item'>
            <div class='image'><img src="<?php echo $image_url; ?>"/></div>
            <div class='details'>
              <h3><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h3>      
            </div>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>