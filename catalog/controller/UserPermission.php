<?php 
	class UserPermissionController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['title'] = "UserPermission";
	    	$date = date('Y-m-d');
	    	$users_group = $this->model('users');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
	    	
	    	// $users = $this->model('select_input')->SelectUser();
	    	// $data['users'] = $users;
	    	$data['permission_group_list'] = $users_group->permissionList();


 	    	
 	    	$this->view('user/UserPermission',$data);
	    }
	    public function userPermissionAdd(){
	    	$data = array();
	    	$data['title'] = "UserPermissionAdd";
	    	$date = date('Y-m-d');
	    	// $master = $this->model('master');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
	    	
	    	$users = $this->model('select_input')->SelectUser();
	    	$data['users'] = $users;


 	    	
 	    	$this->view('user/UserPermissionAdd',$data);
	    }
	    public function userPermissionEdit(){
	    	$group_id=(int)get('id');
	    	$data = array();
	    	if($group_id>0){
	    		$user = $this->model('users');
	    		if(method_post()){
	    			$data_insert = array(
	    				'page_id'	=> post('page_id'),
	    				'group_id' 	=> $group_id
	    			);
	    			$result = $user->savePermissionListByGroupID($data_insert);
	    			redirect('UserPermission/userPermissionEdit&id='.$group_id.'&result=success');
	    		}else{
	    			$data['result'] = get('result');
		    		$data['action'] = route('UserPermission/userPermissionEdit&id='.$group_id);
		    		$data_group_id = array('group_id'=>$group_id);
		    		$getPermissionListByGroupID = $user->getPermissionListByGroupID( $data_group_id );
		    		$data['getPermissionListByGroupID'] = array();
		    		foreach($getPermissionListByGroupID as $val){
		    			$data['getPermissionListByGroupID'][] = $val['page_id'];
		    		}
		    		$data['list_page'] = $user->pageList();
		    		$data['page'] = $user->permissionList(array('id'=>$group_id))->row;
			    	
			    	$data['title'] = "UserPermissionEdit";
			    	$date = date('Y-m-d');
			    	$data['action'] = route('UserPermission/userPermissionEdit&id='.$group_id);
			    	// $master = $this->model('master');
			    	// $data_select = array(
			    	// 	'date' => $date
			    	// );
			    	// $data['result_oil'] = $master->getOil($data_select);
		 	    	// $this->view('login',$data);
			    	
			    	// $users = $this->model('select_input')->SelectUser();
			    	// $data['users'] = $users;
		 	    	$this->view('user/UserPermissionEdit',$data);
		 	    }
	 	    }
	    }
	}
?>