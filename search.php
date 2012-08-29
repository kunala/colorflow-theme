<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package turing
 * @since turing 1.0
 */
global $pageID;
global $pageClass;
$pageClass = "two-column blog";
$pageID = "search-results";
get_header(); ?>
<div id="content" role="main">
  <div id="primary" class="site-content">
    <h2 class="page-heading"><?php printf( __( 'Search Results for: %s', 'turing' ), '<strong>' . get_search_query() . '</strong>' ); ?></h1>
    <?php if ( have_posts() ) : ?>
	  <ul class="search-results">
	  <?php while ( have_posts() ) : the_post(); 
	    $kind = get_post_type();
	    if($kind == 'project' || $kind == 'post' || $kind == 'talent') { ?>
        <li class="post type-<?php echo $kind ?>">
	      <div class="thumbnail"><?php echo get_the_post_thumbnail($post->ID, 'medium'); ?></div>
	      <h3><a href="<?php echo the_permalink() ?>"><?php echo the_title(); ?></a></h3>
	      <div class="post-content"><?php the_excerpt(); ?></div>
	      </li><?php 
	    }
	    if($kind == 'page') { ?>
	      <li class="post <?php echo $kind ?>">
	        <h3><span><?php echo $kind ?>:</span> <a href="<?php echo the_permalink() ?>"><?php echo the_title(); ?></a></h3>
	      </li><?php 
	    }
	    ?>
	  <?php endwhile; ?>
	  <?php turing_content_nav( 'nav-below' ); ?>
		<?php else : ?>
		  <div class="no-results">
		    <p>So we've got some bad news... you searched for "<em><?php echo get_search_query() ?></em>" and we're a little embarrassed, but we're empty handed.</p>
		    <p>In an effort to provide industry leading service, we're extending to you unlimited free searches. <br/> So stay a while and don't hesitate to drop us a line.</p>
		    <?php get_search_form(); ?>
		  </div>
		<?php endif; ?>
	</div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>