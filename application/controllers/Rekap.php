<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $status = $this->session->userdata('role');
    if(!isset($status)){
      redirect(base_url("Login"));
    }
		$this->load->model('Model_rekap');
	}

	public function index()
	{
		
	}

	public function a3()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakA3()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/a3', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function indoor()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakIndoor()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/indoor', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function outdoor()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakOutdoor()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/outdoor', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function cutting()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakCutting()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/cutting', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function finishing()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakFinishing()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/finishing', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

}

/* End of file Rekap.php */
/* Location: ./application/controllers/Rekap.php */