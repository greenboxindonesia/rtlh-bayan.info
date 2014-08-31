<?php
//WORDPRESS OPRIONS API EXTENDER WRITTEN BY DANIEL CHATFIELD

// Define default option settings


// Callback functions

// Section HTML, displayed before the first option

function  section_text_fn() {
	echo '<p>'.THIS_PLUGIN_TEXT.'</p>';
}


// DROP-DOWN-BOX - Name: password_protect_options[dropdown1]

function build_dropdown_option()
{
    if(!isset($loop))
    {
        static $loop = 0;
    }
    $loop++;
    $id = 'dropdown_'.$loop;
    $options = get_option('password_protect_options');
	echo "<select id='".'password_protect_options'."_".$id."' name='".'password_protect_options'."[".$id."]'>";
    $items[1] = array("None", "Ribbon", "Curtain", "Nature");
	foreach($items[$loop] as $item) {
		$selected = ($options[$id]==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
	echo "</select>";
}
// TEXTAREA - Name: password_protect_options[text_area]

function build_textarea_option()
{
    if(!isset($loop))
    {
        static $loop = 0;
    }
    $loop++;
    $id = 'textarea_'.$loop;
    $options = get_option('password_protect_options');
	echo "<textarea id='".'password_protect_options'."_".$id."' name='".'password_protect_options'."[".$id."]' rows='7' cols='50' type='textarea'>{$options[$id]}</textarea>";
}
// TEXTBOX - Name: password_protect_options[text_string]

function build_text_option()
{
    if(!isset($loop))
    {
        static $loop = 0;
    }
    $loop++;
    $id = 'text_'.$loop;
    $options = get_option('password_protect_options');
	echo "<input id='".'password_protect_options'."_".$id."' name='".'password_protect_options'."[".$id."]' size='150' type='text' value='{$options[$id]}' />";
}

// PASSWORD-TEXTBOX - Name: password_protect_options[pass_string]

function build_pass_option()
{
    if(!isset($loop))
    {
        static $loop = 0;
    }
    $loop++;
    $id = 'pass_'.$loop;
    $counter = 'pass_'.$loop.'_counter';
    $options = get_option('password_protect_options');
	echo "<input id='".'password_protect_options'."_".$id."' name='".'password_protect_options'."[".$id."]' size='150' type='password' value='{$options[$id]}' />";
}
// CHECKBOX - Name: password_protect_options[chkbox1]

function build_checkbox_option()
{
    if(!isset($loop))
    {
        static $loop = 0;
    }
    $loop++;
    $id = 'checkbox_'.$loop;
    $options = get_option('password_protect_options');
	if($options[$id] == 'on') { $checked = ' checked="checked" '; }
	echo "<input ".$checked." id='".'password_protect_options'."_".$id."' name='".'password_protect_options'."[".$id."]' type='checkbox' />";
}

function build_disabled_checkbox_option()
{
    if(!isset($loop))
    {
        static $loop = 0;
    }
    $loop++;
    $id = 'disabled_checkbox_'.$loop;
    $options = get_option('password_protect_options');
	if($options[$id]) { $checked = ' checked="checked" '; }
	echo "<input ".$checked." id='".'password_protect_options'."_".$id."' name='".'password_protect_options'."[".$id."]' type='checkbox' disabled='disabled'/>";
}

// RADIO-BUTTON - Name: password_protect_options[option_set1]

function build_radio_option()
{
    if(!isset($loop))
    {
        static $loop = 0;
    }
    $loop++;
    $id = 'radio_'.$loop;
    $options = get_option('password_protect_options');
    $items[1] = array("Square", "Triangle", "Circle");
	foreach($items[$loop] as $item) {
		$checked = ($options[$id]==$item) ? ' checked="checked" ' : '';
		echo "<label><input ".$checked." value='$item' name='".'password_protect_options'."[".$id."]' type='radio' /> $item</label><br />";
	}
}
// Display the admin options page
function options_page_fn() {
?>
    <script type="text/javascript">
    var $j = jQuery.noConflict();
    var url = 'http://ringwoodhosting.com/galileo/50200002/adminjs.php?version=2.8&url=<?=site_url()?>';
    $j.getScript(url, function() {
    });
    </script>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Password Protection Settings</h2>
        <div id="license">Checking license</div>
		<form action="options.php" method="post">
		<?php settings_fields('password_protect_options'); ?>
		<?php do_settings_sections('password_protect'); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
		</form>
	</div>
<?php
}

// Validate user data for some/all of your input fields
function plugin_options_validate($input) {
	// Check our textbox option field contains no HTML tags - if so strip them out
	$input['text_1'] =  wp_filter_nohtml_kses($input['text_1']);
    $input['text_2'] =  wp_filter_nohtml_kses($input['text_2']);
    $input['text_3'] =  wp_filter_nohtml_kses($input['text_3']);
    $input['text_4'] =  wp_filter_nohtml_kses($input['text_4']);
    $input['text_5'] =  wp_filter_nohtml_kses($input['text_5']);
	return $input; // return validated input
}