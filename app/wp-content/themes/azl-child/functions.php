<?php
// Child theme translation
add_action( 'after_setup_theme', 'azl_child_theme_setup' );
function azl_child_theme_setup() {
    load_child_theme_textdomain( 'twentytwelve', get_stylesheet_directory() . '/languages' );
}

// Parent stylesheet
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Font Awesome
function custom_scripts_styles() {
	wp_register_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'fontawesome');
}
add_action( 'wp_enqueue_scripts', 'custom_scripts_styles' );


function enqueueChildScripts()
{
    wp_enqueue_script(
        'jquery',
        get_stylesheet_directory_uri() . '/js/app.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'enqueueChildScripts' );

// Customizer Upload Logo Section
function site_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'site_logo_section' , array(
	    'title'       => __( 'Site Logo', 'twentytwelve' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name and description in the header',
	) );

    $wp_customize->add_setting( 'site_logo' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo', array(
	    'label'    => __( 'Site Logo', 'twentytwelve' ),
	    'section'  => 'site_logo_section',
	    'settings' => 'site_logo',
	) ) );

	$wp_customize->add_section( 'mobile_logo_section' , array(
	    'title'       => __( 'Mobile Logo', 'twentytwelve' ),
	    'priority'    => 30,
	    'description' => 'Upload a mobile logo to replace the default site name and description in the header',
	) );

    $wp_customize->add_setting( 'mobile_logo' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mobile_logo', array(
	    'label'    => __( 'Mobile Logo', 'twentytwelve' ),
	    'section'  => 'mobile_logo_section',
	    'settings' => 'mobile_logo',
	) ) );
}
add_action( 'customize_register', 'site_theme_customizer' );


// Custom post thumb size
function azl_custom_settings() {
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_image_size( 'custom-post-thumbnails', 670, 9999 ); // Unlimited height, soft crop
	add_image_size( 'custom-post-thumbnails-two', 170, 270, array( 'center', 'top' ) ); // Width: 170px, Height: 270px
	add_image_size( 'custom-post-thumbnails-three', 270, 428, array( 'center', 'top' ) ); // Width: 270px, Height: 428px

}
add_action( 'after_setup_theme', 'azl_custom_settings' );


// Custom Menus
if ( ! function_exists( 'custom_navigation_menus' ) ) {
	// Register Navigation Menus
	function custom_navigation_menus() {
		$locations = array(
			'side_secondary_menu' => __( 'Side Secondary Menu', 'twentytwelve' ),
			'side_sub_menu' => __( 'Side Sub menu', 'twentytwelve' ),
			'side_sub_menu_1' => __( 'Side Sub menu 1', 'twentytwelve' ),
			'side_sub_menu_2' => __( 'Side Sub menu 2', 'twentytwelve' ),
		);
		register_nav_menus( $locations );
	}
	add_action( 'init', 'custom_navigation_menus' );
}


// Pagination with Custom Query
function custom_pagination($numpages = '', $pagerange = '', $paged='') {
	if (empty($pagerange)) {
		$pagerange = 2;
	}
	global $paged;
	if (empty($paged)) {
		$paged = 1;
	}
	global $wp_query;
	if ($numpages == '') {
		$numpages = $wp_query->max_num_pages;
		if(!$numpages) {
			$numpages = 5;
		}
	}

	$pagination_args = array(
	'base'            => get_pagenum_link(1) . '%_%',
	'format'          => 'page/%#%',
	'total'           => $numpages,
	'current'         => $paged,
	'show_all'        => False,
	'end_size'        => 1,
	'mid_size'        => $pagerange,
	'prev_next'       => True,
	'prev_text'       => __('&#xf104;', 'twentytwelve'),
	'next_text'       => __('&#xf105;', 'twentytwelve'),
	'type'            => 'plain',
	'add_args'        => false,
	'add_fragment'    => ''
	);

	$paginate_links = paginate_links($pagination_args);
	if ($paginate_links) {
		echo "<nav class='custom-pagination'>";
		echo $paginate_links;
		echo "</nav>";
	}
}

// Pagination with Default Query
function custom_query_pagination() {
	global $wp_query;

	$query_pagination_args = ( array(
		'base' 			=> '%_%',
		'format' 		=> '?paged=%#%',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_next'     => True,
		'prev_text'     => __('&#xf104;', 'twentytwelve'),
		'next_text'     => __('&#xf105;', 'twentytwelve'),
		'type'          => 'plain',
		'add_args'      => false,
		'add_fragment'  => ''
	) );

	$query_paginate_links = paginate_links($query_pagination_args);

	if ($query_paginate_links) {
		echo "<nav class='custom-pagination'>";
		echo $query_paginate_links;
		echo "</nav>";

	}
}

// As of 3.1.10, Customizr doesn't output an html5 form.
add_theme_support( 'html5', array( 'search-form' ) );


