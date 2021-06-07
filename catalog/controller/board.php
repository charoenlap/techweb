<?php 
	class BoardController extends Controller {
		public function boardPrint() {
	    	$data = array();
	    	$type_board = get('type_board');
	    	$data['page'] = $page = (get('page')?get('page'):1);
	    	$data_select = array();
	    	
	    	$data['title'] = "Ticket";
	    	$data['detail'] 	= '';
		 	$data['type'] 		= '';
			$data['status'] 	= '';
			$data['date_range'] = '';
			$data['total_row'] = 0;
			$limit = '0,1000';// (($page-1)*DEFAULT_LIMIT_PAGE).','.DEFAULT_LIMIT_PAGE;
			$string_url = '';
	    	if(method_post()){
	    		$data['date_range'] = post('date_range');
	    		$data['detail'] 	= post('detail');
				$data['type'] 		= post('type');
				$data['status'] 	= post('status');
	    		$date_arr = explode(' - ',$data['date_range']);
	    		$data_select = array(
	    			'detail'		=> post('detail'),
	    			'type'			=> post('type'),
	    			'status'		=> post('status'),
	    			'date_start' 	=> $date_arr[0],
	    			'date_end' 		=> $date_arr[1],
	    			'limit'			=> $limit
	    		);
	    	}
	    	$data_select['limit'] = $limit;
	    	if($type_board=="me"){
	    		$data_select['owner_id'] = $this->getSession('user_id');
	    		$string_url = "&type_board=me";
	    	}
	    	$data['link_form_search'] = route('board'.$string_url);
	    	$listTicket = $this->model('ticket')->listTicket($data_select);
	    	$data['total_row'] = (int)$listTicket->total_row;
	    	$data['listTicket'] = array();
	    	$i=1;
	    	$data['listTicket_num_rows'] = $listTicket->num_rows;
	    	foreach($listTicket->rows as $val){
	    		$days = 0;
	    		$Sdate = $val['date_start'];
				$Edate = $val['date_end'];
				$datetime_start = strtotime($Sdate);
				$datetime_end = strtotime($Edate);
				$date_start = date("Y-m-d", strtotime($Sdate));
				$date_end = date("Y-m-d", strtotime($Edate));
				$row_status = 'table-success';
				$class_badge = '';
				
				if($val['status']==1){
					$row_status = 'table-success';
					$status_class = 'bg-success';
					$status_text = 'เสร็จสิ้น';
					// $datetime_end = strtotime($Edate); // convert to timestamps
				}else if ($val['status']==2) { // ไม่มี action ภายใน deadline ที่กำหนด
					$row_status = 'table-warning';
					$status_class = 'bg-warning';
					$status_text = 'เสร็จสิ้น';
					// $datetime_end = strtotime($Edate); // convert to timestamps
				}
				else{
					$row_status = 'table-danger';
					$status_class = 'bg-danger';
					$status_text = 'ดำเนินการ';
					// $datetime_end = time();
				}
				if($val['name']=="NEW"){
					$class_badge = 'bg-danger';
				}else if($val['name']=="CANCEL"){
					$class_badge = 'bg-dark';
				}else{
					$class_badge = 'bg-success';
				}
				$days = (int)(($datetime_end - $datetime_start)/(60*60*24));
		    	$data['listTicket'][] = array(
		    		'no'			=> $i++,
		    		'link' 			=> route('board/boardDetail&id='.$val['id']),
		    		'name'			=> $val['name'],
		    		'detail'		=> $val['detail'],
		    		'status'		=> $val['status'],
		    		// 'overtime'		=> ($days>0?'')
		    		'request' 		=> $val['request_name'],//.' '.$val['request_lname'],
		    		'recieve' 		=> $val['receive_name'],//.' '.$val['receive_name'],
		    		'days'			=> $days,
		    		'status_text'	=> $status_text,
		    		'status_class'	=> $status_class,
		    		'date_start'	=> $date_start,
		    		'date_end'		=> $date_end,
		    		'row_status'	=> $row_status,
		    		'class_badge'	=> $class_badge
		    	);
		    }
	    	$Type = $this->model('select_input')->SelectType();
	    	$data['Type'] = $Type;
	    	$data['page_total'] = ceil($data['total_row']/DEFAULT_LIMIT_PAGE);

	    	
 	    	$this->print('board/boardPrint',$data,'board');
	    }
	    public function exportExcel(){
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
			$query = $db->query($sql);
			$data_ticket = array();
			while ($row = $query->fetch_assoc()) {
				$data_ticket[] = $row;
			}
			$i=1;
			$data['listTicket'][] = array(
				'no',
				'name',
				'detail',
				'status',
				'request',
				'recieve',
				'days',
				'status_text',
				'date_start',
				'date_end',
			);
			foreach($data_ticket as $val){
				$days = 0;
	    		$Sdate = $val['date_start'];
				$Edate = $val['date_end'];
				$datetime_start = strtotime($Sdate);
				$datetime_end = strtotime($Edate);
				$date_start = date("Y-m-d", strtotime($Sdate));
				$date_end = date("Y-m-d", strtotime($Edate));
				$row_status = 'table-success';
				$class_badge = '';
				if($val['status']==1){
					$row_status = 'table-success';
					$status_class = 'bg-success';
					$status_text = 'เสร็จสิ้น';
					// $datetime_end = strtotime($Edate); // convert to timestamps
				}else if ($val['status']==2) { // ไม่มี action ภายใน deadline ที่กำหนด
					$row_status = 'table-warning';
					$status_class = 'bg-warning';
					$status_text = 'เสร็จสิ้น';
					// $datetime_end = strtotime($Edate); // convert to timestamps
				}
				else{
					$row_status = 'table-danger';
					$status_class = 'bg-danger';
					$status_text = 'ดำเนินการ';
					// $datetime_end = time();
				}
				if($val['name']=="NEW"){
					$class_badge = 'bg-danger';
				}else if($val['name']=="CANCEL"){
					$class_badge = 'bg-dark';
				}else{
					$class_badge = 'bg-success';
				}
				$days = (int)(($datetime_end - $datetime_start)/(60*60*24));

		    	$data['listTicket'][] = array(
					'no'			=> $i++,
		    		// 'link' 			=> route('board/boardDetail&id='.$val['id']),
		    		'name'			=> $val['name'],
		    		'detail'		=> strip_tags($val['detail']),
		    		'status'		=> $val['status'],
		    		// 'overtime'		=> ($days>0?'')
		    		'request' 		=> $val['request_name'],//.' '.$val['request_lname'],
		    		'recieve' 		=> $val['receive_name'],//.' '.$val['receive_name'],
		    		'days'			=> $days,
		    		'status_text'	=> $status_text,
		    		// 'status_class'	=> $status_class,
		    		'date_start'	=> $date_start,
		    		'date_end'		=> $date_end,
		    		// 'row_status'	=> $row_status,
		    		// 'class_badge'	=> $class_badge
		    	);
		    }
	    	// var_dump($data['listTicket']);exit();
			xlsx('ticket', $data['listTicket']);
	    }
	    public function index() {
	    	$data = array();
	    	$type_board = get('type_board');
	    	$data['page'] = $page = (get('page')?get('page'):1);
	    	$data_select = array();
	    	
	    	$data['title'] = "Ticket";
	    	$data['detail'] 	= '';
		 	$data['type'] 		= '';
			$data['status'] 	= '';
			$data['date_range'] = '';
			$data['total_row'] = 0;
			$data['link_print'] = route('board/boardPrint');
			$data['link_export'] = route('board/exportExcel');
			$limit = (($page-1)*DEFAULT_LIMIT_PAGE).','.DEFAULT_LIMIT_PAGE;
			$string_url = '';
	    	if(method_post()){
	    		$data['date_range'] = post('date_range');
	    		$data['detail'] 	= post('detail');
				$data['type'] 		= post('type');
				$data['status'] 	= post('status');
	    		$date_arr = explode(' - ',$data['date_range']);
	    		$data_select = array(
	    			'detail'		=> post('detail'),
	    			'type'			=> post('type'),
	    			'status'		=> post('status'),
	    			'date_start' 	=> $date_arr[0],
	    			'date_end' 		=> $date_arr[1],
	    			'limit'			=> $limit
	    		);
	    	}
	    	$data_select['limit'] = $limit;
	    	if($type_board=="me"){
	    		$data_select['owner_id'] = $this->getSession('user_id');
	    		$string_url = "&type_board=me";
	    	}
	    	$data['link_form_search'] = route('board'.$string_url);
	    	$listTicket = $this->model('ticket')->listTicket($data_select);
	    	$data['total_row'] = (int)$listTicket->total_row;
	    	$data['listTicket'] = array();
	    	$i=1;
	    	$data['listTicket_num_rows'] = $listTicket->num_rows;
	    	foreach($listTicket->rows as $val){
	    		$days = 0;
	    		$Sdate = $val['date_start'];
				$Edate = $val['date_end'];
				$datetime_start = strtotime($Sdate);
				$datetime_end = strtotime($Edate);
				$date_start = date("Y-m-d", strtotime($Sdate));
				$date_end = date("Y-m-d", strtotime($Edate));
				$row_status = 'table-success';
				$class_badge = '';
				
				if($val['status']==1){
					$row_status = 'table-success';
					$status_class = 'bg-success';
					$status_text = 'เสร็จสิ้น';
					// $datetime_end = strtotime($Edate); // convert to timestamps
				}else if ($val['status']==2) { // ไม่มี action ภายใน deadline ที่กำหนด
					$row_status = 'table-warning';
					$status_class = 'bg-warning';
					$status_text = 'เสร็จสิ้น';
					// $datetime_end = strtotime($Edate); // convert to timestamps
				}
				else{
					$row_status = 'table-danger';
					$status_class = 'bg-danger';
					$status_text = 'ดำเนินการ';
					// $datetime_end = time();
				}
				if($val['name']=="NEW"){
					$class_badge = 'bg-danger';
				}else if($val['name']=="CANCEL"){
					$class_badge = 'bg-dark';
				}else{
					$class_badge = 'bg-success';
				}
				$days = (int)(($datetime_end - $datetime_start)/(60*60*24));
		    	$data['listTicket'][] = array(
		    		'no'			=> $i++,
		    		'link' 			=> route('board/boardDetail&id='.$val['id']),
		    		'name'			=> $val['name'],
		    		'detail'		=> $val['detail'],
		    		'status'		=> $val['status'],
		    		// 'overtime'		=> ($days>0?'')
		    		'request' 		=> $val['request_name'],//.' '.$val['request_lname'],
		    		'recieve' 		=> $val['receive_name'],//.' '.$val['receive_name'],
		    		'days'			=> $days,
		    		'status_text'	=> $status_text,
		    		'status_class'	=> $status_class,
		    		'date_start'	=> $date_start,
		    		'date_end'		=> $date_end,
		    		'row_status'	=> $row_status,
		    		'class_badge'	=> $class_badge
		    	);
		    }
	    	$Type = $this->model('select_input')->SelectType();
	    	$data['Type'] = $Type;
	    	$data['page_total'] = ceil($data['total_row']/DEFAULT_LIMIT_PAGE);

	    	
 	    	$this->view('board/board',$data);
	    }
	    public function boardDetail() {
	    	$data = array();
	    	$data['id'] = $id = get('id');
	    	$result_ticket = $this->model('ticket')->getTicket($id);
	    	if($result_ticket->num_rows > 0){
	    		$user_request_id = $this->getSession('user_id');
	    		if(method_post()){
		    		$ticket = $this->model('ticket');
		    		$job_id = (int)post('job_id');
		    		$status_job = (int)post('status_job');
		    		$data_insert = array(
						'job_id' 			=> $job_id,
						'user_request_id' 	=> $user_request_id,
						'detail' 			=> trim(post('detail')),
						'user_receive_id' 	=> post('user_receive_id'),
						'status_job'		=> $status_job
		    		);
		    		if(isset($_FILES['file'])){
	    				if(!empty($_FILES['file']['name'])){
	    					$path = DOCUMENT_ROOT.'uploads/ticket_file/';
	    					$name = time().$_FILES['file']['name'];
	    					upload('file',$path,$name);
	    					$data_insert['files'] = $name;
	    				}
	    			}
			    	$result = $ticket->addTicketDetail($data_insert);

			    	$ticket_id			= $result_addTicket['ticket_id'];
					$user_request_id	= $result_addTicket['user_request_id'];
					$user_receive_id	= $result_addTicket['user_receive_id'];
					$detail				= $result_addTicket['detail'];
					$date_start			= $result_addTicket['date_start'];

					$users =  $this->model('users');

					$result_user_request = $users->getUser($user_request_id);
					$result_user_receive = $users->getUser($user_receive_id);

					$to_email=$result_user_receive['user_email'];
					$msg = '<p>'.strip_tags($detail).'</p>';
					$msg .= '<p><a href="'.route('board/boardDetail&id='.$ticket_id).'">Link</a></p>';
					
					$subject='NEW Notification '.time();
					$settings = $this->model('settings')->settings();
	    			$email_bcc = (isset($settings['mail_alert_email'])?$settings['mail_alert_email']:'');
					sendmailSmtp($to_email,$msg,$subject);

			    	if($result){
			    		redirect('board/boardDetail&id='.$job_id);
			    	}
		    	}else{
		    		$User = $this->model('select_input')->SelectUser();
		    		$data['User'] = $User;
		    		$data['username'] = $this->getSession('username');
		    		$data['title'] = "BoardDetail";
			    	$date = date('Y-m-d');
			    	$data['detail'] = $result_ticket->row;
			    	$data['sub_detail'] = $result_ticket->detail;
			    	$data['action'] = route('board/boardDetail&id='.$id);
		 	    	$this->view('board/boardDetail',$data);
		 	    }
	    	}else{
	    		echo "ไม่พบข้อมูล";
	    	}
	    	
	    }
	    public function addBoard(){
	    	$data = array();
	    	if(method_post()){
	    		// var_dump($_SESSION);exit();
	    		$user_id = $this->getSession('user_id');
	    		$time = date_default_timezone_set('Asia/Bangkok');
	    		if(!empty($user_id)){
		    		$data_insert = array(
		    			'type_id' => post('type_id'),
		    			'user_request_id' => $user_id,
		    			'detail' => post('detail'),
		    			'date_end'	=> post('date_end'),
		    			'user_receive_id' => post('user_receive_id'),
		    			'date_start' => post('date_start'),
		    			'status' => post('status')
		    		);
		    		if(isset($_FILES['file'])){
	    				if(!empty($_FILES['file']['name'])){
	    					$path = DOCUMENT_ROOT.'uploads/ticket_file/';
	    					$name = time().$_FILES['file']['name'];
	    					upload('file',$path,$name);
	    					$data_insert['files'] = $name;
	    				}
	    			}
		    		$result_addTicket = $this->model('ticket')->addTicket($data_insert);

					$ticket_id			= $result_addTicket['ticket_id'];
					$user_request_id	= $result_addTicket['user_request_id'];
					$user_receive_id	= $result_addTicket['user_receive_id'];
					$detail				= $result_addTicket['detail'];
					$date_start			= $result_addTicket['date_start'];
					$date_end			= $result_addTicket['date_end'];

					$users =  $this->model('users');

					$result_user_request = $users->getUser($user_request_id);
					$result_user_receive = $users->getUser($user_receive_id);



					$to_email=$result_user_receive['user_email'];
					$msg = '<p>'.strip_tags($detail).'</p>';
					$msg .= '<p><a href="'.route('board/boardDetail&id='.$ticket_id).'">Link</a></p>';
					$subject='NEW Notification '.time();
					$settings = $this->model('settings')->settings();
	    			$email_bcc = (isset($settings['mail_alert_email'])?$settings['mail_alert_email']:'');
					sendmailSmtp($to_email,$msg,$subject,$email_bcc);

		    		redirect('board&result=addSuccess');
		    	}else{
		    		redirect('login');
		    	}
	    	}else{
	    		$data['request_name'] = $this->getSession('username');
	    		$data['request_id'] = $this->getSession('user_id');
	    		$data['action'] = route('board/addboard');
		    	$data['title'] = "AddBoard";
		    	$date = date('Y-m-d');
		    	// $master = $this->model('master');
		    	// $data_select = array(
		    	// 	'date' => $date
		    	// );
		    	// $data['result_oil'] = $master->getOil($data_select);
	 	    	// $this->view('login',$data);
		    	$Type = $this->model('select_input')->SelectType();
		    	$data['Type'] = $Type;

		    	$User = $this->model('select_input')->SelectUser();
		    	$data['User'] = $User;
	 	    	$this->view('board/addboard',$data);
	 	    }
	    }
	  //   public function myBoard() {
	  //   	$data = array();
	  //   	$data['page'] = $page = (get('page')?get('page'):1);
	  //   	$data_select = array();
	  //   	$data['link_form_search'] = route('board');
	  //   	$data['title'] = "My Ticket";
	  //   	$data['detail'] 	= '';
		 // 	$data['type'] 		= '';
			// $data['status'] 	= '';
			// $data['date_range'] = '';
			// $data['total_row'] = 0;
			// $limit = (($page-1)*DEFAULT_LIMIT_PAGE).','.DEFAULT_LIMIT_PAGE;
	  //   	if(method_post()){
	  //   		$data['date_range'] = post('date_range');
	  //   		$data['detail'] 	= post('detail');
			// 	$data['type'] 		= post('type');
			// 	$data['status'] 	= post('status');
	  //   		$date_arr = explode(' - ',$data['date_range']);
	  //   		$data_select = array(
	  //   			'detail'		=> post('detail'),
	  //   			'type'			=> post('type'),
	  //   			'status'		=> post('status'),
	  //   			'date_start' 	=> $date_arr[0],
	  //   			'date_end' 		=> $date_arr[1],
	  //   			'limit'			=> $limit
	  //   		);
	  //   	}
	  //   	$data_select['limit'] = $limit;
	  //   	$listTicket = $this->model('ticket')->listTicket($data_select);
	  //   	$data['total_row'] = (int)$listTicket->total_row;
	  //   	$data['listTicket'] = array();
	  //   	$i=1;
	  //   	$data['listTicket_num_rows'] = $listTicket->num_rows;
	  //   	foreach($listTicket->rows as $val){
	  //   		$days = 0;
	  //   		$Sdate = $val['date_start'];
			// 	$Edate = $val['date_end'];
			// 	$datetime_start = strtotime($Sdate);
			// 	$date_start = date("Y-m-d", strtotime($Sdate));
			// 	$row_status = 'table-success';
			// 	$class_badge = '';
				
			// 	if($val['status']==1){
			// 		$row_status = 'table-success';
			// 		$status_class = 'bg-success';
			// 		$status_text = 'เสร็จสิ้น';
			// 		$datetime_end = strtotime($Edate); // convert to timestamps
			// 	}else{
			// 		$row_status = 'table-danger';
			// 		$status_class = 'bg-danger';
			// 		$status_text = 'ดำเนินการ';
			// 		$datetime_end = time();
			// 	}
			// 	if($val['name']=="NEW"){
			// 		$class_badge = 'bg-danger';
			// 	}else if($val['name']=="CANCEL"){
			// 		$class_badge = 'bg-dark';
			// 	}else{
			// 		$class_badge = 'bg-success';
			// 	}
			// 	$days = (int)(($datetime_end - $datetime_start)/86400);
		 //    	$data['listTicket'][] = array(
		 //    		'no'			=> $i++,
		 //    		'link' 			=> route('board/boardDetail&id='.$val['id']),
		 //    		'name'			=> $val['name'],
		 //    		'detail'		=> $val['detail'],
		 //    		'status'		=> $val['status'],
		 //    		'request' 		=> $val['request_name'].' '.$val['request_lname'],
		 //    		'recieve' 		=> $val['receive_name'].' '.$val['receive_name'],
		 //    		'days'			=> $days,
		 //    		'status_text'	=> $status_text,
		 //    		'status_class'	=> $status_class,
		 //    		'date_start'	=> $date_start,
		 //    		'row_status'	=> $row_status,
		 //    		'class_badge'	=> $class_badge
		 //    	);
		 //    }
	  //   	$Type = $this->model('select_input')->SelectType();
	  //   	$data['Type'] = $Type;
	  //   	$data['page_total'] = ceil($data['total_row']/DEFAULT_LIMIT_PAGE);
 	 //    	$this->view('myboard',$data);
	  //   }
	}
?>