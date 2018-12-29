<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function admin()
	{
		$this->load->model('Mymodel');
		$res=$this->Mymodel->suppliername();
		$this->load->view('admin/admin',['res'=>$res]);
	}


	public function forgot(){
    if($this->input->post('submit')) {
        $email = $this->input->post('email');
        $qry['email'] = $this->Employer_model->select($email);
        $email1 = $qry['email']->email;

        if($email1 == $email) {
            $code1 = rand();
            $code = md5($code1);
            $employer_id = $GLOBALS['employer_id'];
            $qry1 = $this->Employer_model->insertpwd($code, $employer_id);

            if($qry1) {
                echo "<script>alert(' your new password is $code1!')</script>";
            }
        }
    }

    $this->load->view('employer/forgot');
}
	public function company()
	{
     $this->load->view('admin/company');
		
	}

	public function fetchcompany()
	{
		$this->load->model('Mymodel');
		// $company['title']='Company Details';
		$company=$this->Mymodel->fetchcompanydetails();
		
		echo json_encode($company);
	}

	public function manage()
	{
		$this->load->model('Mymodel');
		$res = $this->Mymodel->getcompanyname();
		
		// $res=$this->Mymodel->fetchcompanydetails();
		$this->load->view('admin/edit_delete',['res'=>$res]);
	}

	public function manageSupplier()
	{
		$this->load->model('Mymodel');
		$res = $this->Mymodel->suppliername();
		
		// $res=$this->Mymodel->fetchcompanydetails();
		$this->load->view('admin/edit_delete_supplier',['res'=>$res]);
	}

	public function export()
	{
		$this->load->library('excel');
		$object = new PHPExcel();
		$object->setActiveSheetIndex(0);
		$table_columns = array("Company Name","Address","City","Pincode","Registration No","CIN No","Company Type" );
		$column = 0;

		foreach ($table_columns as $field) {
			$object->getActiveSheet()->setCellValueBYColumnAndRow($column, 1,$field);
			$column++;
		}
		$this->load->model('Mymodel');
		$feedbackinfo=$this->Mymodel->fetchcompanydetails();
		$excel_row = 2;

		 foreach ($feedbackinfo as $row)
		{
			$object->getActiveSheet()->setCellValueBYColumnAndRow(0, $excel_row, $row->company_name);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(1, $excel_row, $row->company_address);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(2, $excel_row, $row->city);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(3, $excel_row, $row->pin_code);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(4, $excel_row, $row->register_no);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(5, $excel_row, $row->cin_no);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(6, $excel_row, $row->company_type);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Company Details.xls"');
        $object_writer->save('php://output');
	}

	public function Exportmedicine()
	{
		$this->load->library('excel');
		$object = new PHPExcel();
		$object->setActiveSheetIndex(0);
		$table_columns = array("Trade Name","Variants","Salt","Company","Quantity","Rate","MFD","EXP" );
		$column = 0;

		foreach ($table_columns as $field) {
			$object->getActiveSheet()->setCellValueBYColumnAndRow($column, 1,$field);
			$column++;
		}
		$this->load->model('Mymodel');
		$feedbackinfo=$this->Mymodel->medicinename();
		$excel_row = 2;

		 foreach ($feedbackinfo as $row)
		{
			$object->getActiveSheet()->setCellValueBYColumnAndRow(0, $excel_row, $row->trade_name);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(1, $excel_row, $row->variats_name);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(2, $excel_row, $row->salt_name);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(3, $excel_row, $row->company_name);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(4, $excel_row, $row->stock);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(5, $excel_row, $row->rate);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(6, $excel_row, $row->mfd_date);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(7, $excel_row, $row->exp_date);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Medicine Details.xls"');
        $object_writer->save('php://output');
	}
	public function supplier_Details()
	{
		$this->load->model('Mymodel');
		$company=$this->Mymodel->fetchsupplierdetails();
		$this->load->view('admin/supplier_details',['company'=>$company]);
	}

	public function exportsupplier()
	{
		$this->load->library('excel');
		$object = new PHPExcel();
		$object->setActiveSheetIndex(0);
		$table_columns = array("Company Name","Supplier Name","Address","City","Pincode","Mobile No.","Email Id" );
		$column = 0;

		foreach ($table_columns as $field) {
			$object->getActiveSheet()->setCellValueBYColumnAndRow($column, 1,$field);
			$column++;
		}
		$this->load->model('Mymodel');
		$feedbackinfo=$this->Mymodel->fetchsupplierdetails();
		$excel_row = 2;

		 foreach ($feedbackinfo as $row)
		{
			$object->getActiveSheet()->setCellValueBYColumnAndRow(0, $excel_row, $row->company_name);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(1, $excel_row, $row->suppiler_name);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(2, $excel_row, $row->suppiler_address);

			$object->getActiveSheet()->setCellValueBYColumnAndRow(3, $excel_row, $row->city);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(4, $excel_row, $row->pin_code);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(5, $excel_row, $row->mobile_no);
			$object->getActiveSheet()->setCellValueBYColumnAndRow(6, $excel_row, $row->email);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Supplier Details.xls"');
        $object_writer->save('php://output');
	}
	public function entry()
	{
		$this->load->model('Mymodel');
		$res = $this->Mymodel->getcompanyname();
		// echo "<pre>";
		// print_r($res);
		// exit;
		$this->load->view('admin/new_entry',['res'=>$res]);
	}
	
	public function companyEntry()
	{
		$this->load->model('Mymodel');
		$res = $this->Mymodel->getcompanyname();
		 $this->form_validation->set_rules('company_name','Company Name is already  Present And this','required|is_unique[company_name.company_name]');
		 $this->form_validation->set_rules('company_address','Company Address','required|alpha_numeric_spaces');
		 $this->form_validation->set_rules('city','City Name','required');
		 $this->form_validation->set_rules('pin_code','Pin Code','required|numeric');
		 $this->form_validation->set_rules('register_no','Registration Number','required|alpha_numeric');
		 $this->form_validation->set_rules('cin_no','CIN No','required');
		 $this->form_validation->set_rules('company_type','Company Type','required');
		 $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		 if ($this->form_validation->run()) {
		 	 $post=$this->input->post();
		 	// echo "<pre>";
		 	// print_r($post);
		 	$this->load->model('Mymodel');
		 	if ($this->Mymodel->insertcompany($post)) {
				$this->session->set_flashdata('user','Company added successfully');
				$this->session->set_flashdata('user_class','alert-success');
		 	}
		 	else
		 	{		 		
				$this->session->set_flashdata('user','Company added successfully');
				$this->session->set_flashdata('user_class','alert-success');
		 	}
		 	return redirect('welcome/companyEntry');
		 }
		 else
		 {
		 	$this->load->view('admin/company_entry',['res'=>$res]);
		 }
	}

	public function product()
	{
		$this->load->model('Mymodel');
		
		$res = $this->Mymodel->suppliername();
		$this->form_validation->set_rules('trade_name','Trade Name is Already Present And This','required|is_unique[order_medicine.trade_name]');
		$this->form_validation->set_rules('variats_name','Variants Name','required');
		$this->form_validation->set_rules('company_name','Company Name','required');
		$this->form_validation->set_rules('supplier_name','Supplier Name','required');
		$this->form_validation->set_rules('salt_name','Salt Name','required');
		$this->form_validation->set_rules('order','Quantity ','required|numeric');
		$this->form_validation->set_rules('rate','Rate','required|numeric');
		$this->form_validation->set_rules('batch_no','Batch No','required');
		$this->form_validation->set_rules('mfd_date','MFD Date','required');
		$this->form_validation->set_rules('exp_date','Expire Date','required');		
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


		if ($this->form_validation->run()) {
		 	// $post=$this->input->post();
		 	// echo "<pre>";
		 	// print_r($post);
		 	// exit;
		 	$this->load->model('Mymodel');
		 	$this->load->model('ajax_model');
		 	$this->ajax_model->inserttakein();
		 	if ($this->Mymodel->insertmedicine()) {
				$this->session->set_flashdata('user','Medicine added In Store successfully');
				$this->session->set_flashdata('user_class','alert-success');
		 	}
		 	else
		 	{		 		
				$this->session->set_flashdata('user','Medicine Not added In Store successfully');
				$this->session->set_flashdata('user_class','alert-danger');
		 	}
		 	return redirect('welcome/product');
		 }
		 else
		 {
		 	$this->load->view('admin/medicine_product',['res'=>$res]);
		 }

		
	}

		public function getsupplier()
		{
			if($this->input->post('company_name'))
			{
		        $this->load->model('Mymodel');
				echo $this->Mymodel->getsupplier($this->input->post('company_name'));
			}
		}

	public function supplier()
	{
		$this->load->model('Mymodel');
		$res = $this->Mymodel->suppliername();
		$this->form_validation->set_rules('company_name','Company Name','required');
		$this->form_validation->set_rules('suppiler_name','Supplier Name','required');
		$this->form_validation->set_rules('suppiler_address','Supplier Address','required');
		$this->form_validation->set_rules('city','City Name','required');
		$this->form_validation->set_rules('pin_code','Pin Code','required|numeric');
		$this->form_validation->set_rules('mobile_no','Supplier Mobile Number','required|numeric');
		$this->form_validation->set_rules('email','Email ','required|valid_email|is_unique[supplier_entry.email]');
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


		if ($this->form_validation->run()) {
		 	$post=$this->input->post();
		 	// echo "<pre>";
		 	// print_r($post);
		 	// exit;
		 	$this->load->model('Mymodel');
		 	if ($this->Mymodel->insertsupplier($post)) {
				$this->session->set_flashdata('user','Supplier added successfully');
				$this->session->set_flashdata('user_class','alert-success');
		 	}
		 	else
		 	{		 		
				$this->session->set_flashdata('user','Supplier Not added successfully');
				$this->session->set_flashdata('user_class','alert-danger');
		 	}
		 	return redirect('welcome/supplier');
		 }
		 else
		 {
		 	$this->load->view('admin/supplier_entry',['res'=>$res]);
		 }


		
	}

	public function consumed()
	{
		$this->load->model('Mymodel');
		$res=$this->Mymodel->medicinename();
		$this->load->view('consumed/consumed',['res' => $res]);
	}

	public function sheet()
	{
		$this->load->model('Mymodel');
		$res=$this->Mymodel->suppliername();
		$this->load->view('medicine_stock/medicine_stock',['res'=>$res]);
	}

	public function order()
	{
		$this->load->view('admin/order_sheet');
	}

	public function forward()
	{
		// $this->load->model('Mymodel');
		// $res=$this->Mymodel->editmedicine();
		
		$this->load->view('medicine_stock/forward');	
	}
	public function consumedSheet()
	{
		$this->load->view('medicine_stock/consumed_sheet');
	}
	public function logout()
	  {
	    $this->session->unset_userdata('id');
	    return redirect('Login');
	  }

	public function __construct()
		{
		parent::__construct();
		// $this->load->model('Mymodel');

		if( ! $this->session->userdata('id') )
		return redirect('Login');
		}
}   
