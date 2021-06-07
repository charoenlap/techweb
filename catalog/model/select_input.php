<?php 
	/**
	 * 
	 */
	class Select_inputModel extends db { 
		public function SelectDepartment($data=array()){
			$result = array();
			$name = $this->escape((isset($data['name'])?$data['name']:''));
			$sql = "SELECT 	name AS name_department,
						 	id AS id_department
					FROM ".PREFIX."department";
			$result = $this->query($sql);
			return $result;
		}
		public function SelectType($date=array()){
			$result = array();
			$name = $this->escape((isset($data['name'])?$data['name']:''));
			$sql = "SELECT name AS name_type,
						id AS type_id FROM ".PREFIX."type";
			$result = $this->query($sql);
			return $result;
		}
		public function SelectUser($data=array()){
			$result = array();
			$name = (isset($data['name'])?" AND (m_users.name like '%".$data['name']."%') OR (m_users.lname like '%".$data['name']."%')":'');
			$user_code = (isset($data['user_code'])?" AND user_code like '%".$data['user_code']."%'":'');
			$username = (isset($data['username'])?" AND username like '%".$data['username']."%'":'');
			$status = (isset($data['status'])?" AND `status` like '%".$data['status']."%'":'');
			$where = $name.$user_code.$username.$status;

			$sql = "SELECT *,id AS user_id FROM ".PREFIX."users WHERE 1=1 ".$where;
			$result = $this->query($sql);
			return $result;
		}
		public function SelectLocation($date=array()){
			$result = array();
			$name = $this->escape((isset($data['name'])?$data['name']:''));
			$sql = "SELECT * FROM ".PREFIX."location";
			$result = $this->query($sql);
			return $result;
		}
		



	}
?>