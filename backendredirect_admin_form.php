<?php
	if($_POST['backendredir_hidden'] == 'Y') {
		//Process form data

		/*Check boxes*/
		$checked_remove_options = (!isset($_POST['backendredir_remove_options'])? 'off': 'on');
		update_option('backendredir_remove_options', $checked_remove_options);
		

		/*Radio buttons
		$radio_case_type = $_POST['backendredir_case'];
		update_option('backendredir_case', $radio_case_type);
		*/

        //Text box
		$txt_redirurl=(!isset($_POST['backendredir_redirurl'])? '': $_POST['backendredir_redirurl']);
		update_option('backendredir_redirurl', $txt_redirurl);

        // Drop down box
		$backendredir_dropdown_char = $_POST['backendredir_dropdown'];
		update_option('backendredir_dropdown', $backendredir_dropdown_char);

		?>
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php
	} else {
		/* Put code here when form data is not processed */
	}

		//Display admin page - populate variables from db
		$checked_post =( get_option('backendredir_post')=='on' ) ? "checked":"";
		$checked_remove_options = ( get_option('backendredir_remove_options')=='on' ) ? "checked":"";
		$txt_redirurl = get_option('backendredir_redirurl');
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'Backend Redirect', 'backendredir_domain' ) . "</h2>"; ?>
<form name="backendredir" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="backendredir_hidden" value="Y">
<!--<?php    echo "<h4>" . __( 'SectionHead', 'backendredir_domain' ) . "</h4>"; ?>
<div style="margin-left:15px;">
 <p><input type="checkbox" name="backendredir_post" <?php echo $checked_post ?> /><?php _e(" Blog Posts"); ?></p>
 <p style="font-style:italic;"><?php _e("Desc."); ?></p>
 </div>-->
<div style="margin-top:25px;margin-bottom:15px;">
<p>
<strong><?php _e("URL to redirect to: "); ?></strong> <input type="text" name="backendredir_redirurl" value="<?php echo $txt_redirurl; ?>"  style="width: 300px;" /><br />
<span style="color:#aaaaaa;font-style:italic;font-size:10px;"><?php _e('URL should be absolute, eg http://www.google.com', 'backendredir_domain' ) ?></span>
</p>
</div>
<div>
 <p><input type="checkbox" name="backendredir_remove_options" <?php echo $checked_remove_options ?> /><?php _e(" Remove db Option Settings (when Plugin is deactivated)"); ?></p>
 <p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options', 'backendredir_domain' ) ?>" /></p>
</form>
<div style="padding:5px;">
<table style="border-top:1px #d8d8d8 solid;">
 <tr valign="top">
  <td width="430px"><span style="color:#aaaaaa;font-style:italic;font-size:10px;"><?php _e('This plugin is free to use wherever you need it. If you like it, please support it!', 'backendredir_domain' ) ?></span></td>
  <td>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="10006272">
<input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form>
  </td>
 </tr>
</table>
</div>
</div>
