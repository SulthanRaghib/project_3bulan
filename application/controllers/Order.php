<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $status = $this->session->userdata('role');
    if(!isset($status)){
      redirect(base_url("Login"));
    }
    
		$this->load->model('Model_order');
	}

	public function index()
	{
	
	}

	public function input_order()
	{
	$data['customer'] = $this->Model_order->get_customer();
	$data['kategori'] = $this->Model_order->get_kategori();
	$data['bahanBaku'] = $this->Model_order->get_bahanBaku();
	$this->load->view('dashboard/_partials/header');
    $this->load->view('dashboard/_partials/sidebar');
    $this->load->view('dashboard/input_order', $data);
    $this->load->view('dashboard/_partials/footer');
	}

	function tambah_order(){
		$id_order = $this->input->post('id_order');
		$tgl_order = $this->input->post('tgl_order');
		$no_po = $this->input->post('no_po');
		$urgensi = $this->input->post('urgensi');
		$no_telp = $this->input->post('no_telp');
		$nama = $this->input->post('nama');
		$nama_kerja = $this->input->post('nama_kerja');
		$kategori = $this->input->post('kategori');
		$id_barang  = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah');
		$panjang = $this->input->post('panjang');
		$lebar = $this->input->post('lebar');
		$biaya_design = $this->input->post('biaya_design');
		$harga_bahan = $this->input->post('harga_bahan');
		$catatan = $this->input->post('catatan');
		$finishing = $this->input->post('finishing');


 
		

	$config['upload_path']          = FCPATH.'/assets/data/';
	$config['allowed_types']        = '*';
	$config['file_name']            = $id_order;
	$config['max_size']             = 100000;

	$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload('berkas')){
	$data['error'] = $this->upload->display_errors();
	echo $data['error'];
	}else{

		$fix_upload = $this->upload->data();

		$where = [
		'id_order' => $id_order
	];

		$new_data = array(
		'file' => $fix_upload['file_name']
		);

		$data_foto = $new_data['file'];
		$data = array(
			'id_order' => $id_order,
			'tgl_order' => $tgl_order,
			'no_po' => $no_po,
			'nama_kerja' => $nama_kerja,
			'urgensi' => $urgensi,
			'no_telp' => $no_telp,
			'nama' => $nama,
			'kategori' => $kategori,
			'id_barang' => $id_barang,
			'jumlah' => $jumlah,
			'panjang' => $panjang,
			'lebar' => $lebar,
			'file' => $data_foto,
			'biaya_design' => $biaya_design,
			'harga_bahan' => $harga_bahan,
			'catatan' => $catatan,
			'finishing' => $finishing,
			'status' => 0,
			'status_bayar' => 0
			);
		


		$this->Model_order->input_data($data,'orderan');
		$this->session->set_flashdata('order_berhasil', ' ');
		redirect('Order/input_order');
	}
}

public function cari(){
        $id = $this->input->get('id');
        $cari = $this->Model_order->cari($id)->result();
        echo json_encode($cari);
    } 


	

	


}

/* End of file Order.php */
/* Location: ./application/controllers/Order.php */