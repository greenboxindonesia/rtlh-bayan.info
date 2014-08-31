<?php
/*
Plugin Name: Greenbox Protected
Plugin URI: http://www.greenbox.web.id/
Description: Use this plugin to protect your website with a single password.
Version: 2.8.2
Author: Albert Sukomono
Author URI: http://www.albert.sukmono.web.id
License: GNU General Public Licensi
*/
?>
<?php
session_start();
function old_settings(){
    $return['enabled'] = get_option('sd_pp_enabled');
    $return['sd_pp_logo'] = get_option('sd_pp_logo');
    $return['sd_pp_display'] = get_option('sd_pp_display');
    $return['sd_pp_password'] = get_option('sd_pp_password');
    $return['sd_pp_allowsearch'] = get_option('sd_pp_allowsearch');
    $return['sd_pp_nocache'] = get_option('sd_pp_nocache');
    return $return;
}
include($sd_plugindir.'options_inc.php');
define('THIS_PLUGIN_TEXT','Password Protection plugin ver 2.8.2');
add_action('admin_menu', 'add_defaults_fn');
add_action('admin_init', 'plugin_init_fn' );
add_action('admin_menu', 'plugin_add_page_fn');
add_action('init', 'loginrequest');
add_action('get_header', 'sd_authenticate');

function add_defaults_fn() {
	$tmp = get_option('password_protect_options');
    $plugin_dir = plugins_url().'/gb_protected';
    $old = old_settings();
    if($old['enabled'] != '')
    {
        if($old['sd_pp_display'] == 'off')
        {
            $hideLink = 'on';
        }
        else
        {
            $hideLink = 'off';
        }
        $defaults = array(
            "version"=>"2.8.2",
            "checkbox_1"=>$old['enabled'],//enabled
            "pass_1" => $old['Greenboxindonesia'], //password
        ); 
    }
    else
    {
        $defaults = array(
            "version"=>"2.8.2",
            "checkbox_1"=>"on",//enabled
            "pass_1" => "Greenboxindonesia", //password
        );
    }
    if(!is_array($tmp)) {
		update_option('password_protect_options', $defaults);     
	}
}
function get_option_pt()
{
    $options = get_option('password_protect_options');
    $return['enabled'] = $options['checkbox_1'];
    $return['password'] = $options['pass_1'];
    return $return;
}
function sd_authenticate()
{
	$options = get_option_pt();
	if($options['hide_link']!= "on"){
		$display_text = "";
	}
	//check if password protection is enabled
	if($options['enabled'] == 'false')
	{
		//password protection is disabled
		$GLOBALS['sd_status'] = 1;//allow
		return;
	}
	//password protection is enabled
	//define variables
	$GLOBALS['sd_status'] = 0;//disallow
	$action = $_REQUEST['action'];
	
	$remote_ip = $_SERVER['REMOTE_ADDR'];
	//Not a search bot - are they logging out?
	if($action == 'logout')
	{
		//they are logging out
		$_SESSION['sd_authenticated'] = 'false';
		$GLOBALS['sd_status'] = 2;//display logged out message
		$status = "logged out";
	}
	//Are they logged in
	if($_SESSION['sd_authenticated'] == 'true')
	{
		//logged in
		$GLOBALS['sd_status'] = 1;//allow
		return;
	}
	
	//Display login form
	include(dirname(__FILE__).'/login.php');
	exit();
}


//----------------------------------------------------------------
function loginrequest()
{
	$sd_password = $_REQUEST['sd_password'];
	if($sd_password != NULL)
	{
	   $tmp = get_option_pt();
		//WHOOAA - someone is attempting to login
		if($sd_password == $tmp['password'])
		{
			//correct password
			$_SESSION['sd_authenticated'] = "true";
			echo("var url = location.href; url = url.split(\"?\", 1); location.href = url + '?login=true';");
			echo("$('#status').html('<span style=\"color:green;\">Kata sandi Anda benar! - redirecting</span>');");
			exit;
		}
		else
		{
			//incorrect password
			echo("$('#status').html('Kata Sandi Anda Salah')");
			exit;
		}
	}
}
?>
<?php
function plugin_init_fn(){
	register_setting('password_protect_options', 'password_protect_options');
    add_settings_section('main_section', 'Global Settings', 'section_text_fn', 'password_protect');
    add_settings_field('checkbox_1', 'Aktifkan', 'build_checkbox_option', 'password_protect', 'main_section');
	add_settings_field('pass_1', 'Setting Kata Sandi:', 'build_pass_option', 'password_protect', 'main_section');
}

// Add sub page to the Settings Menu
function plugin_add_page_fn() {
	   add_options_page('Password Protection Settings', 'Password Protection', 'administrator', 'password_protect', 'options_page_fn');
}
// Register our settings. Add the settings section, and settings fields
?>
