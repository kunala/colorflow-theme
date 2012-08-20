<?php
/*
Template Name: Work Index Page
*/
global $pageID;
global $pageClass;
$pageClass = "work-index";
$pageID = " ";
get_header();
?>
<?php 
  $projects_query = array('posts_per_page'=>-1,'numberposts'=>0,'offset'=>0,'orderby'=>'post_date','order'=>'DESC','post_type'=>'project','post_status'=>'publish'); 
  $projects = new WP_Query($projects_query);
?>
 <div id='content'>
    <div id='primary'>
      <h2 class='page-heading'>
        <span class='section'><?php the_title(); ?> /</span>
        <span id="filter_title">All</span>
      </h2>
      <ul id="filterOptions">
        <li class="active"><a href="#" class="all">All</a></li>
        <?php 
        $filters = get_terms( "genres", $args );
        if($filters) {
          foreach ($filters as $filter ) { ?>
            <li class=""><a href="#" class="<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></a></li>
          <?php } 
        } ?>
      </ul>
      <div class="text-content">
        <?php 
        while ( have_posts() ) : the_post();
        the_content(); 
        endwhile;
        ?>
      </div>
      <ul class='grid'>
        <?php 
        global $i; 
        $i = 1;
        while ( $projects->have_posts() ) : $projects->the_post(); 
        global $post;
        $p_year = get_post_meta( $post->ID, '_cmb_year_completed', true );
        $p_director = get_post_meta( $post->ID, '_cmb_director', true );
        $p_director_imdb = get_post_meta( $post->ID, '_cmb_director-imdb', true );
        $p_producer = get_post_meta( $post->ID, '_cmb_producer', true );
        $p_producer_imdb = get_post_meta( $post->ID, '_cmb_producer-imdb', true );
        $p_cinematographer = get_post_meta( $post->ID, '_cmb_cinematographer', true );
        $p_cinematographer_imdb = get_post_meta( $post->ID, '_cmb_cinematographer-imdb', true );
        $p_colorist = get_the_terms( $post->ID, 'talent');
        $p_camera = get_the_terms( $post->ID, 'camera');
        $p_genre = get_the_terms( $post->ID, 'genres');
        $p_services = get_the_terms( $post->ID, 'service');
        $image_url = gallery_first_image($post->ID);
        ?>
        <li class='item' data-type='<?php if($p_genre) foreach($p_genre as $genre) echo $genre->slug ?>' data-id="id-<?php echo $i; ?>">
          <a class="click" href="<?php echo get_permalink() ?>"> </a>
          <div class='image'>
            <?php echo gallery_first_image($post->ID) ?>
          </div>
          <div class='details'>
            <h3><span><?php the_title(); ?></span></h3>      
            <dl>
              <dt><?php if($p_genre) foreach($p_genre as $genre) echo $genre->name ?></dt>
              <dd><?php echo $p_year; ?></dd>
              <dt>Colorist</dt>
              <dd><?php if($p_colorist) foreach($p_colorist as $colorist) echo $colorist->name ?></dd>
              <dt>Source</dt>
              <dd><?php if($p_camera) foreach($p_camera as $camera) echo $camera->name ?></dd>
            </dl>
          </div>
        </li>
        <?php $i = $i + 1; ?>
        <?php endwhile; ?>
        </ul>
    </div>
  </div>
</div>
<?php get_footer(); ?>
