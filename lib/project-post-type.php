<?php 
global $post;

add_action('init', 'project_post_type');
function project_post_type() {
	$labels = array(
		'name' => _x('Projects', 'projects'),
		'singular_name' => _x('Project', 'project'),
		'add_new' => _x('Add New', 'project'),
		'add_new_item' => __('Add New Project'),
		'edit_item' => __('Edit Project'),
		'new_item' => __('New Project'),
		'view_item' => __('View Project'),
		'search_items' => __('Search Projects'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'project'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','tag'),
		'map_meta_cap' => true
	); 
	register_post_type( 'project' , $args );
}
register_taxonomy("genres",   array("project"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category",  "rewrite" => false));
register_taxonomy("camera",  array("project"), array("hierarchical" => true, "label" => "Sources", "singular_label" => "Source", "rewrite" => false));

function remove_custom_taxonomy() {
	$custom_post_type = 'project';
	remove_meta_box('genres'.'div', $custom_post_type, 'side' );
	remove_meta_box('camera'.'div', $custom_post_type, 'side' );
	remove_meta_box('custom-post-type-onomies-talent', $custom_post_type, 'side' );
	remove_meta_box('custom-post-type-onomies-service', $custom_post_type, 'side' );
  // $custom_taxonomy_slug is the slug of your taxonomy, e.g. 'genre' )
  // $custom_post_type is the "slug" of your post type, e.g. 'movies' )
}
add_action( 'admin_menu', 'remove_custom_taxonomy' );

$prefix = '_cmb_';
function project_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	global $prefix;
	$meta_boxes[] = array(
		'id'         => 'project_metabox',
		'title'      => 'Project Info',
		'pages'      => array('project'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Project IMDB url',
				'id'   => $prefix . 'project_imdb',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Year Completed',
				'id'   => $prefix . 'year_completed',
				'type' => 'text_small',
			),
			array(
				'name' => 'Agency',
				'id'   => $prefix . 'agency',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Agency URL',
				'id'   => $prefix . 'agency-url',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Director',
				'id'   => $prefix . 'director',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Director IMDB',
				'id'   => $prefix . 'director-imdb',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Cinematographer',
				'id'   => $prefix . 'cinematographer',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Cinematographer IMDB',
				'id'   => $prefix . 'cinematographer-imdb',
				'type' => 'text_medium',
			),
			array(
	      'name' => 'Colorist',
	      'id' => $prefix . 'colorist_radio',
	      'taxonomy' => 'talent', //Enter Taxonomy Slug
	      'desc' => 'Colorists are managed from the Talent post type found in left navigation',
	      'type' => 'taxonomy_radio',	
      ),
			array(
	      'name' => 'Source',
	      'id' => $prefix . 'source_check',
	      'taxonomy' => 'camera', //Enter Taxonomy Slug
	      'desc' => 'Add New Source from navigation on the left under Projects',
	      'type' => 'taxonomy_multicheck',	
      ),
			array(
	      'name' => 'Category',
	      'id' => $prefix . 'genre_radio',
	      'taxonomy' => 'genres', //Enter Taxonomy Slug
	      'desc' => 'Add New Category from navigation on the left under Projects',
	      'type' => 'taxonomy_radio',	
      ),
			array(
	      'name' => 'Services',
	      'id' => $prefix . 'services_check',
	      'taxonomy' => 'service', //Enter Taxonomy Slug
	      'desc' => 'Services are managed from the Service post type found in left navigation',
	      'type' => 'taxonomy_multicheck',	
      ),
			array(
	      'name' => 'Attached Images',
	      'desc' => 'A list of images attached to this project. To add images to the gallery simply upload and save.',
	      'id' => $prefix . 'file_list',
	      'type' => 'file_list',
      ),
      array(
        'name' => 'Feature Focused',
        'desc' => 'Upload an image or enter an URL.',
        'id' => $prefix . 'focused_image',
        'type' => 'file',
        'save_id' => true, // save ID using true
        'allow' => array('attachment') // limit to just attachments with array( 'attachment' )
      ),
      array(
        'name' => 'Feature Blur',
        'desc' => 'Upload an image or enter an URL.',
        'id' => $prefix . 'blur_image',
        'type' => 'file',
        'save_id' => true, // save ID using true
        'allow' => array('attachment') // limit to just attachments with array( 'attachment' )
      ),
		),
	);
	// Add other metaboxes as needed
	return $meta_boxes;
}
add_filter('cmb_meta_boxes', 'project_metaboxes');

// if(class_exists('kdMultipleFeaturedImages')) {
//   $args = array(
//     'id' => 'project-featured-image',
//     'post_type' => 'project',      // Set this to post or page
//     'labels' => array(
//       'name'      => 'Homepage Image',
//       'set'       => 'Set homepage image',
//       'remove'    => 'Remove homepage image',
//       'use'       => 'Use as homepage image',
//     )
//   );
//   new kdMultipleFeaturedImages( $args );
// }

?>