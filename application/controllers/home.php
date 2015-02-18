<?php 


/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->model('m_mobil');
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}		
	}

	public function index()
	{
		$data['count_cars'] = $this->m_mobil->count_mobil();
		$data['count_cash'] = $this->m_mobil->count_cash();
		$data['count_kredit'] = $this->m_mobil->count_kredit();
		$data['level'] = $this->session->userdata('level');
		$this->load->view('parts/header', $data);
		$this->load->view('v_home', $data);
		$this->load->view('parts/footer', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		$this->session->sess_destroy();
		redirect('login');
	}	

}