<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package turing
 * @since turing 1.0
 */
 global $pageID;
 global $pageClass;
 $pageClass = "two-column";
 $pageID = "page";
get_header(); ?>
  <div id="content" role="main">
    <div id="content" role="main">
      <div id="primary" class="site-content">
				  <?php while ( have_posts() ) : the_post(); ?>
  					<?php get_template_part( 'content', 'page' ); ?>
  					<?php # comments_template( '', false ); ?>
  				<?php endwhile; // end of the loop. ?>
			</div>
		  <?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>