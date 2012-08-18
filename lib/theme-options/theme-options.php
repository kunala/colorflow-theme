<?php
/**
 * turing Theme Options
 *
 * @package turing
 * @since turing 1.0
 */

/**
 * Register the form setting for our turing_options array. This function is attached to the admin_init action hook.
 * This call to register_setting() registers a validation callback, turing_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly formatted, and safe.
 * @since turing 1.0
*/
function turing_theme_options_init() {
	register_setting(
		'turing_options',       // Options group, see settings_fields() call in turing_theme_options_render_page()
		'turing_theme_options' // Database option, see turing_get_theme_options()
		// 'turing_theme_options_validate' // The sanitization callback, see turing_theme_options_validate()
	);
	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'Turing Options', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see turing_theme_options_add_page()
	);
	// Register our individual settings fields
  // add_settings_field(
  //   'sample_checkbox', // Unique identifier for the field for this section
  //  __( 'Sample Checkbox', 'turing' ), // Setting field label
  //  'turing_settings_field_sample_checkbox', // Function that renders the settings field
  //  'theme_options', // Menu slug, used to uniquely identify the page; see turing_theme_options_add_page()
  //  'general' // Settings section. Same as the first argument in the add_settings_section() above
  // );
	add_settings_field( 'company_name',       __( 'Company Name', 'turing' ),         'company_email',      'theme_options', 'general' );
	add_settings_field( 'company_email',      __( 'Company Email', 'turing' ),        'company_email',      'theme_options', 'general' );
	add_settings_field( 'company_phone',      __( 'Contact Phone Number', 'turing' ), 'company_phone',      'theme_options', 'general' );
	add_settings_field( 'company_address_1',  __( 'Company Address 1', 'turing' ),    'company_address_1',  'theme_options', 'general' );
	add_settings_field( 'company_address_2',  __( 'Company Address 2', 'turing' ),    'company_address_2',  'theme_options', 'general' );
	add_settings_field( 'company_address_2b',  __( 'Company Address 2b', 'turing' ),  'company_address_2b', 'theme_options', 'general' );
	add_settings_field( 'company_address_3',  __( 'Company Address 3', 'turing' ),    'company_address_3',  'theme_options', 'general' );
	add_settings_field( 'company_bio',        __( 'Company Bio', 'turing' ),          'company_bio',        'theme_options', 'general' );
}
add_action( 'admin_init', 'turing_theme_options_init' );
/** Change the capability required to save the 'turing_options' options group. 
 *  @see turing_theme_options_init() First parameter to register_setting() is the name of the options group.
 *  @see turing_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *  @param string $capability The capability used for the page, which is manage_options by default.
 *  @return string The capability to actually use.
*/
function turing_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_turing_options', 'turing_option_page_capability' );
/** Add our theme options page to the admin menu. This function is attached to the admin_menu action hook. @since turing 1.0 */
function turing_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Turing Info', 'turing' ),   // Name of page
		__( 'Turing Info', 'turing' ),   // Label in menu
		'edit_theme_options',                    // Capability required
		'theme_options',                         // Menu slug, used to uniquely identify the page
		'turing_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', 'turing_theme_options_add_page' );

/** Returns the options array for turing. @since turing 1.0 */
function turing_get_theme_options() {
	$saved = (array) get_option( 'turing_theme_options' );
	$defaults = array(
		'company_twitter'     => 'colorflowpost',
		'company_name'        => 'Turing',
		'company_email'       => 'info@turing.com',
		'company_phone'       => '888 603 6023',
    'company_address_1'   => 'Zaentz Media Center',
    'company_address_2'   => '2600 10th Street',
    'company_address_2b'  => 'Suite 4',
    'company_address_3'   => 'Berkeley, CA 94710',
    'company_bio'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis suscipit nunc non tellus venenatis non cursus justo rutrum. Sed semper, ligula pretium luctus venenatis, mauris risus bibendum eros, eu ullamcorper tellus odio quis diam. Fusce vitae nisi id lorem tempus placerat. Maecenas rutrum consectetur orci at tempus. Donec bibendum auctor massa, ac fringilla justo congue a. Quisque fermentum pretium nisl, ultricies vestibulum mauris rutrum at.'
	);
	$defaults = apply_filters( 'turing_default_theme_options', $defaults );
	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );
	return $options;
}

global $turing_options;
$turing_options = turing_get_theme_options();

