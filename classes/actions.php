<?php namespace Formation\WordPress;
class actions{
	private $actions=array(
		'init'=>array(
			'access'=>'subscriber'
		),
		'admin_menu'=>array(
			'access'=>'subscriber'
		)
	);
	public function __construct(){
		$this->load();
	}
	private function load(){
		global $user;
		if($this->actions){
			foreach($this->actions as $action=>$args){
				if($user->is_role($args['access']) && method_exists($this,'action_'.$action)){
					add_action($action,array($this,'action_'.$action));
				}
			}
		}
	}
	public function action_admin_menu(){
		$action=__FUNCTION__;
		print_pre($action);
		add_menu_page(
			'Formation Media',
			'Formation Media',
			'subscriber',
			'formation',
			array($this,'render_admin_page'),
			'https://formationmedia.co.uk/wp-content/themes/formation-2017/images/logo-icon.svg'			
		);
	}
	public function render_admin_page(){
		include(ROOT.'views/dashboard.php');
	}
}