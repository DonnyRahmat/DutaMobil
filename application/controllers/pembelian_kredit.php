<?php 


/**
* 
*/
class Pembelian_kredit extends CI_Controller
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
		$data['kredit'] = $this->m_mobil->get_pembelian_kredit();
		$data['paket'] = $this->m_mobil->get_paket_kredit();
		$data['mobil'] = $this->m_mobil->get_mobil();
		$data['kode'] = $this->m_mobil->auto_kode_pembelian_kredit();
		$this->load->view('parts/header', $data);
		$this->load->view('v_pembelian_kredit', $data);
		$this->load->view('parts/footer', $data);
	}

	public function insert_pembelian_kredit()
	{
		$data['level'] = $this->session->userdata('level');	
		if ($this->input->post('submit')) {
			$this->m_mobil->insert_pembelian_kredit();
			redirect(base_url('pembelian_kredit'));	
		}else{
			redirect(base_url('pembelian_kredit'));
		}
	}

	public function delete_pembelian_kredit($kode_kredit)
	{
		$data['level'] = $this->session->userdata('level');	
		$this->m_mobil->delete_pembelian_kredit($kode_kredit);
		redirect(base_url('pembelian_kredit'));
	}

	public function edit_paket_kredit($kode_kredit)
	{
		$data['level'] = $this->session->userdata('level');	
		$data['edit'] = $this->m_mobil->edit_pembelian_kredit($kode_paket);
		$this->load->view('parts/header', $data);		
		$this->load->view('v_edit_pembelian_kredit',$data);
		$this->load->view('parts/footer', $data);		
	}

	public function update_paket_kredit()
	{
		$data['level'] = $this->session->userdata('level');	
		$this->m_mobil->update_pembelian_kredit();
		redirect(base_url('pembelian_kredit'));
	}

}