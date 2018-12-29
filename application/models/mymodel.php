<?php

class Mymodel extends CI_model
{

public function isvalidatemedical($username,$password)
{
	$q=$this->db->where(['username'=>$username,'password'=>$password])
	            ->get('user');

	   // echo "<pre>";
   	//    print_r($q->row()->username);
   	//    exit;

	 if ($q->num_rows()) {
	 	return $q->row()->id;
	 }
	 else
	 {
	 	return false;
	 }
}
public function getcompanyname()
{
	$rest=$this->db->get('type_of_company');
	if($rest->num_rows() > 0)
	{
	return $rest->result();

	}
}

 public function ForgotPassword($email)
{
    $this->db->select('password,username');
    $this->db->from('user');
    $this->db->where('email', $email);
    $query=$this->db->get();
    return $query->row_array();
}

 
 

public function suppliername()
{   
	$this->db->select('*');
	$this->db->group_by('company_name');
	$this->db->from('supplier_entry');
	$rest=$this->db->get();
	if($rest->num_rows() > 0)
	{
	return $rest->result();

	}
}



public function getsupplier($company_name)
{
	$this->db->where('company_name',$company_name);
	$company_name=$this->db->get('supplier_entry');
	$output='<option value="">Select Supplier Name</option>';

	 foreach ($company_name->result() as $value) {
	 	 $output .='<option value="'.$value->suppiler_name.'" id="supplier_name1">'.$value->suppiler_name.'</option>';
	 }
 return $output;
}


public function insertcompany($array)
{
	return $this->db->insert('company_name',$array);
}
public function insertsupplier($array)
{
	return $this->db->insert('supplier_entry',$array);
}
public function insertmedicine()
{
	$del=1;
	$field = array(
		'trade_name'=>$this->input->post('trade_name'),
		'variats_name'=>$this->input->post('variats_name'),
		'company_name'=>$this->input->post('company_name'),
		'supplier_name'=>$this->input->post('supplier_name'),
		'salt_name'=>$this->input->post('salt_name'),		
		'stock'=>$this->input->post('order'),
		'rate'=>$this->input->post('rate'),
		'batch_no'=>$this->input->post('batch_no'),
		'mfd_date'=>$this->input->post('mfd_date'),
		'exp_date'=>$this->input->post('exp_date'),
		'deleted'=>$del,
	      );
		// $this->db->insert('order_medicine', $field);
	return $this->db->insert('order_medicine',$field);
}

public function fetchcompanydetails()
{
	$this->db->order_by('company_name', 'ASC');
		$query = $this->db->get('company_name');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}



	// $result_company=$this->db->get('company_name');
	// if($result_company->num_rows() > 0)
	// {
		
	// return $result_company->result();

	// }
}
public function fetchmedicinedetails()
{
	$del=1;
	$this->db->where('deleted',$del);
	$result_company=$this->db->get('order_medicine');
	if($result_company->num_rows() > 0)
	{
		
	return $result_company->result();

	}
}

public function medicinename()
{
	$result_company=$this->db->get('order_medicine');
	if($result_company->num_rows() > 0)
	{
		
	return $result_company->result();

	}
}

public function fetchsupplierdetails()
{
	$this->db->order_by('suppiler_name', 'ASC');
		$query = $this->db->get('supplier_entry');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}


	// $result_supplier=$this->db->get('supplier_entry');
	// if($result_supplier->num_rows() > 0)
	// {
	// 	return $result_supplier->result();
	// }
}

}



?>