function company_twitter() {
 	$options = turing_get_theme_options();
 	?>
	<input type="text" name="turing_theme_options[company_twitter]" id="company_twitter" value="<?php echo esc_attr( $options['company_twitter'] ); ?>" />
  <!-- <label class="description" for="company_email"><?php _e( 'Company Email', 'turing' ); ?></label> -->
 	<?php
}
function company_email() {
 	$options = turing_get_theme_options();
 	?>
	<input type="text" name="turing_theme_options[company_email]" id="company_email" value="<?php echo esc_attr( $options['company_email'] ); ?>" />
  <!-- <label class="description" for="company_email"><?php _e( 'Company Email', 'turing' ); ?></label> -->
 	<?php
}
function company_phone() {
	$options = turing_get_theme_options();
	?>
	<input type="text" name="turing_theme_options[company_phone]" id="company_phone" value="<?php echo esc_attr( $options['company_phone'] ); ?>" />
  <!-- <label class="description" for="company_phone"><?php _e( 'Company Phone Number', 'turing' ); ?></label> -->
	<?php
}
function company_address_1() {
	$options = turing_get_theme_options();
	?>
	<input type="text" name="turing_theme_options[company_address_1]" id="company_address_1" value="<?php echo esc_attr( $options['company_address_1'] ); ?>" />
  <!-- <label class="description" for="company_address_1"><?php _e( 'Company Phone Address', 'turing' ); ?></label> -->
	<?php
}
function company_address_2() {
	$options = turing_get_theme_options();
	?>
	<input type="text" name="turing_theme_options[company_address_2]" id="company_address_1" value="<?php echo esc_attr( $options['company_address_2'] ); ?>" />
  <!-- <label class="description" for="company_address_2"><?php _e( 'Company Phone Address', 'turing' ); ?></label> -->
	<?php
}
function company_address_2b() {
	$options = turing_get_theme_options();
	?>
	<input type="text" name="turing_theme_options[company_address_2b]" id="company_address_1" value="<?php echo esc_attr( $options['company_address_2b'] ); ?>" />
  <!-- <label class="description" for="company_address_2"><?php _e( 'Company Phone Address', 'turing' ); ?></label> -->
	<?php
}
function company_address_3() {
	$options = turing_get_theme_options();
	?>
	<input type="text" name="turing_theme_options[company_address_3]" id="company_address_3" value="<?php echo esc_attr( $options['company_address_3'] ); ?>" />
  <!-- <label class="description" for="company_address_3"><?php _e( 'Company Phone Address', 'turing' ); ?></label> -->
	<?php
}
function company_bio() {
	$options = turing_get_theme_options();
  ?>
	<textarea type="text" name="turing_theme_options[company_bio]" id="company_bio" cols="50" rows="10" /><?php echo esc_textarea( $options['company_bio'] ); ?></textarea>
  <!-- <label class="description" for="company_bio"><?php _e( 'Company Bio brief', 'turing' ); ?></label> -->
	<?php
}
/** Renders the Theme Options administration screen. @since turing 1.0 */
function turing_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( 'Turing Settings', 'turing' ), get_current_theme() ); ?></h2>
		<?php settings_errors(); ?>
		<form method="post" action="options.php">
			<?php
				settings_fields( 'turing_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 * @see turing_theme_options_init()
 * @todo set up Reset Options action
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 * @since turing 1.0
*/
function turing_theme_options_validate( $input ) {
	$output = array();
	// Checkboxes will only be present if checked.
	if ( isset( $input['sample_checkbox'] ) )
		$output['sample_checkbox'] = 'on';
	// The sample text input must be safe text with no HTML tags
	if ( isset( $input['sample_text_input'] ) && ! empty( $input['sample_text_input'] ) )
		$output['sample_text_input'] = wp_filter_nohtml_kses( $input['sample_text_input'] );
	// The sample select option must actually be in the array of select options
	if ( isset( $input['sample_select_options'] ) && array_key_exists( $input['sample_select_options'], turing_sample_select_options() ) )
		$output['sample_select_options'] = $input['sample_select_options'];
	// The sample radio button value must be in our array of radio button values
	if ( isset( $input['sample_radio_buttons'] ) && array_key_exists( $input['sample_radio_buttons'], turing_sample_radio_buttons() ) )
		$output['sample_radio_buttons'] = $input['sample_radio_buttons'];
	// The sample textarea must be safe text with the allowed tags for posts
	if ( isset( $input['sample_textarea'] ) && ! empty( $input['sample_textarea'] ) )
		$output['sample_textarea'] = wp_filter_post_kses( $input['sample_textarea'] );
	return apply_filters( 'turing_theme_options_validate', $output, $input );
}