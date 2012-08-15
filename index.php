<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package turing
 * @since turing 1.0
 */
 global $pageID;
 global $pageClass;
 $pageClass = "blog two-column";
 $pageID = "services";

get_header(); ?>
	<div id="content" role="main">
	  <div id="primary" class="site-content">
  		<h2 class="page-heading"><?php wp_title(""); ?></h2>
  		<?php if ( have_posts() ) : ?>
  		<?php #turing_content_nav( 'nav-above' ); ?>
  		<div class="posts">
  			<?php while ( have_posts() ) : the_post(); ?>
  				<?php	get_template_part( 'content', get_post_format() ); ?>
  			<?php endwhile; ?>
  		</div>
  		<?php #turing_content_nav( 'nav-below' ); ?>
  		<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>
  		<?php get_template_part( 'no-results', 'index' ); ?>
  		<?php endif; ?>
  		<div class="posts_navigation">
  		  <div class="older">
  		    <?php next_posts_link('Older Posts') ?>
  		    <?php # posts_nav_link(' ', ' ', 'Older Posts'); ?>
  		  </div>
  		  <div class="newer">
  		    <?php previous_posts_link('Newer Posts') ?>
  		    <?php # posts_nav_link(' ', 'Newer Posts', ' '); ?>
  		  </div>
  		</div>
		</div><!-- #primary .site-content -->
		<?php get_sidebar(); ?>
	</div><!-- #content -->

<?php get_footer(); ?>