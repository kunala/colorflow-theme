<?php 
  add_action('init', 'person_post_type');
  function person_post_type() {
  	$labels = array(
  		'name' => _x('Talent', 'talent'),
  		'singular_name' => _x('Talent', 'talent'),
  		'add_new' => _x('Add New', 'person'),
  		'add_new_item' => __('Add New Color Scientist'),
  		'edit_item' => __('Edit Ol So and So'),
  		'new_item' => __('New Color Wizard'),
  		'view_item' => __('View So and So'),
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
  		'hierarchical' => true,
  		'menu_position' => null,
  		'supports' => array('title','editor','thumbnail')
  	  ); 
  	register_post_type( 'person' , $args );
  }

  add_action("admin_init", "talent_init");
  function talent_init(){
    add_meta_box("talent_info", "Some Extra Stuffs", "talent_info", "person", "normal", "low");
  }

  function talent_info() {
    global $post;
    $custom = get_post_custom($post->ID);
    $job_title = $custom["job_title"][0];
    $imdb = $custom["imdb"][0];
    $linkedin = $custom["linkedin"][0];
    ?>
    <p><label>Job Title:</label><br />
    <input type="text" name="job_title" value="<?php echo $job_title; ?>" /></p>
    <p><label>IMDB Link:</label><br />
    <input type="text" name="imdb" value="<?php echo $imdb; ?>"/></p>
    <p><label>linkedin URL:</label><br />
    <input type="text" name="linkedin" value="<?php echo $linkedin; ?>"/></p>
    <?php
  }
  add_action('save_post', 'save_stuffs');
  function save_stuffs(){
    global $post;
    update_post_meta($post->ID, "job_title", $_POST["job_title"]);
    update_post_meta($post->ID, "imdb", $_POST["imdb"]);
    update_post_meta($post->ID, "linkedin", $_POST["linkedin"]);
  }

  
?>