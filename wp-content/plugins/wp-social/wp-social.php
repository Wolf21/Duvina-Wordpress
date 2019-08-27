<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 * Plugin Name: Wp Social Login
 * Plugin URI: https://plugindev.xpeedstudio.com/social/
 * Description: Wp Social Login System for Facebook, Twitter, Linkedin, Dribble, Pinterest, Wordpress, Instagram, GitHub, Vkontakte and Reddit login from WordPress site.
 * Author: wpmet
 * Version: 1.2.2
 * Author URI: https://wpmet.com/
 * Text Domain: wslu-social-login
 * License: GPL2+
 * Domain Path: /languages/
**/

define( "WSLU_LOGIN_PLUGIN", plugin_dir_path(__FILE__) );
define( "WSLU_LOGIN_PLUGIN_URL", plugin_dir_url(__FILE__) );

require( WSLU_LOGIN_PLUGIN.'autoload.php' );

 
