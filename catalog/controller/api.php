<?php 
	class ApiController extends Controller {
	    public function updateReceptStatus() {
	    	if(method_post()){
		    	$purchase = $this->model('purchase');
		    	$data_update = array(
		    		'status' => post('value'), 
					'id' => post('id'), 
		    	);
		    	$result = $purchase->updatePurchase($data_update);
		    	echo json_encode($result);exit();
		    }
	    }
	}
?>