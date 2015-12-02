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

add_action('admin_menu', 'add_global_custom_options');

function add_global_custom_options () {
	add_options_page('Global Custom Fields', 'Global Custom Fields', 'manage_options', 'functions', 'global_custom_options');

}

function global_custom_options() {
	?>
	<div class="wrap">
        <h2>Global Custom Options</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <p><strong>Title:</strong><br />
                <input type="text" name="popup_title" size="45" value="<?php echo get_option('popup_title'); ?>" />
            </p>
            <p><strong>Description:</strong><br />
                <input type="text" name="popup_description" size="45" value="<?php echo get_option('popup_description'); ?>" />
            </p>
            <p><input type="submit" name="Submit" value="Store Options" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="popup_title,popup_description" />
        </form>
    </div>
    <?php
}
?>