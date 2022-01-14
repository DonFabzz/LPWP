<?php

add_action( 'wp_enqueue_scripts', 'example_scripts' );

function example_scripts(){
    
    $stylesheet_url = get_theme_file_uri( '/css/mmi.css' );
    wp_enqueue_style( 'mmi', esc_url( $stylesheet_url ) );

    wp_enqueue_script( 'base', get_theme_file_uri( '/js/base.js' ) );

    if( basename(get_permalink())==='blog' ){
        wp_enqueue_script( 'blog', get_theme_file_uri( '/js/blog.js' ) );
    }
}

add_shortcode( 'boxed', 'salcodes_boxed' );

function salcodes_boxed( $atts, $content = null, $tag = '' ) {
 $a = shortcode_atts( array(
 'title' => 'Title',
 'balise' => 'h1',
 'lien' => '#',
 'image' => 'https://fabiensigrand.fr/wordpress/wp-content/uploads/2021/12/test.jpg',
 'link' => 'https://fabiensigrand.fr/wordpress/',
 'link-content' => 'mon lien'
 ), $atts );
 
 $output = '<div class="salcodes-boxed"><div class="salcodes-boxed-title"><' . esc_attr( $a['balise'] ) . '>' . esc_attr( $a['title'] ) . '<' . esc_attr( $a['balise'] ) . '/></div>'.'<div class="salcodes-boxed-content"><p>' . esc_attr( $content ) . '</p><img src="'.esc_attr($a['image']).'"><a href="'.esc_attr($a['link']).'">'.esc_attr($a['link-content']).'</a></div>'.'</div>';
 
 return $output;
}


// mail a la creation d'un article
add_action( 'transition_post_status', 'custom_send_admin_email', 10, 3 );

function custom_send_admin_email( $new_status, $old_status, $post ) {
    if ( 'publish' === $new_status && 'publish' !== $old_status ) {
        $to = 'fabien.sigrand@gmail.com';
        $subject = 'The subject';
        $body = 'The email body content';
        $headers[] = '';
        wp_mail( $to, $subject, $body, $headers );     
    }
}

function dire_bonjour(){
	echo '<p class="hello">Text ajouté avec un hook</p>';
}
add_action( 'wp_footer', 'dire_bonjour');
   
function name($title){
	return 'Fabien :'.$title;
}

// filter hook
//add_filter('the_title', 'name', 10, 1);

function ao($content){
	$content = str_replace("a", "o", $content);
    return $content;
}
add_filter('the_content', 'ao', 10, 1);


// meta boxes

  add_action('add_meta_boxes','init_metabox');
  function init_metabox(){
    add_meta_box('citation', 'Citation', 'citation', 'post', 'normal');
    add_meta_box('constructeur', 'constructeur', 'constructeur', 'voiture', 'normal');

  }
  
  function constructeur($post){
    $constru = get_post_meta($post->ID,'_constructeur',true);
    echo '<label for="constructeur_meta">Constructeur :</label>';
    echo '<input style="width:100%;" id="constructeur_meta" type="constructeur" name="constructeur_site" value="'.$constru.'" />';
  }

  function citation($post){
    $url = get_post_meta($post->ID,'_citation',true);
    echo '<label for="citation_meta">Citation :</label>';
    echo '<input style="width:100%;" id="citation_meta" type="citation" name="citation_site" value="'.$url.'" />';
    $dispo = get_post_meta($post->ID,'_active_citation',true);
    echo '<br>';
    echo '<label for="active_citation_meta">Activé la citation :</label>';
    echo '<select style="width:100%;" name="active_citation">';
    echo '<option ' . selected( 'oui', $dispo, false ) . ' value="oui">Oui</option>';
    echo '<option ' . selected( 'non', $dispo, false ) . ' value="non">Non</option>';
    echo '</select>';
  }
  
  add_action('save_post','save_metabox');
  function save_metabox($post_id){
  if(isset($_POST['citation_site']))
    update_post_meta($post_id, '_citation', $_POST['citation_site']);
    if(isset($_POST['active_citation']))
    update_post_meta($post_id, '_active_citation', $_POST['active_citation']);
    if(isset($_POST['constructeur_site']))
    update_post_meta($post_id, '_constructeur', $_POST['constructeur_site']);
  }


 //widget

        add_action( 'widgets_init', 'nouvelle_zone_widgets_init' );

        function nouvelle_zone_widgets_init() {
            register_sidebar( array(
                'name'          => 'La sidebar mmi',
                'id'            => 'sidebar-mmi-cours',
                'before_widget' => '<div>',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="rounded">',
                'after_title'   => '</h2>',
            ) );
        }




    // Mon premier widget dynamique
