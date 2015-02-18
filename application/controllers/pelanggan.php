<?php 


/**
* 
*/
class Pelanggan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
		$this->load->model('m_mobil');
	}

	public function index()
	{	
		$data['level'] = $this->session->userdata('level');		
		$data['pelanggan'] = $this->m_mobil->get_all_pelanggan();
		$this->load->view('parts/header', $data);
		$this->load->view('v_crud_pelanggan', $data);
		$this->load->view('parts/footer', $data);
	}

	function insert_pelanggan()
	{		
		$data['level'] = $this->session->userdata('level');	
		if ($this->input->post('submit')) {
			$this->m_mobil->insert_pelanggan();
			redirect('pelanggan');
		}else{
			redirect('pelanggan');
		}
	}	

	public function delete_pelanggan($ktp_pembeli)
	{
		$data['level'] = $this->session->userdata('level');	
		$this->m_mobil->delete_pelanggan($ktp_pembeli);
		redirect(base_url('pelanggan'));
	}

	public function edit_pelanggan($ktp_pembeli)
	{
		$data['level'] = $this->session->userdata('level');
		$data['edit'] = $this->m_mobil->edit_pelanggan($ktp_pembeli);
		$this->load->view('parts/header', $data);		
		$this->load->view('v_edit_pelanggan',$data);
		$this->load->view('parts/footer', $data);		
	}

	public function update_pelanggan()
	{
		$data['level'] = $this->session->userdata('level');	
		$this->m_mobil->update_pelanggan();
		redirect(base_url('pelanggan'));
	}
}