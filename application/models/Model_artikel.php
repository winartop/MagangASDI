<?php

Class Model_artikel extends CI_Model {

    function add($foto) {
      $this->db->where('id_kategori', $id_kategori);
  		$this->db->update('artikel', $data);
        $data = array(
            'judul' => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'foto' => $foto,
            'isi_artikel' => $this->input->post('isi_artikel')
        );
        $this->db->insert('artikel', $data);
    }

    function getall(){
          $this->db->select('kode');
          $this->db->select('nama_prodi');
  		$hasilquery=$this->db->get('prodi');
  		if ($hasilquery->num_rows > 0) {
  			foreach ($hasilquery->result() as $value) {
  				$data[]=$value;
  			}
  			return $data;
  		}
  	}

    function edit($foto) {
        if (!empty($foto)) {
            $data = array(
                'judul' => $this->input->post('judul'),
                'id_kategori' => $this->input->post('id_kategori'),
                'isi_artikel' => $this->input->post('isi_artikel'),
                'foto' => $foto,
            );
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'id_kategori' => $this->input->post('id_kategori'),
                'isi_artikel' => $this->input->post('isi_artikel')
            );
        }
        $id_artikel = $this->input->post('id_artikel');
        $this->db->where('id_artikel', $id_artikel);
        $this->db->update('artikel', $data);
    }

    function br() {
        $this->db->select('*');
        $this->db->from('v_artikel');
        $query = $this->db->get();
        return $query;
    }

    function join_br($limit, $start) {
        $this->db->select('*');
        $this->db->from('v_artikel');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    function get_foto($id_artikel){
          $query=$this->db->query("SELECT foto FROM `artikel` WHERE id_artikel=".$id_artikel);
  			if ($query->num_rows > 0) {
  				foreach ($query->result() as $artikel)
  				{
  				   $foto=$artikel->foto;
  				}
  			return $foto;
  			}
  	}

  	function foto_baru($id_artikel, $data){
  		$this->db->where('id_artikel', $nim);
  		$this->db->update('artikel', $data);
  	}


}

?>
