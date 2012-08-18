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
<h1><?php the_title(); ?></h1>
<div class="text-content">
  <p><strong>$p_year =</strong> <?php echo $p_year ?></p>
  <p><strong>$p_director =</strong> <?php echo $p_director ?></p>
  <p><strong>$p_director_imdb =</strong> <?php echo $p_director_imdb ?></p>
  <p><strong>$p_producer =</strong> <?php echo $p_producer; ?></p>
  <p><strong>$p_producer_imdb =</strong> <?php echo $p_producer_imdb ?></p>
  <p><strong>$p_cinematographer =</strong> <?php echo $p_cinematographer ?></p>
  <p><strong>$p_cinematographer_imdb =</strong> <?php echo $p_cinematographer_imdb ?></p>
  <p><strong>$p_colorist =</strong> <?php if($p_colorist) foreach($p_colorist as $colorist) echo $colorist->name ?></p>
  <p><strong>$p_genre =</strong> <?php if($p_genre) foreach($p_genre as $genre) echo $genre->name ?></p>
  <p><strong>$p_source =</strong> <?php if($p_camera) foreach($p_camera as $camera) echo $camera->name ?></p>
  <p><strong>$p_services =</strong> <?php if($p_services) foreach($p_services as $service) echo $service->name ?></p>
  <hr />
</div>
<?php endwhile; ?>
