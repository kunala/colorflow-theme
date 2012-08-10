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
<meta name="viewport" content="width=device-width" />
<title>
  <?php
	global $page, $paged, $pageClass, $pageID;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'turing' ), max( $paged, $page ) );
	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src='http://use.typekit.com/nxy6drw.js'> </script>
<script type='text/javascript'>
  //<![CDATA[
    try{Typekit.load();}catch(e){}
  //]]>
</script>
<?php 
wp_head(); 
?>
</head>
<body id="<?php echo $pageID; ?>" class="<?php echo $pageClass; ?>">
  <div id='wrapper'>
    <div id='header'>
      <div class='inner-container'>
        <div class='navigation'>
          <!-- Main Navigation -->
          <!-- ====================================================================== -->
          <h1 class='logo'><a href="/">Colorflow</a></h1>
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
        </div>
      </div>
    </div>
		<?php #do_action( 'before' ); ?>
    