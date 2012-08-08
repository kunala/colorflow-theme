<?php 
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
  		'publicly_queryable' => false,
  		'show_ui' => true,
  		'query_var' => true,
  		#'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
  		'rewrite' => true,
  		'capability_type' => 'post',
  		'hierarchical' => false,
  		'menu_position' => null,
  		'supports' => array('title','editor','thumbnail','tag')
  	); 
  	register_post_type( 'project' , $args );
  }
  #register_taxonomy("Colorist", array("project"), array("hierarchical" => true, "label" => "Colorist", "singular_label" => "Colorist", "rewrite" => true));
  register_taxonomy("Genre",    array("project"), array("hierarchical" => true, "label" => "Genres",    "singular_label" => "Genre",    "rewrite" => true));
  #register_taxonomy("Services", array("project"), array("hierarchical" => true, "label" => "Services",  "singular_label" => "Service",  "rewrite" => true));
  register_taxonomy("Source",  array("project"), array("hierarchical" => true, "label" => "Source",   "singular_label" => "Source",   "rewrite" => true));
  
  add_action("admin_init", "admin_init");

  function admin_init(){
    add_meta_box("year_completed-meta", "Year Completed", "year_completed", "project", "side", "low");
    add_meta_box("credits_meta", "Design & Build Credits", "credits_meta", "project", "normal", "low");
  }

  function year_completed(){
    global $post;
    $custom = get_post_custom($post->ID);
    $year_completed = $custom["year_completed"][0];
    ?>
    <label>Year:</label>
    <input name="year_completed" value="<?php echo $year_completed; ?>" />
    <?php
  }

  function credits_meta() {
    global $post;
    $custom = get_post_custom($post->ID);
    $director = $custom["director"][0];
    $producer = $custom["producer"][0];
    $ographer = $custom["ographer"][0];
    ?>
    <p><label>Director:</label><br />
    <input type="text" name="director" value="<?php echo $director; ?>"/></p>
    <p><label>Produced By:</label><br />
    <input type="text" name="producer" value="<?php echo $producer; ?>"/></p>
    <p><label>Cinematography By:</label><br />
    <input type="text" name="ographer" value="<?php echo $ographer; ?>"/></p>
    <?php
  }
  add_action('save_post', 'save_details');
  function save_details(){
    global $post;
    update_post_meta($post->ID, "year_completed", $_POST["year_completed"]);
    update_post_meta($post->ID, "director", $_POST["director"]);
    update_post_meta($post->ID, "producer", $_POST["producer"]);
    update_post_meta($post->ID, "ographer", $_POST["ographer"]);
  }
?>