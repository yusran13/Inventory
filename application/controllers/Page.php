<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
	 parent::__construct();
	 $this->load->model('user');
	 $this->load->model('database');		
	}

	public function index()
	{		
	
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in){
			$this->load->view('login');
		}

		else{			
			$data["data"] = $this->database->get_master_asset();
			$data["category"] = $this->database->get_category_asset();
			$data["cost_center"] = $this->database->get_cost_center();
		
			$this->load->view('main', $data);
		}	
	}

	public function maintain()
	{		
	
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in){
			$this->load->view('login');
		}

		else{			
			$data["data"] = $this->database->get_maintain_record();
			$data["asset"] = $this->database->get_master_asset();
			$data["category"] = $this->database->get_category_maintain();
		
			$this->load->view('maintain', $data);
		}	
	}

	public function login()
	{
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in){
			$this->load->view('login');
		}

		else{
			
			$this->load->view('approved');
		}
	}

	public function auth()
	{
		$logged_in = $this->session->userdata('logged_in');
		if ($logged_in){
			redirect('login');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$encrypt = md5($password);
	    $result = $this->user->auth($username, $encrypt);

	    if ($result)
	    {
	    	foreach ($result as $row) {
	    		$this->session->set_userdata('id_user', $row->id_user);
	    		$this->session->set_userdata('username', $row->username);
	    		$this->session->set_userdata('name_info', $row->name_info);
	    		$this->session->set_userdata('id_mill', $row->id_mill);
	    		$this->session->set_userdata('logged_in', TRUE);
	    	}
	    	redirect('page');
	    }

	    else 
	    {
	    	$this->session->set_flashdata('info','info');
	    	redirect('page');
		}
	}

	public function logout ()
	{
		$this->session->sess_destroy();
	    redirect('page', 'refresh');
	}
	
}