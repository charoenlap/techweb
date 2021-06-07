<?php 
	class purchaseController extends Controller {
		public function purchasePrint() {
	    	$data = array();
	    	$data['title'] = "PurchaseList";
	    	// $data['date'] = $date = date('Y-m-d');
	    	$data['page'] = $page = (get('page')?get('page'):1);
	    	$department = $this->model('select_input')->SelectDepartment();
	    	$data['department'] = $department;

	    	$User = $this->model('select_input')->SelectUser();
	    	$data['User'] = $User;

	    	$Location = $this->model('select_input')->SelectLocation();
	    	$data['Location'] = $Location;
	    	$data_select = array();

			$data['txtSearch'] 	= post('txtSearch');
			$data['date'] 		= (post('date')?post('date'):date('Y-m-d'));
			$data['purchaser'] 	= post('purchaser');
			$data['branch'] 	= post('branch');
			$data['store'] 		= post('store');
			$data['status'] 	= post('status');
			$data['total_row'] = 0;
			$data['link_print'] = route('purchase/purchasePrint');
	    	if(method_post()){
	    		$limit = (($page-1)*DEFAULT_LIMIT_PAGE).','.DEFAULT_LIMIT_PAGE;
	    		$data_select = array(
	    			'txtSearch' => $data['txtSearch'],
	    			'date'		=> $data['date'],
	    			'purchaser'	=> $data['purchaser'],
	    			'branch'	=> $data['branch'],
	    			'store'		=> $data['store'],
	    			'status'	=> $data['status'],
	    			'limit'		=> $limit
	    		);
	    	}
	    	$ListPurchase = $this->model('Purchase')->ListPurchase($data_select);
	    	$data['total_row'] = (int)$ListPurchase->total_row;
	    	$data['ListPurchaseNumRows'] = $ListPurchase->num_rows;

	    	$datetime_start = time();
	    	foreach ($ListPurchase->rows as $key => $value) {
	    		$datetime_end = strtotime($value['date_create']);
				$days = (int)(($datetime_end - $datetime_start)/(60*60*24));
	    		$data['ListPurchase'][] = array(
					'id'	=> $value['id'],
					'po_no'	=> $value['po_no'],
					'date_create'	=> $value['date_create'],
					'name_sup'	=> $value['name_sup'],
					'quantity'	=> $value['quantity'],
					'name_depart'	=> $value['name_depart'],
					'location'	=> $value['location'],
					'name'	=> $value['name'],
					'lname'	=> $value['lname'],
					'status'	=> $value['status'],
					'detail'	=> $value['detail'],
					'days'	=> (int)$days * (-1)
	    		);
	    	}
	    	
	    	$data['link_form_search'] = route('purchase');
	    	$data['page_total'] = ceil($data['total_row']/DEFAULT_LIMIT_PAGE);

	    	// $master = $this->model('master');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
 	    	$this->view('purchase/PurchasePrint',$data);
	    }
	    public function index() {
	    	$data = array();
	    	$data['title'] = "PurchaseList";
	    	// $data['date'] = $date = date('Y-m-d');
	    	$data['page'] = $page = (get('page')?get('page'):1);
	    	$department = $this->model('select_input')->SelectDepartment();
	    	$data['department'] = $department;

	    	$User = $this->model('select_input')->SelectUser();
	    	$data['User'] = $User;

	    	$Location = $this->model('select_input')->SelectLocation();
	    	$data['Location'] = $Location;
	    	$data_select = array();
	    	$data['link_export'] = route('purchase/exportExcel');
			$data['txtSearch'] 	= post('txtSearch');
			$data['date'] 		= (post('date')?post('date'):date('Y-m-d'));
			$data['purchaser'] 	= post('purchaser');
			$data['branch'] 	= post('branch');
			$data['store'] 		= post('store');
			$data['status'] 	= post('status');
			$data['total_row'] = 0;
			$data['link_print'] = route('purchase/purchasePrint');
	    	if(method_post()){
	    		$limit = (($page-1)*DEFAULT_LIMIT_PAGE).','.DEFAULT_LIMIT_PAGE;
	    		$data_select = array(
	    			'txtSearch' => $data['txtSearch'],
	    			'date'		=> $data['date'],
	    			'purchaser'	=> $data['purchaser'],
	    			'branch'	=> $data['branch'],
	    			'store'		=> $data['store'],
	    			'status'	=> $data['status'],
	    			'limit'		=> $limit
	    		);
	    	}
	    	$ListPurchase = $this->model('Purchase')->ListPurchase($data_select);
	    	$data['total_row'] = (int)$ListPurchase->total_row;
	    	$data['ListPurchaseNumRows'] = $ListPurchase->num_rows;

	    	$datetime_start = time();
	    	foreach ($ListPurchase->rows as $key => $value) {
	    		$datetime_end = strtotime($value['date_create']);
				$days = (int)(($datetime_end - $datetime_start)/(60*60*24));
	    		$data['ListPurchase'][] = array(
					'id'	=> $value['id'],
					'po_no'	=> $value['po_no'],
					'date_create'	=> $value['date_create'],
					'name_sup'	=> $value['name_sup'],
					'quantity'	=> $value['quantity'],
					'name_depart'	=> $value['name_depart'],
					'location'	=> $value['location'],
					'name'	=> $value['name'],
					'lname'	=> $value['lname'],
					'status'	=> $value['status'],
					'detail'	=> $value['detail'],
					'days'	=> (int)$days * (-1)
	    		);
	    	}
	    	
	    	$data['link_form_search'] = route('purchase');
	    	$data['page_total'] = ceil($data['total_row']/DEFAULT_LIMIT_PAGE);

	    	// $master = $this->model('master');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
 	    	$this->view('purchase/PurchaseList',$data);
	    }
	    public function exportExcel() {
	    	$data = array();
	  //   	$data['title'] = "PurchaseList";
	  //   	// $data['date'] = $date = date('Y-m-d');
	  //   	$data['page'] = $page = (get('page')?get('page'):1);
	  //   	$department = $this->model('select_input')->SelectDepartment();
	  //   	$data['department'] = $department;

	  //   	$User = $this->model('select_input')->SelectUser();
	  //   	$data['User'] = $User;

	  //   	$Location = $this->model('select_input')->SelectLocation();
	  //   	$data['Location'] = $Location;
	  //   	$data_select = array();
	  //   	$data['link_export'] = route('purchase/exportExcel');
			// $data['txtSearch'] 	= post('txtSearch');
			// $data['date'] 		= (post('date')?post('date'):date('Y-m-d'));
			// $data['purchaser'] 	= post('purchaser');
			// $data['branch'] 	= post('branch');
			// $data['store'] 		= post('store');
			// $data['status'] 	= post('status');
			// $data['total_row'] = 0;
			// $data['link_print'] = route('purchase/purchasePrint');
	  //   	if(method_post()){
	  //   		$limit = (($page-1)*DEFAULT_LIMIT_PAGE).','.DEFAULT_LIMIT_PAGE;
	  //   		$data_select = array(
	  //   			'txtSearch' => $data['txtSearch'],
	  //   			'date'		=> $data['date'],
	  //   			'purchaser'	=> $data['purchaser'],
	  //   			'branch'	=> $data['branch'],
	  //   			'store'		=> $data['store'],
	  //   			'status'	=> $data['status'],
	  //   			'limit'		=> $limit
	  //   		);
	  //   	}
	    	$data = array();
	    	$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DB);
			$db->query('SET NAMES utf8');
			if (mysqli_connect_errno()) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}
			$db->set_charset("utf8");
			$db->query("SET SQL_MODE = ''");
			$order = " ORDER BY `m_ticket`.`id` DESC";
			$sql = "SELECT
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
			LEFT JOIN m_location ON m_purchase.location_id = m_location.id
			WHERE 1=1";
			$query = $db->query($sql);
			$ListPurchase = array();
			while ($row = $query->fetch_assoc()) {
				$ListPurchase[] = $row;
			}
			$i=1;
	    	// $data['total_row'] = (int)$ListPurchase->total_row;
	    	// $data['ListPurchaseNumRows'] = $ListPurchase->num_rows;

	    	$datetime_start = time();
	    	foreach ($ListPurchase as $key => $value) {
	    		$datetime_end = strtotime($value['date_create']);
				$days = (int)(($datetime_end - $datetime_start)/(60*60*24));
				if($value['status']=='0'){
					$status = 'Wait recieve';
				}elseif($value['status']=='1'){
					$status = 'Recieve';
				}elseif($value['status']=='2'){
					$status = 'Problem';
				}
				
	    		$data['ListPurchase'][] = array(
					'id'	=> $i,
					'po_no'	=> $value['po_no'],
					'date_create'	=> $value['date_create'],
					'name_sup'	=> $value['name_sup'],
					'quantity'	=> $value['quantity'],
					'name_depart'	=> $value['name_depart'],
					'location'	=> $value['location'],
					'name'	=> $value['name'],
					'lname'	=> $value['lname'],
					'status'	=> $status,
					'detail'	=> strip_tags($value['detail']),
					'days'	=> (int)$days * (-1)
	    		);
	    		$i++;
	    	}
	    	
	    	// $data['link_form_search'] = route('purchase');
	    	// $data['page_total'] = ceil($data['total_row']/DEFAULT_LIMIT_PAGE);
	    	xlsx('purchase', $data['ListPurchase']);
	    	// $master = $this->model('master');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
 	    	// $this->view('purchase/PurchaseList',$data);
	    }
	    public function add() {
	    	$data = array();
			if(method_post()){
				$user_id = $this->getSession('user_id');

				$time = date_default_timezone_set('Asia/Bangkok');
				if(!empty($user_id)){
					$data_insert = array(
						'po_no' => post('po_no'),
						'name_sup' =>post('name_sup'),
						'detail' => post('detail'),
						'quantity' => post('quantity'),
						'name_depart' => post('name_depart'),
						'location' => post('location'),
						'date_start' => post('date_start'),
						'status' => post('status'),
						'purchaser' => $user_id,
					);
					$this->model('Purchase')->addPurchase($data_insert);
					redirect('purchase&result=addSuccess');
				}else{
					redirect('login');
				}
			}else{
				$purchaser_name = $this->getSession('username');
				
				$data['purchaser'] = $purchaser_name;

				$data['action'] = route('purchase/add');
				$data['title'] = "PurchaseAdd";
				$date = date('Y-m-d');
				$department = $this->model('select_input')->SelectDepartment();
				$data['department'] = $department;
				$Location = $this->model('select_input')->SelectLocation();
				$data['Location'] = $Location;
				$this->view('purchase/PurchaseAdd',$data);
		    }
		}
		public function del(){
			if(get('id')){
				$id = get('id');
				// echo $id;exit();
				$this->model('Purchase')->del($id);
				redirect('purchase&result=Delete success.');
			}else{
				redirect('purchase');
			}
			
		}
