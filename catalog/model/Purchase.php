<?php
	class PurchaseModel extends db {
		public function updatePurchase($data = array()){
			$id = (int)(isset($data['id'])?$data['id']:'');
			$status = (int)(isset($data['status'])?$data['status']:'');
			$sql = "UPDATE m_purchase SET `status`='".$status."' WHERE id = '".(int)$id."'";
			$result = $this->query($sql);
			return $result;
		}
		public function addReceive($data = array()){
			$arr = array(
				'purchase_id' => (isset($data['id'])?$data['id']:''),
				'recipient_id'	=> (isset($data['id'])?$data['id']:''),
				'user_id' => (isset($data['user_id'])?$data['user_id']:''),
				'department_id' => (isset($data['id_department'])?$data['id_department']:''),
				'date_create' => date('Y-m-d H:i:s'),
				'file' => (isset($data['file'])?$data['file']:''),
			);
			$this->insert('receive',$arr);
		}
		public function del($id){
			$sql = "DELETE FROM m_purchase WHERE id = '".(int)$id."'";
			// echo $sql;exit();
			$this->query($sql);
		}
		public function ListPurchase($data=array()){
			// var_dump($data);exit();
			$result = array();
			$limit 		= " LIMIT ".(isset($data['limit'])?$data['limit']:'0,'.DEFAULT_LIMIT_PAGE);
			$txtSearch 	= (!empty($data['txtSearch'])?" AND (m_purchase.detail like '%".$data['txtSearch']."%' OR m_purchase.po_no like '%".$data['txtSearch']."%') ":'');
			$date 		= (!empty($data['date_create'])?" AND m_purchase.date_create like '%".$data['date_create']."%' ":'');
			$purchaser 	= (!empty($data['purchaser'])?" AND m_purchase.`supplier_name` like '%".$data['purchaser']."%' ":'');
			$branch 	= (!empty($data['branch'])?" AND m_department.`name` like '%".$data['branch']."%' ":'');
			$store 		= (!empty($data['location'])?" AND m_location.location like '%".$data['location']."%' ":'');
			$status 	= (isset($data['status'])?" AND m_purchase.`status` = '".(int)$data['status']."' ":'');

			$where = $txtSearch.$date.$purchaser.$branch.$store.$status;
			$sql = " SELECT
				m_purchase.`supplier_name` AS name_sup,
				m_users.lname,
				m_department.`name` AS name_depart,
				m_purchase.`id` ,
				m_purchase.`status` ,
				m_location.location,
				m_purchase.po_no,
				m_purchase.date_create,
				m_purchase.detail,
				m_purchase.quantity,
				m_users.`name`
			FROM m_purchase 
			LEFT JOIN m_users ON m_purchase.purchaser = m_users.id 
			LEFT JOIN m_department ON m_purchase.department_id = m_department.id
			LEFT JOIN m_location ON m_purchase.location_id = m_location.id";
			$result = $this->query($sql." WHERE 1=1 ".$where.$limit);
			$result->total_row = $this->query($sql." WHERE 1=1 ".$where)->num_rows;
			$result->sql = $sql." WHERE 1=1 ".$where.$limit;
			// echo $result->sql;exit();
			return $result;
		}
		public function addPurchase($data=array()){
			$result = array();
			$PO_Number 			= (isset($data['po_no'])?$data['po_no']:'');
			$supplier 			= (isset($data['name_sup'])?$data['name_sup']:'');
			$detail 			= (isset($data['detail'])?$data['detail']:'');
			$quantity 			= (isset($data['quantity'])?$data['quantity']:'');
			$id_department 		= (isset($data['name_depart'])?$data['name_depart']:'');
			$location 			= (isset($data['location'])?$data['location']:'');
			$date_start 		= date("Y-m-d H:i:s");
			$purchaser			= (isset($data['purchaser'])?$data['purchaser']:'');
			$data_insert = array(
				'po_no' => $PO_Number,
				'supplier_name' => $supplier,
				'detail' => $detail,
				'quantity' => $quantity,
				'department_id' => $id_department,
				'location_id' => $location,
				'date_create' => $date_start,
				'purchaser' => $purchaser
			);
			$result = $this->insert('purchase',$data_insert);
			return $result;
		}
		public function getPurchase($id=0){
			$result = array();
			$sql = " SELECT
			m_purchase.`supplier_name` AS name_sup,
			m_users.`name`,
			m_users.lname,
			m_department.`name` AS name_depart,
			m_purchase.`id` ,
			m_location.location,
			m_purchase.po_no,
			m_purchase.date_create,
			m_purchase.detail,
			m_purchase.quantity,
			m_purchase.purchaser,
			m_receive.*
			FROM m_purchase LEFT JOIN m_users ON m_purchase.purchaser = m_users.id
			LEFT JOIN m_department ON m_purchase.department_id = m_department.id
			LEFT JOIN m_location ON m_purchase.location_id = m_location.id
			LEFT JOIN m_receive ON m_purchase.id = m_receive.purchase_id 
			WHERE m_purchase.id='".(int)$id."'";
			$result = $this->query($sql);
			$result->detail = $result->rows;
			// echo $sql_detail;
			// var_dump($result->detail);exit();
			return $result;
		} 
	}
?>