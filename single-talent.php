<?php 
global $pageID;
global $pageClass;
global $page;
global $numpages;
$pageClass = "work-page two-column";
$pageID = "talent";
$talentID = $post->ID;
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
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
        $job_title = get_post_meta( $post->ID, '_cmb_job_title', true );
        $linkedin = get_post_meta( $post->ID, '_cmb_talent_linkedin', true );
        $imdb = get_post_meta( $post->ID, '_cmb_talent_imdb', true );
        ?>
        <div class="person">
          <div class="headshot">
            <?php echo get_the_post_thumbnail( $post_id, 'thumbnail'); ?>
          </div>
          <div class="bio">
            <h3><?php the_title(); ?></a></h3>
            <div class="talent_links">
              <?php if($imdb) echo '<a class="imdb" href="'.$imdb.'">IMDB</a>' ?>
              <?php if($linkedin) echo '<a class="linkedin" href="'.$linkedin.'">LinkedIn</a>' ?>
            </div>
          </div>
        </div>
      </div>
      <div class='text-content'>
        <?php the_content(); ?>
      </div>
      <?php 
      $projects_query = array(
        'tax_query'       => array(array('taxonomy' => 'talent','field' => 'id','terms' => $talentID)),
        'posts_per_page'  => -1,
        'numberposts'     => 0,
        'offset'          => 0,
        'orderby'         => 'post_date',
        'order'           => 'DESC',
        'post_type'       => 'project',
        'post_status'     => 'publish'
      );
      $projects = new WP_Query($projects_query);
      if ($projects->have_posts()) :
      ?>
      <div class="credits">
        <h3>Recent Work</h3>
        <ul class='grid'>
          <?php while ( $projects->have_posts() ) : $projects->the_post(); 
          $image_url = gallery_first_image($post->ID);
          ?>
          <li class='item'>
            <a class="click" href="<?php echo get_permalink() ?>"> </a>
            <div class='image'><img src="<?php echo $image_url; ?>"/></div>
            <div class='details'>
              <h3><?php the_title(); ?></h3>      
            </div>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
      <?php endif; ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>