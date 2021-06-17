<?php
add_action('admin_menu', 'test_plugin_setup_menu');
 
function test_plugin_setup_menu(){
    add_menu_page( 
		'TypeWriter Page', 
		'TypeWriter', 
		'manage_options',  
		'mg-typewriter', 
		'test_init'
	);
}

function test_init(){
    require_once("backoffice/MGTW_options.php");
}

function mytypewriter_admin_init() {
	wp_enqueue_script('admin_js', plugins_url( '/functions.js', __FILE__ )); 
	wp_enqueue_style( 'admin_css', plugins_url( '/style.css', __FILE__ )); 
}
add_action('admin_enqueue_scripts', 'mytypewriter_admin_init');



add_action( 'wp_ajax_save_data', 'save_data' );
function save_data(){
	global $wpdb;
	$data = $_POST["mgtw_data"];
	update_option('mgtw_options', $data);
	echo json_encode(array('res'=>true, 'message'=> $_POST["mgtw_data"]));
	wp_die();	
}

?>