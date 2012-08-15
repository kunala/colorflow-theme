<?php 
global $pageID;
global $pageClass;
global $page;
global $numpages;
$pageClass = "work-page";
$pageID = "person";
get_header(); ?>
  <div id='content' role="main">
    <div id='primary' class="site-content">
      <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <div class='sub-header'>
        <h2 class='page-heading'>
          <?php echo get_the_title(); ?>
        </h2>
        <div class='projects-pagination'>
          <?php turing_content_nav( 'nav-above' ); ?>
        </div>
      </div>
      <?php
        $args = array(
          'post_type' => 'attachment',
          'numberposts' => null,
          'post_status' => null,
          'post_parent' => $post->ID
        ); 
        $attachments = get_posts($args);
        if ($attachments) {
          echo '<div class="nivoSlider">';
          foreach ($attachments as $attachment) {
            echo wp_get_attachment_image( $attachment->ID, 'gallery' );
          }
          echo '</div>';
        }
      ?>
      <div class='project-details'>
        <div class='text-content'>
          <?php the_content(); ?>
        </div>
        <dl class='overview'>
          <?php
          $custom_fields = get_post_custom();
          $job_title = $custom_fields['job_title'][0];
          $imdb = $custom_fields["imdb"][0];
          $twitter = $custom_fields["twitter"][0];
          ?>
          <?php if ($job_title) { ?>
          <dt class='services'>Title</dt>
          <dd class='services'><?php echo $job_title; ?></dd>
          <?php } ?>
          <?php if ($imdb) { ?>
          <dt class='colorist'>IMDB</dt>
          <dd class='colorist'><?php echo $imdb; ?></dd>
          <?php } ?>
          <?php if ($twitter) { ?>
          <dt class='source'>twitter</dt>
          <dd class='source'><?php echo $twitter; ?></dd>
          <?php } ?>
        </dl>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>