<?php
/**
 * @package WordPress
 * @subpackage Unify Base Theme
*/

function theme_name_scripts() {
	wp_enqueue_style( 'styles.css', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );

	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

//Initialize the meta boxes
add_action( 'init', 'theme_base_initialize_cmb_meta_boxes', 9999 );   
function theme_base_initialize_cmb_meta_boxes() {
 
    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once dirname( __FILE__ ) . '/inc/metaboxes/init.php';
}


/*
* Navigation Menus
*/
register_nav_menus(
	array(
	'main'=>__('Main Menu'),
	'user'=>__('User Menu'),
	'footer'=>__('Footer Menu'),
	)
);

/*
* Sidebar widgets
*/

function theme_base_widgets_init(){
	/*
	* Sidebar widgets
	*/
	register_sidebar(array(
		'name' => 'Right Sidebar',
		'id'   => 'right',
		'description'   => 'These are widgets for right sidebar.',
		'before_widget' => '<div class="widget block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5',
		'after_title'   => '</h5>'
	));	

	register_sidebar(array(
			'name' => 'Left Sidebar',
			'id'   => 'left',
			'description'   => 'These are widgets for left sidebar.',
			'before_widget' => '<div class="widget block %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5',
			'after_title'   => '</h5>'
	));	

	/*
	* Before content
	*/
	register_sidebar(array(
			'name' => 'Before content region',
			'id' => 'before',
			'description' => 'Widgets in the before content region.',
			'before_widget' => '<div class="widget block %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5',
			'after_title'   => '</h5>'
	));

	/*
	* After content
	*/
	register_sidebar(array(
			'name' => 'After content region',
			'id' => 'after',
			'description' => 'Widgets in the after content region.',
			'before_widget' => '<div class="widget block %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5',
			'after_title'   => '</h5>'
	));

	/*
	* Footer widgets
	*/
	register_sidebar(array(
			'name' => 'Footer region',
			'id' => 'footer',
			'description' => 'Widgets in the footer region.',
			'before_widget' => '<div class="widget block %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5',
			'after_title'   => '</h5>'
	));

}
add_action( 'widgets_init', 'theme_base_widgets_init' );

// Custom post types

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'full-size', 9999, 9999, false ); // Full size screen
}

function slider_init() {
    $labels = array(
        'name' => _x('Slides', 'post type general name'),
        'singular_name' => _x('Slide', 'post type singular name'),
        'add_new' => _x('Add New', 'slider'), //This is our post_type, we'll display the metaboxes only on this post_type!
        'add_new_item' => __('Add New Slide'),
        'edit_item' => __('Edit Slide'),
        'new_item' => __('New Slide'),
        'view_item' => __('View Slide'),
        'search_items' => __('Search Slides'),
        'not_found' => __('No slides found'),
        'not_found_in_trash' => __('No slides found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Featured Slider'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('theme_base_slider', $args);
}
add_action( 'init', 'slider_init' );

/* Update Slide Help */
add_action('contextual_help', 'slider_help_text', 10, 3);
function slider_help_text($contextual_help, $screen_id, $screen) {
	if ('slider' == $screen->id) {
		$contextual_help =
		'<p>' . __('Things to remember when adding a slide:') . '</p>' .
		'<ul>' .
		'<li>' . __('Give the slide a title. The title will be used as the slide\'s headline.') . '</li>' .
		'<li>' . __('Attach a Featured Image to give the slide its background.') . '</li>' .
		'<li>' . __('Enter text into the Visual or HTML area. The text will appear within each slide during transitions.') . '</li>' .
		'</ul>';
	}
	elseif ('edit-slider' == $screen->id) {
		$contextual_help = '<p>' . __('A list of all slides appears below. To edit a slide, click on the slide\'s title.') . '</p>';
	}
	return $contextual_help;
}

//add custom fields
add_filter( 'cmb_meta_boxes' , 'theme_base_create_metaboxes' );
function theme_base_create_metaboxes( $meta_boxes ) {
	$prefix = 'slider_';
	//PROMOTION SLIDER
	  $meta_boxes[] = array(
		'id' => 'theme_base_slider_contents',
		'title' => 'Featured Slider',
		'pages' => array('theme_base_slider'),//Add our post_type() we created earlier.
		'context' => 'normal',
		'priority' => 'low',
		'show_names' => true,
		'fields' => array(
		array(
		'name' => 'Instructions',
		'desc' => "<ol><li>Enter your title above.</li><li>In the right column upload a featured image (Make sure this image is at least <b>1200x400px</b>).</li><li>Then if you'd like to add a few words about your feature do so below. (I would suggest no more than 100 words!).</li><li>Finaly position the body text; Then publish the slide.</li></ol>",
		'type' => 'title',
	  ),
	  array(	//Add a text area
		'name' => 'Featured Text',
		'desc' => 'Enter a few words about your feature',
		'id' =>  $prefix . 'caption',
		'type' => 'textarea_small'
	  ),
	  array(	//Add Image
		'name' => 'Image',
		  'desc' => 'Upload an image or enter an URL.',
		  'id' => $prefix . 'image',
		  'type' => 'file',
		  'allow' => array( 'url', 'attachment' )
	  ),
	  array(	//Add URL link
		'name' => 'Link',
		  'desc' => 'Link of the content',
		  'id' => $prefix . 'url',
		  'type' => 'text_url',
		  'protocols' => array( 'http', 'https'),
	  ),
	),
	);
	return $meta_boxes;
}

function theme_base_format_link($urls) {
    $urls = explode(',', $urls);
    $links = array();
    foreach ($urls as $url) {
        if (empty($url)) continue;
        $links[] = '<a href="http://'.$url.'">'.$url.'</a>';
    }
    return implode(',', $links);
}

