<?php 
	class SettingsModel extends db {
		public function getLayout($data=array()){
			$sql = "SELECT * FROM m_layout";
			$result = $this->query($sql);
			return $result;
		}
		public function saveLayout($data=array()){
			$result = array();
			$id = (isset($data['id'])?$data['id']:0);
			if($id){
				$sql = "UPDATE m_layout SET 
				`name` = '".$data['name']."',
				`l_top` = '".(float)$data['top']."',
				`l_left` = '".(float)$data['left']."',
				`l_width` = '".(float)$data['width']."',
				`l_height` = '".(float)$data['height']."'
				 WHERE `id` = '".(int)$id."'";
				 // echo $sql;exit();
				$result = $this->query($sql);
			}
			return $result;
		}
		public function saveUser($data=array()){
			$result = array();
			$email_cc = (isset($data['email_cc'])?$data['email_cc']:'');
			$id = (int)(isset($data['id'])?$data['id']:'');
			$sql = "UPDATE m_users SET `email_cc` = '".$email_cc."' WHERE `id` = '".$id."'";
			$result = $this->query($sql);
			return $result;
		}
		public function settings(){
			$return=array();
			$result = array();
			$sql = "SELECT * FROM m_settings";
			$return = $this->query($sql);
			foreach ($return->rows as $key => $value) {
				$result[$value['key']] = $value['value'];
			}
			return $result;

		}
		public function save($data = array()){
			$result = array();
			if(!empty($data)){
				$this->query('truncate m_settings');
				foreach($data as $key => $val){
					$data_insert = array(
						'key' => $key,
						'value'	=> $val
					);
					// var_dump($data_insert);exit();
					$this->insert('settings',$data_insert);
					// -- $this->query("INSERT INTO m_settings(`key`,`value`) VALUES('".$key."','".$val."');");]
					// var_dump($key);exit();
				}
			}
			// exit();
			return $result;
		}
	
	}
?>