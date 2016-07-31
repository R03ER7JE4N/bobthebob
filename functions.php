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

//Remove space and dash
function noSpaceDash($string) {
    $string = preg_replace("/[\s-]+/", "", $string);
    return $string;
}
//HTML
/*<?php $phone = noSpaceDash(get_field('telephone')); ?>*/


// Add class on excerpt
function add_excerpt_class( $excerpt )
{
    $excerpt = str_replace( "<p", "<p class=\"excerpt\"", $excerpt );
    return $excerpt;
}
 
add_filter( "the_excerpt", "add_excerpt_class" );

// Excerpt max words
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );