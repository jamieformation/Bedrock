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
		global $plugin_slug,$wp_version;
		//Comment out these three lines during testing.
		/*if (empty($checked_data->checked)){
			return $checked_data;
		}*/
		print_pre($checked_data);
		$args = array(
			'slug'		=>$plugin_slug,
			'version'	=>$checked_data->checked?$checked_data->checked[$plugin_slug .'/'. $plugin_slug .'.php']:1,
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
		print_pre($raw_response);
		if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200)){
			$response = unserialize($raw_response['body']);
		}
		print_pre($response);
		// Feed the update data into WP updater
		if (is_object($response) && !empty($response)){
			$checked_data->response[$plugin_slug .'/'. $plugin_slug .'.php'] = $response;
		}
		return $checked_data;
	}
	public function api_call($def, $action, $args){
		global $plugin_slug,$wp_version;
		if (isset($args->slug) && ($args->slug != $plugin_slug)){
			return false;
		}
		// Get the current version
		$plugin_info	=get_site_transient('update_plugins');
		$current_version=$plugin_info->checked[$plugin_slug .'/'. $plugin_slug .'.php'];
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
class no_class{
    /**
     * The plugin current version
     * @var string
     */
    public $current_version;
 
    /**
     * The plugin remote update path
     * @var string
     */
    public $update_path;
 
    /**
     * Plugin Slug (plugin_directory/plugin_file.php)
     * @var string
     */
    public $plugin_slug;
 
    /**
     * Plugin name (plugin_file)
     * @var string
     */
    public $slug;
 
    /**
     * Initialize a new instance of the WordPress Auto-Update class
     * @param string $current_version
     * @param string $update_path
     * @param string $plugin_slug
     */
    function __construct($current_version, $update_path, $plugin_slug)
    {
		$this->current_version	=$current_version;
        $this->update_path		=$update_path;
        $this->plugin_slug		=$plugin_slug;
        list ($t1, $t2)			=explode('/', $plugin_slug);
        $this->slug				=str_replace('.php', '', $t2);
 
		$obj=new stdClass();
		$obj->checked=strtotime('-1 day');
		$this->check_update($obj);
		
        // define the alternative API for updating checking
        add_filter('pre_set_site_transient_update_plugins',array(&$this,'check_update'));
 
        // Define the alternative response for information checking
        add_filter('plugins_api_results', array(&$this, 'check_info'), 10, 3);
	}

	/**
	 * Add our self-hosted autoupdate plugin to the filter transient
	 *
	 * @param $transient
	 * @return object $ transient
	 */
	/**
     * Add our self-hosted autoupdate plugin to the filter transient
     *
     * @param $transient
     * @return object $ transient
     */
    public function check_update($transient)
    {
        if (empty($transient->checked)) {
            return $transient;
        }
 
        // Get the remote version
        $remote_version = $this->getRemote_version();
 
        // If a newer version is available, add the update
        if (version_compare($this->current_version, $remote_version, '<')) {
            $obj = new stdClass();
            $obj->slug = $this->slug;
            $obj->new_version = $remote_version;
            $obj->url = $this->update_path;
            $obj->package = $this->update_path;
            $transient->response[$this->plugin_slug] = $obj;
        }
        return $transient;
    }
	/**
     * Add our self-hosted description to the filter
     *
     * @param boolean $false
     * @param array $action
     * @param object $arg
     * @return bool|object
     */
    public function check_info($false, $action, $arg)
    {
        if ($arg->slug === $this->slug) {
            $information = $this->getRemote_information();
            return $information;
        }
        return false;
    }
 
    /**
     * Return the remote version
     * @return string $remote_version
     */
    public function getRemote_version()
    {
        $request = wp_remote_post($this->update_path, array('body' => array('action' => 'version')));
        if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
            return $request['body'];
        }
        return false;
    }
 
    /**
     * Get information about the remote version
     * @return bool|object
     */
    public function getRemote_information()
    {
        $request = wp_remote_post($this->update_path, array('body' => array('action' => 'info')));
        if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
            return unserialize($request['body']);
        }
        return false;
    }
 
    /**
     * Return the status of the plugin licensing
     * @return boolean $remote_license
     */
    public function getRemote_license()
    {
        $request = wp_remote_post($this->update_path, array('body' => array('action' => 'license')));
        if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
            return $request['body'];
        }
        return false;
    }
}