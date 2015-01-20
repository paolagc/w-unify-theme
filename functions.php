<?php
/**
 * @package WordPress
 * @subpackage Unify Base Theme
*/

/*
* Navigation Menus
*/
register_nav_menus(
	array(
	'main'=>__('Main Menu'),
	'bottom'=>__('Footer Menu'),
	)
);

/*
* Sidebar widgets
*/

register_sidebar(array(
		'name' => 'Primary Sidebar',
		'id'   => 'primary-sidebar',
		'description'   => 'These are widgets for primary sidebar.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
));	

/*
* User profile widgets
*/
if ( function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'User Profile Column 1',
		'id' => 'user-1',
		'description' => 'Widgets in this area will be shown in the user profile column 1.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
));
if ( function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'User Profile Column 2',
		'id' => 'user-2',
		'description' => 'Widgets in this area will be shown in the user profile column 3.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
))
if ( function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'User Profile Column 3',
		'id' => 'user-3',
		'description' => 'Widgets in this area will be shown in the user profile column 3.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
))

/*
* Footer widgets
*/
if ( function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'Footer Column 1',
		'id' => 'footer-1',
		'description' => 'Widgets in this area will be shown in the footer column 1.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
));
if ( function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'Footer Column 2',
		'id' => 'footer-2',
		'description' => 'Widgets in this area will be shown in the footer column 2.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
));
if ( function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'Footer Column 3',
		'id' => 'footer-3',
		'description' => 'Widgets in this area will be shown in the footer column 3.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
));
if ( function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'Footer Column 4',
		'id' => 'footer-4',
		'description' => 'Widgets in this area will be shown in the footer column 4',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
));

/*
* Coypright widgets
*/
if ( function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'Copyright Column 1',
		'id' => 'copyright-1',
		'description' => 'Widgets in this area will be shown in the copyright column 1.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
));
if ( function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'Copyright Column 2',
		'id' => 'footer-4',
		'description' => 'Widgets in this area will be shown in the copyright column 2',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widgetheading">',
		'after_title'   => '</h5>'
));

// Custom post types

// slider
function post_slide() {
  $labels = array(
    'name'               => _x( 'Slides', 'post type general name' ),
    'singular_name'      => _x( 'Slide', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'slide' ),
    'add_new_item'       => __( 'Add New Slide' ),
    'edit_item'          => __( 'Edit Slide' ),
    'new_item'           => __( 'New Slide' ),
    'all_items'          => __( 'All Slides' ),
    'view_item'          => __( 'View Slide' ),
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Slideshow to share higlighted information',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail','custom-fields'),
    'has_archive'   => false,
  );
  register_post_type( 'slide', $args ); 
}
add_action( 'init', 'post_slide' );

// showcase
function post_showcase() {
  $labels = array(
    'name'               => _x( 'Showcases', 'post type general name' ),
    'singular_name'      => _x( 'showcase', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'showcase' ),
    'add_new_item'       => __( 'Add New showcase' ),
    'edit_item'          => __( 'Edit showcase' ),
    'new_item'           => __( 'New showcase' ),
    'all_items'          => __( 'All showcases' ),
    'view_item'          => __( 'View showcase' ),
    'search_items'       => __( 'Search Showcases' ),
    'not_found'          => __( 'No showcases found' ),
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'showcaseshow to share higlighted information',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail','custom-fields'),
    'has_archive'   => false,
  );
  register_post_type( 'showcase', $args ); 
}
add_action( 'init', 'post_showcase' );