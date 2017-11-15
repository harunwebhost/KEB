<?php 
	class MY_Controller extends CI_Controller{

		protected $data=array();
		public function _construct(){
			parent::_construct();
		}
		public function layout(){
			$this->template['header']=$this->load->view('template/header',$this->data,TRUE);
			$this->template['footer']=$this->load->view('template/footer',$this->data,TRUE);
			$this->template['sidebar']=$this->load->view('template/sidebar',$this->data,TRUE);
			$this->template['page']=$this->load->view($this->page,$this->data,TRUE);
			$this->load->view("template/main",$this->template);
		}
	}
 ?>