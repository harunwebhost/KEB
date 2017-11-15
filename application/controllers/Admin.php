<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() {
		
        parent::__construct();
       	$this->load->helper(array('url','form'));
		$this->load->database();
		$this->load->model('stock');	
		$this->load->library('session');
		$user_login=$this->session->userdata('login_id');
		// check login
		if(empty($user_login)){
			$this->session->set_userdata('error','Login Again');
			redirect(base_url().'index.php/admin/takein');
		}
	}
	
	function purchases($selected_pro=""){
				$data['purchases']=$this->stock->purchases($selected_pro);
				$data['admin_url']=$this->admin_url();
				$data['search']=true;
				$data['edit_page']=$this->admin_url()."purchases?type=edit&edit_id=";
				$data['delete_page']="delete?type=";
				$data['title']="All Purchases";
				$data['body']="purchases_view.php";
				$data['unit']=$this->unit();

			if($_GET['type']=="view"){
				$this->load->view('admin_views/index',$data);
			}elseif($_GET['type']=="new" || $_GET['type']=="edit"){
				// this view is used to new & edit 
				$data['body']="purchase.php";
				if($_GET['type']=="edit"){
					$data['title']="Update record";
					$purchases_id=$_GET['edit_id'];
					$data['purchases']=$this->stock->purchases($purchases_id);
					//$this->debug($data['purchases']);
					$data['submit_url']=$this->admin_url()."new_purchases?edit_id=";
					$data['button']="Update";	
				}else{
					$data['title']="Add new";
					$data['purchases']=0;
					$data['button']="Add New";
					$data['submit_url']=$this->admin_url()."new_purchases";
				}
				$data['supplier']=$this->stock->suppiler("");
				$data['items']=$this->stock->items("");
				$this->load->view('admin_views/index',$data);
			}elseif($_GET['type']=="delete"){
				if(isset($_GET['remove_id'])){
					// delete id
					$remove_id=$_GET['remove_id'];
					$condition=array('purchase_id'=>$remove_id);
					$this->stock->public_delete($table,$condition);
					redirect($this->admin_url().'purchases');
				}else{

				}
			}else{
				$data['show']=true;
				//$this->debug($data);
			$this->load->view('admin_views/index',$data);
		}

			
	}
	function new_purchases(){
		if($this->method()){
			$inputs=$_POST;
			if(isset($_GET['edit_id'])){
			$condition=array('purchase_id'=>$inputs['purchase_id']);
			$this->stock->update_purchase($inputs,$condition);
			}else{
				$this->stock->add_purchase($inputs);
				if($this->stock->itempresent($inputs['item_id'])==0){
					// New Stock Adding
					$addnewstock['stock_total']=$inputs['total_item'];
					$addnewstock['item_id']=$inputs['item_id'];
					$this->stock->add_stock($addnewstock);
				}else{
					// this is for Updating existing stock
					$new_stock=$inputs['total_item'];
					$item_id=$inputs['item_id'];
					// here only incrementing the stock values
					$existing_stock=$this->stock->checkstock($item_id);
					$update_stock_value=$existing_stock[0]['stock_total']+$new_stock;
					//$this->debug($update_stock_value);
					$data=array("stock_total"=>$update_stock_value);
					$condition=array('item_id' => $item_id);
					$this->stock->update_stock($data,$condition);
				}
			}
			redirect($this->admin_url().'purchases');	
		}else{
			redirect($this->admin_url().'purchases');
		}
	}
	
	function mysuppliers(){
				$data['suppliers']=$this->stock->suppiler("");
				$data['admin_url']=$this->admin_url();
				$data['show']=true;
				$data['search']=true;
				$data['edit_page']=$this->admin_url()."supplier?type=edit&edit_id=";
				$data['delete_page']="supplier?delete_id=";
				$data['title']="My suppliers";
				$data['body']="supplier_view.php";
				$this->view($data);
	}
	function supplier(){
				//$data['suppliers']=$this->stock->suppiler("");
				$data['admin_url']=$this->admin_url();
				$data['show']=false;
				$data['body']="supplier_view.php";
				
				$data['submit_url']=$this->admin_url()."addsupplier";
				$opration=$this->input->get();
				if(isset($opration['edit_id'])){
					// Show Edit page
					$data['title']="Update suppliers";
					$data['button']="Update";
					$data['suppliers']=$this->stock->suppiler($opration['edit_id']);
				}elseif(isset($opration['delete_id'])){
					// Delete function
					$condition=array('deler_id'=>$opration['delete_id']);
					$this->stock->public_delete('delears',$condition);
					$this->jump('mysuppliers',$msg="");
					
				}else{
					$data['button']="Add New";
					// add new record
					$data['title']="Add suppliers";
				}	
				$this->view($data);
	}
	function addsupplier(){
		if($this->method()){
			$deler_id=$this->input->post('deler_id');
			$inputs=$_POST;
			if(isset($deler_id)){
				$condition=array('deler_id'=>$inputs['deler_id']);
				$this->stock->update_supplier($inputs,$condition);
			}else{
				$this->stock->add_supplier($inputs);
			}
			$this->jump('mysuppliers',$msg="");
		}
	}




