<?php
/**
 * @package turing
 * @since turing 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="author-meta">
	  <div class="author_avatar">
		  <?php echo get_avatar(get_the_author_meta('ID'),80,'',get_the_author_meta('display_name')); ?>
		</div>
		<a href="<?php echo get_author_posts_url('ID'); ?>"><?php echo get_the_author_meta('display_name'); ?></a>
	</div>
	<div class="the_entry">
  	<header class="entry-header">
  		<?php turing_posted_on(); ?>
  		<h1 class="entry-title">
  		  <?php the_title(); ?>
  		  <a href="" class="comments_count">
  		    <?php echo get_comments_number();  ?>
  		    <span><?php comments_number("Be the first", "Now we're talkin'", "% Comments."); ?></span>
  		  </a>
  		</h1>
  		<div class="post_image">
  		  <?php echo get_the_post_thumbnail($post->ID,'large'); ?>
  		</div>
  	</header><!-- .entry-header -->

  	<div class="entry-content">
  		<?php the_content(); ?>
  		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'turing' ), 'after' => '</div>' ) ); ?>
  	</div><!-- .entry-content -->

  	<footer class="entry-meta">
  		<?php
  			/* translators: used between list items, there is a space after the comma */
  			$category_list = get_the_category_list( __( ', ', 'turing' ) );

  			/* translators: used between list items, there is a space after the comma */
  			$tag_list = get_the_tag_list( '', ', ' );

  			if ( ! turing_categorized_blog() ) {
  				// This blog only has 1 category so we just need to worry about tags in the meta text
  				if ( '' != $tag_list ) {
  					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'turing' );
  				} else {
  					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'turing' );
  				}

  			} else {
  				// But this blog has loads of categories so we should probably display them here
  				if ( '' != $tag_list ) {
  					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'turing' );
  				} else {
  					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'turing' );
  				}

  			} // end check for categories on this blog

  			printf(
  				$meta_text,
  				$category_list,
  				$tag_list,
  				get_permalink(),
  				the_title_attribute( 'echo=0' )
  			);
  		?>

  		<?php edit_post_link( __( 'Edit', 'turing' ), '<span class="edit-link">', '</span>' ); ?>
  	</footer><!-- .entry-meta -->
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
