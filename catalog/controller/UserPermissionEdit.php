<?php 
	class UserPermissionEditController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['title'] = "UserPermissionEdit";
	    	$date = date('Y-m-d');
	    	// $master = $this->model('master');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
	    	
	    	$users = $this->model('select_input')->SelectUser();
	    	$data['users'] = $users;


 	    	
 	    	$this->view('user/UserPermissionEdit',$data);
	    }
	}

	    			?>