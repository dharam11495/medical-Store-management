<?php
 
 
 class Ajax extends MY_controller
 {
 	 public function admin()
 	 {
 	 	$this->load->view('admin/admin');
 	 }
 	public function pagination()
 	{
 		$this->load->model('ajax_model');
 		$this->load->library('pagination');
 		$config = array();
 		$config["base_url"] = "#";
 		$config["total_rows"] = $this->ajax_model->count_all();
 		$config["per_page"] = 10;
 		$config["uri_segment"] = 3;
 		
 		$config["use_page_numbers"] = TRUE;
 		$config["full_tag_open"] = "<ul class='pagination'>";
 		$config["full_tag_close"] = "</ul>";
 		$config["first_tag_open"] = "<li>";
 		$config["first_tag_close"] = "</li>";
 		$config["last_tag_open"] = "<li>";
 		$config["last_tag_close"] = "</li>";
 		$config["next_link"] = "&gt;";
 		$config["next_tag_open"] = "<li>";
 		$config["next_tag_close"] = "</li>";
 		$config["prev_link"] = "&lt;";
 		$config["prev_tag_open"] = "<li>";
 		$config["prev_tag_close"] = "</li>";
 		$config["cur_tag_open"] = "<li class='active'><a href='' style='background-color: #DEB887; color:white'>";
 		$config["cur_tag_close"] = "</a></li>";
 		$config["num_tag_open"] = "<li>";
 		$config["num_tag_close"] = "</li>";
 		$config["num_links"] = 1;
 		$this->pagination->initialize($config);
 		$page=$this->uri->segment(3);
 		$start = ($page - 1) * $config["per_page"];

 		$output = array(
 			'pagination_link'   => $this->pagination->create_links(),
 			'medical_details' => $this->ajax_model->fetch_details($config["per_page"],$start)
 		);

 		// print_r($output);
 		echo json_encode($output);

 		// echo "gshgyryg";
 	}

 	public function deletecompany()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->deletecompany();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
 	}

 	public function deletemedicine()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->deletemedicine();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);	
 	}

 	public function deletesupplier()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->deletesupplier();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
 	}
 	public function editcompany()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->editcompany();
		echo json_encode($result);
 	}

 	public function editmedicine()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->editmedicine();
		echo json_encode($result);
 	}
 	public function medicine_fetch_take_in()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->medicine_fetch_take_in();
		echo json_encode($result);
 	}
 	public function ordertrack()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->ordertrack();
		echo json_encode($result);
 	}

 	public function editsupplier()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->editsupplier();
		echo json_encode($result);
 	}
 	public function orderdetails()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->orderdetails();
		echo json_encode($result);
 	}
 	public function updatecompany()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->updatecompany();
		$msg['success'] = false;
		
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
		// $msg =true;
		// echo $msg;
 	}

 	public function ordertakein()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->ordertakein();
 		$this->ajax_model->inserttakein();
		$msg['success'] = false;
		
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
 	}

 	public function updatemedicine()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->updatemedicine();
		$msg['success'] = false;
		
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
 	}

 	public function orderemedicine()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->orderemedicine();
		$msg['success'] = false;
		
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);	
 	}

 	public function updatesupplier()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->updatesupplier();
		$msg['success'] = false;
		
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);	
 	}

 	public function addcompany()
 	{
 		//  $this->form_validation->set_rules('company_name_modal','Company Name','required|is_unique[company_name.company_name]');
		 // $this->form_validation->set_rules('company_address','Company Address','required|alpha_numeric_spaces');
		 // $this->form_validation->set_rules('city','City Name','required');
		 // $this->form_validation->set_rules('pin_code','Pin Code','required|numeric');
		 // $this->form_validation->set_rules('register_no','Registration Number','required|alpha_numeric');
		 // $this->form_validation->set_rules('cin_no','CIN No','required');
		 // $this->form_validation->set_rules('company_type','Company Type','required');
		 // // $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		 // if ($this->form_validation->run()) {
		 // 	// $post=$this->input->post();
		 // 	// echo "<pre>";
		 // 	// print_r($post);
		 // 	$this->load->model('ajax_model');
		 // 	$result = $this->ajax_model->addcompany();
		 // 	if ($result) {
			// 	$msg['success'] = true;
			// 	echo json_encode($msg); 
		 // 	}
		 // 	else
		 // 	{		 		
			// 	$msg['success'] = false;
			// 	echo json_encode($msg);
		 // 	}

		 // }
		 // else{
		 // 	$errors = validation_errors();

   //          echo json_encode(['error'=>$errors]);
		 // }	














 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->addcompany();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg); 
 	}

 	public function medicine_fetch_order_in()
 	{
 		$this->load->model('ajax_model');
 		$this->ajax_model->updatestock();
 		$result = $this->ajax_model->medicine_fetch_order_in();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg); 
 	}

 	public function addsupplier()
 	{
 		$this->load->model('ajax_model');
 		$result = $this->ajax_model->addsupplier();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg); 
 	}

 	public function supplier_Details()
	{
		$this->load->model('Mymodel');
		$company=$this->Mymodel->fetchsupplierdetails();
		// $this->load->view('admin/supplier_details',['company'=>$company]);
		echo json_encode($company);
	}

	public function medicine_fetch()
	{
		$this->load->model('ajax_model');
		$company=$this->ajax_model->medicine_fetch();
		// $this->load->view('admin/supplier_details',['company'=>$company]);
		echo json_encode($company);
	}

	public function medicine_fetch1()
	{
		$this->load->model('ajax_model');
		$company=$this->ajax_model->medicine_fetch1();
		// $this->load->view('admin/supplier_details',['company'=>$company]);
		echo json_encode($company);
	}

	public function medicine_fetch_order()
	{
		$this->load->model('ajax_model');
		$company=$this->ajax_model->medicine_fetch_order();
		// $this->load->view('admin/supplier_details',['company'=>$company]);
		echo json_encode($company);
	}

	public function medicine_fetch_order_all()
	{
		// $trade_name=$this->input->post('trade_name')
		// $this->load->model('ajax_model');
		// $company=$this->ajax_model->medicine_fetch_order_all($trade_name);
		if($this->input->post('trade_name'))
			{
		        $this->load->model('ajax_model');
				echo $this->ajax_model->medicine_fetch_order_all($this->input->post('trade_name'));
			}
	}

	public function medicine_fetch_takein()
	{
		$this->load->model('ajax_model');
		$company=$this->ajax_model->medicine_fetch_takein();
		// $this->load->view('admin/supplier_details',['company'=>$company]);
		echo json_encode($company);
	}

	public function medicine_fetch_consumed()
	{
		$this->load->model('ajax_model');
		$company=$this->ajax_model->medicine_fetch_consumed();
		// $this->load->view('admin/supplier_details',['company'=>$company]);
		echo json_encode($company);
	}


	public function fetchsupplier()
	{
		$this->load->model('Mymodel');
		$company=$this->Mymodel->fetchsupplierdetails();
		// $this->load->view('admin/supplier_details',['company'=>$company]);
		echo json_encode($company);	
	}

 }

?>