function myproducts(){
				$data['suppliers']=$this->stock->items("");
				$data['admin_url']=$this->admin_url();
				$data['show']=true;
				$data['edit_page']=$this->admin_url()."product?type=edit&edit_id=";
				$data['delete_page']="product?delete_id=";
				$data['title']="My Products";
				$data['body']="items_view.php";
				$this->view($data);
	}
	function product(){
				//$data['suppliers']=$this->stock->suppiler("");
				$data['admin_url']=$this->admin_url();
				$data['show']=false;
				$data['body']="items_view.php";
				$data['unit']=$this->unit();
				//$this->debug($data['unit']);
				$data['submit_url']=$this->admin_url()."addproduct";
				$opration=$this->input->get();
				if(isset($opration['edit_id'])){
					// Show Edit page
					$data['title']="Update Item";
					$data['button']="Update";
					$data['item']=$this->stock->items($opration['edit_id']);
				}elseif(isset($opration['delete_id'])){
					// Delete function
					$condition=array('item_id'=>$opration['delete_id']);
					$this->stock->public_delete('item_details',$condition);
					$this->jump('myproducts',$msg="");
					
				}else{
					$data['button']="Add New";
					// add new record
					$data['title']="Add Product";
				}	
				$this->view($data);
	}
	function addproduct(){
		if($this->method()){
			$item_id=$this->input->post('item_id');
			$inputs=$_POST;
			if(isset($item_id)){
				$condition=array('item_id'=>$inputs['item_id']);
				$this->stock->update_item($inputs,$condition);
			}else{
				$this->stock->add_item($inputs);
			}
			$this->jump('myproducts',$msg="");
		}
	}

function mystock(){
				$data['stock']=$this->stock->checkstock("");
				$data['admin_url']=$this->admin_url();
				$data['show']=true;
				//$data['edit_page']=$this->admin_url()."product?type=edit&edit_id=";
				//$data['delete_page']="product?delete_id=";
				$data['title']="Stock History";
				$data['body']="stock_view.php";
				$this->view($data);
}

