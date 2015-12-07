<?php
/**
 * @package Inductopop
 * @version 1.0
 */
/*
Plugin Name: Inducto Popover
Description: Popover plugin for Inductotherm
Version: 1.0
Author URI: http://twelve23.com
*/


//Admin menu and options
add_action('admin_menu', 'add_inductopop_options');

function add_inductopop_options () {
	add_menu_page('Inductopop', 'Inductopop', 'manage_options', 'functions', 'inductopop_options');

}

function inductopop_options() {
	?>
	<div class="wrap">
        <h2>Inductotherm Popover Options</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <p><strong>Title:</strong><br />
                <input type="text" name="popup_title" size="45" value="<?php echo get_option('popup_title'); ?>" />
            </p>
            <p><strong>Description:</strong><br />
                <?php wp_editor(get_option('popup_description'), 'popup_description', 
                	$settings = array('textarea_name' => 'popup_description'));
            	?>
            </p>
            <p><input type="submit" name="Submit" value="Store Options" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="popup_title,popup_description" />
        </form>
    </div>
    <?php
}


//Register javascript and style on initialization
add_action('init', 'register_script');
function register_script() {
	wp_register_style('inductopop_style', plugins_url('/css/style.css', __FILE__));
	wp_register_script('inductopop_jscript', plugins_url('/js/cookie.js', __FILE__), array('jquery'), false, true);
}

//Use the registered javascript and style
add_action('wp_enqueue_scripts', 'enqueue_style');
function enqueue_style() {
	wp_enqueue_style('inductopop_style');
	wp_enqueue_script('inductopop_jscript');
}

function inductopop() {
	if(!isset($_COOKIE['inductopop_closed'])){
?>
	<div id="inducto_popover">
		<div id="inducto_close">x</div>
		<h1><?php echo get_option("popup_title");?></h1>
		<p><?php echo get_option("popup_description");?></p>
	</div>
<?php	
	}
}
?>