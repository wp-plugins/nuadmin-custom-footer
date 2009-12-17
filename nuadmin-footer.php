<?php
/*
Plugin Name: nuAdmin Footer
Plugin URI: http://www.tripleginteractive.com/blog/wordpress/nuadmin-footer/
Description: nuFooter for the Admin pages of WordPress Navigate to <a href="options-general.php?page=nuadmin-footer/nuadmin-footer.php">Settings &rarr; nuAdmin Footer</a> to get started.
Author: tripleGmax
Version: 1
Author URI: http://www.tripleginteractive.com/
*/

/*
    ----------------------------------------------------------------------------

	Custom Admin Footer Plugin for WordPress
	Copyright Gregg Henry
	<http://www.tripleginteractive.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License <http://www.gnu.org/licenses/> for 
	more details.

	----------------------------------------------------------------------------
*/


// Hook for adding admin menus
add_action('admin_menu', 'nuadmin_footer_menu');

function nuadmin_footer_menu() {
	add_options_page('nuAdmin Custom Footer', 'nuAdmin Footer', 10, __FILE__, 'nuadmin_footer_page');
}

function nuadmin_footer_page() {
?>
	<div class="wrap">
	<h2>nuAdmin Custom Footer</h2>
		<div id="poststuff" class="metabox-holder">
        <div class="postbox">
            <h3 class="hndle"><span>Info</span></h3>
            <div class="inside">
                <p>This plugin allows you to update the footer of your WordPress Installation.  Only the administrator can see this page to update the text.  You may want to link to your website, place your contact information in it, or just want to remove the current information in the box.</p>
               <p>Be sure to visit <a href="http://www.tripleginteractive.com/">triple G interactive</a> and if you have questions about the plugin you can visit <a href="http://www.tripleginteractive.com/blog/wordpress/custom-admin-footer/">our blog entry on the plugin.</a></p>

            </div>
		</div>
        
        <div class="postbox">
            <h3 class="hndle"><span>Form</span></h3>
            <div class="inside">
            <form method="post" action="options.php">
				<?php wp_nonce_field('update-options'); ?>
                
                <table class="form-table">
                
                <tr valign="top">
                <th scope="row">Footer Text/HTML</th>
                <td><textarea name="nuadmin_footer" rows="10" cols="60"><?php echo get_option('nuadmin_footer'); ?></textarea></td>
                </tr>
                 
                </table>
                
                <input type="hidden" name="action" value="update" />
                <input type="hidden" name="page_options" value="nuadmin_footer" />
                
                <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
                </p>
                
			</form>
            </div>
	</div><!--/postbox-->
    
        <div class="postbox">
            <h3 class="hndle"><span>Donate</span></h3>
            <div class="inside">
	            <p>You downloaded this plugin free of charge. pretty sweet huh? Yep! If you ended up liking this plugin, a donation would be very much appreciated. Enjoy!</p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="9984697">
                    <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
            </div>
		</div><!--/postbox-->


	</div><!--/poststuff-->

	</div><!--/wrap-->
    
<?php
} //end nuadmin_footer function

/*this code will add the filter to the footer text*/
add_filter('admin_footer_text', 'remove_footer_admin'); //change admin footer text

function remove_footer_admin () {
	echo get_option( 'nuadmin_footer' );
} 

?>