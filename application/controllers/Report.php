<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

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
		}	
	}

	public function asset()
	{		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in){
			$this->load->view('login');
		}
		else{
			$asset_cat = $this->input->post('report_by_asset_category');
			$cost_center = $this->input->post('report_by_cost_center');
			$year1 = $this->input->post('start');
			$year2 = $this->input->post('end');

			$id_cat = $this->database->check_category_asset($asset_cat);
			$data["data"] = $this->database->get_asset_report($id_cat, $cost_center, $year1, $year2);
			//echo $this->database->get_asset_report($id_cat, $cost_center, $year1, $year2);
			//$this->load->view('report/asset', $data);

			$html=$this->load->view('report/asset', $data, true);
		    include_once APPPATH.'/third_party/mpdf/mpdf.php';
		    $this->mpdf = new mPDF('utf-8', 'A4-L');
		    $this->mpdf->WriteHTML($html);
		    $tgl = date("d-m-Y");
		    $pdfFilePath = 'Report_Asset_'.$tgl.'.pdf';
		    $this->mpdf->Output($pdfFilePath, 'I');
		}	
	}

	public function maintain()
	{		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in){
			$this->load->view('login');
		}
		else{
			$maintain_cat = $this->input->post('report_by_maintain_category');
			$remark = $this->input->post('category_report');
			$date1 = $this->input->post('start');
			$date2 = $this->input->post('end');
			$id_cat = $this->database->check_category_maintain($maintain_cat);

			$data["data"] = $this->database->get_maintain_report($id_cat, $remark, $date1, $date2);
			//echo $this->database->get_maintain_report($id_cat, $remark, $date1, $date2);
			//$this->load->view('report/maintain', $data);

			$html=$this->load->view('report/maintain', $data, true);
		    include_once APPPATH.'/third_party/mpdf/mpdf.php';
		    $this->mpdf = new mPDF('utf-8', 'A4-L');
		    $this->mpdf->WriteHTML($html);
		    $tgl = date("d-m-Y");
		    $pdfFilePath = 'Report_Maintain_'.$tgl.'.pdf';
		    $this->mpdf->Output($pdfFilePath, 'I');
		}	
	}
}