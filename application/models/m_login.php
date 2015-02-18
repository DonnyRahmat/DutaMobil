<?php 


/*

*/

class M_login extends CI_Model
{
	
	public function cek_user($data)
	{
		return $this->db->get_where('t_user', $data);
	}

}