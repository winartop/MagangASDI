<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "artikel";

    public $id_artikel;
    public $judul;
    public $id_kategori;

    public $foto = "default.jpg";
    public $isi_artikel;
    //public $tanggal;

    function br() {
        $this->db->select('*');
        $this->db->from('artikel');
        $query = $this->db->get();
        return $query;
    }

    function join_br($limit, $start) {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

//=====================================================

    public function rules()
    {
        return [
            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],

            ['field' => 'id_kategori',
            'label' => 'Id Kategori',
            'rules' => 'required'],

            ['field' => 'isi_artikel',
            'label' => 'Isi Artikel',
            'rules' => 'required']

            //['field' => 'tanggal',
            //'label' => 'Tanggal',
          //  'rules' => 'date'],


        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_artikel)
    {
        return $this->db->get_where($this->_table, ["id_artikel" => $id_artikel])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_artikel;
        $this->judul = $post["judul"];
        //$this->tanggal = $post["tanggal"];
         $this->foto= $this->_uploadImage();
         $this->id_kategori = $post["id_kategori"];
		    $this->isi_artikel = $post["isi_artikel"];


        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_artikel = $post["id_artikel"];
        $this->judul = $post["judul"];
        $this->tanggal = $post["id_kategori"];
        //$this->tanggal = $post["tanggal"];

		if (!empty($_FILES["image"]["judul"])) {
            $this->foto = $this->_uploadImage();
        } else {
            $this->foto = $post["old_image"];
		}

        $this->isi_artikel = $post["isi_artikel"];
        $this->db->update($this->_table, $this, array('id_artikel' => $post['id_artikel']));
    }

    public function delete($id_artikel)
    {
		$this->_deleteImage($id_artikel);
        return $this->db->delete($this->_table, array("id_artikel" => $id_artikel));
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './uploads/artikel/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->id_artikel;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			return $this->upload->data("file_name");
		}

		return "default.png";
	}

	private function _deleteImage($id_artikel)
	{
		$artikel = $this->getById($id_artikel);
		if ($artikel->foto != "default.jpg") {
			$filename = explode(".", $artikel->foto)[0];
			return array_map('unlink', glob(FCPATH."uploads/artikel/$filename.*"));
		}
	}

}
