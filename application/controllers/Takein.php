<?php 
	class Takein extends Ci_controller{

		public function index(){
			
    	$this->load->library(array('form_validation','session'));
    	$this->load->model('Stock');
    	$is_login_input=$this->input->post();
    	if(!empty($is_login_input)){
	    	$this->form_validation->set_rules('email','Email','trim|required|valid_email');
	    	$this->form_validation->set_rules('password','Password','min_length[6]|trim|required');
	    	if($this->form_validation->run()==false){
	    		$data['error']=validation_errors();
	    		$this->load->view('login',$data);
	    	}else{
	    		$is_login_input['password']=md5($is_login_input['password']);
	    		$login_result=$this->Stock->check_login($is_login_input);
	    		if($login_result){
	    			$this->session->set_userdata('login_id',$login_result['login_id']);
	    			redirect(base_url()."index.php/admin/purchases");
	    		}else{
	    		$data['error']="Wrong User Name & passwrod";	
	    		}
	    		$this->load->view('login',$data);
	    	}
    	}else{
    		// debfult view load;
    		$this->load->view('login');
    	}
    		
    	
    }
}
 ?>