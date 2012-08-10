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

			<?php do_action( 'before_sidebar' ); ?>
			
			<aside id="text-2" class="widget widget_text">			
        <div class="inner">
          <div class="subsection location">
            <h4>Zaentz Media Center</h4>
            <p>
              2600 10 Street <br>
              Suite 4B <br>
              Berkeley, CA 94710
            </p>
          </div>
          <a class="contact-button" href="#">Contact Us</a>
        </div>
		  </aside>
			
			<aside class="widget subsection updates">
        <div class="inner">
          <h4>Get ColorFlow Updates</h4>
          <div class="field">
            <form action="http://campaigns.turingstudio.com/t/r/s/gjrkkl/" method="post" id="subForm">
              <!-- <label for="name">Name:</label><br /><input type="text" name="cm-name" id="name" /><br /> -->
              <!-- <label for="gjrkkl-gjrkkl">Email:</label><br /> -->
              <input type="text" name="cm-gjrkkl-gjrkkl" id="gjrkkl-gjrkkl" placeholder="Enter your email address" />
              <input type="submit" value="GO" />
            </form>
          </div>
          <p>We'll never share you email. Ever.</p>
        </div>
      </aside>
			
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>


			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
