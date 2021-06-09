<?php 
	class settingsController extends Controller {
		public function update(){
			$data = array();
			if(method_post()){
				// $setting = $this->model('settings');
				// $cmd_git = DOCUMENT_ROOT." git add -A";
				// echo DOCUMENT_ROOT;exit();
				$msg = "cd '".DOCUMENT_ROOT."' && git add -A && git commit -m 'update' && git push";
				echo shell_exec($msg); 
				exit();
				// $this->redirect('settings/update&result=success');
			}else{
				$data['action'] = route('settings/update');
				$this->view('setting/update',$data);
			}
		}
		public function testSendEmail(){
			$to_email=email_username;
			$msg="test Email".time();
			$subject=time();
			sendmailSmtp($to_email,$msg,$subject);
		}
		public function layout() {
	    	$data = array();
	    	if(method_post()){
	    		$data_update = $_POST;
	    		$setting = $this->model('settings');
	    		$data = explode(',',$_POST['data']);

				foreach($data as $in => $val){ 
					$data2 = explode('=',$val);
						$pk[] = $data2[0];
						$data3 = explode('::',$data2[1]);
							$name[] = $data3[0];
							$top[] = $data3[1];
							$left[] = $data3[2];
							$width[] = $data3[3];
							$height[] = $data3[4];
				}
				// var_dump($top);exit();
				$re = '';
				for($i=0;$i<count($data);$i++){
					$db_pk = $pk[$i];
					$input['name'] = $name[$i];
					$input['top'] = substr($top[$i], 0, -2);
					$input['left'] = substr($left[$i], 0, -2);
					$input['width'] = substr($width[$i], 0, -2);
					$input['height'] = substr($height[$i], 0, -2);
					$input['id'] = $db_pk;
					// $input['`checked`'] = $checked[$i];
					// var_dump($input);
					$setting->saveLayout($input);
					// if($obj_db->update('m_layout',$input,'pk='.$db_pk)){ $re = 'ok '; }
					// else{ $re2 = 'no '; }
				}
				// if($re2!=''){ echo 'ERROR Function'; }
				// else{ echo 'Successful, save template for print.'; }
	    	}else{
	    		// $data['title'] = "settings";
		    	// $date = date('Y-m-d');
		    	// $data['setting'] = $this->model('settings')->settings();
		    	// // var_dump($data['setting']);exit();
		    	// $users = $this->model('select_input')->SelectUser();
		    	// $data['users'] = $users;
		    	// $data['language'] = $this->model('language')->setting_language();
		    	// $data['action'] = route('settings');
		    	$setting = $this->model('settings');
		    	$data['layout'] = $setting->getLayout()->rows;
	 	    	$this->view('setting/layout',$data);
	    	}
	    }
	    public function index() {
	    	$data = array();
	    	if(method_post()){
	    		$data_update = $_POST;
	    		$result = $this->model('settings')->save($data_update);
	    		redirect('settings&result=success');
	    	}else{
	    		$data['title'] = "settings";
		    	$date = date('Y-m-d');
		    	$data['setting'] = $this->model('settings')->settings();
		    	// var_dump($data['setting']);exit();
		    	$users = $this->model('select_input')->SelectUser();
		    	$data['users'] = $users;
		    	$data['language'] = $this->model('language')->setting_language();
		    	$data['action'] = route('settings');
	 	    	$this->view('setting/settings',$data);
	    	}
	    }
	    public function user() {
	    	$data = array();
	    	$id = (int)$this->getSession('user_id');
	    	if(method_post()){
	    		$data_update = array(
	    			'id' => $id,
	    			'email_cc' => post('email_cc')
	    		);
	    		$result = $this->model('settings')->saveUser($data_update);
	    		redirect('settings/user&result=success');
	    	}else{
	    		$data['title'] = "settings";
	    		$user = $this->model('users');
	    		$data['email_cc'] = $user->getUser($id)->row['email_cc'];
	    		// $data['email_cc'] = $user_detail['email_cc'];
		    	$date = date('Y-m-d');
		    	$data['setting'] = $this->model('settings')->settings();
		    	$users = $this->model('select_input')->SelectUser();
		    	$data['users'] = $users;
		    	$data['language'] = $this->model('language')->setting_language();
		    	$data['action'] = route('settings/user');
		    	$data['result'] = get('result');
	 	    	$this->view('setting/user',$data);
	    	}
	    	
	    }
	    public function mail_setting() {
	    	$data=array();
	    	$mail_setting = $this->model('settings')->mail_select();
	    // 	if ($mail_setting->num_rows > 0) {
	    // 		foreach ($mail_setting as $mail => $value) {
	    // 			echo $value['2'];


	    // 		}
	    // 	}else{
	    // 			echo "NO DATAA";
	    // 		}

	    // 		// var_dump($value);exit();

	    // 		$this->view('settings',$data);
	    // }

	    }
	}
?>