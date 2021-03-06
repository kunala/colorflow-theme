<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package turing
 * @since turing 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- <meta name="viewport" content="width=device-width" /> -->
<title>
  <?php
	global $page, $paged;
	bloginfo( 'name' );
	wp_title( ' | ', true, 'left' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'turing' ), max( $paged, $page ) );
	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.png">
<!-- <link rel="image_src" href="<?php echo get_template_directory_uri() ?>/images/colorflow-icon.jpg" /> -->

<meta content="<?php echo get_template_directory_uri() ?>/images/clo-icon.jpg" property="og:image"/>
<meta content="colorflow" property="og:title"/>
<meta content="http://colorflow.com" property="og:url"/>
<meta content="Colorflow a next generation post production for Film, Broadcast, and the Web." property="og:site_name"/>
<meta content="Colorflow a next generation post production for Film, Broadcast, and the Web." property="og:description"/>
<meta content="website" property="og:type"/>

<script src='http://use.typekit.com/nxy6drw.js'> </script>
<script type='text/javascript'>
  //<![CDATA[
    try{Typekit.load();}catch(e){}
  //]]>
</script>
<?php wp_head(); ?>
</head>
<body id="home" <?php body_class(); ?>>
  <div id='wrapper'>
    <div id='header'>
      <div class='inner-container'>
        <div class='navigation'>
          <!-- Main Navigation -->
          <!-- ====================================================================== -->
          <nav class='main-navigation'>
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
          <!-- Social Navigation -->
          <!-- ====================================================================== -->
          <nav class='social-navigation'>
            <span class='heading'>we love you too:</span>
            <ul class="social_icons">
              <li><a class="vimeo" href="https://vimeo.com/colorflow">Vimeo</a></li>
              <li><a class="twitter" href="https://twitter.com/colorflowpost">Twitter</a></li>
              <li><a class="facebook" href="http://www.facebook.com/colorflowpost">Facebook</a></li>
              <li><a class="tumblr" href="http://tumblr.colorflow.com/">Tumblr</a></li>
            </ul>
          </nav>
        </div>
        <!-- Main Header -->
        <!-- ====================================================================== -->
        <header class='main-header'>
          <h1>Colorflow</h1>
          <p>
            Next generation post production for Film, Broadcast,
            <br>and the Web.</br>
          </p>
        </header>
      </div>
    </div>
		<?php #do_action( 'before' ); ?>
