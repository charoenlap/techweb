<?php 
	class UserListAddController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['title'] = "UserListAdd";
	    	$date = date('Y-m-d');
	    	// $master = $this->model('master');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
	    	
	    	$users = $this->model('select_input')->SelectUser();
	    	$data['users'] = $users;
	    	$data['action'] = route('UserListAdd/add_user');


 	    	
 	    	$this->view('user/UserListAdd',$data);
	    }
 			public function add_user(){
	    	$data = array();
	    	if(method_post()){
	    		$user_id = $this->getSession('user_id');
	    		$time = date_default_timezone_set('Asia/Bangkok');
	    		if(!empty($user_id)){
		    		$data_insert = array(
		    			'username' => post('username'),
						'password' =>post('password'),
						'contact' => post('contact'),
						'name' => post('name'),
						'lname' => post('lname'),
						'image' => post('image'),
						'date_update' => post('date_update'),
						'user_code' => post('user_code'),

						
		    		);
		    		
		    		$this->model('users')->addUser($data_insert);
		    		redirect('UserList&result=addSuccess');
		    		 
		    	}else{
		    		redirect('login');
		    	}
	    	}else{
	    		$data['request_name'] = $this->getSession('username');
	    		$data['request_id'] = $this->getSession('user_id');


	    		$data['action'] = route('user/UserListAdd');
				$data['title'] = "UserListAdd";
				$date = date('Y-m-d');
				// $department = $this->model('select_input')->SelectDepartment();
				// $data['department'] = $department;
				// $Location = $this->model('select_input')->SelectLocation();
				// $data['Location'] = $Location;
				$this->view('user/UserListAdd',$data);


	    		$data['action_user'] = route('user/UserListAdd');
		    	$data['title'] = "UserListAdd";
		    	$date = date('Y-m-d');
	 	    	$this->view('user/UserListAdd',$data);
	 	    }
	    }
	}

	    			?>