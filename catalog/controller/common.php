<?php 
	class CommonController extends Controller {
	    public function header($data=array()) {
	    	// var_dump($_SESSION);exit();
	    	$send_data = array();
	    	$send_data['username'] 	 		= $this->getSession('username');
	    	$send_data['image'] 		 		= $this->getSession('image');
	    	if(empty($send_data['username'])){
	    		$route = get('route');
		    	if($route!='login'){
		    		redirect('login');
		    	}
		    }
		    $send_data['logout_link'] 					= route('login/logout');
	    	$send_data['link_home'] 	 				= route('home');
	    	// $send_data['link_purchaseList']	
	    	$send_data['page'] 	= $page 				= get('route');
	    	$send_data['link_th']						= route($send_data['page'].'&lang=th');
	    	$send_data['link_en']						= route($send_data['page'].'&lang=en');

	    	$group_id = (int)$this->getSession('group_id');
	    	$user = $this->model('users');
	    	$permission = $user->getPermissionListByGroupID(array('group_id'=> $group_id));

	    	foreach($permission as $val){
	    		$send_data['menu_permission'][] = $val['name'];
	    	}
	    	$send_data['menu_petition']	 				= $data['lang']['extra']['menu_petition'];
	    	$send_data['menu_petition_own']	 			= $data['lang']['extra']['menu_petition_own'];
			$send_data['menu_petition_create']			= $data['lang']['extra']['menu_petition_create'];
			$send_data['menu_petition_list']			= $data['lang']['extra']['menu_petition_list'];
			$send_data['menu_receive_purchase'] 		= $data['lang']['extra']['menu_receive_purchase'];
			$send_data['menu_receive_purchase_list'] 	= $data['lang']['extra']['menu_receive_purchase_list'];
			$send_data['menu_receive_purchase_create'] 	= $data['lang']['extra']['menu_receive_purchase_create'];
			$send_data['menu_user'] 					= $data['lang']['extra']['menu_user'];
			$send_data['menu_user_list'] 				= $data['lang']['extra']['menu_user_list'];
			$send_data['menu_user_create'] 				= $data['lang']['extra']['menu_user_create'];
			$send_data['menu_user_permission'] 			= $data['lang']['extra']['menu_user_permission'];
			$send_data['menu_setting'] 					= $data['lang']['extra']['menu_setting'];
			$send_data['menu_setting_system'] 			= $data['lang']['extra']['menu_setting_system'];
			$send_data['menu_setting_user'] 			= $data['lang']['extra']['menu_setting_user'];
			$send_data['menu_setting_layout'] 			= $data['lang']['extra']['menu_setting_layout'];
	    	$this->render('common/header',$send_data);
	    }
	    public function footer($data=array()){
	    	$this->render('common/footer',$data);
	    }
	}
?>