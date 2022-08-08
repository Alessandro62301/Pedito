<?php

if ($_SERVER['SERVER_NAME'] == 'www.pedito.teamdev.com.br') :
    define('CDN_URL', 'www.pedito.teamdev.com.br');
  //define('CDN_URL', 'https://www.subwaycms.com.br/promocao');
  else :
    define('CDN_URL', 'http://wordpress-pedito.local');
  endif;


//! incluir arquivos / functions
require get_template_directory().'/include/bp_teste_functions.php';
require get_template_directory().'/include/pd_after_setup.php';
require get_template_directory().'/include/custom_post_types/post.php';

//! Filters
add_filter( 'x_redirect_by', '__return_false' );


//! Hooks
// ? add_action('shutdown','pd_fim');
add_action('wp_enqueue_scripts','pd_theme_styles');
add_action('after_setup_theme','pd_after_setup');
add_action('widgets_init','pd_widgets');
add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );

//! getField

function get_field2($key , $page_id = 0) {
    $id = $page_id !== 0 ? $page_id : get_the_ID();

    return get_post_meta($id,$key,true);
}

function the_field2($key , $page_id = 0) { 
    echo get_field2($key , $page_id);
}

function title_like_posts_where( $where, $wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}

//! CMB2

    
function pd_get_categories(){
    $args = array(
    'style' => 'list',
    'hide_empty' => 1,
    );
    $cat = [];
    foreach (get_categories($args) as $category) {
        if($category->term_id != 1){
            $cat = array_merge($cat, [$category->term_id.'c' => $category->name]);
         }
    }
    return $cat;
}

// ! ACF

$array_cat = pd_get_categories();
$array_categories = ['404c' => 'Sem categoria']  + $array_cat;


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_62e2a30839db6',
	'title' => 'Infomações Produto',
	'fields' => array(
		array(
			'key' => 'field_62e2a5f9dfbef',
			'label' => 'Descrição',
			'name' => 'description',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 4,
			'new_lines' => 'wpautop',
		),
		array(
			'key' => 'field_62e2a34f23850',
			'label' => 'Preço',
			'name' => 'price',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_62e2a624dfbf0',
			'label' => 'Serve quantos',
			'name' => 'amount',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 1,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_62e2a6bd4dd22',
			'label' => 'Imagem',
			'name' => 'image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_62ed1ae84b530',
			'label' => 'Categoria para recomendar',
			'name' => 'categoria_para_recomendar',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => $array_categories,
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'produto',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'discussion',
		3 => 'comments',
		4 => 'revisions',
		5 => 'slug',
		6 => 'format',
		7 => 'page_attributes',
		8 => 'send-trackbacks',
	),
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;		