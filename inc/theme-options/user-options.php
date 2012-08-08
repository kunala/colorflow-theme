<?php
function my_new_contactmethods( $contactmethods ) {
  // Remove Yahoo
  unset($contactmethods['yim']);
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);
  $contactmethods['twitter'] = 'Twitter';
  $contactmethods['facebook'] = 'Facebook';
  $contactmethods['gplus'] = 'google+';
  $contactmethods['github'] = 'github';
  return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);
// add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
// add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>
	<tr>
		<th><label for="twitter">Twitter</label></th>
		<td><input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br /></td>
	</tr>
	<tr>
		<th><label for="twitter">Facebook</label></th>
		<td><input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br /></td>
	</tr>
	<tr>
		<th><label for="twitter">github</label></th>
		<td><input type="text" name="github" id="github" value="<?php echo esc_attr( get_the_author_meta( 'github', $user->ID ) ); ?>" class="regular-text" /><br /></td>
	</tr>
	<tr>
		<th><label for="twitter">google+</label></th>
		<td><input type="text" name="gplus" id="gplus" value="<?php echo esc_attr( get_the_author_meta( 'gplus', $user->ID ) ); ?>" class="regular-text" /><br /></td>
	</tr>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;
	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	update_usermeta( $user_id, 'gplus', $_POST['gplus'] );
	update_usermeta( $user_id, 'github', $_POST['github'] );
}


?>