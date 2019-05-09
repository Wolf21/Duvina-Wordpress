<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
* Class Name : XS_Social_Login_Settings;
* Class Details : Added menu and sub menu in wordpress main admin menu
* 
* @params : void
* @return : added new page link 
*
* @since : 1.0
*/
class XS_Social_Login_Settings {

    public function __construct(){
		// added admin menu
		add_action('admin_menu', [$this, 'wp_social_admin_menu' ] );
	}
	/**
	* Method Name : wp_social_admin_menu
	* Method Details : add menu for social login plugin
	* 
	* @params : void
	* @return : void
	*
	* @since : 1.0
	*/
	public function wp_social_admin_menu(){
		add_menu_page( 'WP Social Login Ultimate', 'WP Social', 'manage_options', 'wslu_global_setting', [$this, 'content_xs_global_setting'], 'dashicons-share-alt' );
	    add_submenu_page( 'wslu_global_setting', 'Global Settings', 'Global Settings', 'manage_options', 'wslu_global_setting', [$this, 'content_xs_global_setting'] );
	    add_submenu_page( 'wslu_global_setting', 'Providers', 'Providers', 'manage_options', 'wslu_providers', [$this, 'content_xs_providers'] );
	    add_submenu_page( 'wslu_global_setting', 'Style Settings', 'Style Settings', 'manage_options', 'wslu_style_setting', [$this, 'content_xs_style_setting'] );
	}
	
	
	/**
	* Method Name : content_xs_global_setting
	* Method Details : content for global setting page
	* 
	* @params : void
	* @return : void
	*
	* @since : 1.0
	*/
	public function content_xs_global_setting(  ) {

		$global_optionKey = 'xs_global_setting_data';
		$message_global = 'hide';
		if(isset($_POST['global_setting_submit_form'])){
			$option_value_global 	= isset($_POST['xs_global']) ? $_POST['xs_global'] : [];
			if(update_option( $global_optionKey, $option_value_global, 'Yes' )){
				$message_global = 'show';	
			}
			/*$option_value_register = isset($_POST['membership']) ? $_POST['membership'] : -1;
			update_option( 'users_can_register', $option_value_register );
			
			$option_value_register = isset($_POST['xs_default_role']) ? $_POST['xs_default_role'] : 'subscriber';
			update_option( 'default_role', $option_value_register );
			*/
		}
		
		// get returned global setting data from db
		$return_data = get_option($global_optionKey);
		/*
		$membership = get_option('users_can_register', 0);
		$wpUserRole = get_option('default_role', 'subscriber');
		*/
		// wordpress role options
		
		require_once( WSLU_LOGIN_PLUGIN . '/template/admin/global-setting.php');
		
    }
	/**
	* Method Name : content_xs_providers
	* Method Details : content for social provider page
	* 
	* @params : void
	* @return : void
	*
	* @since : 1.0
	*/
	public function content_xs_providers(  ){
		$option_key 	= 'xs_provider_data';
		$message_provider = 'hide';
		// save prodivers data in db
		if(isset($_POST['xs_provider_submit_form'])){
			$option_value 	= isset($_POST['xs_social']) ? $_POST['xs_social'] : [];
			if(update_option( $option_key, $option_value, 'Yes' )){
				$message_provider = 'show';	
			}
		}
		
		// get returned data from db
		$return_data = get_option($option_key);
		
		require_once( WSLU_LOGIN_PLUGIN . '/template/admin/providers-setting.php');
		
	}

	/**
	* Method Name : content_xs_providers
	* Method Details : content for social provider page
	* 
	* @params : void
	* @return : void
	*
	* @since : 1.0
	*/
	public function content_xs_style_setting( ){
		$option_key 	= 'xs_style_setting_data';
		$message_provider = 'hide';
		// save prodivers data in db
		if(isset($_POST['style_setting_submit_form'])){
			$option_value 	= isset($_POST['xs_style']) ? $_POST['xs_style'] : [];
			if(update_option( $option_key, $option_value, 'Yes' )){
				$message_provider = 'show';	
			}
		}
		
		// get returned data from db
		$return_data = get_option($option_key);

		// provider array
		$providers = ['facebook' => 'Facebook', 'linkedin' => 'LinkedIn', 'twitter' => 'Twitter', 'github' => 'GitHub'];
		// style type settings
		$styleArr = ['style1' => 'Style 1', 'style2' => 'Style 2', 'style3' => 'Style 3'];
                            
		// prodiver settings data
		$return_data_prodivers = get_option('xs_provider_data');
		
		require_once( WSLU_LOGIN_PLUGIN . '/template/admin/style-setting.php');
		
	}

   

}
new XS_Social_Login_Settings;