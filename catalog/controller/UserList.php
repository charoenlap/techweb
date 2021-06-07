<?php 
	class UserListController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data_select = array();
	    	if(method_post()){
	    		$data_select = array(
	    			'user_code' => post('user_code'),
	    			'username'	=> post('username'),
	    			'name'		=> post('name'),
	    			'status'	=> post('status')
	    		);
	    	}
			$data['user_code'] = post('user_code');
			$data['username'] = post('username');
			$data['name'] = post('name');
			$data['status'] = post('status');
			
	    	$data['action'] = route('UserList');
	    	$data['title'] = "UserList";
	    	$users = $this->model('select_input')->SelectUser($data_select);
	    	$data['users'] = $users;
	    	$this->view('user/UserList',$data);
	    }

	    public function del(){
			if(get('id')){
				$id = get('id');
				// echo $id;exit();
				$this->model('users')->del($id);
				redirect('UserList&result=Delete success.');
			}else{
				redirect('UserList');
			}
		}
			
		
	}

	    			?>