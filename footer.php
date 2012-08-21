<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package turing
 * @since turing 1.0
 */
?>

	</div><!-- #main -->
</div><!-- #page .hfeed .site -->

<div id="footer">
  <?php $t_options = turing_get_theme_options(); ?>
  <div class="inner-container">
    <nav class="footer-navigation">
      <ul>
        <?php 
        $nav_items = wp_get_nav_menu_items('Main Nav'); 
        $nav_list = '';
        foreach ( (array) $nav_items as $key => $nav_item ) {
          $title = $nav_item->title;
        	$url = $nav_item->url;
        	$nav_list .= '<li><a href="'.$url.'">'.$title.'</a></li>';
        }
        echo $nav_list;
        ?> 
      </ul>
    </nav>
    <!-- <p class="copyright">Copyright 2012 Colorflow Post, Inc.</p> -->
    <p class="copyright">
      © <?php echo date("Y"); echo '&nbsp;'.$t_options['company_name']; ?>. All Rights Reserved.
      <!-- <span class="social_icons">
        <a class="vimeo" href="https://vimeo.com/colorflow">Vimeo</a>
        <a class="twitter" href="https://twitter.com/colorflowpost">Twitter</a>
        <a class="facebook" href="http://www.facebook.com/colorflowpost">Facebook</a>
        <a class="tumblr" href="http://tumblr.colorflow.com/">Tumblr</a>
      </span> -->
    </p>
  </div>
</div>

<?php wp_footer(); ?>

</body>

</html>