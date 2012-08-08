<?php
/**
 * @package turing
 * @since turing 1.0
 */
global $pageClass;
global $pageID;
?>

<div id="post-<?php the_ID(); ?>" class="post">
	<?php if ( has_post_format( 'video' ) || has_post_format('image')) { the_content(); }  ?>
	<?php if ( 'post' == get_post_type() ) : ?>
  	<h3 class="subject"><?php the_title(); ?></h3>
  	<div class="meta">
      <span class="date"><?php turing_posted_on(); ?></span>
      <span class="author">By: <?php echo get_the_author_meta('display_name') ?></span>
      <span class="comments"><?php echo get_comments_number(); ?> Comments</span>
    </div>
    <div class="image">
      <?php echo get_the_post_thumbnail($post->ID,'large'); ?>
    </div>
    <div class="post-content">
      <?php 
      if(is_single()) the_content();
      else {
        the_excerpt(); ?>
        <p>
          <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'turing' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
  		      Continue reading...
  		    </a>
  		  </p>
      <?php } ?>
    </div>
  <?php endif; ?>
</div>

