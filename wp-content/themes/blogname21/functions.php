<?php
/**
 * blogname21 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blogname21
 */

if ( ! function_exists( 'blogname21_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blogname21_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on blogname21, use a find and replace
	 * to change 'blogname21' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blogname21', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'blogname21' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blogname21_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'blogname21_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blogname21_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blogname21_content_width', 640 );
}
add_action( 'after_setup_theme', 'blogname21_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogname21_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blogname21' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'blogname21_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_classic_scripts() {
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'jquery-1.12.0.min', '/js/jquery-1.12.0.min.js', array( 'jquery' ), 1.1, true );

	wp_enqueue_script( 'theme_classic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'theme_classic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_classic_scripts' );

//Font awesome

function font_awesome() {
	if (!is_admin()) {
		wp_register_style('font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css');
		wp_enqueue_style('font-awesome');
	}
}
add_action('wp_enqueue_scripts', 'font_awesome');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function example_customizer( $wp_customize ) {
	/*Социальные сети*/
	$wp_customize->add_section(
		'social_icon_section',
		array(
			'title' => 'Социальные сети',
			'description' => 'Это секция настроек.',
			'priority' => 35,
		)
	);
	$wp_customize->add_setting(
		'social_icon_facebook',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_facebook',
		array(
			'label' => 'Ссылка на facebook',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_twitter',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_twitter',
		array(
			'label' => 'Ссылка на твиттер',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_pinterest',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_pinterest',
		array(
			'label' => 'Ссылка на pinterest',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_linkedin',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_linkedin',
		array(
			'label' => 'Ссылка на linkedin',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_google',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_google',
		array(
			'label' => 'Ссылка на google+',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
}
add_action( 'customize_register', 'example_customizer' );

//Navigation
the_posts_pagination( $args = array(
	'show_all' => false,
	'prev_next' => false,
	'end_size' => 4,
	'mid_size' => 0,
	'before_page_number' => '',
	'after_page_number' => '',
	'prev_text' => __(' '),
	'next_text' => __( ' ' ),
	'screen_reader_text' => __( ' ' ),
));