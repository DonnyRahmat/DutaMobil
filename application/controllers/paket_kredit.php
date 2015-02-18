<?php 


/**
* 
*/
class Paket_kredit extends CI_Controller
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
		$data['paket'] = $this->m_mobil->get_paket_kredit();
		$this->load->view('parts/header', $data);
		$this->load->view('v_paket_kredit', $data);
		$this->load->view('parts/footer', $data);
	}

	public function insert_paket_kredit()
	{
		$data['level'] = $this->session->userdata('level');	
		if ($this->input->post('submit')) {
			$this->m_mobil->insert_paket_kredit();
			redirect(base_url('paket_kredit'));	
		}else{
			redirect(base_url('paket_kredit'));
		}
	}

	public function delete_paket_kredit($kode_paket)
	{
		$data['level'] = $this->session->userdata('level');	
		$this->m_mobil->delete_paket_kredit($kode_kredit);
		redirect(base_url('paket_kredit'));
	}

	public function edit_paket_kredit($kode_kredit)
	{
		$data['level'] = $this->session->userdata('level');	
		$data['edit'] = $this->m_mobil->edit_paket_kredit($kode_paket);
		$this->load->view('parts/header', $data);		
		$this->load->view('v_edit_paket',$data);
		$this->load->view('parts/footer', $data);		
	}

	public function update_paket_kredit()
	{
		$data['level'] = $this->session->userdata('level');	
		$this->m_mobil->update_mobil();
		redirect(base_url('paket_kredit'));
	}

}