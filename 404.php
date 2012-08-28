<?php
/**
* The template for displaying 404 pages (Not Found).
*
* @package turing
* @since turing 1.0
*/
global $pageID;
global $pageClass;
$pageClass = "two-column";
$pageID = "four-oh-four";
get_header(); ?>
<div id="content" role="main">
  <div id="primary" class="site-content">
    <h1>Ruh Roh!</h1>
		<p>The page you’re looking for cannot be found. We call that a 404 error... but you really don’t care what it’s called, do you?</p>
    <p>
      You just want to find it... Fine. Here’s a gigantic search box.<br/>
      Happy hunting.
    </p>
	  <?php get_search_form(); ?>
	</div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

