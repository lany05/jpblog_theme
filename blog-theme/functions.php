<?php
require_once(dirname(__FILE__) . '/theme-options.php');

/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain('mythemeshop', get_template_directory() . '/lang');

if (function_exists('add_theme_support')) add_theme_support('automatic-feed-links');

/*-----------------------------------------------------------------------------------*/
/*	excerpt
/*-----------------------------------------------------------------------------------*/
function excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt);
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Menu Support
/*-----------------------------------------------------------------------------------*/
add_theme_support('menus');
if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'primary-menu' => 'Primary Menu'
        )
    );
}

/*-----------------------------------------------------------------------------------*/
/* Pagination
/*-----------------------------------------------------------------------------------*/
function pagination($pages = '', $range = 3)
{
    $showitems = ($range * 3) + 1;
    global $paged;
    if (empty($paged)) $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class='jp-pagination'><ul>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<li><a rel='nofollow' href='" . get_pagenum_link(1) . "'>&laquo; First</a></li>";
        if ($paged > 1 && $showitems < $pages) echo "<li><a rel='nofollow' href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li><span class='selected'>" . $i . "</span></li>" : "<li><a rel='nofollow' href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<li><a rel='nofollow' href='" . get_pagenum_link($paged + 1) . "'>Next &rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) echo "<a rel='nofollow' href='" . get_pagenum_link($pages) . "'>Last &raquo;</a>";
        echo "</ul></div>";
    }
}
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 **/
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return $html;
}

add_action('init', 'customRSS');
function customRSS()
{
    add_feed('full', 'customRSSFunc');
}

function customRSSFunc()
{
    get_template_part('rss', 'full');
}

function jp_theme_styles()
{
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'jp_theme_styles');

function jp_theme_js()
{
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('owl_js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true);
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'bootstrap_js', 'owl_js'), '', true);
}

add_action('wp_enqueue_scripts', 'jp_theme_js');

function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
?>