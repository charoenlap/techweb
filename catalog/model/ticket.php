<?php 
	class TicketModel extends db {
		public function listTicket($data=array()){
			$result = array();
			$limit = (isset($data['limit'])?$data['limit']:'0,'.DEFAULT_LIMIT_PAGE);
			$detail = (!empty($data['detail'])?" AND m_ticket.detail like '%".$data['detail']."%' ":'');
			$type = (!empty($data['type'])?" AND m_type.id = '".$data['type']."' ":'');
			$status = (!empty($data['status'])?" AND m_ticket.`status` = '".$data['status']."' ":'');
			$owner_id = (isset($data['owner_id'])?" AND m_ticket.user_request_id = '".(int)$data['owner_id']."'":'');
			$date_start = (isset($data['date_start'])?" AND (m_ticket.date_start BETWEEN '".$data['date_start']."' AND '".$data['date_end']."')":'');
			$where = $detail.$type.$status.$owner_id.$date_start;
			// $order = " ORDER BY m_ticket.date_start DESC";
			$order = " ORDER BY `m_ticket`.`id` DESC";
			$sql = "SELECT
				m_type.`name`,
				m_type.`id` AS type_id,
				m_ticket.id,
				m_ticket.detail,
				m_users_receive.`name` AS receive_name,
				m_users_receive.lname AS receive_lname,
				m_users_request.`name` AS request_name,
				m_users_request.lname AS request_lname,
				m_users_request.id AS user_id,
				m_ticket.`status`,
				m_ticket.date_update,
				m_ticket.date_start,
				m_ticket.date_end,
				m_ticket.files
			FROM
			m_ticket
				LEFT JOIN m_type ON m_ticket.type_id = m_type.id 
				LEFT JOIN m_users m_users_request ON m_ticket.user_request_id = m_users_request.id 
				LEFT JOIN m_users m_users_receive ON m_ticket.user_receive_id = m_users_receive.id
			WHERE 1=1";
			// echo $sql.$where.$order." LIMIT ".$limit;exit();
			$result = $this->query($sql.$where.$order." LIMIT ".$limit); 
			$result->total_row = $this->query($sql.$where.$order)->num_rows;

			return $result;
		} 
		public function addTicket($data=array()){
			$result = array();
			$type_id 			= (isset($data['type_id'])?$data['type_id']:'');
			$user_request_id 	= (isset($data['user_request_id'])?$data['user_request_id']:'');
			$detail 			= (isset($data['detail'])?$data['detail']:'');
			$user_receive_id 	= (isset($data['user_receive_id'])?$data['user_receive_id']:'');
			$files 				= (isset($data['files'])?$data['files']:'');
			$date_start 		= date("Y-m-d H:i:s");
			$date_end			= (isset($data['date_end'])?$data['date_end']:'');
			$status				= '0';

			$data_insert = array(
				'type_id' 			=> (int)$type_id,
				'user_request_id' 	=> (int)$user_request_id,
				'detail' 			=> $this->escape(trim($detail)),
				'user_receive_id' 	=> (int)$user_receive_id,
				'date_start' 		=> $date_start,
				'status'			=> (int)$status,
				'date_end'			=> $date_end
			);
			if(!empty($files)){
				$data_insert['files'] = $files;
			}
			$result_add = $this->insert('ticket',$data_insert); 
			$result = array(
				'ticket_id' => $result_add,
				'user_request_id' => $user_request_id,
				'user_receive_id' => $user_receive_id,
				'detail' => $detail,
				'date_start' => $date_start,
				'date_end' => $date_end
			);
			return $result;
		} 
		public function addTicketDetail($data=array()){
			$result = array();
			$job_id 			= (isset($data['job_id'])?$data['job_id']:'');
			$user_request_id 	= (isset($data['user_request_id'])?$data['user_request_id']:'');
			$detail 			= (isset($data['detail'])?$data['detail']:'');
			$user_receive_id 	= (isset($data['user_receive_id'])?$data['user_receive_id']:'');
			$files 				= (isset($data['files'])?$data['files']:'');
			$date_create 		= date("Y-m-d H:i:s");
			$status_job			= (isset($data['status_job'])?$data['status_job']:'');

			$data_insert = array(
				'job_id' 			=> (int)$job_id,
				'user_request_id' 	=> (int)$user_request_id,
				'detail' 			=> $this->escape($detail),
				'user_receive_id' 	=> (int)$user_receive_id,
				'date_create' 		=> $date_create,
			);
			if(!empty($files)){
				$data_insert['files'] = $files;
			}
			$result = $this->insert('ticket_detail',$data_insert); 
			if($status_job!=''){
				$str_set = '';
				if($status_job==1){ // end job
					$str_set = " AND `date_end`='".date('Y-m-d H:i:s')."'";
				}
				$sql_update = "UPDATE m_ticket SET `status` = '".(int)$status_job."' ".$str_set." WHERE id='".(int)$job_id."'";
				$this->query($sql_update);
			}
			$sql_update = "UPDATE m_ticket SET `date_update` = '".date('Y-m-d H:i:s')."' WHERE id='".(int)$job_id."'";
			$this->query($sql_update);

			$result = array(
				'ticket_id' => (int)$job_id,
				'user_request_id' => $user_request_id,
				'user_receive_id' => $user_receive_id,
				'detail' => $detail,
				'date_start' => $date_create
			);
			return $result;
		}
		public function getTicket($id=0){
			$result = array();
			$sql = "SELECT
				m_type.`name`,
				m_type.`id` AS type_id,
				m_ticket.id,
				m_ticket.detail,
				m_ticket.files,
				m_users_receive.`name` AS receive_name,
				m_users_receive.lname AS receive_lname,

				m_users_request.`name` AS request_name,
				m_users_request.lname AS request_lname,
				m_users_request.id AS user_id,
				m_ticket.`status`,
				m_ticket.date_update,
				m_ticket.date_start,
				m_ticket.date_end
			FROM
			m_ticket
				LEFT JOIN m_type ON m_ticket.type_id = m_type.id 
				LEFT JOIN m_users AS m_users_request ON m_ticket.user_request_id = m_users_request.id 
				LEFT JOIN m_users AS m_users_receive ON m_ticket.user_receive_id = m_users_receive.id
			WHERE m_ticket.id='".(int)$id."' LIMIT 1";
			$result = $this->query($sql); 

			$sql_detail = "SELECT
				m_ticket_detail.id,
				m_ticket_detail.detail,
				m_users_receive.`name` AS receive_name,
				m_users_receive.lname AS receive_lname,

				m_users_request.`name` AS request_name,
				m_users_request.lname AS request_lname,
				m_users_request.id AS user_id,
				m_ticket_detail.date_create,
				m_ticket_detail.files AS files
			FROM
			m_ticket_detail
				LEFT JOIN m_users AS m_users_request ON m_ticket_detail.user_request_id = m_users_request.id 
				LEFT JOIN m_users AS m_users_receive ON m_ticket_detail.user_receive_id = m_users_receive.id
			WHERE m_ticket_detail.job_id='".(int)$id."'";
			$result_detail = $this->query($sql_detail); 
			$result->detail = $result_detail->rows;
			// echo $sql_detail;
			// var_dump($result->detail);exit();
			return $result;
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