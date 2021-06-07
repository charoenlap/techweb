<?php 
	class LoginController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['title'] = "Login";
	    	$date = date('Y-m-d');
	    	if(method_post()){
		    	$users = $this->model('users');
		    	$data_select = array(
		    		'username' => post('username'),
		    		'password' => post('password')
		    	);
		    	$result_login = $users->login($data_select);
		    	if($result_login->num_rows > 0){
		    		$this->setSession('user_id',$result_login->row['id']);
		    		$this->setSession('group_id',$result_login->row['group_id']);
		    		$this->setSession('username',$result_login->row['username']);
		    		$this->setSession('user_code',$result_login->row['user_code']);
		    		$this->setSession('image',$result_login->row['image']);
		    		$this->setSession('email_cc',$result_login->row['email_cc']);
		    		redirect('home');
		    	}else{
		    		$this->redirect('login&result=Login fail. Please check your Username or password');
		    	}
		    }else{
		    	$username 	= $this->getSession('username');
		    	if(!empty($username)){
			    	redirect('home');
			    }else{
			    	$data['action'] = route('login');
			    	$data['result'] = get('result');
			    	$this->view('login',$data);
			    }
		    }
	    }
	    public function logout(){
	    	$this->setSession('user_id','');
    		$this->setSession('username','');
    		$this->setSession('user_code','');
    		$this->setSession('image','');
    		redirect('login');
	    }
	}
?>