<?php
	$base = str_replace('required', '', __DIR__);
	// System config 
	// exit();
    define('DEFAULT_LANGUAGE',$language_name);
	define('DEFAULT_LIMIT_PAGE','10');

	define('DEFAULT_PAGE','home');
	define('WEB_NAME','Tech Web');
	define('DB','mysqli');
	if($_SERVER['HTTP_HOST']=="localhost"){
		define('MURL','http://localhost/techweb/');
		define('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT'].'/techweb/');
		// Config DB localhost
		define('PREFIX', 'm_');
		define('DB_HOST','localhost');
		define('DB_USER','root');
		define('DB_PASS','root');
		define('DB_DB','fsoftpro_techweb');
	}else{
		define('MURL','https://www.fsoftpro.com/project/techweb/dev/');
		define('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT'].'/project/techweb/dev/');
		define('PREFIX', 'm_');
		define('DB_HOST','localhost');
		define('DB_USER','fsoftpro_techweb');
		define('DB_PASS','cou2gb50i2');
		define('DB_DB','fsoftpro_techweb');
	}
	define('IMAGE_PHOTO',MURL.'uploads/photo/');
	define('NO_PHOTO',MURL.'uploads/no_photo.jpg');
	

	define('email_username','info.test.michelin@gmail.com');
	define('email_password','michelinTest1234');
	define('email_host','smtp.gmail.com');
	define('email_port','465');
	define('email_send','info.test.michelin@gmail.com');
	define('email_stmpsecure','ssl');

	// define('email_username','info@miss-bangkok.com');
	// define('email_password','bangkok1000');
	// define('email_host','sv5263.xserver.jp');
	// define('email_port','25');
	// define('email_send','info@miss-bangkok.com');
	// define('email_stmpsecure','TLS');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require DOCUMENT_ROOT.'/system/lib/PHPMailer-master-7/src/Exception.php';
	require DOCUMENT_ROOT.'/system/lib/PHPMailer-master-7/src/PHPMailer.php';
	require DOCUMENT_ROOT.'/system/lib/PHPMailer-master-7/src/SMTP.php';
	global	$mail ;
	$mail = new PHPMailer(true); //New instance, with exceptions enabled
?>