<?php namespace Formation\WordPress;
class core{
	private $version;
	public function __construct(){
		add_action('formation_cron',						array($this,'cron'));
		register_activation_hook( __FILE__,					array($this,'activate'));
		register_deactivation_hook( __FILE__,				array($this,'deactivate'));
	}
	public function activate(){
		if($timestamp = wp_next_scheduled('formation_cron')){
			wp_unschedule_event($timestamp, 'formation_cron');
		}
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
}