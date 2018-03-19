<?php namespace Formation\WordPress;
class core{
	private $allowed_apps;
	private $apps;
	private $version;
	public function __construct(){
		add_action('formation_cron',			array($this,'cron'));
		add_action('upgrader_process_complete',	array($this,'wp_upgrade_completed'),10,2);
		register_activation_hook( __FILE__,		array($this,'activate'));
		register_deactivation_hook( __FILE__,	array($this,'deactivate'));		
		$this->load_apps();
	}
	public function activate(){
		if($timestamp = wp_next_scheduled('formation_cron')){
			wp_unschedule_event($timestamp, 'formation_cron');
		}
	}
	public function allowed_apps(){
		#if(!$this->allowed_apps){
			$allowed=get_option('FM_allowed_apps');
			if(is_dir(FM_ROOT.'apps')){
				foreach(scandir(FM_ROOT.'apps') as $item){
					if(strpos($item,'.')!==0){
						if(is_file(FM_ROOT.'apps/'.$item)){
							$item=basename($item,'.php');
						}
						$this->apps[]=$item;
						#if(is_array($allowed) && in_array($item,$allowed)){
							$this->allowed_apps[]=$item;
						#}
					}
				}
			}
		#}
		return $this->allowed_apps;
	}
	public function apps(){
		return $this->apps;
	}
	public function cron(){
		global $plugins;
		$this->scan_errors(WP_ROOT);
		if($active=$plugins->get_active()){
			foreach($active as $plugin){
				if(method_exists(${$plugin['slug']},'cron')){
					${$plugin['slug']}->cron();
				}
			}
		}
	}
	public function deactivate(){
		if(!wp_next_scheduled('formation_cron')){
			wp_schedule_event(time(),'hourly','formation_cron');
		}
	}
	public function load_apps(){
		if($allowed_apps=$this->allowed_apps()){
			foreach($allowed_apps as $app){
				$ns='\Formation\WordPress\Apps\\'.$app;
				$GLOBALS['FM_APP_'.$app]=new $ns;
			}
		}
	}
	public function scan_errors($dir,$level=0){
		global $db,$error_files;
		if(is_dir($dir)){
			foreach(scandir($dir) as $file){
				if(!in_array($file,array('.','..'))){
					if(is_file($dir.$file) && strpos($dir.$file,'error_log')!==false){
						$handle = fopen($dir.$file, "r");
						$lines=0;
						while(!feof($handle)){
							$line=trim(fgets($handle));
							if($line && strpos($line,'/init.php on line 2')===false){
								if(strpos($line,'[')===0){
									$date=date('Y-m-d H:i:s',strtotime(substr($line,1,strpos($line,']')-1)));
									$line=substr($line,strpos($line,']')+2);
								}
								file_put_contents(WP_ROOT.'processed_logs.txt',array(
									'title'=>'Error Log',
									'message'=>$dir.$file,
									'data'=>trim($line),
									'date'=>$date
								),FILE_APPEND);
							}
							$lines++;
						}
						if($lines>0){
							$error_files++;
						}
						fclose($handle);
						unlink($dir.$file);
					}elseif(is_dir($dir.$file)){
						scan_errors($dir.$file.'/',$level++);
					}
				}
			}
		}
	}
	public function wp_upgrade_completed($upgrader_object, $options){
		$settings=array(
			'allowed_apps'	=>[],
			'maintenance'	=>0
		);
		if($options['action'] == 'update' && $options['type'] == 'plugin' ){
		   foreach($options['plugins'] as $each_plugin){
			  if($each_plugin==FM_PATH){
				  foreach($settings as $key=>$value){
					  add_option('FM_'.$key,$value);
				  }
			  }
		   }
		}
	}
}