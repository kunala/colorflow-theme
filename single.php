<?php
/**
 * The Template for displaying all single posts.
 *
 * @package turing
 * @since turing 1.0
 */
 global $pageID;
 global $pageClass;
 $pageClass = "blog two-column";
 $pageID = " ";
get_header(); ?>
<div id="content" role="main">
  <div id="primary" class="site-content">
    <!-- <h2 class="page-heading"><?php wp_title(""); ?></h2> -->
		<?php if ( have_posts() ) : ?>
		<?php #turing_content_nav( 'nav-above' ); ?>
		<div class="posts">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php	get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div>
		<?php #turing_content_nav( 'nav-below' ); ?>
		<?php	if (comments_open() || '0' != get_comments_number() ) comments_template( '', true ); ?>
		<?php endif; ?>
	</div><!-- #primary .site-content -->
	<?php get_sidebar(); ?>
</div><!-- #content -->
<?php get_footer(); ?>