<?php
/*
Plugin Name: My Typewriter
Plugin URI: https://www.link1web.uk/
Description: Typewriter effect for WordPress
Version: 0.0.1 
Author: Link1 Web Development
Author URI: https://www.link1web.uk/myplugins/mytypewriter/
Text Domain: mytypewriter
Domain Path: /languages
*/

defined('ABSPATH') or die("Cannot access pages directly.");

include( plugin_dir_path( __FILE__ ) ."MG_typewriter_admin.php");


function mytypewriter_init() { 
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'mytypewriter', plugins_url( '/javascript/typer.js', __FILE__ )); 
    wp_localize_script( 'mytypewriter', 'ajax_object',
        array( 
            'ajax_url' => admin_url( 'admin-ajax.php'),
        )
    );
}
add_action('wp_enqueue_scripts','mytypewriter_init');




function init(){
	$container = get_option('mtw_container');
	$containername = get_option('mtw_containername');
	$phrases = get_option('mtw_phrases');
}


add_shortcode( 'typewriter', 'injectTypeWriter' );
function injectTypeWriter(){
	
	$options = get_option("mgtw_options");
	$default = $options;
	
	$string = "";
	foreach ($options['strings'] as $strings){
		if ($strings != ""){
			$string .= '"'.$strings.'",';
		}
	}
	$default['strings'] = substr($string, 0, -1);

	$code = "<span class='typer'></span>
	<script>
		jQuery('document').ready(function(){
			jQuery('.typer').typer({
				typeSpeed:  ".$default['typespeed'].",
				backspaceSpeed: ".$default['backspaceSpeed'].",
				backspaceDelay: ".$default['backspaceDelay'].",
				repeatDelay: ".$default['repeatDelay'].",
				startDelay: ".$default['startDelay'].",
				repeat: ".$default['loop'].",
				autoStart: ".$default['autoPlay'].",
				useCursor: ".$default['cursor'].",
				strings: [ ".$default['strings']."]
			});	
		});
	</script>
	";
return $code;	

}
