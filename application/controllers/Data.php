<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('database');
	}

	function add_data()
	{
		$this->session->userdata('logged_in');
		$id_category = $this->database->check_category_asset($this->input->post('category_name'));

		if ($this->input->post('category_name')=="PC Desktop" || $this->input->post('category_name')=="Network Device"){
			$data = array (
				"id_category" => $id_category,
				"sn" => $this->input->post('sn'),
				"name" => $this->input->post('name'),
				"merk" => $this->input->post('merk'),
				"type" => $this->input->post('type'),
				"year" => $this->input->post('year'),
				"cost_center" => $this->input->post('cost_center'),
				"pic" => $this->input->post('pic'),
				"room" => $this->input->post('room'),
				"os" => $this->input->post('os'),
				"ram" => $this->input->post('ram'),
				"hdd" => $this->input->post('hdd'),
				"processor" => $this->input->post('processor'),
				"ip" => $this->input->post('ip'),
				"port" => $this->input->post('port'),
				"id_mill" => $this->session->userdata('id_mill')
				);
		}

		else {
			$data = array (
			"id_category" => $id_category,
			"sn" => $this->input->post('sn'),
			"name" => $this->input->post('name'),
			"merk" => $this->input->post('merk'),
			"type" => $this->input->post('type'),
			"year" => $this->input->post('year'),
			"cost_center" => $this->input->post('cost_center'),
			"pic" => $this->input->post('pic'),
			"room" => $this->input->post('room'),
			"ip" => $this->input->post('ip_printer'),
			"id_mill" => $this->session->userdata('id_mill')
			);
		}
		$this->database->add_data($data);
		redirect('page');
	}

	function delete_data($id_asset)
	{
		$this->database->delete_data($id_asset);
		redirect('page');
	}

	function edit_data($id_asset)
	{
		$data = $this->database->edit_data($id_asset);
		echo json_encode($data);
	}

	function update_data()
	{	
		$data = array (
			"sn" => $this->input->post('sn'),
			"name" => $this->input->post('name'),
			"merk" => $this->input->post('merk'),
			"type" => $this->input->post('type'),
			"year" => $this->input->post('year'),
			"cost_center" => $this->input->post('cost_center'),
			"pic" => $this->input->post('pic'),
			"room" => $this->input->post('room'),
			"os" => $this->input->post('os'),
			"ram" => $this->input->post('ram'),
			"hdd" => $this->input->post('hdd'),
			"processor" => $this->input->post('processor'),
			"ip" => $this->input->post('ip'),
			"port" => $this->input->post('port')
			);
		
		$this->database->update_data(array("id_asset" => $this->input->post('id_asset')), $data);
		redirect('page');
	}

	public function add_maintain_record()
	{
		$this->session->userdata('logged_in');
		$id_category = $this->database->check_category_maintain($this->input->post('category_name'));

		$data = array (
				"id_asset" => $this->input->post('id_asset'),
				"id_type" => $id_category,
				"date" => $this->input->post('date'),
				"desc" => $this->input->post('desc'),
				"remark" => $this->input->post('remark'),
				"id_mill" => $this->session->userdata('id_mill')
				);
		
		$this->database->add_data_maintain($data);
		redirect('page/maintain');
	}

	function edit_data_maintain($id_maintain)
	{
		$data = $this->database->edit_data_maintain($id_maintain);
		echo json_encode($data);
	}

	function update_data_maintain()
	{	
		$id_category = $this->database->check_category_maintain($this->input->post('category_name'));
		$data = array (
			"id_type" => $id_category,
			"date" => $this->input->post('date'),
			"desc" => $this->input->post('desc'),
			"remark" => $this->input->post('remark')
			);
		
		$this->database->update_data_maintain(array("id_maintain" => $this->input->post('id_maintain')), $data);
		redirect('page/maintain');
	}
}
