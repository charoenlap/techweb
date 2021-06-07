<?php 
	require_once DOCUMENT_ROOT.'system/lib/autoload.php';
	

	class ReceiveController extends Controller {
	    public function index() {
	    	if(method_post()){
	    		$user_id = $this->getSession('user_id');
	    		$id = post('id');
	    		$data_insert = array(
					'id' 			=> post('id'),
					'recipient' 	=> post('recipient'),
					'id_department' => post('id_department'),
					'user_id'		=> $user_id
	    		);
	    		if(isset($_FILES['file'])){
    				if(!empty($_FILES['file']['name'])){
    					$path = DOCUMENT_ROOT.'uploads/receive/';
    					$name = time().$_FILES['file']['name'];
    					upload('file',$path,$name);
    					$data_insert['file'] = $name;
    				}
    			}
	    		$result = $this->model('Purchase')->addReceive($data_insert);
	    		// echo "test";
	    		// exit();
	    		redirect('receive&result=success&id='.$id);
	    	}else{
	    		

				$data = array();
				$data['action'] = route('receive');
				$data['title'] = "Receive";
				$date = date('Y-m-d');
				$month = date('m');
				$day = date('d');
				$year = date('Y');
				$today = $year . '-' . $month . '-' . $day;
		    	$department = $this->model('select_input')->SelectDepartment();
				$data['department'] = $department;
				$purchaser_name = $this->getSession('username');
				$User = $this->model('select_input')->SelectUser();
	    		$data['User'] = $User;
				$data['purchaser'] = $purchaser_name;

		    	
		    	$data['id'] = $id = get('id');
		    	$result = $this->model('Purchase')->getPurchase($id);
		    	// var_dump($result);exit();
		    	if($result->num_rows > 0){
		    		$code = $id;
		    		$setting = $this->model('settings');
		    		$data['layout'] = $setting->getLayout()->rows;
					$generator = new Picqer\Barcode\BarcodeGeneratorSVG();
	        		$data['barcode_img'] = $generator->getBarcode($code, $generator::TYPE_CODE_128);
					$data['barcode_code'] = $code;
		    		
			    	$data['receive'] = $result->row;
			    	// $data['action'] = route('purchase/receive&id='.$id);
				 	$this->view('purchase/receive',$data);
				}else{
				 	echo("no data");
			 	    
		    	}
		    }
	    }


	    public function addReceive() {
	    	$data = array();
			if(method_post()){
				$user_id = $this->getSession('user_id');
				$purchase_id = (int)post('purchase_id');
				$name_depart = $this->getSession('name_depart');
				$time = date_default_timezone_set('Asia/Bangkok');
				if(!empty($user_id)){
					$data_insert = array(
						'purchase_id' => post('id'),
						'name_depart' => $name_depart,
						'$user_id' => $user_id,
						'date_create' => post('date_create'),
						'status' => post('status'),
						
					);
					$this->model('Purchase')->addPurchase($data_insert);
					redirect('purchase&result=addSuccess');
				}else{
					redirect('login');
				}
			}else{
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
	}
 	
	    
	    	
	    	
	    	// echo "test";exit();
	    	// $master = $this->model('master');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
 	   
	
	
	    			?>