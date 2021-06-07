<?php 
	class AddBoardController extends Controller {
	    public function index() {
	    	
	    }
	    public function addTicket(){
	    	$ticket = $this->model('ticket');
	    	$result = $ticket->addTicket();
	    }

	}
?>