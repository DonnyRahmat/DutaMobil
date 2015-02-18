<?php 


/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')==!null) {
			redirect(base_url());
		}		
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('m_login'); // load model_user
		$hasil = $this->m_login->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['id_user'] = $sess->id_user;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='superuser') {
				redirect('home');
			}
			elseif ($this->session->userdata('level')=='admin') {
				redirect('home');
			}
			elseif ($this->session->userdata('level')=='user') {
				redirect('home');
			}
		}
		else {
			$this->load->view('v_gagal_login');
		}
	}

}