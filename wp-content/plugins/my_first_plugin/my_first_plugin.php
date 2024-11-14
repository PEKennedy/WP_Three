<?php 
/*
Plugin Name:  WPThree
Description:  A plugin to demo the use of Three.js in wordpress as a plugin
Version:      1.0
Author:       Peter
*/

do_action( 'qm/debug', 'Hello There!' );

/*
//this autoloader code causes a crash?
// Include the autoloader
defined('ABSPATH') || exit;
require __DIR__ . '/vendor/autoload.php';
*/

do_action( 'qm/debug', 'This happened!2' );

/*
function wpb_follow_us($content) {
 
// Only do this when a single post is displayed
if ( is_single() ) { 
 
// Message you want to display after the post
// Add URLs to your own Twitter and Facebook profiles
 
$content .= '<p class="follow-us">If you liked this article(s), then please follow us on blabla</p>';
 
}
// Return the content
return $content; 
 
}
// Hook our function to WordPress the_content filter
add_filter('the_content', 'wpb_follow_us'); */

//wp already has an import map, so replace instead of head, use enqueue_scripts, and itll merge the import map in

//add a div with a particular id at the shortcode location
//our js will try to place a canvas there if possible
function add_three_div(){
    return "
        <div id=\"renderer\" class=\"three_renderer\">
        </div>        
    ";
}

add_shortcode('three','add_three_div');


add_action('wp_enqueue_scripts','three_script');

function three_script(){
    //do the module imports
    wp_register_script_module(
        'three',
        "https://unpkg.com/three@0.167.1/build/three.module.js",
        array(),
        null
    );
    wp_register_script_module(
        'three/addons/',
        "https://unpkg.com/three@0.167.1/examples/jsm/",
        array(),
        null
    );
    //enqueue the script with the scene in it
    wp_enqueue_script_module(
        'three_scene',
        'wp-content/plugins/my_first_plugin/three_scene.js',
        array('three','three/addons')
    );
}




