<?php

function load_css(){
    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.css');
    wp_enqueue_style( 'css', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style( 'awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_register_style( 'jquery', 'https://fonts.googleapis.com/css?family=Playfair+Display', '', '', false);
    wp_enqueue_style( 'jquery' );
    wp_register_style( 'jquery', 'https://fonts.googleapis.com/css?family=Ubuntu', '', '', false);
    wp_enqueue_style( 'jquery' );
}

add_action( 'wp_enqueue_scripts', 'load_css' );


function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', '', '', true );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', '', '', true  );
    //wp_enqueue_script( 'preloader', get_template_directory_uri().'/js/preloader.js', '', '', true  );
    //wp_enqueue_script( 'ajax-load-posts', get_template_directory_uri().'/js/ajax-load-posts.js', '', '', true  );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );



// Регистрируем меню
if ( function_exists( 'register_nav_menus' ) ){
    register_nav_menus(array(
        'menu'    => 'Главное меню',
    ));
}

// Регистрируем сайдбары
if ( function_exists('register_sidebar') ) {

    register_sidebar(array(
        'name' => 'обо мне',
        'before_widget' => '<article class="article">',
        'before_widget' => '<div class="about-me widget">',
        'before_title' => '<div class="head-title"><h3>',
        'after_title' => '</h3></div>',
        'after_widget' => '</div></article><hr>'
    ));

}

// Длинна отрывка для первой статьи
function first_post_excerpt_length($length) {
    return 150;
}
add_filter('excerpt_length', 'first_post_excerpt_length');

add_filter('excerpt_more', function($more) {
    return '';
});



add_theme_support( 'post-thumbnails');

// Интернационализация
function momino_theme_setup(){
    load_theme_textdomain('momino', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'momino_theme_setup');


// ajax load posts
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => '2',
        'paged' => $paged,
    );
    $my_posts = new WP_Query( $args );
    if ( $my_posts->have_posts() ) :
        ?>
        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>

        <div class="one-post-blog">
            <div class="content-blog">
                <div class="head-title"><h5><a href="<?php the_permalink(); ?>"><?php the_category();?></a></h5></div>
                <div class="date"><?php echo get_the_date($d, $post);?></div>
                <div class="ph-title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                <a class="hover" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail', array('class' => 'img-responsive')); ?></a>
                <p><?php the_excerpt(); ?></p>
            </div>
            <div class="read-more">
                <a href="<?php the_permalink(); ?>"><?php echo __('Read more', 'momino')?></a>
            </div>
        </div>
        
    <?php endwhile ?>
        <?php
    endif;

    wp_die();
}

// Customizer
function momino_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.
}
add_action( 'customize_register', 'momino_customize_register' );







