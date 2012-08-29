<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package turing
 * @since turing 1.0
 */
global $pageID;
global $pageClass;
$pageClass = "two-column";
$pageID = "search-results";
get_header(); ?>
<div id="content" role="main">
  <div id="primary" class="site-content">
    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'turing' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <?php if ( have_posts() ) : ?>
	  <?php while ( have_posts() ) : the_post(); ?>
	    <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
	    <h2><a href="<?php echo the_permalink() ?>"><?php echo the_title(); ?></a></h2>
	    <?php the_excerpt(); ?>
	  <?php endwhile; ?>
	  <?php turing_content_nav( 'nav-below' ); ?>
		<?php else : ?>
		  <p>Sorry there's no results for <?php echo get_search_query() ?>.</p>
		  <?php get_search_form(); ?>
		<?php endif; ?>
	</div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>