class mon_premier_widget_dynamique extends WP_Widget {

    function __construct() {
        parent::__construct(
            'mon_premier_widget_dynamique',
            esc_html__( 'Mon premier widget dynamique', 'textdomain' ),
            array( 'description' => esc_html__( 'Affiche les coordonnées', 'textdomain' ), )
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Titre',
            'id' => 'titre',
            'type' => 'text',
        ),
        array(
            'label' => 'Facebook',
            'id' => 'facebook_link',
            'type' => 'text',
        ),
        array(
            'label' => 'Twitter',
            'id' => 'twitter_link',
            'type' => 'text',
        ),
        array(
            'label' => 'Youtube',
            'id' => 'youtube_link',
            'type' => 'text',
        ),
        array(
            'label' => 'Linkedin',
            'id' => 'linkedin_link',
            'type' => 'text',
        ),
    );

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        // Output generated fields
        echo '<div class="sidebarmmi">';
        echo '<p>'.$instance['titr'].'</p>';
        echo '<a href="'.$instance['facebook_link'].'"><img src="'.WP_CONTENT_URL.'/uploads/2022/01/facebook.png" /></a>';
        echo '<a href="'.$instance['twitter_link'].'"><img src="'.WP_CONTENT_URL.'/uploads/2022/01/twitter.png" /></a>';
        echo '<a href="'.$instance['youtube_link'].'"><img src="'.WP_CONTENT_URL.'/uploads/2022/01/youtube.png" /></a>';
        echo '<a href="'.$instance['linkedin_link'].'"><img src="'.WP_CONTENT_URL.'/uploads/2022/01/in.png" /></a>';
        echo '</div>';

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
            switch ( $widget_field['type'] ) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
                    $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    
}

add_action( 'widgets_init', 'register_mon_premier_widget_dynamique' );

function register_mon_premier_widget_dynamique() {
    register_widget( 'mon_premier_widget_dynamique' );
}


add_action('init', 'my_custon_init');
function my_custon_init()
{
    register_post_type(
        'voiture',
        array(
            'label' => 'Voiture',
            'labels' => array(
                'name' => 'Voitures',
                'singular_name' => 'Voiture',
                'all_items' => 'Toutes les voitures',
                'add_new_item' => 'AJouter une voiture',
                'edit_item' => 'Editer la voiture',
                'new_item' => 'Nouvelle voiture',
                'view_item' => 'Voir la voiture',
                'search_items' => 'Rechercher dans les coitures',
                'not_found' => 'Pas de voiture trouvée',
                'not_found_in_trash' => 'Aucune voiture dans la corbeille',
            ),
            'public' => true,
            'menu_position' => 20,
            'menu_icon' => null,
            'capability_type' => 'post',
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'custom-fields'
            ),
            'has_archive' => true,
            'menu_icon' => 'dashicons-car'
        )
    );
}


register_taxonomy(
    'accessibilite',
    'voiture',
    array(
        'label' => 'Accessibilité',
        'labels' => array(
            'name' => 'Accessibilité',
            'singular_name' => 'Accessibilité',
            'all_items' => 'tout types de prix',
            'edit_item' => 'edites l\'accessibilité',
            'view_item' => 'Voir l\'accessibilité',
            'update_item' => 'Mettre a jour',
            'add_new_item' => 'Ajouter une accessibilité',
            'new_item_name' => 'Nouvelle accessibilité',
            'search_items' => 'Rechercher parmi les accessibilités',
            'popular_items' => 'Accessibilités les plus utilisés',
        ),
        'hierachical' => true
    )
);

register_taxonomy(
    'mots_cles',
    'voiture',
    array(
        'label' => 'Mots-clés',
        'labels' => array(
            'name' => 'Mots-clés',
            'singular_name' => 'Mot-clé',
            'all_items' => 'tout types de mots-clés',
            'edit_item' => 'edites Mot-clé',
            'view_item' => 'Voir Mot-clé',
            'update_item' => 'Mettre a jour',
            'add_new_item' => 'Ajouter une Mot-clé',
            'new_item_name' => 'Nouvelle accessibilité',
            'search_items' => 'Rechercher parmi les Mot-clés',
            'popular_items' => 'Mot-clé les plus utilisés',
        ),
        'hierachical' => false
    )
);

register_taxonomy_for_object_type('accessibilite','voiture');
register_taxonomy_for_object_type('mots_cles','voiture');



?>

