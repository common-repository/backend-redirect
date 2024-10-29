<?php
/*
Plugin Name: Backend Redirect
Plugin URI: http://www.jackmcintyre.net/projects/backend-redirect/?utm_source=wordpress&utm_medium=plugin&utm_campaign=backend-redirect
Description: Redirects all non admin users who try to access the WordPress backend to a user defined URL.
Version: 0.2
License: GPL
Author: Jack McIntyre
Author URI: http://www.jackmcintyre.net?utm_source=wordpress&utm_medium=plugin&utm_campaign=backend-redirect
*/

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/

/* --------------------------------- */
/* Admin Interface - START */ 
/* --------------------------------- */
function backendredir_admin() {
  include('backendredirect_admin_form.php');
}

function backendredir_admin_actions() { 
 add_options_page('Backend Redirect', 'Backend Redirect', 8, 'backendredir_admin_actions_file_string', 'backendredir_admin');
}

function backendredir_install(){
  if(!get_option('backendredir_redirurl')){
    add_option('backendredir_redirurl', get_option('home'));
  }

}

function backendredir_remove_options() {
  delete_option('backendredir_redirurl');
  delete_option('backendredir_remove_options');
}

if(get_option('backendredir_remove_options') == 'on'){ register_deactivation_hook(__FILE__, 'backendredir_remove_options'); }

add_action('admin_menu', 'backendredir_admin_actions');
add_action( 'plugins_loaded', 'backendredir_install' );
 
function set_plugin_meta($links, $file) {
 
	$plugin = plugin_basename(__FILE__);
 
	// create link
	if ($file == $plugin) {
		return array_merge(
			$links,
			array( sprintf( '<a href="options-general.php?page=backendredir_admin_actions_file_string">Settings</a>', $plugin, __('Settings') ) )
		);
	}
 
	return $links;
}
 
add_filter( 'plugin_row_meta', 'set_plugin_meta', 10, 2 ); 
/* --------------------------------- */
/* Admin Interface - END */ 
/* --------------------------------- */

function restrict_admin() {
		if(!current_user_can('level_10')){
			wp_redirect(get_option('backendredir_redirurl'), 403);
	}
}
add_action('admin_init', 'restrict_admin', 1);
?>
