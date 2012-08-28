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
	  <?php get_template_part( 'content', 'search' ); ?>
	  <?php get_search_form(); ?>
	  <?php endwhile; ?>
	  <?php turing_content_nav( 'nav-below' ); ?>
		<?php else : ?>
		<?php get_template_part( 'no-results', 'search' ); ?>
		<?php endif; ?>
	</div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>