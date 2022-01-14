<?php 
/**
Template Name: post citation
*/

get_header();
?>

<h1 class="template-h1">Mes articles avec une citation</h1>

<?php

$args= array(
    'showposts' => 3,
    'cat' => 0,
    'orderby'  => 'rand',
    'meta_key' => '_active_citation',
    'meta_value' => '1'
    );

$the_query = new WP_Query($args);

while ($the_query->have_posts()){
    $the_query->the_post();
    echo '<div class="post-citation"><h3>';
    echo the_title();
    echo '</h3>';
    echo '<p>'.get_post_meta( get_the_ID(), '_citation', true ).'</p>';
    echo '<a href="';
    echo the_permalink();
    echo '"><button>voir plus</button></a></div>';
}

?>

<?php 	
 get_footer(); 
 ?>