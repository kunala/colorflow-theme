<?php 
  add_action('init', 'talent_post_type');
  function talent_post_type() {
  	$labels = array(
  		'name' => _x('Talent', 'talent'),
  		'singular_name' => _x('Talent', 'talent'),
  		'add_new' => _x('Add New', 'person'),
  		'add_new_item' => __('Add New Talent'),
  		'edit_item' => __('Edit Talent'),
  		'new_item' => __('New Person'),
  		'view_item' => __('View Person'),
  		'search_items' => __('Search Talent'),
  		'not_found' =>  __('Nobody found'),
  		'not_found_in_trash' => __('Nobody found in Trash ... phew. Why were we even looking for people in the trash?'),
  		'parent_item_colon' => ''
  	);
  	$args = array(
  		'labels' => $labels,
  		'public' => true,
  		'publicly_queryable' => true,
  		'show_ui' => true,
  		'query_var' => true,
  		'rewrite' => array('slug' => 'talent'),
  		'capability_type' => 'post',
  		'hierarchical' => false,
  		'menu_position' => null,
  		'supports' => array('title','editor','thumbnail')
  	  ); 
  	register_post_type( 'talent' , $args );
  }
  
$prefix = '_cmb_';
function talent_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	global $prefix;
	$meta_boxes[] = array(
		'id'         => 'talent_metabox',
		'title'      => 'Talent Info',
		'pages'      => array('talent'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Job Title',
				'id'   => $prefix . 'job_title',
				'type' => 'text_medium',
			),
			array(
				'name' => 'LinkedIn URL',
				'id'   => $prefix . 'talent_linkedin',
				'type' => 'text_medium',
			),
			array(
				'name' => 'IMDB URL',
				'id'   => $prefix . 'talent_imdb',
				'type' => 'text_medium',
			),
		),
	);
	// Add other metaboxes as needed
	return $meta_boxes;
}
add_filter('cmb_meta_boxes', 'talent_metaboxes');

?>