function sales(){
				$data['stock']=$this->stock->checkstock("");
				$data['admin_url']=$this->admin_url();
				$data['show']=true;
				$data['title']="Sale";
				$data['submit_url']=$this->admin_url().'addsale';
				$data['customer']=$this->stock->customers("");
				$data['body']="sales_view.php";
				$this->view($data);
}
function mycustomer(){
				$data['customers']=$this->stock->customers("");
				$data['admin_url']=$this->admin_url();
				$data['show']=true;
				$data['edit_page']=$this->admin_url()."addcustomer?type=edit&edit_id=";
				$data['delete_page']="addcustomer?delete_id=";
				$data['customer_view']="salesdetails?customer_id=";
				$data['title']="My Customer";
				$data['submit_url']=$this->admin_url().'addcustomer';
				$data['customer']=$this->stock->customers("");
				$data['body']="customer_view.php";
				$this->view($data);
}

	function customer(){
		if($this->method()){

			$customer_id=$this->input->post('customer_id');
			$inputs=$_POST;
			if(isset($customer_id)){
				//$this->debug($inputs);
				$condition=array('customer_id'=>$inputs['customer_id']);
				$this->stock->update_customer($inputs,$condition);
			}else{
				//$this->debug($inputs);
				$this->stock->add_customer($inputs);
			}
			$this->jump('mycustomer',$msg="");
		}
	}
	// View customer sales details
	function salesdetails(){
				$search=$this->input->get();
				// this is for view page
				if(!empty($search['customer_id'])){
					$data['sales']=$this->stock->filtersales($search);
					$data['customer']=$this->stock->customers($search['customer_id']);
					$data['body']="customer_sales.php";
					$data['show']=true;
					$data['title']="Sold Item";
					$this->view($data);
				}else{
					$data['admin_url']=$this->admin_url();
					$data['show']=true;
					$data['title']="Seach Sales";
					$data['submit_url']=$this->admin_url().'salesdetails';
					$data['customer']=$this->stock->customers("");
					$data['body']="search_form.php";
					$this->view($data);
				}

				
	}




function addcustomer(){

				$data['admin_url']=$this->admin_url();
				$data['show']=false;
				$data['body']="customer_view.php";
				$data['submit_url']=$this->admin_url()."customer";
				$opration=$this->input->get();
				if(isset($opration['edit_id'])){
					// Show Edit page
					$data['title']="Update suppliers";
					$data['button']="Update";
					$data['customers']=$this->stock->customers($opration['edit_id']);
					//$this->debug($data['customers']);
				}elseif(isset($opration['delete_id'])){
					// Delete function
					$condition=array('deler_id'=>$opration['delete_id']);
					$this->stock->public_delete('delears',$condition);
					$this->jump('mycustomer',$msg="");
					
				}else{
					$data['button']="Add New";
					// add new record
					$data['title']="Add suppliers";
				}	
				$this->view($data);
	}


function unit(){
	return array("xyz","KG","miter","peas");
}

function addsale(){
	if($this->method()){
		$inputs=$_POST;
		//$this->debug($inputs);
		 //$insert_count=count(array_filter($inputs['sell_quantity']));
		$from_date=date('Y-m-d');
		$customer_id=$data[$i]['customer_id']=$inputs['customer_id'];
		for($i=0;$i<count($inputs['sell_quantity']);$i++){
			if($inputs['sell_quantity'][$i]!=0){
			$data[$i]['item_id']=$inputs['item_id'][$i];
			$data[$i]['sold_item']=$inputs['sell_quantity'][$i];
			$data[$i]['sold_date']=date('Y-m-d');
			$data[$i]['customer_id']=$inputs['customer_id'];
			$existing_stock=$this->stock->checkstock($data[$i]['item_id']);
			$update_stock_value=$existing_stock[0]['stock_total']-$data[$i]['sold_item'];
			$update_data=array("stock_total"=>$update_stock_value);
			$condition=array('item_id' => $data[$i]['item_id']);
			$this->stock->update_stock($update_data,$condition);
			}
		}
		
		$this->stock->sales($data);
		$this->jump("salesdetails?customer_id=$customer_id&from=$from_date&to=$from_date",$msg="");
	}
}


function test(){
	$this->debug($this->stock->checkstock(""));
	
}












	function view($data){
		return $this->load->view("admin_views/index",$data);
	}
	function jump($page,$msg){
		redirect($this->admin_url().$page);
	}

	function method(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				return true;
			}else{
				return false;
			}
	}

	
	
	 
	function debug($data){
		echo "<pre>";
		print_r($data);
		exit(":debug");
	}
	function deletecourse(){
		$id=$this->input->get();
		if($this->cms->delete_course_model($id['id'])){
			//redirect();
		}
	}
	 
	function admin_url(){
		return base_url().'index.php/admin/';
	}
	function takeout(){
		$is_login=$this->session->userdata();

		if(!empty($is_login['login_id'])){
			$this->session->unset_userdata('login_id');
			redirect(base_url()."index.php/takein");
		}
	}
}