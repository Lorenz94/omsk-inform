<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
    $content_width = 1170;
}




function load_sctripts(){

    wp_enqueue_script('swiper-js', get_template_directory_uri().'/js/swiper.min.js');
    wp_enqueue_script('input-mask', get_template_directory_uri() . '/js/jquery.inputmask.js');

    //Дополнительный слайдер
    wp_enqueue_script('slick-js', get_template_directory_uri().'/js/slick.min.js');
    //Одинаковая высота у блоков
    //wp_enqueue_script('match-height', get_template_directory_uri() . '/js/jquery.matchHeight-min.js');

    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
}

add_action('wp_enqueue_scripts', 'load_sctripts');


if (!function_exists('bootstrapBasicSetup')) {
    /**
     * Setup theme and register support wp features.
     */
    function bootstrapBasicSetup() 
    {
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * 
         * copy from underscores theme
         */
        load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');

        // add theme support title-tag
        add_theme_support('title-tag');

        // add theme support post and comment automatic feed links
        add_theme_support('automatic-feed-links');

        // enable support for post thumbnail or feature image on posts and pages
        add_theme_support('post-thumbnails');

        // allow the use of html5 markup
        // @link https://codex.wordpress.org/Theme_Markup
        add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

        // add support menu
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'bootstrap-basic'),
        ));

        // add post formats support
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        // add support custom background
        add_theme_support(
            'custom-background', 
            apply_filters(
                'bootstrap_basic_custom_background_args', 
                array(
                    'default-color' => 'ffffff', 
                    'default-image' => ''
                )
            )
        );
    }// bootstrapBasicSetup
}
add_action('after_setup_theme', 'bootstrapBasicSetup');


if (!function_exists('bootstrapBasicWidgetsInit')) {
    /**
     * Register widget areas
     */
    function bootstrapBasicWidgetsInit() 
    {
        register_sidebar(array(
            'name' => __('Sidebar right', 'bootstrap-basic'),
            'id' => 'sidebar-right',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ));

        register_sidebar(array(
            'name' => __('Sidebar left', 'bootstrap-basic'),
            'id' => 'sidebar-left',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ));

        register_sidebar(array(
            'name' => __('Header right', 'bootstrap-basic'),
            'id' => 'header-right',
            'description' => __('Header widget area on the right side next to site title.', 'bootstrap-basic'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ));

        register_sidebar(array(
            'name' => __('Navigation bar right', 'bootstrap-basic'),
            'id' => 'navbar-right',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ));

        register_sidebar(array(
            'name' => __('Footer left', 'bootstrap-basic'),
            'id' => 'footer-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ));

        register_sidebar(array(
            'name' => __('Footer right', 'bootstrap-basic'),
            'id' => 'footer-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ));
    }// bootstrapBasicWidgetsInit
}
add_action('widgets_init', 'bootstrapBasicWidgetsInit');


if (!function_exists('bootstrapBasicEnqueueScripts')) {
    /**
     * Enqueue scripts & styles
     */
    function bootstrapBasicEnqueueScripts() 
    {
        global $wp_scripts;

        wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.7');
        wp_enqueue_style('bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.css', array(), '3.3.7');

        wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js', array(), '3.3.1');
        wp_register_script('respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js', array(), '1.4.2');
        $wp_scripts->add_data('respond-script', 'conditional', 'lt IE 9');
        wp_enqueue_script('respond-script');
        wp_register_script('html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.min.js', array(), '3.7.3');
        $wp_scripts->add_data('html5-shiv-script', 'conditional', 'lte IE 9');
        wp_enqueue_script('html5-shiv-script');
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), '3.3.7', true);
        wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array(), false, true);
        wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());
    }// bootstrapBasicEnqueueScripts
}
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');



function load_style(){

    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/css/swiper.min.css');
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/fontawesome.min.css');
    wp_enqueue_style('brands-css', get_template_directory_uri() . '/css/brands.min.css');
    wp_enqueue_style('solid-css', get_template_directory_uri() . '/css/solid.min.css');
    wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/css/slick-theme.css');
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('preloader-css', get_template_directory_uri() . '/css/preloader.css');
    wp_enqueue_style('style-css', get_template_directory_uri().'/css/style.css');

}
add_action('wp_enqueue_scripts', 'load_style');

/**
 * admin page displaying help.
 */
if (is_admin()) {
    require get_template_directory() . '/inc/BootstrapBasicAdminHelp.php';
    $bbsc_adminhelp = new BootstrapBasicAdminHelp();
    add_action('admin_menu', array($bbsc_adminhelp, 'themeHelpMenu'));
    unset($bbsc_adminhelp);
}



add_action('after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu()
{
    register_nav_menu('main-menu', 'Главное меню');
}

// IMG SIZE
if (function_exists('add_image_size')) {
    add_image_size('full_hd', 1920, auto);
}


if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Общие настройки',
        'menu_title' => 'Общие натройки',
        'menu_slug' => 'general_fields',
        'capability' => 'edit_posts'
    ));
}


########################### ДОБАВЛЕНИЕ POST_TYPE ###########

function post_type_news()
{
    $labels = array(
        'name' => 'Новости',
        'singular_name' => 'Новости',
        'all_items' => 'Новости',
        'menu_name' => 'Новости' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "news",
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('news', $args);
}
add_action('init', 'post_type_news');


function post_type_direction()
{
    $labels = array(
        'name' => 'Направления',
        'singular_name' => 'Направления',
        'all_items' => 'Направления',
        'menu_name' => 'Направления' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "direction",
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('direction', $args);
}
add_action('init', 'post_type_direction');


function post_type_product_slider()
{
    $labels = array(
        'name' => 'Слайдер продукции',
        'singular_name' => 'Слайдер продукции',
        'all_items' => 'Слайдер продукции',
        'menu_name' => 'Слайдер продукции' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "product_slider",
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('product_slider', $args);
}
add_action('init', 'post_type_product_slider');


function post_type_service()
{
    $labels = array(
        'name' => 'Услуги',
        'singular_name' => 'Услуги',
        'all_items' => 'Услуги',
        'menu_name' => 'Услуги' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "service",
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('service', $args);
}
add_action('init', 'post_type_service');



function post_type_product()
{
    $labels = array(
        'name' => 'Товар',
        'singular_name' => 'Товар',
        'all_items' => 'Товар',
        'menu_name' => 'Товар' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "product",
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('product', $args);
}
add_action('init', 'post_type_product');



add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_topics_hierarchical_taxonomy() {



    $labels = array(
        'name' => __('Категории товара', 'theme' ),
    'singular_name' => __('Topic', 'theme' ),
    'search_items' =>  __( 'Search Topics' , 'theme'),
    'all_items' => __( 'All Topics' , 'theme'),
    'parent_item' => __( 'Принадлежит категории', 'theme' ),
    'parent_item_colon' => __( 'Parent Topic:' , 'theme'),
    'edit_item' => __( 'Edit Topic' , 'theme'),
    'update_item' => __( 'Обновить категорию' , 'theme'),
    'add_new_item' => __( 'Добавить новую категорию', 'theme' ),
    'new_item_name' => __( 'New Topic Name', 'theme'),
    'menu_name' => __( 'Категории товара', 'theme' ),
  );

// Now register the taxonomy

  register_taxonomy('cat_products',array('product'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'cat_product' ),
  ));

}






/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';



/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';


/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';

