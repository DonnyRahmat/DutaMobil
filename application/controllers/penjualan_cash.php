<?php 

/**
* 
*/
class Penjualan_cash extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mobil');
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}		
	}

	public function index()
	{
		$data['level'] = $this->session->userdata('level');	
		$data['pelanggan'] = $this->m_mobil->get_pelanggan();
		$data['cash'] = $this->m_mobil->get_cash();
		$data['mobil'] = $this->m_mobil->get_mobil();
		$data['kode'] = $this->m_mobil->auto_kode_cash();
		$this->load->view('parts/header', $data);
		$this->load->view('v_penjualan_cash', $data);	
		$this->load->view('parts/footer', $data);		
	}

	public function insert_cash()
	{		
		
		if ($this->input->post('submit')) {
		$data['level'] = $this->session->userdata('level');
			$kode = $this->m_mobil->auto_harga();
			$this->m_mobil->insert_cash();
			$this->load->view('faktur/confirm_cetak');
		}else{
			redirect(base_url('penjualan_cash'));
		}
	}

	public function faktur()
	{
		$data['user'] = $this->session->userdata('username');
		$data['faktur'] = $this->m_mobil->get_faktur_cash();
		$this->load->view('faktur/cetak_faktur_pembelian', $data);
	}

}