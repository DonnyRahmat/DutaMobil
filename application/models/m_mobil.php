<?php 


/*
	PRAUJIKOM 2015
	PENJUALAN MOBIL
	OLEH : MOEHAMMAD DONNY RAHMAT KURNIAWAN
*/

class M_mobil extends CI_Model
{

	public function get_faktur_cash()
	{
		$last = $this->db->query("
			select C.kode_cash, P.nama_pembeli, P.alamat_pembeli, P.telp_pembeli, M.merk, M.kode_mobil, M.type, M.warna, C.cash_bayar, C.cash_tanggal 
			from t_mobil M inner join (t_pembeli P inner join t_beli_cash C on P.ktp_pembeli=C.ktp_pembeli) 
			on M.kode_mobil=C.kode_mobil");
		return $last->last_row();
	}

	public function cicilan($kode_kredit)
	{
		return $query = $this->db->query("
				select K.kode_kredit,M.merk, M.harga_mobil, PK.uang_muka, PK.paket_jml_cicilan, PK.bunga, P.nama_pembeli, B.cicilan_ke, B.cicilan_sisa_ke,B.cicilan_sisa_harga 
				from t_mobil M inner join (t_pembeli P inner join 
				(t_bayar_cicilan B inner join (t_paket_kredit PK inner join t_kredit K on PK.kode_paket=K.kode_paket) 
				on B.kode_kredit=K.kode_kredit) on P.ktp_pembeli=K.ktp_pembeli) on M.kode_mobil=K.kode_mobil 
				where K.kode_kredit='$kode_kredit' order by B.cicilan_ke desc")->row_array(); 

	}

	public function null_cicilan($kode_kredit)
	{
		return $query = $this->db->query("
				select K.kode_kredit,M.merk, M.harga_mobil, PK.uang_muka, PK.paket_jml_cicilan, PK.bunga, P.nama_pembeli 
				from t_mobil M inner join (t_pembeli P inner join 
				(t_paket_kredit PK inner join t_kredit K on PK.kode_paket=K.kode_paket) on P.ktp_pembeli=K.ktp_pembeli) 
				on M.kode_mobil=K.kode_mobil where K.kode_kredit='$kode_kredit' ")->result_array(); 

	}

	public function get_cicilan($kode_kredit)
	{
		return $query->db->get_where('t_bayar_cicilan', array('kode_kredit' => $kode_kredit ))->result_array();
	}

	public function all_cicilan()
	{
		return $query = $this->db->query("
				select K.kode_kredit,M.merk, M.harga_mobil, PK.uang_muka, PK.paket_jml_cicilan, PK.bunga, P.nama_pembeli 
				from t_mobil M inner join 
				(t_pembeli P inner join (t_paket_kredit PK inner join t_kredit K on PK.kode_paket=K.kode_paket) 
				on P.ktp_pembeli=K.ktp_pembeli) on M.kode_mobil=K.kode_mobil")->result_array();

	}	

	public function get_all_mobil()
	{
		return $query = $this->db->get('t_mobil')->result_array();

	}

	public function get_mobil()
	{
		return $query = $this->db->get_where('t_mobil', array('status' => null ))->result_array();

	}	

	public function get_pelanggan()
	{
		return $query = $this->db->get_where('t_pembeli',array('status' => null ))->result_array();

	}

	public function get_all_pelanggan()
	{
		return $query = $this->db->get('t_pembeli')->result_array();

	}

	public function count_mobil()
	{
		return $query = $this->db->count_all('t_mobil');

	}		


	public function get_paket_kredit()
	{
		return $query = $this->db->get('t_paket_kredit')->result_array();

	}

	public function get_pembelian_kredit()
	{
		return $query = $this->db->get('t_kredit')->result_array();

	}

	public function get_cash()
	{
		return $this->db->get('t_beli_cash')->result_array();
	}	

	public function count_cash()
	{	
		$now = date('Y-m-d');
		$query = $this->db->query("SELECT * FROM t_beli_cash WHERE cash_tanggal='$now'");
		return $query->num_rows();
	}

	public function count_kredit()
	{	
		$now = date('Y-m-d');
		$query = $this->db->query("SELECT * FROM t_kredit WHERE tgl_kredit='$now'");
		return $query->num_rows();
	}

	public function auto_harga()
	{
		$kode = $this->input->post('kode_mobil');
		$data = $this->db->get_where('t_mobil', array('kode_mobil' => $kode ))->row_array();
		return $harga = $data['harga_mobil'];
	}

    public function auto_kode_paket()
    {
        $q = $this->db->query("select MAX(right(kode_paket,4)) as max FROM t_paket_kredit");
        $kd = "";
        if ($q->num_rows()>0) {
            foreach ($q->result() as $key) {
                $tmp = ((int)$key->max)+1;
                $kd  = sprintf("%04s",$tmp);
            }
        }else{
            $kd="0001";
        }

        return "PK".$kd;
    }   

    public function auto_kode_cash()
    {
        $q = $this->db->query("select MAX(right(kode_cash,3)) as max FROM t_beli_cash");
        $now = date('Ym');
        $kd = "";
        if ($q->num_rows()>0) {
            foreach ($q->result() as $key) {
                $tmp = ((int)$key->max)+1;
                $kd  = sprintf("%03s",$tmp);
            }
        }else{
            $kd="001";
        }

        return "C".$now.$kd;
    }

    public function auto_kode_mobil()
    {
    	$merk = $this->input->post('merk');
    	$nm_merk = substr($merk, 0,3);
        $q = $this->db->query("select MAX(right(kode_mobil,4)) as max FROM t_mobil");
        $now = date('Y');
        $kd = "";
        if ($q->num_rows()>0) {
            foreach ($q->result() as $key) {
                $tmp = ((int)$key->max)+1;
                $kd  = sprintf("%04s",$tmp);
            }
        }else{
            $kd="0001";
        }

        return $nm_merk.$now.$kd;
    }

    public function auto_kode_pembelian_kredit()
    {
    	$date=date('Ym');
        $q = $this->db->query("select MAX(right(kode_kredit,3)) as max FROM t_kredit");
        $kd = "";
        if ($q->num_rows()>0) {
            foreach ($q->result() as $key) {
                $tmp = ((int)$key->max)+1;
                $kd  = sprintf("%03s",$tmp);
            }
        }else{
            $kd="001";
        }

        return "K".$date.$kd;
    }


    public function auto_kode_bayar_cicilan()
    {
    	$date=date('Ym');
        $q = $this->db->query("select MAX(right(kode_cicilan,3)) as max FROM t_bayar_cicilan");
        $kd = "";
        if ($q->num_rows()>0) {
            foreach ($q->result() as $key) {
                $tmp = ((int)$key->max)+1;
                $kd  = sprintf("%03s",$tmp);
            }
        }else{
            $kd="001";
        }

        return "A".$date.$kd;
    }

	public function insert_mobil()
	{
		$data = array(
			'kode_mobil' => $this->m_mobil->auto_kode_mobil(), 
			'merk' => $this->input->post('merk'), 
			'type' => $this->input->post('type'), 
			'warna' => $this->input->post('warna'), 
			'harga_mobil' => $this->input->post('harga_mobil'),
			'gambar' => $_FILES['userfile']['name']
			);

		return $this->db->insert('t_mobil', $data);
	}

	public function insert_pelanggan()
	{
		$data = array(
			'ktp_pembeli' => $this->input->post('ktp_pembeli'), 
			'nama_pembeli' => $this->input->post('nama_pembeli'), 
			'alamat_pembeli' => $this->input->post('alamat_pembeli'), 
			'telp_pembeli' => $this->input->post('telp_pembeli')
			);

		return $this->db->insert('t_pembeli', $data);
	}


	public function insert_cash()
	{
		$now = date('Y-m-d');
		$data = array(
			'kode_cash' => $this->m_mobil->auto_kode_cash(), 
			'ktp_pembeli' => $this->input->post('ktp_pembeli'), 
			'kode_mobil' => $this->input->post('mobil'), 
			'cash_tanggal' => $now, 
			'cash_bayar' => $this->auto_harga()
			);

		return $this->db->insert('t_beli_cash' , $data);
	}

	public function insert_paket_kredit()
	{
		$data = array(
			'kode_paket' => $this->m_mobil->auto_kode_paket(),
			'uang_muka' => $this->input->post('uang_muka'), 
			'paket_jml_cicilan' => $this->input->post('paket_jml_cicilan'),
			'bunga' => $this->input->post('bunga')
			);

		return $this->db->insert('t_paket_kredit', $data);
	} 

	public function insert_pembelian_kredit()
	{
		$now = date('Y-m-d');
		$data = array(
			'kode_kredit' => $this->m_mobil->auto_kode_pembelian_kredit(),
			'ktp_pembeli' => $this->input->post('ktp_pembeli'), 
			'kode_paket' => $this->input->post('kode_paket'), 
			'kode_mobil' => $this->input->post('kode_mobil'), 
			'tgl_kredit' => $now
			);

		return $this->db->insert('t_kredit', $data);
	}	


	public function insert_cicilan()
	{
		$now = date('Y-m-d');
		$data = array(
			'kode_cicilan' => $this->input->post('kode_cicilan'),
			'kode_kredit' => $this->input->post('kode_kredit'), 
			'jml_cicilan' => $this->input->post('jml_cicilan'), 
			'cicilan_ke' => $this->input->post('cicilan_ke'), 
			'cicilan_sisa_ke' => $this->input->post('cicilan_sisa_ke'), 
			'cicilan_sisa_harga' => $this->input->post('cicilan_sisa_harga'), 
			'tgl_cicilan' => $now
			);

		return $this->db->insert('t_bayar_cicilan', $data);
	}	


	public function delete_paket($kode_paket)
	{
		$query = $this->db->delete('t_paket_kredit', array('kode_paket' => $kode_paket)); 
	}

	public function delete_mobil($kode_mobil)
	{
		$query = $this->db->delete('t_mobil', array('kode_mobil' => $kode_mobil)); 
	}

	public function delete_pelanggan($ktp_pembeli)
	{
		$query = $this->db->delete('t_pembeli', array('ktp_pembeli' => $ktp_pembeli)); 
	}

	public function delete_pembelian_kredit($kode_kredit)
	{
		$query = $this->db->delete('t_kredit', array('kode_kredit' => $kode_kredit)); 
	}

	public function edit_paket($kode_paket)
	{
		return $query = $this->db->get_where('t_paket_kredit', array('kode_paket' => $kode_paket))->row(); 
	}

	public function edit_mobil($kode_mobil)
	{
		return $query = $this->db->get_where('t_mobil', array('kode_mobil' => $kode_mobil))->row(); 
	}

	public function edit_pelanggan($ktp_pembeli)
	{
		return $query = $this->db->get_where('t_pembeli', array('ktp_pembeli' => $ktp_pembeli))->row(); 
	}

	public function update_mobil()
	{
		$kode=$this->input->post('kode_mobil');
		$data = array(
			'kode_mobil' => $kode, 
			'merk' => $this->input->post('merk'), 
			'type' => $this->input->post('type'), 
			'warna' => $this->input->post('warna'), 
			'harga_mobil' => $this->input->post('harga_mobil')
			);

		$this->db->where('kode_mobil',$kode);
		$this->db->update('t_mobil',$data);
	}

	public function update_pelanggan()
	{
		$ktp_pembeli=$this->input->post('ktp_pembeli');
		$data = array(
			'ktp_pembeli' => $ktp_pembeli, 
			'nama_pembeli' => $this->input->post('nama_pembeli'), 
			'alamat_pembeli' => $this->input->post('alamat_pembeli'), 
			'telp_pembeli' => $this->input->post('telp_pembeli')
			);

		$this->db->where('ktp_pembeli',$ktp_pembeli);
		$this->db->update('t_pembeli',$data);
	}

	public function update_paket()
	{
		$kode=$this->input->post('kode_paket');
		$data = array(
			'kode_paket' => $kode, 
			'uang_muka' => $this->input->post('uang_muka'), 
			'paket_jml_cicilan' => $this->input->post('paket_jml_cicilan'), 
			'bunga' => $this->input->post('bunga')
			);

		$this->db->where('kode_paket',$kode);
		$this->db->update('t_paket_kredit',$data);
	}

}