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
      <div class="contact_map"> </div>
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
