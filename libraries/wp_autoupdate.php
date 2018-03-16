<?php # Based on: https://github.com/groveld/wp-updater
class wp_autoupdate{
	private $api_url='https://formation.software/WORDPRESS/update.php';
	public function __construct(){
		// Take over the update check
		add_filter('pre_set_site_transient_update_plugins',array($this,'check_update'));
		// Take over the Plugin info screen
		add_filter('plugins_api',array($this,'api_call'), 10, 3);
	}
	public function check_update($checked_data){
		global $wp_version;
		//Comment out these three lines during testing.
		/*if (empty($checked_data->checked)){
			return $checked_data;
		}*/
		$args = array(
			'slug'		=>FM_SLUG,
			'version'	=>property_exists($checked_data,'checked')?$checked_data->checked[FM_SLUG.'/'.FM_SLUG.'.php']:1,
		);
		$request_string=array(
			'body'=>array(
				'action'	=>'basic_check', 
				'request'	=>serialize($args),
				'api-key'	=>md5(get_bloginfo('url'))
			),
			'user-agent'=>'WordPress/'.$wp_version.'; '.get_bloginfo('url')
		);
		// Start checking for an update
		$raw_response = wp_remote_post($this->api_url, $request_string);
		if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200)){
			$serialized = preg_replace('/^O:\d+:"[^"]++"/', 'O:' . strlen('stdClass') . ':"stdClass"', $raw_response['body']);
			$response = unserialize($serialized);
		}
		// Feed the update data into WP updater
		if (is_object($response) && !empty($response)){
			$checked_data->response[FM_SLUG.'/'.FM_SLUG.'.php'] = $response;
		}
		return $checked_data;
	}
	public function api_call($def, $action, $args){
		global $wp_version;
		if (isset($args->slug) && ($args->slug !=FM_SLUG)){
			return false;
		}
		// Get the current version
		$plugin_info	=get_site_transient('update_plugins');
		$current_version=$plugin_info->checked[FM_SLUG.'/'.FM_SLUG.'.php'];
		$args->version	=$current_version;
		$request_string = array(
			'body' => array(
				'action'	=>$action, 
				'request'	=>serialize($args),
				'api-key'	=>md5(get_bloginfo('url'))
			),
			'user-agent'=>'WordPress/'.$wp_version.'; '.get_bloginfo('url')
		);
		$request = wp_remote_post($api_url, $request_string);
		if (is_wp_error($request)) {
			$res = new \WP_Error('plugins_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $request->get_error_message());
		} else {
			$res = unserialize($request['body']);

			if ($res === false){
				$res = new WP_Error('plugins_api_failed', __('An unknown error occurred'), $request['body']);
			}
		}
		return $res;
	}
}