<?php /* To Do
	- If client on maintenance, pull in error logs
*/
# Non-dependant defines
defined('ABSPATH') OR exit;
define('WP_ROOT',	ABSPATH);
define('FM_ROOT',	plugin_dir_path(__FILE__));
define('FM_SLUG',	basename(dirname(__FILE__)));
define('FM_URL',	plugin_dir_url(__FILE__));
# Dependant defines
define('FM_BUILD',	is_file(FM_ROOT.'build.txt')?file_get_contents(FM_ROOT.'build.txt'):0);
define('FM_PATH',	FM_SLUG.'/'.FM_SLUG.'.php');
ini_set('error_log',WP_ROOT.'error_log.txt');
# Class Autoloader
spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix='Formation\\WordPress\\';
    // base directory for the namespace prefix
    $base_dir=FM_ROOT.'classes/';
    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }
    // get the relative class name
    $relative_class = substr($class, $len);
    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file=$base_dir.str_replace('\\', '/', $relative_class).'.php';
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
		return;
    }
	// project-specific namespace prefix
    $prefix='Formation\\WordPress\\Apps\\';
    // base directory for the namespace prefix
    $base_dir=FM_ROOT.'apps/';
    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }
    // get the relative class name
    $relative_class = substr($class, $len);
	$class_name=explode('\\',$class);
	$class_name=$class_name[sizeof($class_name)-1];
    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file1=$base_dir.str_replace('\\','/',$relative_class).'.php';
    $file2=$base_dir.str_replace('\\','/',$relative_class).'/'.$class_name.'.php';
    // if the file exists, require it
    if (file_exists($file1)) {
        require $file1;
    }elseif (file_exists($file2)) {
        require $file2;
    }
});
include(FM_ROOT.'functions.php');
$core=new Formation\WordPress\core();
$apps=new Formation\WordPress\apps();
if(is_admin()){
	$admin=new Formation\WordPress\admin();
}else{
	$front=new Formation\WordPress\front();
}