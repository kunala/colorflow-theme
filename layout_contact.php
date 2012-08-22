<?php
/*
Template Name: Contact Page
*/
global $pageID;
global $pageClass;
$pageClass = "two-column";
$pageID = "contact";
get_header();
?>
  <div id='content'>
    <div id='primary'>
      <h2 class='page-heading'>
        <span class='section'><?php the_title(); ?></span>
      </h2>
      <div class="contact_map">
        <iframe width="555" height="292" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=2600+10th+Street,+Berkeley,+CA+94710&amp;aq=0&amp;oq=2600+10th+Street++Berkeley,+CA+94710&amp;sll=37.269174,-119.306607&amp;sspn=16.134919,18.479004&amp;ie=UTF8&amp;hq=&amp;hnear=2600+10th+St,+Berkeley,+California+94710&amp;t=m&amp;ll=37.859066,-122.290792&amp;spn=0.019787,0.04755&amp;z=14&amp;output=embed"></iframe>
        <!-- <iframe width="555" height="292" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=2600+10th+Street,+Berkeley,+CA+94710&amp;aq=0&amp;oq=2600+10th+Street++Berkeley,+CA+94710&amp;sll=37.269174,-119.306607&amp;sspn=16.134919,18.479004&amp;ie=UTF8&amp;hq=&amp;hnear=2600+10th+St,+Berkeley,+California+94710&amp;ll=37.858337,-122.290299&amp;spn=0.007827,0.009023&amp;t=m&amp;z=14&amp;output=embed"></iframe> -->
        <!-- <small><a href="https://www.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=2600+10th+Street,+Berkeley,+CA+94710&amp;aq=0&amp;oq=2600+10th+Street++Berkeley,+CA+94710&amp;sll=37.269174,-119.306607&amp;sspn=16.134919,18.479004&amp;ie=UTF8&amp;hq=&amp;hnear=2600+10th+St,+Berkeley,+California+94710&amp;ll=37.858337,-122.290299&amp;spn=0.007827,0.009023&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>  -->
      </div>
      <?php $t_options = turing_get_theme_options(); ?>
      <div class="columns">
        <div class="column">
          <a tel="<?php echo $t_options['company_phone']; ?>" class="phone"><?php echo $t_options['company_phone']; ?></a>
          <a href="mailto:<?php echo $t_options['company_email']; ?>" class="email"><?php echo $t_options['company_email']; ?></a>
          <a href="http://twitter.com/<?php echo $t_options['company_twitter'];?>" class="twitter">@<?php echo $t_options['company_twitter']; ?></a>
        </div>
      
        <div class="column address">
          <h4><?php echo $t_options['company_address_1']; ?></h4>
          <p>
            <?php echo $t_options['company_address_2']; ?>
            <br/>
            <?php echo $t_options['company_address_2b']; ?>
            <br/>
            <?php echo $t_options['company_address_3']; ?>
          </p>
        </div>
      </div>
      <hr />
      <div class="contact_form">
        <h2 class="form_title">Drop Us a Line</h2>
        <?php 
        while ( have_posts() ) : the_post();
        the_content(); 
        endwhile;
        ?>
        <div class="clear"> </div>
        <div id="thanks">
          <h3>Thanks!</h3>
          <p>We’ve received your message through the internet tubes and a Colorflow team member will be in touch soon.</p>
        </div>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div> <!-- END WRAPPER -->
<?php get_footer(); ?>
