<?php
  
  class Login extends MY_controller
  {

  	public function index()
	{
		if($this->session->userdata('id'))
		return redirect('welcome/admin');
		$this->load->view('login');
	}
  	public function user()
  	{
  		 $this->load->library('form_validation');
         $this->form_validation->set_rules('uname','Username','required|alpha');
         $this->form_validation->set_rules('pass','Password','required|max_length[8]|min_length[3]');
         $this->form_validation->set_error_delimiters("<div style='color:red;'>","</div>");


         if ($this->form_validation->run()) 
         {
         	
         	$uname=$this->input->post('uname');
         	$pass=$this->input->post('pass');

         	$this->load->model('Mymodel');
            $user_id=$this->Mymodel->isvalidatemedical($uname,$pass);
         		if ($user_id) 
         		{
         		 	$this->session->set_userdata('id',$user_id);
         			return redirect('welcome/admin');
         		 } 
         		 else
         		 {
              $this->session->set_flashdata('Login_Failed','Invalid Username/Password');
         		 	return redirect('Login');

         		 }
         }
         else
         {
           $this->load->view('login');
         	
         }
      
  	}

    public function forgot()
    {


      if($this->input->post('uname')) {
        $email = $this->input->post('uname');
        $this->load->model('Mymodel');
        $res=$this->Mymodel->ForgotPassword($email);
        $pass=$res['password'];
        $user=$res['username'];
        if ($res!=null) {
        echo "<script>alert('Your Username is $user And Your password is $pass')</script>";
        redirect(base_url() . 'login', 'refresh'); 
        
        } else {
        echo "<script>alert(' $email not found, please enter correct email id')</script>";
        redirect(base_url() . 'login/forgot', 'refresh');
        }
    }

   

      // $post=$this->input->post();
      // print_r($post);
      $this->load->view('forgot');
    }
  }
?>