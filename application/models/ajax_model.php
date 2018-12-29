<?php
	class Ajax_model extends CI_model
	{
		
	  public function count_all()
		{
			$query = $this->db->get("order_medicine");
			return $query->num_rows();
		}

	 public function fetch_details($limit, $start)
	 {
	 	// $id=$this->session->userdata('id');
	 	$output ='';
	 	$this->db->select("*");
	 	$this->db->from("medicine_total");
	 	// $this->db->where(['id'=>$id])
	 	$this->db->order_by("trade_name","ASC");
	 	$this->db->limit($limit, $start);
	 	$query = $this->db->get();
	 	$output .='
			<table class="table table-striped " style="background-color: #efef88;" >
			<thead>
			<tr style="border: 1px solid black">
			<th style="border: 1px solid black">Sr  No.</th>
			<th style="border: 1px solid black">Trade Name</th>
			<th style="border: 1px solid black">Variants</th>
			<th style="border: 1px solid black">Salt</th>
			<th style="border: 1px solid black">Company</th>
			<th style="border: 1px solid black">Rate</th>
			<th style="border: 1px solid black">MFD</th>
			<th style="border: 1px solid black">Exp</th>
			</tr>
			</thead>
			<tbody id="myTable">';
			$x=1;
			foreach($query->result() as $row)
			{
				$output .='
				 <tr>
				 <td>'.$x.'</td>				 
				 <td>'.$row->trade_name.'</td>				 
				 <td>'.$row->variats_name.'</td>				 
				 <td>'.$row->salt_name.'</td>				 
				 <td>'.$row->company_name.'</td>				 
				 <td>'.$row->rate.'</td>				 
				 <td>'.$row->mfd_date.'</td>				 
				 <td>'.$row->exp_date.'</td>				 
				 </tr>';
				 $x++;
			}

			$output .='</table>';

			return $output;
	 }

	 public function deletecompany()
	 {
	 	$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('company_name');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	 }

	 public function deletemedicine()
	 {
	 	$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('order_medicine');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	 }

	 public function deletesupplier()
	 {
	 	$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('supplier_entry');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	 }

	 public function editcompany()
	 {
	 	$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('company_name');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	 }

	 public function editmedicine()
	 {
	 	$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('order_medicine');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	 }

	 public function medicine_fetch_take_in()
	 {
	 	$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('take_in');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	 }

	

	 public function ordertrack()
	 {
	 	$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('order_medicine');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
		
	 }

	 public function editsupplier()
	 {
	 	$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('supplier_entry');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	 }

	 public function orderdetails()
	 {
	 	$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('order_medicine');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	 }

	 public function updatecompany()
	 {
	 	$id = $this->input->post('txtId');
		$field = array(
		'company_name'=>$this->input->post('company_name'),
		'company_address'=>$this->input->post('company_address'),
		'city'=>$this->input->post('city'),
		'pin_code'=>$this->input->post('pin_code'),
		'register_no'=>$this->input->post('register_no'),
		'cin_no'=>$this->input->post('cin_no'),
		'company_type'=>$this->input->post('company_type')
		
		);
		$this->db->where('id', $id);
		$this->db->update('company_name', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	 }

	 public function ordertakein()
	 {
	 	$id = $this->input->post('txtId');
	 	$pending = $this->input->post('pending');
	 	$take_in = $this->input->post('take_in_quantity');
	 	$stock = $this->input->post('stock');
	 	$balance=$pending-$take_in;
	 	$total=$stock+$take_in;

	 	$deleted ='';
	 	if($balance==0)
	 	{
	 		$deleted=1;
	 	}
	 	else{
	 		$deleted=0;
	 	}
		$field = array(
		'trade_name'=>$this->input->post('trade_name'),
		'variats_name'=>$this->input->post('variats_name'),
		'company_name'=>$this->input->post('company_name'),
		'supplier_name'=>$this->input->post('supplier_name'),
		'salt_name'=>$this->input->post('salt_name'),
		'quantity'=>$this->input->post('quantity'),
		'date_time'=>$this->input->post('date_time'),
		'take_in_quantity'=>$this->input->post('take_in_quantity'),
		'rate'=>$this->input->post('rate'),
		'batch_no'=>$this->input->post('batch_no'),
		'mfd_date'=>$this->input->post('mfd_date'),
		'exp_date'=>$this->input->post('exp_date'),
		'stock'=>$total,
		'pending'=>$balance,
		'deleted'=>$deleted,
		
		'date_take_in'=>date('d-m-Y H:i:s')	
		);
		$this->db->where('id', $id);
		$this->db->update('order_medicine', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		// $this->inserttakein();
	 }

	 public function inserttakein()
	 {
	 	$d=$this->input->post('date_time');
	 	$q=$this->input->post('take_in_quantity');
	 	if($d==''){
	 		$d=date('d-m-Y H:i:s');
	 	}else{
	 		$d=$this->input->post('date_time');
	 	}

	 	if($q==''){
	 		$q=$this->input->post('order');
	 	}else{
	 		$q=$this->input->post('take_in_quantity');
	 	}
	 	$field = array(
		'trade_name'=>$this->input->post('trade_name'),
		'variats_name'=>$this->input->post('variats_name'),
		'company_name'=>$this->input->post('company_name'),
		'supplier_name'=>$this->input->post('supplier_name'),
		'salt_name'=>$this->input->post('salt_name'),
		'quantity'=>$this->input->post('order'),
		'date_time'=>$d,
		'take_in_quantity'=>$q,
		'rate'=>$this->input->post('rate'),
		'batch_no'=>$this->input->post('batch_no'),
		'mfd_date'=>$this->input->post('mfd_date'),
		'exp_date'=>$this->input->post('exp_date'),
		'date_take_in'=>date('d-m-Y H:i:s')	
		);
		$this->db->insert('take_in', $field);
	 }


	 public function updatemedicine()
	 {
	 	$id = $this->input->post('txtId');
		$field = array(
		'trade_name'=>$this->input->post('trade_name'),
		'variats_name'=>$this->input->post('variats_name'),
		'company_name'=>$this->input->post('company_name'),
		'supplier_name'=>$this->input->post('supplier_name'),
		'salt_name'=>$this->input->post('salt_name'),
		'rate'=>$this->input->post('rate'),
		'batch_no'=>$this->input->post('batch_no'),
		'mfd_date'=>$this->input->post('mfd_date'),
		'exp_date'=>$this->input->post('exp_date')
		
		);
		$this->db->where('id', $id);
		$this->db->update('order_medicine', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	 }

	 public function orderemedicine()
	 {
	 	$del=0;
	 	$id = $this->input->post('txtId');
	 	$field = array(
		'trade_name'=>$this->input->post('trade_name'),
		'variats_name'=>$this->input->post('variats_name'),
		'company_name'=>$this->input->post('company_name'),
		'supplier_name'=>$this->input->post('supplier_name'),
		'salt_name'=>$this->input->post('salt_name'),
		'quantity'=>$this->input->post('quantity'),
		'pending'=>$this->input->post('quantity'),
		'order'=>$this->input->post('quantity'),
		'date_time'=>date('d-m-Y H:i:s'),
		'deleted'=>$del,

		
		
		
		);
		$this->db->where('id', $id);
		$this->db->update('order_medicine', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}


	 }


	 public function updatesupplier()
	 {
	 	$id = $this->input->post('txtId');
		$field = array(
		'company_name'=>$this->input->post('company_name'),
		'suppiler_name'=>$this->input->post('suppiler_name'),
		'suppiler_address'=>$this->input->post('suppiler_address'),
		'city'=>$this->input->post('city'),
		'pin_code'=>$this->input->post('pin_code'),
		'mobile_no'=>$this->input->post('mobile_no'),
		'email'=>$this->input->post('email')
		
		);
		$this->db->where('id', $id);
		$this->db->update('supplier_entry', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	 }


	 public function addcompany()
	 {
	 	$field = array(
		'company_name'=>$this->input->post('company_name_modal'),
		'company_address'=>$this->input->post('company_address_modal'),
		'city'=>$this->input->post('city_modal'),
		'pin_code'=>$this->input->post('pin_code_modal'),
		'register_no'=>$this->input->post('register_no_modal'),
		'cin_no'=>$this->input->post('cin_no_modal'),
		'company_type'=>$this->input->post('company_type_modal')
		
		);

		$this->db->insert('company_name', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}

	 }

	 public function medicine_fetch_order_in()
	 {
	 
	 	$field = array(
		'trade_name'=>$this->input->post('trade_name'),
		'quantity'=>$this->input->post('quantity'),
		'rate'=>$this->input->post('rate'),
		'price'=>$this->input->post('price'),
		'date_time'=>date('d-m-Y H:i:s')
		
		
		);

		$this->db->insert('consumed', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	 }

	 public function updatestock()
	 {
	 	$trade_name=$this->input->post('trade_name');
	 	$con=$this->input->post('quantity');
	 	$stock=$this->input->post('stock');

	 	$bal=$stock-$con;

	 	$field = array(
		
		'stock'=>$bal
		
		
		
		);
	 	$this->db->where('trade_name', $trade_name);
		$this->db->update('order_medicine', $field);
		
	 }

	 public function addsupplier()
	 {
	 	$field = array(
		'company_name'=>$this->input->post('company_name_modal'),
		'suppiler_name'=>$this->input->post('suppiler_name_modal'),
		'suppiler_address'=>$this->input->post('suppiler_address_modal'),
		'city'=>$this->input->post('city_modal'),
		'pin_code'=>$this->input->post('pin_code_modal'),
		'mobile_no'=>$this->input->post('mobile_no_modal'),
		'email'=>$this->input->post('email_modal')
		
		);

		$this->db->insert('supplier_entry', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	 }    

	 public function medicine_fetch()
	 {
	 	
	 	$this->db->order_by('trade_name', 'ASC');
		$query = $this->db->get('order_medicine');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	 }

	  public function medicine_fetch1()
	 {
	 	
	 	$this->db->order_by('trade_name', 'ASC');
		$query = $this->db->get('order_medicine');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	 }

	 public function medicine_fetch_order()
	 {
	 	$id=0;
	 	$this->db->where('deleted', $id);
	 	$this->db->order_by('trade_name', 'ASC');
		$query = $this->db->get('order_medicine');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	 }

	 public function medicine_fetch_order_all($trade_name)
	 {

	 	// $this->db->where('trade_name', $trade_name);
	 	// $this->db->order_by('trade_name', 'ASC');
		$this->db->where('trade_name',$trade_name);
		$company_name=$this->db->get('order_medicine');
		// $output='<option value="">Select Supplier Name</option>';

		foreach ($company_name->result() as $value) {
		$output =' Medicine Rate<input type="number" id="rate" name="rate" value="'.$value->rate.'" class="form-control name_list" / readonly>
		<input type="hidden" id="stock" name="stock" value="'.$value->stock.'" class="form-control name_list" / readonly>';
		}
		return $output;
	 }


	 public function medicine_fetch_takein()
	 {
	 	
	 	$this->db->order_by('date_take_in', 'DESC');
		$query = $this->db->get('take_in');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	 }

	 public function medicine_fetch_consumed()
	 {
	 	
	 	$this->db->order_by('date_time', 'DESC');
		$query = $this->db->get('consumed');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	 }


	}
?>