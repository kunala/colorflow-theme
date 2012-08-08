<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package turing
 * @since turing 1.0
 */
?>

<h2 class='page-heading'><?php the_title(); ?></h2>
<div class="text-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'turing' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'turing' ), '<span class="edit-link">', '</span>' ); ?>
</div>
