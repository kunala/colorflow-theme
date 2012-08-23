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
			<?php do_action( 'before_sidebar' ); ?>
			
			<aside id="text-2" class="widget location">			
        <div class='inner'>
          <div class="subsection">
            <?php $t_options = turing_get_theme_options();
            $email = $t_options['company_email']; ?>
            <h2><?php echo $t_options['company_phone']; ?></h2>
            <p><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
            <h4><?php echo $t_options['company_address_1']; ?></h4>
            <p>
              <?php echo $t_options['company_address_2'].' Ste.'.$t_options['company_address_2b'];; ?>
              <br/>
              <?php echo $t_options['company_address_3']; ?>
            </p>
          </div>
          <a class="contact-button" href="/contact">Contact Us</a>
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
