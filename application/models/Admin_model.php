<?php 
	class Admin_model extends CI_model{
		function subcourse(){
			return $query=$this->db->get('course')->result_array();
		}
		function get_header_menus(){
		return $this->db->get('main_course')->result_array();
		}
	}
 ?>