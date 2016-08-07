<?php

    require_once( 'wp-less/lessc.inc.php' );
    // Add RSS links to <head> section
    automatic_feed_links();
    
    function autoCompileLess($inputFile, $outputFile) {
      // load the cache
      $cacheFile = $inputFile.".cache";

      if (file_exists($cacheFile)) {
        $cache = unserialize(file_get_contents($cacheFile));
      } else {
        $cache = $inputFile;
      }

      $less = new lessc;
      $newCache = $less->cachedCompile($cache);

      if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
        file_put_contents($cacheFile, serialize($newCache));
        file_put_contents($outputFile, $newCache['compiled']);
      }
    }

    autoCompileLess(get_template_directory().'/style.less', get_template_directory().'/style.css');
    
    
    
    // Clean up the <head>
    function removeHeadLinks() {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    add_theme_support( 'title-tag' );
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => 'Sidebar Widgets',
            'id'   => 'sidebar-widgets',
            'description'   => 'These are widgets for the sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ));
    }

// Correctif du datepicker de Contact Form 7
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

function hide_admin_bar_from_front_end(){
  if (is_blog_admin()) {
    return true;
  }
  return false;
}
add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );

// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt() {
    global $post;
    $text = get_field('content');
    if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $excerpt_length = 30;
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
    return apply_filters('the_excerpt', $text);
}