//  public function PurchaseDetail() {
// 	    	$data = array();
// 	    	$data['id'] = $id = get('id');
// 	    	$result = $this->model('Purchase')->getPurchase($id);
// 	    	// var_dump($result);exit();
// 	    	if($result->num_rows > 0){
// 	    		if(method_post()){
// 	    			$select = array(
// 			    		$Purchase = $this->model('Purchase'),
// 			    		$id = (int)post('id'),
// 			    		$PO_Number = (int)post('po_no'),
// 			    		$supplier = (int)post('supplier_name'),
// 			    		$detail = (int)post('detail'),
// 			    		$quantity = (int)post('quantity'),
// 			    		$department_id = (int)post('department_id'),
// 			    		$date_create = (int)post('date_create'),
// 			    		$purchaser = (int)post('purchaser'),
// 			    	);
// 	    		// return $result;
// 	    			// var_dump($result);exit();
// 		    		$data['receive'] = $result->row;
// 		    		$result['action'] = route('purchase/receive&id='.$id);
// 			 	    $this->view('purchase/receive',$data);
	    	    	
	    
// 	    		// if(method_post()){

// 		    		// $Purchase = $this->model('Purchase');
// 		    		// $id = (int)post('id');
// 		    		// $PO_Number = (int)post('po_no');
// 		    		// $supplier = (int)post('supplier_name');
// 		    		// $detail = (int)post('detail');
// 		    		// $quantity = (int)post('quantity');
// 		    		// $department_id = (int)post('department_id');
// 		    		// $date_create = (int)post('date_create');
// 		    		// $purchaser = (int)post('purchaser');
// 		    // 		$data_insert = array(
// 						// 'po_no' 			=> $id,
// 						// 'user_request_id' 	=> $user_request_id,
// 						// 'detail' 			=> $detail,
// 						// 'supplier_name' 	=> $supplier,
// 						// 'quantity'			=> $quantity,
// 						// 'department_id'		=> $department_id,
// 						// 'date_create'		=> $date_create,
// 						// 'purchaser'			=> $purchaser,
// 		    // 		);
// 		  		}else{	    	
		  
// 		    		// $User = $this->model('select_input')->SelectUser();
// 		    		// $data['User'] = $User;
// 		    		// $data['username'] = $this->getSession('username');
// 		    		// $data['title'] = "receive";
// 			    	// $date = date('Y-m-d');
// 			    	// $data['receive'] = $result_purchase->row;
// 			    	// $data['sub_detail'] = $result_purchase->receive;
// 			    	// $data['action'] = route('purchase/receive&id='.$id);
// 		 	    // 	$this->view('purchase/receive',$data);
// 		 	    echo("no data");
		 	    
// 	    	}
// 	    }
// }
}
?>