// Custom widget areas
function custom_widgets_init() {
	register_sidebar( array(
		'name'          =>  __( 'Top Widget Area', 'twentytwelve'),
		'id'            => 'top_widget_area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title'  => '<h2 class="top-widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Custom Footer Widget One', 'twentytwelve' ),
		'id' => 'custom_footer_widget_one',
		'description' => __( 'Theme custom footer widget', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Custom Footer Widget Two', 'twentytwelve' ),
		'id' => 'custom_footer_widget_two',
		'description' => __( 'Theme custom footer widget', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Copyright Text Widget', 'twentytwelve' ),
		'id' => 'copyright_widget',
		'description' => __( 'Footer Copyright Text Widget', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Petition Widget Area', 'twentytwelve' ),
		'id' => 'petition_widget',
		'description' => __( 'Custom petition widget', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Alumni Widget Area', 'twentytwelve' ),
		'id' => 'alumni_widget',
		'description' => __( 'Alumni widget area', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'custom_widgets_init' );


function revconcept_get_images($post_id) {
	global $post;
	$thumbnail_ID = get_post_thumbnail_id();
	$images = get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	if ($images) :
		foreach ($images as $attachment_id => $image) :
			$img_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true); //alt
			if ($img_alt == '') :
				$img_alt = $image->post_title;
			endif;

			$big_array = image_downsize( $image->ID, 'large' );
			$img_url = $big_array[0];
			echo '<li>';
			echo '<img src="';
			echo $img_url;
			echo '" alt="';
			echo $img_alt;
			echo '" />';
			echo '</li><!--end slide-->';
		endforeach;
	endif;
}

// Excerpt length
function custom_excerpt_length( $length ) {
	if ( is_page_template('page-templates/publication-page.php') ) {
		return 70;
	} else {
		return 40;
	}
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Custom field excerpt length
function custom_field_excerpt() {
	global $post;
	$text = get_field('introduction');
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 40;
		$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

// Custom post type for publications
function publication_post_type_init() {

	$labels = array(
		'name' 					=> _x('Publications', 'post type general name', 'twentytwelve'),
		'singular_name' 		=> _x('Publication', 'post type singular name', 'twentytwelve'),
		'add_new' 				=> __('Add New', 'publication item', 'twentytwelve'),
		'add_new_item'			=> __('Add New Publication', 'twentytwelve'),
		'all_items' 			=> __('All Publications', 'twentytwelve'),
		'edit_item' 			=> __('Edit Publication', 'twentytwelve'),
		'new_item' 				=> __('New Publication', 'twentytwelve'),
		'view_item' 			=> __('View Publication', 'twentytwelve'),
		'search_items' 			=> __('Search Publications', 'twentytwelve'),
		'not_found' 			=> __('Nothing found', 'twentytwelve'),
		'not_found_in_trash' 	=> __('Nothing found in Trash', 'twentytwelve'),
		'parent_item_colon'	 	=> '',
	    'menu_name' => 'Publications'
	);

	$args = array(
		'labels' 				=> $labels,
		'public' 				=> false,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'menu_icon' 			=> 'dashicons-clipboard',
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_position' 		=> null,
		'supports' 				=> array('title','editor','thumbnail'),
		'taxonomies'			=> array('post_tag')
	  );

	register_post_type( 'publications' , $args );
}
add_action('init', 'publication_post_type_init');

// Custom taxonomies
add_action( 'init', 'create_category_taxonomies', 0 );

function create_category_taxonomies() {
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'twentytwelve' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'twentytwelve' ),
		'search_items'      => __( 'Search Categories', 'twentytwelve' ),
		'all_items'         => __( 'All Categories', 'twentytwelve' ),
		'parent_item'       => __( 'Parent Category', 'twentytwelve' ),
		'parent_item_colon' => __( 'Parent Category:', 'twentytwelve' ),
		'edit_item'         => __( 'Edit Category', 'twentytwelve' ),
		'update_item'       => __( 'Update Category', 'twentytwelve' ),
		'add_new_item'      => __( 'Add New Category', 'twentytwelve' ),
		'new_item_name'     => __( 'New Category Name', 'twentytwelve' ),
		'menu_name'         => __( 'Publication Categories', 'twentytwelve' )
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true
	);

	register_taxonomy( 'publication_category', 'publications', $args );
}

/**
 * Just a humble box that appears in top right corner.
 */
function devModePixel() {
    echo '<div id="devModePixel" style="position:fixed;top:0;left:0;z-index:999999999;background:red;">IN_DEV</div>';
}
if (defined('DEV_ENVIRONMENT') && DEV_ENVIRONMENT === true) {
    add_action('wp_footer', 'devModePixel');
    add_action('admin_footer', 'devModePixel');
}

/**
 * @param $phpmailer
 */
function mailtrap($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '4d21a3a0333360';
    $phpmailer->Password = '387d0a6349f85c';
}
if (defined('DEV_ENVIRONMENT') && DEV_ENVIRONMENT === true) {
    add_action('phpmailer_init', 'mailtrap');
}
