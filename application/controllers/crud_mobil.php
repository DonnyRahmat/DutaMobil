<?php 


/**
* 
*/
class Crud_mobil extends CI_Controller
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
		$data['mobil'] = $this->m_mobil->get_all_mobil();
		$this->load->view('parts/header', $data);
		$this->load->view('v_crud_mobil', $data);
		$this->load->view('parts/footer', $data);
	}

	function do_upload()
	{
			$data['level'] = $this->session->userdata('level');
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '10000';
			$config['max_width']  = '102400';
			$config['max_height']  = '76800';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('parts/header', $error, $data);
				$this->load->view('v_crud_mobil', $error, $data);
				$this->load->view('parts/footer', $error, $data);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());


				$this->load->view('parts/header', $data);
				$this->load->view('v_crud_mobil', $data);
				$this->load->view('parts/footer', $data);
				$this->m_mobil->insert_mobil();
				redirect(base_url('crud_mobil'));
			}

		

	}	

	public function delete_mobil($kode_mobil)
	{
		$data['level'] = $this->session->userdata('level');
		$this->m_mobil->delete_mobil($kode_mobil);
		redirect(base_url('index.php/crud_mobil'));
	}

	public function edit_mobil($kode_mobil)
	{
		$data['level'] = $this->session->userdata('level');
		$data['edit'] = $this->m_mobil->edit_mobil($kode_mobil);
		$this->load->view('parts/header', $data);		
		$this->load->view('v_edit_mobil',$data);
		$this->load->view('parts/footer', $data);		
	}

	public function update_mobil()
	{
		$data['level'] = $this->session->userdata('level');
		$this->m_mobil->update_mobil();
		redirect(base_url('index.php/crud_mobil'));
	}
}