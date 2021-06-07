<?php 
	class UserListEditController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['title'] = "UserListEdit";
	    	$date = date('Y-m-d');
	    	// $master = $this->model('master');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
	    	
	    	$users = $this->model('select_input')->SelectUser();
	    	$data['users'] = $users;

	    	$data['id'] = $id = get('id');
	    	$result = $this->model('users')->getUser($id);
	    	$data['UserGET'] = $result->row;


	    	// $result = $this->model('users')->EditUser();
	    	// $data['action'] = route('user/UserListAdd');


	    	
	    	// $data['action'] = route('UserListEdit&id='.$id);
	    	// var_dump($result);exit();
	    	$data['action'] = route('UserListEdit/edit_user');
 	    	
 	    	$this->view('user/UserListEdit',$data);
	    }

	    public function edit_user(){
	    	$data = array();

	    	$data['id'] = $id = get('id');
	    	$result = $this->model('users')->getUser($id);
	    	$data['UserGET'] = $result->row;
	    	if(method_post()){
	    		$user_id = $this->getSession('user_id');
	    		$time = date_default_timezone_set('Asia/Bangkok');
	    		if(!empty($user_id)){
		    		$data = array(
		    			'username' => post('username'),
						'password' =>post('password'),
						'contact' => post('contact'),
						'name' => post('name'),
						'lname' => post('lname'),
						'image' => post('image'),
						'date_create' => post('date_create'),
						'date_update' => post('date_update'),
						'user_code' => post('user_code'),
						'id' => post('id'),
		    		);
		    		
		    		$this->model('users')->EditUser($data);
		    		// var_dump($data);exit();
		    		redirect('UserList');
		    		// 'UserListEdit&id='.$id.'EditSuccess'
		    		 // var_dump($data_insert);exit();
		    	}else{
		    		redirect('UserListEdit');
		    	}
	    	}else{
	    		// $data['request_name'] = $this->getSession('username');
	    		// $data['request_id'] = $this->getSession('user_id');


	    		$data['action'] = route('user/UserListEdit');
				$data['title'] = "UserListEdit";
				$date = date('Y-m-d');
			
				$this->view('user/UserListEdit',$data);
	 	    }
	    }
	}

	    			?>