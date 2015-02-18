<?php 


/**
* 
*/
class Cicilan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();		
	}


	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		$data['all_cicilan'] = $this->m_mobil->all_cicilan();
		$this->load->view('parts/header', $data);		
		$this->load->view('v_cicilan',$data);
		$this->load->view('parts/footer', $data);		

	}

	public function bayar_cicilan($kode_kredit)
	{
		$data['level'] = $this->session->userdata('level');
		$data['cicilan'] = $this->m_mobil->cicilan($kode_kredit);
		$data['kode'] = $this->m_mobil->auto_kode_bayar_cicilan();
		$data['null_cicilan'] = $this->m_mobil->null_cicilan($kode_kredit);			
		$this->load->view('parts/header', $data);	
		$this->load->view('v_bayar_cicilan',$data);
		$this->load->view('parts/footer', $data);
	}

	public function insert_cicilan()
	{
		$this->m_mobil->insert_cicilan();
		redirect(base_url('cicilan'));
	}

	public function lunas()
	{
		$this->load->view('v_lunas');
	}
}