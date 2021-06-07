<?php 
	ini_set('post_max_size', '64M');
	ini_set('upload_max_filesize', '64M');
	// phpinfo();exit();
	header('Access-Control-Allow-Origin: *');  
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('Asia/Bangkok');
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 'ON');

	if(isset($_GET['lang'])){
        $language_name = $_GET['lang'];
        $_SESSION['language_name'] = $language_name;
    }else{
    	if(isset($_SESSION['language_name'])){
	    	$language_name = $_SESSION['language_name'];
	    }else{
	    	$language_name = 'th';
	    }
    }

	require_once('required/config.php'); 
	require_once('required/main_function.php');
	require_once('catalog/setup.php'); 
	require_once('system/loader/autoload.php'); 
	// $route = array(
	// 	'login'
	// );
	// if(get('route')==''){
	// 	$_GET['route'] = 'login';
	// }
	// if(!in_array(get('route'), $route)){
	// 	require_once("view/inc/header.php");
	// 	require_once("view/inc/script.php");
	// }
	// if(get('route')){ 
	// 	if(get('route')==$landingpage){
	// 		$keyword = "";
	// 		require_once("view/".$landingpage.".php");
	// 	}elseif(get('route')=="index.html"){
	// 		header('location: index.php?r='.$landingpage);
	// 		require_once("view/".$landingpage.".php");
	// 	}elseif(file_exists("view/".get('route').".php")){
	// 		require_once("view/".get('route').".php");
	// 	}elseif(get('route')==$backoffice."/index.html"){
	// 		header('location: '.$backoffice.'/index.php');
	// 	}else{
	// 		// $result = $obj_db->getdata('seo',"seo='".get('route')."'");
	// 		// if($result->num_rows >0){
	// 		// 	require_once("view/".$result->row['rewrite'].".php");
	// 		// }else{
	// 		// 	header('location:'.url('index.php?r=404&'.get('route')));
	// 		// }
	// 	}
	// }else{
	// 	require_once("view/".$landingpage.".php");
	// }
	// if(!in_array(get('route'), $route)){
	// 	require_once("view/inc/footer.php");
	// }
	
?>