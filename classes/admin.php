<?php namespace Formation\WordPress;
class admin{
	private $update_host='formation.software';
	private $update_url;
	public function __construct(){
		require_once(FM_ROOT.'libraries/wp_autoupdate.php');
		add_action('admin_menu',array($this,'action_admin_menu'));
		add_action('init',		array($this,'snb_activate_au'));
	}
	# CSS
	public function admin_styles(){
		wp_enqueue_style('admin-css',FM_URL.'/css/admin.css');
	}
	# Menu
	public function action_admin_menu(){
		$pages[]=add_menu_page(
			'Formation Media',
			'Formation Media',
			'administrator',
			'formation',
			array($this,'render_dashboard'),
			'https://formationmedia.co.uk/wp-content/themes/formation-2017/images/logo-icon.svg',
			3
		);
		$pages[]=add_submenu_page(
			'formation',
			'Formation Settings',
			'Settings',
			'administrator',
			'formation-settings',
			array($this,'render_settings')
		);
		foreach($pages as $page){
			add_action('admin_print_styles-'.$page,array($this,'admin_styles'));
		}
	}
	public function render_dashboard(){
		$this->get_view();
	}
	public function render_settings(){
		$this->get_view();
	}
	private function get_view(){
		global $core,$plugins,$admin;
		$trace=debug_backtrace();
		$class=explode('\\',$trace[0]['class']);
		$file=$trace[1]['function'];
		$file=FM_ROOT.'views/'.$class[sizeof($class)-1].'/'.substr($file,7).'.php';
		if(is_file($file)){
			include($file);
		}
	}
	# Update
	public function snb_activate_au(){
		new \wp_autoupdate();
	}
}