<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_master_asset()
	{
		$id_mill = $this->session->userdata('id_mill');
		$query = $this->db->query('SELECT * FROM `tb_master_asset` join tb_cat_asset WHERE tb_master_asset.id_category = tb_cat_asset.id_category AND tb_master_asset.id_mill = '. (int)$id_mill); 
		return $query->result();
	}

	function get_category_asset(){
		$query = $this->db->get('tb_cat_asset','category_name');
	    return $query->result();
   	}

   	function check_category_asset($category_name){
   		$this->db->where('category_name',$category_name);
   		$this->db->select('id_category');
		$query = $this->db->get('tb_cat_asset');

		foreach ($query->result() as $row)
		{
        return $row->id_category;
		}
   	}	

   	function add_data($data)
	{
		$this->db->insert('tb_master_asset', $data);
	}

	function delete_data($id_asset)
	{
		$this->db->where('id_asset', $id_asset);
		$this->db->delete('tb_master_asset');
	}

	function edit_data($id_asset)
	{
		$this->db->from('tb_master_asset');
		$this->db->where('id_asset',$id_asset);
		$query = $this->db->get();
		return $query->row();
	}

	function update_data($id_asset, $data)
	{
		$this->db->update('tb_master_asset', $data, $id_asset);
		//return $this->db->last_query();
	}

	function get_maintain_record()
	{
		$id_mill = $this->session->userdata('id_mill');
		$query = $this->db->query('SELECT * FROM `tb_maintain` join tb_cat_maintain join tb_master_asset WHERE tb_maintain.id_type = tb_cat_maintain.id_category AND tb_maintain.id_asset = tb_master_asset.id_asset AND tb_maintain.id_mill = '. (int)$id_mill); 
		return $query->result();
	}

	function get_category_maintain(){
		$query = $this->db->get('tb_cat_maintain','category_name');
	    return $query->result();
   	}

   	function check_category_maintain($category_name){
   		$this->db->where('category_name',$category_name);
   		$this->db->select('id_category');
		$query = $this->db->get('tb_cat_maintain');

		foreach ($query->result() as $row)
		{
        return $row->id_category;
		}
   	}

   	function add_data_maintain($data)
	{
		$this->db->insert('tb_maintain', $data);
	}

	function edit_data_maintain($id_maintain)
	{
		$this->db->from('tb_maintain');
		$this->db->where('id_maintain',$id_maintain);
		$query = $this->db->get();
		return $query->row();
	}

	function update_data_maintain($id_maintain, $data)
	{
		$this->db->update('tb_maintain', $data, $id_maintain);
		//return $this->db->last_query();
	}

	function get_cost_center(){
		$id_mill = $this->session->userdata('id_mill');
		$query = $this->db->query('SELECT DISTINCT `cost_center` FROM tb_master_asset WHERE id_mill = '. (int)$id_mill);
		return $query->result();
	}

	function get_asset_report ($id_cat, $cost_center, $year1, $year2){
		$id_mill = $this->session->userdata('id_mill');
		$this->db->from('tb_master_asset');
		if ($id_cat!=NULL)
			$this->db->where('id_category',$id_cat);
		if ($cost_center!=NULL)
			$this->db->where('cost_center',$cost_center);
		if ($year1!="") 
			$this->db->where('year >=', $year1);
		if ($year2!="")	
			$this->db->where('year <=', $year2);
		
		$this->db->where('id_mill', $id_mill);
		$query = $this->db->get();
		//return $this->db->last_query();
		return $query->result();
	}

	function get_maintain_report ($id_cat, $remark, $date1, $date2){
		$id_mill = $this->session->userdata('id_mill');
		
		$this->db->from('tb_maintain AS t1, tb_cat_maintain AS t2, tb_master_asset AS t3');
		$this->db->where('t1.id_asset = t3.id_asset');
		if ($id_cat!=NULL)
			$this->db->where('id_type',$id_cat);

		$this->db->where('t1.id_type = t2.id_category');

		if ($remark=="remark")
			$this->db->where('remark !=',"");
		if ($date1!="") 
			$this->db->where('date >=', $date1);
		if ($date2!="")	
			$this->db->where('date <=', $date2);
		
		$this->db->where('t1.id_mill', $id_mill);


		$query = $this->db->get();
		//return $this->db->last_query();
		return $query->result();
	}	
}