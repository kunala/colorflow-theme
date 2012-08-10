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
  register_taxonomy("genre",   array("project"), array("hierarchical" => true, "label" => "Genres",   "singular_label" => "Genre",    "rewrite" => true));
  register_taxonomy("source",  array("project"), array("hierarchical" => true, "label" => "Source",   "singular_label" => "Source",   "rewrite" => true));
  
  add_action("admin_init", "admin_init");

  function admin_init(){
    add_meta_box("credits_meta", "Design & Build Credits", "credits_meta", "project", "normal", "low");
  }

  function credits_meta() {
    global $post;
    $custom = get_post_custom($post->ID);
    $year_completed = $custom["year_completed"][0];
    $director = $custom["director"][0];
    $producer = $custom["producer"][0];
    $ographer = $custom["ographer"][0];
    ?>
    <p><label>Year Completed:</label><br />
    <input name="year_completed" value="<?php echo $year_completed; ?>" /></p>
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
  add_filter('manage_edit-project_columns', 'my_columns');
  function my_columns($columns) {
    $columns['director'] = 'Director';
    $columns['producer'] = 'Producer';
    $columns['ographer'] = 'Cinematography';
    $columns['year_completed'] = 'Year';
    $columns['source'] = 'Source';
    $columns['genre'] = 'Genre';
    return $columns;
  }
  add_action('manage_posts_custom_column',  'my_show_columns');
  function my_show_columns($name) {
    global $post;
    $custom_fields = get_post_custom();
    switch ($name) {
      case 'director':
        $director = $custom_fields["director"][0];
        echo $director;
        break;
      case 'producer':
        $producer = $custom_fields["producer"][0];
        echo $producer;
        break;
      case 'ographer':
        $ographer = $custom_fields["ographer"][0];
        echo $ographer;
        break;
      case 'year_completed':
        $year = $custom_fields['year_completed'][0];
        echo $year;
        break;
      case 'source':
        $source = get_the_term_list( $post->ID, 'source', '', ', ', '');
        echo $source;
        break;
      case 'genre':
        $genre = get_the_term_list( $post->ID, 'genre', '', ', ', '');
        echo $genre;
        break;
    }
  }
?>