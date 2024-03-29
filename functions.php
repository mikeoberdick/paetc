
<?php

// *** Theme Setup *** \\

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

// Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// Shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');


// *** Theme Styles *** \\

function d4tw_enqueue_styles () {
    wp_enqueue_style( 'Google Fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300i,400,500,600, 600i,700&display=swap' );
    wp_enqueue_style( 'Slick CSS', 'https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css' );
    };
add_action('wp_enqueue_scripts', 'd4tw_enqueue_styles');


// *** Theme Scripts *** \\

function d4tw_enqueue_scripts () {
   wp_enqueue_script( 'D4TW Theme JS', get_stylesheet_directory_uri() . '/js/d4tw.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'Slick JS', 'https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js', array('jquery'), '1.0.0', true );
    }
add_action( 'wp_enqueue_scripts', 'd4tw_enqueue_scripts' );


// *** Advanced Custom Fields *** \\

//Add the ACF options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(
        array(
		'page_title' 	=> 'Company Profile',
		'menu_title'	=> 'Company Profile',
		'menu_slug' 	=> 'company-profile'
	));
    acf_add_options_page(array(
        'page_title'    => 'Testimonials',
        'menu_title'    => 'Testimonials',
        'menu_slug'     => 'testimonials',
    ));
    
}

// Register Theme Sidebars
function d4tw_sidebars() {
    $args = array(
        'id'            => 'blog_post_sidebar',
        'class'         => 'blog_post_sidebar',
        'name'          => 'Single Post Sidebar',
        'description'   => 'This widget area will appear on single posts.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    );
    register_sidebar( $args );
}

add_action( 'widgets_init', 'd4tw_sidebars' );

//Hide the uncategorized category from widget in sidebar
function exclude_widget_categories($args){
    $exclude = "1";
    $args["exclude"] = $exclude;
    return $args;
}
add_filter("widget_categories_args","exclude_widget_categories");

// Filter except length to 35 words.
function d4tw_custom_excerpt_length( $length ) {
return 35;
}
add_filter( 'excerpt_length', 'd4tw_custom_excerpt_length', 999 );

//Update the theme read more link
if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
    function understrap_all_excerpts_get_more_link( $post_excerpt ) {
        if ( ! is_admin() ) {
            $post_excerpt = $post_excerpt . '...';
        }
        return $post_excerpt;
    }
}
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

function remove_uncategorized_links( $categories ){

    foreach ( $categories as $cat_key => $category ){
        if( 1 == $category->term_id ){
            unset( $categories[ $cat_key ] );
        }
    }

    return $categories;
    
} add_filter('get_the_categories', 'remove_uncategorized_links', 1);

// *** D4TW Custom Dashboard *** \\

function d4tw_add_dashboard_widget() {
	add_meta_box('wp_dashboard_widget_1', 'Site Information', 'd4tw_theme_info', 'dashboard', 'side', 'high');
}
add_action('wp_dashboard_setup', 'd4tw_add_dashboard_widget' );
 
function d4tw_theme_info() {
  echo "<ul>
  <li><strong>Developed By:</strong> KnockMedia</li>
  <li><strong>Website:</strong> <a href='http://www.knockmedia.com'>www.knockmedia.com</a></li>
  <li><strong>Contact:</strong> <a href='mailto:nateb@knockmedia.com'>nateb@knockmedia.com</a></li>
  </ul>";
}

//Remove the tools menu option for editors
function d4tw_remove_menus(){
if ( current_user_can( 'editor' ) ) {
remove_menu_page( 'tools.php' );
	}
}
add_action( 'admin_menu', 'd4tw_remove_menus' );

//Remove widgets from dashboard
function d4tw_remove_dash_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'd4tw_remove_dash_meta' );

//Filter the WordPress branding in the dashboard footer
function d4tw_filter_admin_footer () {
    echo '<span id="dashFooter">Website developed by <a style = "color: #ff0000; text-decoration: none;" href="http://www.knockmedia.com" target="_blank">KnockMedia</a></span>';
}
add_filter('admin_footer_text', 'd4tw_filter_admin_footer');

//Add custom logo to wp-login
function d4tw_custom_logo_css () {
    wp_enqueue_style('login-styles', get_stylesheet_directory_uri() . '/login/login_styles.css');
}
add_action('login_enqueue_scripts', 'd4tw_custom_logo_css');

//Change the wp-login logo url
function d4tw_login_url(){
    return get_bloginfo( 'wpurl' );
}
add_filter('login_headerurl', 'd4tw_login_url');

//Replace the WordPress dashboard logo
function d4tw_admin_css() {
	wp_enqueue_style('dashboard-styles', get_stylesheet_directory_uri() . '/dashboard/dashboard.css');
}

add_action('admin_head', 'd4tw_admin_css');

// *** User Tweaks & Permissions *** \\

// Hide the admin toolbar for non-admins
add_action('admin_init', 'd4tw_disable_admin_bar');

function d4tw_disable_admin_bar() {
    if ( !current_user_can ( 'administrator' ) ) {
        show_admin_bar(false);
    }
}


// *** Widgets *** \\

// Deregister Sidebars
function d4tw_remove_sidebars () {
	unregister_sidebar( 'statichero' );
	unregister_sidebar( 'hero' );
	unregister_sidebar( 'footerfull' );
	unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'right-sidebar' );
    unregister_sidebar( 'herocanvas' );
}

add_action( 'widgets_init', 'd4tw_remove_sidebars', 11 );