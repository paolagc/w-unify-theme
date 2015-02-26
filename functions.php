<?php
/**
 * @package WordPress
 * @subpackage Unify Base Theme
*/

function theme_name_scripts() {
	wp_enqueue_style( 'styles.css', get_stylesheet_uri() );

	wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css' );
	wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css' );
	wp_enqueue_style( 'images', get_template_directory_uri() . '/css/images.css' );
	wp_enqueue_style( 'posts', get_template_directory_uri() . '/css/posts.css' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/apps.js');
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js');
	wp_enqueue_script( 'back-to-top', get_template_directory_uri() . '/js/back-to-top.js');

	//plugins
	wp_enqueue_script('jquery.fancybox.js', get_template_directory_uri() . '/js/jquery.fancybox.js', array( 'jquery' ), false, true);

}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

//Initialize the meta boxes
add_action( 'init', 'theme_base_initialize_cmb_meta_boxes', 9999 );   
function theme_base_initialize_cmb_meta_boxes() {
 
    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once dirname( __FILE__ ) . '/inc/metaboxes/init.php';
}

function theme_base_setup(){

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
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );


	if ( function_exists( 'add_theme_support' ) ) { 
	    add_theme_support( 'post-thumbnails' );

	    add_image_size( 'full-size', 9999, 9999, false ); // Full size screen
	    add_image_size( 'full-blog', 850, 300, false ); // Full size screen
	}
}
/* Comments*/
function format_comment($comment, $args, $depth) {
    
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <a class="pull-left">
    	<?php echo get_avatar( $comment, 60 ); ?>
    </a>
    <div class="media-body">
    	<h4 class="media-heading">
    		<?php print get_comment_author_link(); ?>
    		<span>
    			 <time <?php comment_time( 'c' ); ?> class="comment-time">
					 <span class="date">
					 	<?php comment_date(); ?>
					 </span>
					 <span class="time">
					 	<?php comment_time(); ?>
					 </span>
				 </time>
    			/
    			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    		</span>
    	</h4>
    	 <?php comment_text(); ?>
    </div>
    <hr>
<?php 
}


/*
* Breadcrumb
*/
function the_breadcrumb() {
	$pid = $post->ID;

	$breadcrumb = '<ul class="pull-right breadcrumb">';
	//home
	$base_url = esc_url( home_url( '/' ) );
	$breadcrumb .= '<li><a href="'.$base_url.'">Home</a></li>';

	//Category page
	if( is_category()){
		$category = get_the_category($pid);
		$cat_name = get_cat_name($category[0]->cat_ID);
		$breadcrumb .= '<li>'.$cat_name.'</li>';
	}


	//Single post page
	if( is_single()){
		$category = get_the_category($pid);
		$post = get_post($pid);

		// Get the URL of this category
		$cat_link = get_category_link($category[0]);
		$cat_name = get_cat_name($category[0]->cat_ID);
		$breadcrumb .= '<li><a href="'.$cat_link.'">'.$cat_name.'</a></li>';

    	//post title
    	$breadcrumb .= '<li>'.$post->post_title.'</li>';
	}

	// Single page
	if( is_page() ){
		$pdata = get_post($pid);
		//ancestors title
		while ($pdata->post_parent) {
			$pdata = get_post($pdata->post_parent);
			$breadcrumb .= '<a href="'.get_permalink($pdata->ID).'">'.$pdata->post_title.'</a>';
		}
		//page title
    	$breadcrumb .= '<li>'.$pdata->post_title.'</li>';
	}

	// Tag page
	if( is_tag() ){
		//page title
    	$breadcrumb .= '<li>'.single_tag_title().'</li>';
	}

	// Search page
	if( is_tag() ){
    	$breadcrumb .= '<li>Search Results</li>';
	}

	$breadcrumb .= '</ul>';
	return $breadcrumb;
}

/*
* Sidebar widgets
*/

