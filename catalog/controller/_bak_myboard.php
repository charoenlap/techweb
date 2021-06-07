<?php 
	class MyBoardController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['title'] = "MyBoard";
	    	$date = date('Y-m-d');
	    	// $master = $this->model('master');
	    	// $data_select = array(
	    	// 	'date' => $date
	    	// );
	    	// $data['result_oil'] = $master->getOil($data_select);
 	    	// $this->view('login',$data);
 	    	$this->view('myboard',$data);
	    }
	}
?>