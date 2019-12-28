<?php

class Artikel extends CI_Controller {

  function __construct(){
    parent::__construct();
        if($this->session->userdata('level')!='admin'){
          redirect('login');
        }
        $this->load->Model('Model_artikel');
        $this->load->Model('kategori_model');
        $this->load->model("product_model");
        $this->load->library('form_validation');
  }

    function index() {
        $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);

        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.id_kategori=artikel.id_kategori');
        $data['artikel'] = $this->db->get()->result();
        $data['page']='admin/artikel/list';
        $this->load->view('admin/v_dashboard', $data);
    }

    function data() {
        $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);

        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.id_kategori=artikel.id_kategori');
        $data['artikel'] = $this->db->get()->result();
        $data['page']='admin/artikel/list';
        $this->load->view('admin/v_dashboard', $data);
    }
    function tambah() {
      $username=$this->session->userdata('username');
      date_default_timezone_set('Asia/Jakarta');
      $data['tanggal']=date("Y-m-d");
      $data['datauser']=$this->m_user->getnama($username);

        if (isset($_POST['submit'])) {
            $upload = $this->upload();
            $this->Model_artikel->add($upload);
            $this->session->set_flashdata('berhasil', 'Sukses menambah artikel');
            redirect('Admin/Artikel');
        } else {
          $data['page']='admin/artikel/add';
          $this->load->view('admin/v_dashboard', $data);
        }
    }




    function edit() {
      $username=$this->session->userdata('username');
      date_default_timezone_set('Asia/Jakarta');
      $data['tanggal']=date("Y-m-d");
      $data['datauser']=$this->m_user->getnama($username);
        if (isset($_POST['submit'])) {
            $upload = $this->upload();
            $this->Model_artikel->edit($upload);
            $this->session->set_flashdata('edit', 'Sukses edit artikel');
            redirect('Admin/Artikel');
        } else {
            $id_artikel= $this->uri->segment(4);
            $data['artikel']= $this->db->get_where('artikel',array('id_artikel'=>$id_artikel))->row_Array();
            $data['page']='admin/artikel/edit';
            $this->load->view('admin/v_dashboard', $data);
        }
    }

    function Hapus() {
        $id_artikel = $this->uri->segment(4);
        $this->db->where('id_artikel',$id_artikel);
        $this->db->delete('artikel');
        $this->session->set_flashdata('hapus', 'berhasil menghapus data');
        redirect('Admin/Artikel');
    }

    function upload(){
      $config['upload_path']          = './uploads/artikel/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['file_name']            = $this->id_artikel;
      $config['overwrite']			= true;
      $config['max_size']             = 1024; // 1MB
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
          return $this->upload->data("file_name");
      }

      return "default.jpg";
    }

//kategori
function kategori() {
  $username=$this->session->userdata('username');
  date_default_timezone_set('Asia/Jakarta');
  $data['tanggal']=date("Y-m-d");
  $data['datauser']=$this->m_user->getnama($username);
    if (isset($_POST['submit'])) {
        $this->kategori_model->add();
        $this->session->set_flashdata('berhasil', 'sukses menambah data');
        redirect('Admin/artikel/kategori');
    } else {
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['page']='admin/artikel/kategori';
        $this->load->view('admin/v_dashboard', $data);
    }
}

function edit_kategori() {
    if (isset($_POST['submit'])) {
         $this->kategori_model->edit();
         $this->session->set_flashdata('edit', 'Sukses edit data');
        redirect('Admin/kategori/list');
    } else {
        $this->template->load('template', 'admin/kategori/list');
    }
}

function Hapus_kategori() {
    $id= $this->uri->segment(4);
    $this->db->where('id_kategori',$id);
    $this->db->delete('kategori');
     $this->session->set_flashdata('hapus', 'berhasil menghapus data');
    redirect('Admin/artikel/kategori');
}

function show_by_id_kategori() {
    $id_kategori = $_GET['id_kategori'];
    $sql_kategori = "select * from kategori where id_kategori='$id_kategori'";
    $kategori    = $this->db->query($sql_kategori)->row_Array();
    $data = array(
        'id_kategori' => $kategori['id_kategori'],
        'nama_kategori' => $kategori['nama_kategori']
    );
    echo json_encode($data);
}

function tambah_kategori(){
      $this->form_validation->set_rules('nama_kategori');
      if ($this->form_validation->run() == FALSE)
      {
          $this->index();
      }else{
          $data['nama_kategori']=$this->input->post('nama_kategori');
          $this->kategori_model->tambah($data);
          $this->session->set_flashdata('msg_success','Program Didik berhasil ditambahkan.');
          redirect('admin/artikel/kategori');
      }
}

//kategori

//new
public function add_artikel()
    {
      $username=$this->session->userdata('username');
      date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);
        $artikel = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($artikel->rules());

        if ($validation->run()) {
            $artikel->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data['page']='admin/artikel/add';
        $this->load->view('admin/v_dashboard', $data);
    }

    public function edit_artikel($id_artikel = null)
    {
        if (!isset($id_artikel)) redirect('admin/artikel/data');

        $artikel = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($artikel->rules());

        if ($validation->run()) {
            $artikel->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["artikel"] = $artikel->getById($id_artikel);
        if (!$data["artikel"]) show_404();

        $this->load->view("admin/artikel/edit", $data);
    }

    public function delete_artikel($id_artikel=null)
    {
        if (!isset($id)) show_404();

        if ($this->product_model->delete($id_artikel)) {
            redirect(site_url('admin/artikel/data'));
        }
    }



}

?>
