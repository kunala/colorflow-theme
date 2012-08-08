<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package turing
 * @since turing 1.0
 */
?>
		
		<!-- 
		if the page is an author page ... display user profile
		else display the about us block
		-->
		
		<div id="secondary" class="widget-area" role="complementary">
			<?php $b_options = turing_get_theme_options(); ?>
		  <aside class="widget">
		    <a href="<?php bloginfo('rss_url'); ?>" class="rss2">Subscribe</a>
		  <?php if (is_author() ) { ?>
			  
			  <h3>About <?php the_author(); ?></h3>
			  <p><?php the_author_meta( "description"); ?></p>
			<?php } 
			else { ?>
			  <a href="<?php bloginfo('rss_url'); ?>" class="rss2">Subscribe</a>
			  <h3>About Turing</h3>
			  <p><?php echo $b_options['company_bio']; ?></p>
			<?php } ?>
			</aside>
			
			<?php do_action( 'before_sidebar' ); ?>
			
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'turing' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'turing' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
