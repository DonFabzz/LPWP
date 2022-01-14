<?php 
/**
Template Name: sidebar
*/

get_header();
?>
<h1 class="template-h1">Template sidebar</h1>

<?php 	
 echo $post->post_name;
if(is_active_sidebar('sidebar-mmi-cours')){?>
    <ul>
        <?php dynamic_sidebar('sidebar-mmi-cours') ?>
    </ul>
    <?php
    }
unregister_sidebar($id);


 get_footer(); 
 ?>