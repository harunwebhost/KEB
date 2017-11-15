<?php 
class Stock extends ci_model
{
	
	function purchases($selected_pro){
		if(empty($selected_pro)){
			$this->db->select('*');
			$this->db->from('purschase');
			$this->db->join('delears','purschase.deler_id=delears.deler_id');
			$this->db->join('item_details','purschase.item_id=item_details.item_id');
			// get all 
			$query=$this->db->get();
			}else{
				//get single
			$query=$this->db->get_where('purschase',array('purchase_id'=>$selected_pro));
		}
		return $query->result_array();

	}

	function suppiler($selected_suppiler){
		if(empty($selected_suppiler)){
			return $this->db->get('delears')->result_array();
		}else{
			return $this->db->
			get_where('delears',array('deler_id'=>$selected_suppiler))
			->result_array();
		}
	}

	function items($selected_item){
		if(empty($selected_item)){
			return $this->db->get('item_details')->result_array();
		}else{
			return $this->db->
			get_where('item_details',array('item_id'=>$selected_item))
			->result_array();
		}
	}


	function customers($selected_customer){
		if(empty($selected_customer)){
			return $this->db->get('customers')->result_array();
		}else{
			return $this->db->
			get_where('customers',array('customer_id'=>$selected_customer))
			->result_array();
		}
	}

	function checkstock($item_id){
		if(!empty($item_id)){
		$this->db->select('stock_total');
		$this->db->from('stock');
		$this->db->where('item_id',$item_id);
		}else{
			$this->db->select('*');
			$this->db->from('stock');
			$this->db->join('item_details','item_details.item_id=stock.item_id');
		}
		return $this->db->get()->result_array();
		//return $this->db->get_where("stock",array('item_id'=>$item_id))->result_array();
	}

	// inserting function
	function add_purchase($input){
		$this->db->insert('purschase',$input);
	}
	function add_supplier($input){
		$this->db->insert('delears',$input);
	}
	function add_item($input){
		$this->db->insert('item_details',$input);
	}
	function add_stock($inputs){
		$this->db->insert("stock",$inputs);
	}
	function sales($inputs){
		$this->db->insert_batch('sold', $inputs);
		//$this->debug($inputs);
	}
	function add_customer($inputs){
		$this->db->insert('customers', $inputs);
	}



// update functions
	function update_purchase($input,$condition){
	$this->db->where($condition);
	$this->db->update('purschase',$input);
	}
	function update_supplier($input,$condition){
		$this->db->where($condition);
		$this->db->update('delears',$input);
	}
	function update_item($input,$condition){
		$this->db->where($condition);
		$this->db->update('item_details',$input);
	}
	
	function update_stock($input,$condition){
		$this->db->where($condition);
		$this->db->update('stock',$input);
		//$this->debug();
	}
	function update_customer($input,$condition){
			$this->db->where($condition);
			$this->db->update('customers',$input);
			//$this->debug();
		}
	
	function public_delete($table,$condition){
		$this->db->delete($table,$condition);
		//$this->debug();
	}

	function itempresent($item_id){
		$condition=array('item_id'=>$item_id);
		$query=$this->db->get_where("stock",$condition);
		return $query->num_rows();
	}

	// function to sales filter

	function filtersales($condition){

			$this->db->select('*');
			$this->db->from('sold');
			$this->db->join('customers','customers.customer_id=sold.customer_id');
			$this->db->join('item_details','item_details.item_id=sold.item_id');

			if(!empty($condition['customer_id']) && empty($condition['from'])){
			$this->db->where(array('sold.customer_id'=>$condition['customer_id']));
			//$query=$this->db->get_where('sold',array('purchase_id'=>$selected_pro));
			}else{
				$min=$condition['from'] ;
				$max=$condition['to'];
				/*print_r($condition);
				exit("lkk");*/
				$this->db->where('sold.customer_id',$condition['customer_id']);
				if(!empty($min) && !empty($max)){
				$this->db->where('sold.sold_date>=',$min);
				$this->db->where('sold.sold_date<=',$max);
				}elseif(!empty($min) && empty($max)){
					$this->db->where('sold.sold_date>=',$min);
				}

				/*,'sold.sold_date'=>$condition['from']*/
				/*$this->debug();*/
			}
			$query=$this->db->get();
			//$this->debug();
			return $query->result_array();
			
	}

	function debug(){
		echo $this->db->last_query();
		exit("adsad");
	}
	function check_login($inputs){
		$this->db->where($inputs);
		$this->db->limit(1);
		$query=$this->db->get('login');
		if($query->num_rows()==1){
			return $query->row_array();
		}else{
			return false;
		}
	}


	
}

	
 ?>