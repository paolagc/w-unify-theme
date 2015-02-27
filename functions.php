<?php
/**
 * @package WordPress
 * @subpackage Unify Base Theme
*/

function theme_name_scripts() {
	wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css' );
	wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css' );
	wp_enqueue_style( 'images', get_template_directory_uri() . '/css/images.css' );
	wp_enqueue_style( 'posts', get_template_directory_uri() . '/css/posts.css' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );

	//page templates
	wp_enqueue_style( 'timeline', get_template_directory_uri() . '/css/timeline.css' );
	

	//masonry
	 wp_enqueue_script('masonry');
    wp_enqueue_style('masonry', get_template_directory_uri().'/css/');

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/apps.js');
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js');
	wp_enqueue_script( 'back-to-top', get_template_directory_uri() . '/js/back-to-top.js');

	//plugins
	wp_enqueue_script('jquery.fancybox.js', get_template_directory_uri() . '/js/jquery.fancybox.js', array( 'jquery' ), false, true);

	wp_enqueue_style( 'styles.css', get_stylesheet_uri() );
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

	    add_image_size( 'full-size', 9999, 999, false ); // Full size screen
	    add_image_size( 'slider-size', 1999, 300, false ); // Full size screen
	    add_image_size( 'full-blog', 850, 200, false ); // Full size screen
	}
}
add_action( 'init', 'theme_base_setup' );


//build taxonomy term list
function theme_base_term_list_isotope($cat){
	$args = array(
	'orderby' => 'count',
	'order' => 'DESC' ,
    'hide_empty' => true
    );

	$terms = get_terms('category', $args);
	$list = '';

	if(count($terms)>0){
		$list .= '<ul class="text-center list-inline list-unstyled" id="filters" data-option-key="filter">';
		$list .= '<li class="filter active">All</li>';
		foreach ( $terms as $term ) {
		    // We successfully got a link. Print it out.
		    $list .= '<li data-filter="'.$term->slug.'" class="filter">' . $term->name . '</li>';
		}
		$list .= '</ul>';
	}
	return $list;
}

function theme_base_masonry_init() {
}
//add to wp_footer
add_action( 'wp_footer', 'theme_base_masonry_init' );

//bootstrap walker

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children )
				$class_names .= ' dropdown';
			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
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
		'before_title'  => '<div class="headline headline-md"><h2>',
		'after_title'   => '</h2></div>'
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
			'before_title'  => '<h5>',
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
			'before_title'  => '<h5>',
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
			'before_title'  => '<h5>',
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