function theme_base_widgets_init(){
	/*
	* Sidebar widgets
	*/
	register_sidebar(array(
		'name' => 'idebar',
		'id'   => 'sidebar',
		'description'   => 'These are widgets for right sidebar.',
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

function add_masonry() {
	if(is_page_template('templates/page-masonry.php')) {

	}
}

function add_isotope() {
	if(is_page_template('templates/page-isotope.php')) {
	    wp_register_script( 'isotope', get_template_directory_uri().'/js/isotope.pkgd.min.js', array('jquery'),  true );
	    wp_register_script( 'isotope-init', get_template_directory_uri().'/js/isotope.js', array('jquery', 'isotope'),  true );
	    wp_register_style( 'isotope-css', get_stylesheet_directory_uri() . '/css/isotope.css' );
	 
	    wp_enqueue_script('isotope-init');
	    wp_enqueue_style('isotope-css');
	}
}
 
add_action( 'wp_enqueue_scripts', 'add_isotope' );

function setup_theme_admin_menus() {
     add_submenu_page('themes.php', 
        'Social Networks', 'Social Networks Configuration', 'manage_options', 
        'social-networks-config', 'social_settings'); 
}
add_action('admin_menu', 'setup_theme_admin_menus');

function social_settings(){
	<form method="POST" action="" class="form-horizontal">
		<div class="form-group">
		    <label for="face-url" class="col-sm-2 control-label">Facebook URL</label>
		    <div class="col-sm-10">
		      <input type="url" class="form-control" id="face-url" placeholder="Facebook URL">
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="twitter-url" class="col-sm-2 control-label">Twitter URL</label>
		    <div class="col-sm-10">
		      <input type="url" class="form-control" id="twitter-url" placeholder="Twitter URL">
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="gplus-url" class="col-sm-2 control-label">Google Plus URL</label>
		    <div class="col-sm-10">
		      <input type="url" class="form-control" id="gplus-url" placeholder="Google Plus URL">
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="linkedin-url" class="col-sm-2 control-label">Linkedin URL</label>
		    <div class="col-sm-10">
		      <input type="url" class="form-control" id="linkedin-url" placeholder="Linkedin URL">
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="github-url" class="col-sm-2 control-label">Github URL</label>
		    <div class="col-sm-10">
		      <input type="url" class="form-control" id="github-url" placeholder="Github URL">
		    </div>
		 </div>

	</form>
	
}

// Custom user fields
add_action( 'edit_user_profile', 'extra_profile_fields' );
function extra_profile_fields( $user ){
	$prefix = 'user_';
	$meta_boxes['user_edit'] = array(
		'id'         => 'user_edit',
		'title'      => 'About Me',
		'pages'      => array( 'user' ), 
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => 'Image',
				'id'   => $prefix . 'facebookurl',
				'description' => 'Upload an image or enter the URL',
				'type' => 'file',
    			'allow' => array( 'url', 'attachment' ) 
			),
			array(
				'name' => 'About me',
				'id'   => $prefix . 'description',
				'description' => 'Tell us about you',
				'type' => 'textarea',
			),
		)
	);
	return $meta_boxes;
}

add_action( 'edit_user_profile', 'social_profile_fields' );
function social_profile_fields( $user ){
	$prefix = 'user_';
	$meta_boxes[] = array(
		'id'         => 'user_edit',
		'title'      => 'Social Networks',
		'pages'      => array( 'user' ), 
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => 'Facebook URL',
				'id'   => $prefix . 'facebookurl',
				'type' => 'text_url',
			),
			array(
				'name' => 'Twitter URL',
				'id'   => $prefix . 'twitterurl',
				'type' => 'text_url',
			),
			array(
				'name' => 'Google+ URL',
				'id'   => $prefix . 'googleplusurl',
				'type' => 'text_url',
			),
			array(
				'name' => 'Linkedin URL',
				'id'   => $prefix . 'linkedinurl',
				'type' => 'text_url',
			),
		)
	);
	return $meta_boxes;
}

// Custom post types


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
    register_post_type('slider', $args);
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
add_filter( 'cmb_meta_boxes' , 'slider_create_metaboxes' );
function slider_create_metaboxes( $meta_boxes ) {
	$prefix = 'slider_';
	//PROMOTION SLIDER
	  $meta_boxes[] = array(
		'id' => 'slider_contents',
		'title' => 'Featured Slider',
		'pages' => array('slider'),//Add our post_type() we created earlier.
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


// Portfolio
function showcase_init() {
    $labels = array(
        'name' => _x('Showcases', 'post type general name'),
        'singular_name' => _x('Showcase', 'post type singular name'),
        'add_new' => _x('Add New', 'Showcase'), //This is our post_type, we'll display the metaboxes only on this post_type!
        'add_new_item' => __('Add New Showcase'),
        'edit_item' => __('Edit Showcase'),
        'new_item' => __('New Showcase'),
        'view_item' => __('View Showcase'),
        'search_items' => __('Search Showcases'),
        'not_found' => __('No Showcases found'),
        'not_found_in_trash' => __('No Showcases found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Showcases'
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
    register_post_type('showcase', $args);
}
add_action( 'init', 'showcase_init' );

// Texonomy to classify the project by features
function create_feature_taxonomies() {
	$labels = array(
		'name'              => _x( 'Features', 'taxonomy general name' ),
		'singular_name'     => _x( 'Feature', 'taxonomy singular name' ),
		'search_items'      => __('Search features' ),
		'all_items'         => __('All features' ),
		'parent_item'       => __('Parent feature' ),
		'parent_item_colon' => __('Parent feature:' ),
		'edit_item'         => __('Edit Feature' ),
		'update_item'       => __('Update feature' ),
		'add_new_item'      => __('Add New feature' ),
		'new_item_name'     => __('New feature Name' ),
		'menu_name'         => __('Features' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'feature' ),
	);
	register_taxonomy( 'features', 'showcase', $args );
}	

add_filter( 'cmb_meta_boxes' , 'showcase_create_metaboxes' );
function showcase_create_metaboxes( $meta_boxes ) {	
	$prefix = 'showcase_';
	//showcase
	  $meta_boxes[] = array(
		'id' => 'showcase_contents',
		'title' => 'Showcase',
		'pages' => array('showcase'),//Add our post_type() we created earlier.
		'context' => 'normal',
		'priority' => 'low',
		'show_names' => true,
		'fields' => array(
			array(
			'name' => 'Instructions',
			'desc' => "<ol><li>Enter your title above.</li><li>In the right column upload a featured image (Make sure this image is at least <b>400px,300px</b>).</li><li>Then if you'd like to add a few words about your feature do so below. (I would suggest no more than 100 words!).</li><li>Finaly position the body text; Then publish the slide.</li></ol>",
			'type' => 'title',
		  ),
		  array(
			    'name' => 'Company Name',
			    'id' => $prefix . 'company',
			    'type' => 'text'
			),
		  array(	//Add a text area
			'name' => 'Description',
			'desc' => 'Enter a few words about the proyect',
			'id' =>  $prefix . 'caption',
			'type' => 'textarea_small'
		  ),
		  array(	//Features
			'name' => 'Features',
			'desc' => 'Main features',
			'id' =>  $prefix . 'features',
			'taxonomy' => 'features', //Enter Taxonomy Slug
    		'type' => 'taxonomy_multicheck_inline',    
		  ),
		  array(	//Date
			'name' => 'Date',
			'desc' => 'Date of the project',
			'id' =>  $prefix . 'date',
			'type' => 'text_date'
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
			  'desc' => 'Link to the project',
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

