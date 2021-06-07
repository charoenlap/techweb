<?php 
	class UsersModel extends db {

		public function pageList($data=array()){
			$result = array();
			$sql = "SELECT * FROM ".PREFIX."pages";
			$result = $this->query($sql);
			return $result;
		}
		public function getPermissionListByGroupID($data=array()){
			$group_id = (isset($data['group_id'])?" AND group_id = '".(int)$data['group_id']."'":'');
			$where = " WHERE 1=1 ".$group_id;
			$sql = "SELECT * FROM ".PREFIX."users_permission LEFT JOIN ".PREFIX."pages ON ".PREFIX."pages.id= ".PREFIX."users_permission.page_id ".$where;
			$result = $this->query($sql)->rows;
			return $result;
		}
		public function savePermissionListByGroupID($data=array()){
			// var_dump($data);exit();
			$group_id = (int)(isset($data['group_id'])?$data['group_id']:'');
			$page_id = (isset($data['page_id'])?$data['page_id']:array());
			if($group_id){
				$where = " WHERE group_id = '".$group_id."'";
				$sql = "DELETE FROM ".PREFIX."users_permission ".$where;
				$result = $this->query($sql);
				if($page_id){
					foreach($page_id as $val){
						$data_insert = array(
							'group_id' => $group_id,
							'page_id' => $val
						);
						$result_insert = $this->insert('users_permission',$data_insert);
					}
				}
				$where = " WHERE 1=1 AND ".$group_id;
				$sql = "SELECT * FROM ".PREFIX."users_permission ".$where;
				$result = $this->query($sql)->rows;
			}
			return $result;
		}
		public function permissionList($data=array()){
			$result = array();
			$id = (int)(isset($data['id'])?$data['id']:0);
			$where = ($id>0?' WHERE `id` = '.$id:'');

			$sql = "SELECT * FROM ".PREFIX."users_group ".$where;
			$result = $this->query($sql);
			return $result;
		}
		public function login($data=array()){
			$result = array();
			$username = $this->escape((isset($data['username'])?$data['username']:''));
			$password = $this->escape((isset($data['password'])?$data['password']:''));
			$sql = "SELECT * FROM ".PREFIX."users WHERE username = '".$username."' AND password = '".md5($password)."' LIMIT 0,1";
			$result = $this->query($sql);
			return $result;
		}
		
		
			public function addUser($data=array()){
			$time = date_default_timezone_set('Asia/Bangkok');
			$result = array();
						$username 			= (isset($data['username' ])?$data['username' ]:'');
						$password 			= (isset($data['password'])?$data['password']:'');
						$contact  			= (isset($data['contact'])?$data['contact']:'');
						$name 				= (isset($data['name'])?$data['name']:'');
						$lname 				= (isset($data['lname'])?$data['lname']:'');
						// $date_create		= date("Y-m-d H:i:s");
						$user_code			= (isset($data['user_code'])?$data['user_code']:'');
						$date_update		= date("Y-m-d H:i:s");
					// 	$location 			= (isset($data['location'])?$data['location']:'');
					// $date_start 		= date("Y-m-d H:i:s");
					// 	$purchaser			= (isset($data['purchaser'])?$data['purchaser']:'');
			
			$data_insert = array(
				'username' => $username,
				'password' => $password,
				'contact' => $contact,
				'name' => $name,
				'lname' => $lname,
				'date_update' => $date_update,
				'user_code' => $user_code
				);

			$result = $this->insert('users',$data_insert);
			
			return $result;



		}


		public function getUser($id=0){
			$result = array();
			$sql = " SELECT * FROM m_users WHERE id='".(int)$id."'";
			$result = $this->query($sql);
			$result->detail = $result->rows;
			// echo $sql_detail;
			// var_dump($result->detail);exit();
			return $result;
		} 
	
		public function EditUser($data=array()){
			
	
			$result = array();
						$username 			= (isset($data['username' ])?$data['username' ]:'');
						$password 			= (isset($data['password'])?$data['password']:'');
						$contact  			= (isset($data['contact'])?$data['contact']:'');
						$name 				= (isset($data['name'])?$data['name']:'');
						$lname 				= (isset($data['lname'])?$data['lname']:'');
						// $date_create		= date("Y-m-d H:i:s");
						$user_code			= (isset($data['user_code'])?$data['user_code']:'');
						$id 				= (isset($data['id'])?$data['id']:'');
						$date_update		= date("Y-m-d H:i:s");
					


						$data = array(
						'username' 		=> $username,
						'password' 		=> $password,
						'contact' 		=> $contact,
						'name' 			=> $name,
						'lname' 		=> $lname,
						'user_code' 	=> $user_code,
						'date_update'	=> $date_update,
						// 'id'			=> $id,
						
					);


			$sql_update = " UPDATE m_users SET user_code= '".$user_code."' , username = '".$username."' , name= '".$name."' , lname = '".$lname."' , contact = '".$contact."' , password = '".$password."' , date_update = '".$date_update."'  WHERE id = '".$id."' ";
			
			$this->query($sql_update);
			
			
			return $result;
		}

		public function del($id){
			$sql = "DELETE FROM m_users WHERE id = '".(int)$id."'";
			// echo $sql;exit();
			$this->query($sql);
		}



		
		// public function InsertOil($data=array()){
		// 	$result = array();
		// 	$data_date = array(
		// 		'update_date' => $data['update_date'],
  //         	  	'remark'      => $data['remark']
		// 	);
		// 	$result_date = $this->insert('date',$data_date);
		// 	foreach($data['items'] as $val){
		// 		$data_detail = array(
		// 			'id_oil'	=> $result_date,
		// 			'name'     	=> $val['name'],
	 //            	'today'    	=> $val['today'],
	 //            	'tomorrow' 	=> $val['tomorrow'],
	 //             	'yesterday' => $val['yesterday'],
	 //            	'unit_th'  	=> $val['unit_th']
		// 		);
		// 		$result_detail = $this->insert('detail',$data_detail);
		// 	}
		// 	return $result;
		// }
	}
?>