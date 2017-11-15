<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() {
        error_reporting(0);
        parent::__construct();
       	$this->load->helper('url');
		$this->load->database();
		$this->load->model('cms');	
		$this->load->library('session');

	}

    public function index(){
    	//$this->checklogin();
    	$check=$this->session->userdata('is_login');
    	if($check=="1"){
    		redirect(base_url().'index.php/admin/admin/dashboard');
    	}
    	$this->load->library(array('form_validation'));
    	$is_login_input=$this->input->post();
    	if(!empty($is_login_input)){
	    	$this->form_validation->set_rules('email','Email','trim|required|valid_email');
	    	$this->form_validation->set_rules('password','Password','min_length[6]|trim|required');
	    	if($this->form_validation->run()==false){
	    		$data['error']=validation_errors();
	    		$this->load->view('login',$data);
	    	}else{
	    		$is_login_input['password']=md5($is_login_input['password']);
	    		$login_result=$this->cms->check_login($is_login_input);
	    		if($login_result){
	    			$this->session->set_userdata('login_id',$login_result['login_id']);
	    			redirect(base_url()."index.php/admin/admin/dashboard");
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
    function checklogin(){
    	$is_login=$this->session->userdata();
    	if(empty($is_login['login_id'])){
    		$data['error']="Please login Again";
    		$this->session->set_userdata('error',$data['error']);
    		$this->session->set_userdata('is_login','');	
    		redirect(base_url()."index.php/admin/admin"); 
    	}else{
    		$this->session->set_userdata('is_login','1');	
    	}
    }

	public function dashboard()
	{
		$data['page']=$this->input->get();
		extract($data['page']);
		$child_id=@$selected;
		$data['home']=base_url().'index.php/admin/admin/dashboard';
		$data['mian_course_url']=base_url().'index.php/?main=';
		$data=$this->comman_data_functions($child_id);
		$data['subcourse']=base_url().'index.php/admin/admin?main=';
		if(empty($child_id) && !isset($main)){
		$this->load->view('welcome_message',$data);
		}elseif(!empty($main)){
		exit("kasdfkjashkjfhak");
		$data['main_id']=$main;
		$this->load->view('selected_course',$data);
		}else{
		$this->load->view('admin',$data);
		}
	}

	function comman_data_functions($child_id){
		$this->checklogin();
		$data["admin_menu"]="admin";
		$data['link']='https://cloud.tinymce.com/stable/tinymce.min.js';
		$data['url']=base_url().'index.php/admin/admin/dashboard?selected=';
		$data['header_menus']=$this->cms->get_header_menus();
		$data['child_menus']=$this->cms->all_child_menus();
		$data['selected_course']=$this->cms->selected_course($child_id);
		$data['topic']=$this->cms->get_topic($child_id);
		$data['benifits']=$this->cms->get_course_benifits($child_id);
		return $data;
	}
	function Create(){
		$this->load->library('upload');
		$this->load->helper('form');
		$data['page']=$this->input->get();
		extract($data['page']);
		$child_id=@$edit_id;
		$data=$this->comman_data_functions($child_id);
		//$request=$this->input->get();
		if(empty($child_id)){
			/*exit("d");*/
			$data['action_url']=base_url().'index.php/admin/admin/addcourse';
			$data['button']="Add New";
			$this->load->view('add_course',$data);
		}else{
			$data['button']="update Course";
			$data['action_url']=base_url().'index.php/admin/admin/addcourse/'.$child_id;
			$this->load->view('add_course',$data);
		}
	}
	function addcourse($child_id=""){
		$inputs=$this->input->post();
		if(empty($child_id)){
			$upload_check=$this->uploadingfiles($_FILES['upload_file']);
			$inputs['image']=$_FILES['upload_file']['name'];
			$this->cms->create_new_course($inputs);
			$course_id=$this->db->insert_id();
			redirect(base_url()."index.php/admin/admin/benifits/".$course_id);
		}else{
			$upload_check=$this->uploadingfiles($_FILES['upload_file']);
			$inputs['image']=$_FILES['upload_file']['name'];
			$update=$this->cms->update_course($inputs,$child_id);
			if($update){
				redirect(base_url()."index.php/admin/admin/updatebenifits/".$child_id);	
			}	
		}
	}
	function uploadingfiles($file_name){
		 	$target_path = 'assets/uploadedimgs/';  
			$target_path = $target_path.basename( $file_name['name']);   
  
			if(move_uploaded_file($file_name['tmp_name'], $target_path)) {  
			    return true;
			} else{  
				return false; 
			}  
	}
	function updatebenifits($child_id){
		// here child id is course id
		$is_update=$this->input->post();
		if(!empty($is_update)){
		$counter=0;
		$count=count($is_update['course_benifit_id']);
		$course_id=$is_update['course_id'];
		for($i=0; $i<$count;$i++) {
			$course_benifit_id=$is_update['course_benifit_id'][$i];
			$benifit_title=$is_update['benifit_title'][$i];
			$description=$is_update['description'][$i];
			$input=array(
						'benifit_title'		=>	$benifit_title,	
						'description'		=>	$description
			);
			$update=$this->cms->update_benifits($input,$course_benifit_id);	
			if($update){// check all updated
					$counter++;
			}	
		}
			if(($counter==$count)){ // check all updated
				redirect(base_url()."index.php/admin/admin/updatetopic/".$course_id);
			}

		}else{
		if(isset($child_id)){
			
			$data=$this->comman_data_functions($child_id);
			$data['page_title']=" Update Benifits ";
			$data['action_url']=base_url().'index.php/admin/admin/updatebenifits';
			$data['button']=" Update Benifit ";
			$this->load->view('updatebenifits',$data);
			}else{
				$data['page_title']="Add Benifits";
				redirect(base_url()."index.php/admin/admin/create/");
			}
		}
		//updatebenifits
	}
	function updatetopic($course_id){
		$is_update=$this->input->post();
		if(!empty($is_update)){
		$counter=0;
		$count=count($is_update['course_topic_id']);
		$course_id=$is_update['course_id'];
		for($i=0; $i<$count;$i++) {
			$course_topic_id=$is_update['course_topic_id'][$i];
			$course_topic_title=$is_update['course_topic_title'][$i];
			$course_topic_description=$is_update['course_topic_description'][$i];
			$input=array(
						'course_topic_title'		=>	$course_topic_title,	
						'course_topic_description'		=>	$course_topic_description
			);
			$update=$this->cms->update_topics($input,$course_topic_id);	
			if($update){// check all updated
					$counter++;
			}	
		}
			if(($counter==$count)){
				redirect(base_url()."index.php/admin/admin/create/");
			}
		}else{
		if(isset($course_id)){
			$data=$this->comman_data_functions($course_id);
			$data['action_url']=base_url().'index.php/admin/admin/updatetopic';
			$data['button']=" Update ";
			$data['page_title']=" Update Topic ";
			$this->load->view('updatetopic',$data);
		}else{
			redirect(base_url()."index.php/admin/admin/create/");
		}
		}
	}
	function benifits($course_id){
			$data=$this->comman_data_functions($course_id);
			$data['page_title']="Add Benifits";
			$data['action_url']=base_url().'index.php/admin/admin/addbenifits';
		if(!empty($course_id)){
			$data['course_id']=$course_id;
		}
		$this->load->view('benifits',$data);
	}
	function addbenifits(){
		$inputs=$this->input->post();
		if($inputs['option']=="benifit"){
			unset($inputs['option']);
			$this->cms->create_new_benifit($inputs);
			redirect(base_url()."index.php/admin/admin/benifits/".$inputs['course_id']);
		}else{
			redirect(base_url()."index.php/admin/admin/topic/".$inputs['course_id']);
			exit("topic");
		}
		exit("jjj");
	}

	function topic($course_id){
		$this->checklogin();
		if(!empty($course_id)){
			$data=$this->comman_data_functions($course_id);
			$data['action_url']=base_url().'index.php/admin/admin/addtopic/'.$course_id;
			$data['course_id']=$course_id;
			$this->load->view('topic',$data);
		}else{
			exit("first Add Course");
		}
	}
	function addtopic(){
		$inputs=$this->input->post();
		if($inputs['option']=="topic"){
			unset($inputs['option']);
			$this->cms->create_new_topic($inputs);
			redirect(base_url()."index.php/admin/admin/topic/".$inputs['course_id']);
		}else{
			redirect(base_url()."index.php/admin/admin/dashboard");
			exit("topic");
		}
		exit("jjj");
	}

	function logout(){
		$is_login=$this->session->userdata();

		if(!empty($is_login['login_id'])){
			$this->session->unset_userdata('login_id');
			redirect(base_url()."index.php/admin/admin/dashboard");
		}
	}
	function main(){
	$this->load->library('upload');
		$this->load->helper('form');
		$data['page']=$this->input->get();
		extract($data['page']);
		$child_id=@$edit_id;
		$data=$this->comman_data_functions($child_id);
		//$request=$this->input->get();
		if(empty($child_id)){
			/*exit("d");*/
			$data['action_url']=base_url().'index.php/admin/admin/addmain';
			$data['button']="Add New";
			$this->load->view('main_course',$data);
		}else{
			$data['button']="update Course";
			$data['action_url']=base_url().'index.php/admin/admin/addmain/'.$child_id;
			$this->load->view('main_course',$data);
		}	
	}
	
	function addmain(){
		$inputs=$this->input->post();
		if(empty($child_id)){
			$upload_check=$this->uploadingfiles($_FILES['upload_file']);
			$inputs['image']=$_FILES['upload_file']['name'];
			$this->cms->create_main_course($inputs);
			$course_id=$this->db->insert_id();
			redirect(base_url()."index.php/admin/admin/main/".$course_id);
		}else{
			$upload_check=$this->uploadingfiles($_FILES['upload_file']);
			$inputs['image']=$_FILES['upload_file']['name'];
			$update=$this->cms->update_main_course($inputs,$child_id);
			if($update){
				redirect(base_url()."index.php/admin/admin/main/".$child_id);	
			}	
		}
	}
}
