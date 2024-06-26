<?php
/**
 * Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Portfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function portfolio_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Portfolio, use a find and replace
		* to change 'portfolio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'portfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'portfolio'),
		'footer' => __('Footer Menu', 'portfolio'),
  ));

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'portfolio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support('custom_logo');

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'portfolio_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portfolio_widgets_init() {
	register_sidebar(array(
		 'name'          => __('Footer Menu', 'portfolio'),
		 'id'            => 'footer-1',
		 'description'   => __('Add widgets here to appear in your footer.', 'portfolio'),
		 'before_widget' => '<div class="footer-widget">',
		 'after_widget'  => '</div>',
		 'before_title'  => '<h2 class="widget-title">',
		 'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => __( 'Contact Section', 'portfolio' ),
		'id'            => 'contact-section',
		'description'   => __( 'Widgets in this area will be shown in the contact section.', 'portfolio' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
  ) );

}
add_action('widgets_init', 'portfolio_widgets_init');


/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts() {
	// Enqueue custom fonts
	wp_enqueue_style('portfolio-custom-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), _S_VERSION, 'all');

	// Enqueue normalize
	wp_enqueue_style( 'realestate-normalize', get_template_directory_uri(). '/assets/css/normalize.min.css',  array(), _S_VERSION, 'all' );

	// Enqueue main stylesheet
	wp_enqueue_style( 'portfolio-style', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION, 'all');

	// Enqueue scripts
	wp_enqueue_script( 'jquery', get_template_directory_uri(). '/assets/js/jquery-3.7.1.min.js',  array(), '1.0.0', true  );
	wp_enqueue_script( 'portfolio-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'form-validation', get_template_directory_uri() . '/assets/js/form-validation.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'portfolio-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'portfolio-navigation', 'form-validation'), _S_VERSION, true );

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );

/**
 * New post type.
 */
 function create_testimonial_cpt() {
	$labels = array(
		 'name' => _x('Testimonials', 'Post Type General Name', 'textdomain'),
		 'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'textdomain'),
		 'menu_name' => __('Testimonials', 'textdomain'),
		 'all_items' => __('All Testimonials', 'textdomain'),
		 'add_new_item' => __('Add New Testimonial', 'textdomain'),
		 'add_new' => __('Add New', 'textdomain'),
		 'edit_item' => __('Edit Testimonial', 'textdomain'),
		 'update_item' => __('Update Testimonial', 'textdomain'),
		 'view_item' => __('View Testimonial', 'textdomain'),
		 'view_items' => __('View Testimonials', 'textdomain'),
		 'search_items' => __('Search Testimonial', 'textdomain'),
	);

	$args = array(
		 'label' => __('Testimonial', 'textdomain'),
		 'description' => __('Testimonials from clients', 'textdomain'),
		 'labels' => $labels,
		 'public'      => true,
		 'show_in_menu' => true,
		 'has_archive' => true,
		 'can_export' => true,
		 'menu_icon' => 'dashicons-format-status',
		 'supports'    => array('title', 'editor', 'thumbnail', 'custom-fields'),
		 'rewrite'     => array('slug' => 'testimonials'),
	);

	register_post_type('testimonial', $args);
}
add_action('init', 'create_testimonial_cpt', 0);


function custom_widgets_init() {
	require get_template_directory() . '/widgets/get-in-touch-widget.php';
	register_widget( 'Portfolio_Get_In_Touch');

}
add_action( 'widgets_init', 'custom_widgets_init', 20 );

/**
 * Filters the list of attachment image attributes.
 * 
 * */
Function custom_get_attachment_image_attributes( $attr, $attachment, $size ) {
	if ( is_admin() ) {
		return $attr;
	}

	// Skip custom logos
	if ( isset( $attr['class'] ) && false !== strpos( $attr['class'], 'custom-logo' ) ) {
		return $attr;
	}

	$width  = false;
	$height = false;

	if ( is_array( $size ) ) {
		$width  = (int) $size[0];
		$height = (int) $size[1];
	} elseif ( $attachment && is_object( $attachment ) && $attachment->ID ) {
		$meta = wp_get_attachment_metadata( $attachment->ID );
		if ( isset( $meta['width'] ) && isset( $meta['height'] ) ) {
			$width  = (int) $meta['width'];
			$height = (int) $meta['height'];
		}
	}

	// Add more custom attributes
	$attr['loading'] = 'lazy'; // Add lazy loading attribute for performance

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'custom_get_attachment_image_attributes', 10, 3 );


/**
 * Forminator the Custom Validation text form.
 */
add_filter('forminator_custom_form_submit_errors', 'custom_forminator_validate_text_field', 10, 3);

function custom_forminator_validate_text_field($submit_errors, $form_id, $field_data_array) {
	$target_form_id = 9;

	if ($form_id == $target_form_id) {
		 foreach ($field_data_array as $field) {
			  if ($field['name'] == 'text-1') {
					$value = trim($field['value']);
					if (!preg_match('/^[^\d]+$/', $value)) {
						$submit_errors[][$field['name']] = 'Please enter a valid name without numbers.';
					}
			  }
	}
 }
	return $submit_errors;
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

function portfolio_customize_register( $wp_customize ) {
	// Add Custom Logo Setting
	$wp_customize->add_setting('custom_logo', array(
		 'default' => '',
		 'sanitize_callback' => 'absint', // Ensures only integers are accepted
	));

	// Add Custom Logo Control
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'custom_logo', array(
		 'label' => __('Custom Logo', 'portfolio'),
		 'section' => 'title_tagline',
		 'settings' => 'custom_logo',
		 'flex_width' => true, 
		 'flex_height' => true, 
		 'width' => 180, // Default width
		 'height' => 40, // Default height
	)));
}
add_action('customize_register', 'portfolio_customize_register');



