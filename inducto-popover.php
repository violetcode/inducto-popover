<?php
/**
 * @package Inductopop
 * @version 1.0
 */
/*
Plugin Name: Inducto Popover
Description: Popover thingy
Version: 1.0
Author URI: http://twelve23.com
*/

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

function inductopop() {
?>
	<h1><?php echo get_option("popup_title");?></h1>
	<p><?php echo get_option("popup_description");?></p>
<?php	
}
?>