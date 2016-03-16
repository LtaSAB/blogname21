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
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-alternative', 'blogname21' ),
		'id'            => 'sidebar-contact',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s widget-alternative">',
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
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );

	wp_enqueue_script( 'jquery-1.12.0.min', get_template_directory_uri() . '/js/jquery-1.12.0.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'flex-script', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'theme_classic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'theme_classic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'theme_classic_scripts' );

//Font awesome

function font_awesome() {
	if ( ! is_admin() ) {
		wp_register_style( 'font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css' );
		wp_enqueue_style( 'font-awesome' );
	}
}

add_action( 'wp_enqueue_scripts', 'font_awesome' );

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
			'title'       => 'Социальные сети',
			'description' => 'Это секция настроек.',
			'priority'    => 35,
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
			'label'   => 'Ссылка на facebook',
			'section' => 'social_icon_section',
			'type'    => 'url',
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
			'label'   => 'Ссылка на твиттер',
			'section' => 'social_icon_section',
			'type'    => 'url',
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
			'label'   => 'Ссылка на pinterest',
			'section' => 'social_icon_section',
			'type'    => 'url',
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
			'label'   => 'Ссылка на linkedin',
			'section' => 'social_icon_section',
			'type'    => 'url',
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
			'label'   => 'Ссылка на google+',
			'section' => 'social_icon_section',
			'type'    => 'url',
		)
	);

	//contact info

	$wp_customize->add_section(
		'contact_section',
		array(
			'title'       => 'Контактные данные',
			'description' => 'Это секция настроек.',
			'priority'    => 50,
		)
	);
	$wp_customize->add_setting(
		'phone_number',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'phone_number',
		array(
			'label'   => 'Номер телефона',
			'section' => 'contact_section',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'e-mail',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'e-mail',
		array(
			'label'   => 'E-mail',
			'section' => 'contact_section',
			'type'    => 'text',
		)
	);
	//color scheme
	$wp_customize->add_section(
		'color_scheme',
		array(
			'title'       => 'Цвет темы',
			'description' => 'Это секция настроек.',
			'priority'    => 50,
		)
	);
	$wp_customize->add_setting(
		'color-setting',
		array(
			'default'           => '#ffd500',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color',
			array(
				'label'    => 'Ancent of theme',
				'section'  => 'color_scheme',
				'settings' => 'color-setting',
			)
		)
	);
	//changing banner
	$wp_customize->add_section(
		'banner',
		array(
			'title'       => 'Баннер',
			'description' => 'Это секция настроек.',
			'priority'    => 50,
		)
	);
	$wp_customize->add_setting( 'img-upload' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'img-upload',
			array(
				'label' => 'Выберите картинку баннера',
				'section' => 'banner',
				'settings' => 'img-upload'
			)
		)
	);

	//changing logo
	$wp_customize->add_section(
		'site-logo',
		array(
			'title'       => 'Логотип',
			'description' => 'Это секция настроек.',
			'priority'    => 50,
		)
	);
	$wp_customize->add_setting( 'logo-upload' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo-upload',
			array(
				'label' => 'Выберите картинку логотипа сайта',
				'section' => 'site-logo',
				'settings' => 'logo-upload'
			)
		)
	);
	//position of sidebar
	$wp_customize->add_section(
		'sidebar-position',
		array(
			'title'       => 'Позиция сайдбара',
			'description' => 'Это секция настроек.',
			'priority'    => 50,
		)
	);
	$wp_customize->add_setting(
		'sidebar_placement',
		array(
			'default' => 'right',
		)
	);

	$wp_customize->add_control(
		'sidebar_placement',
		array(
			'type' => 'radio',
			'label' => 'Позиция сайдбара',
			'section' => 'sidebar-position',
			'choices' => array(
				'left' => 'Left',
				'right' => 'Right',
			),
		)
	);
}

add_action( 'customize_register', 'example_customizer' );
//смена цвета акцента
function theme_customize_css() {
	?>
<style type="text/css">
	.site-header .main-navigation .menu-main-container ul.menu,
	 .read-more, .subscribe,
	.wpcf7 .subscribe,
	.gallery-posts article .preview-wrapper .entry-title,
	.widget-area .widget ul li:hover,
	.widget-area .widget-alternative .phone-number,
	.widget-area .widget-alternative .our-email{
		background-color: <?php echo get_theme_mod('color-setting')?> ;
	}
	.site-header .main-navigation .menu-main-container .nav-menu li a:before {
		border-left: 12px solid <?php echo get_theme_mod('color-setting')?> !important;
	}
	.flexslider .slides .slider-description {
		border-top: 5px solid <?php echo get_theme_mod('color-setting')?>;
	}
	.flexslider .slides .slider-description:before {
		border-bottom: 60px solid <?php echo get_theme_mod('color-setting')?>;
	}
</style>

	<?php
}

add_action( 'wp_head', 'theme_customize_css' );

//смена позиции сайдбара
function sidebar_position_css() {
	$example_position = get_theme_mod( 'sidebar_placement' );
	if ( $example_position != '' ) {
		switch ( $example_position ) {
			case 'right':
				// Do nothing. The theme already aligns the logo to the left
				break;
			case 'left':
				echo '<style type="text/css">';
				echo 'body .content-area { float: right !important;  }';
				echo ' body .widget-area {float: left !important;  }';
				echo '</style>';
				break;
		}
	}
}
add_action('wp_head','sidebar_position_css');
//Navigation
the_posts_pagination( $args = array(
	'show_all'           => false,
	'prev_next'          => false,
	'end_size'           => 4,
	'mid_size'           => 0,
	'before_page_number' => '',
	'after_page_number'  => '',
	'prev_text'          => __( ' ' ),
	'next_text'          => __( ' ' ),
	'screen_reader_text' => __( ' ' ),
) );

//php in widget
function mayak_widget_php( $widget_content ) {
	if ( strpos( $widget_content, '<' . '?' ) !== false ) {
		ob_start();
		eval( '?' . '>' . $widget_content );
		$widget_content = ob_get_contents();
		ob_end_clean();
	}

	return $widget_content;
}

add_filter( 'widget_text', 'mayak_widget_php', 99 );

//register slider
add_action( 'init', 'register_slider' );
function register_slider() {
	$labels = array(
		'name'               => __( 'Slider' ),
		'singular_name'      => __( 'Слайд' ),
		'add_new'            => __( 'Добавить слайд' ),
		'add_new_item'       => __( 'Добавить новый слайд' ),
		'edit_item'          => __( 'Редактировать слайд ' ),
		'new_item'           => __( 'Новый слайд' ),
		'all_items'          => __( 'Все слайды' ),
		'view_item'          => __( 'Просмотр слайдов' ),
		'search_items'       => __( 'Искать слайды' ),
		'not_found'          => __( 'Слайдов не найдено.' ),
		'not_found_in_trash' => __( 'В корзине нет слайдов.' ),
		'menu_name'          => __( 'Слайдер' )
	);
	$args   = array(
		'labels'        => $labels,
		'public'        => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon'     => 'dashicons-images-alt',
		'menu_position' => 5,
		'has_archive'   => true,
		'supports'      => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'comments',
			'categories',
			'custom-fields'
		),
		'taxonomies'    => array( 'post_tag', 'category' ),

	);
	register_post_type( 'slider', $args );
}