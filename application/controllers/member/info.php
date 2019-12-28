<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Info extends CI_Controller{

	function __construct(){
		parent::__construct();
        if($this->session->userdata('level')!='member'){
        	redirect('login');
        }
        $this->load->Model('m_info');
	}

	function index(){
		$username=$this->session->userdata('username');
		date_default_timezone_set('Asia/Jakarta');
		$data['tanggal']=date("Y-m-d");
		$data['datauser']=$this->m_user->getnama($username);
	    $data['title']='Lowongan Kerja';
        $config['base_url']=base_url()."admin/info/index";
        $config['per_page']=5;
        $config['num_links']=3;
        $config['uri_segment']=4;
        $config['next_tag_open'] = '<li>'; $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>'; $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="bg-orange">'; $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>'; $config['num_tag_close'] = '</li>';
        $config['first_link']='< Pertama';
        $config['last_link']='Terakhir >';
        $config['next_link']='>';
        $config['prev_link']='<';
        $config['total_rows']= $this->db->query("SELECT * FROM artikel WHERE `id_kategori`='2';")->num_rows();
        $this->pagination->initialize($config);
        $data['dataartikel']=$this->m_info->getinfo($config);
        $data['page']='member/v_info';
        $this->load->view('member/v_dashboard', $data);
	}

    function detail(){
        $id=$this->uri->segment(4);
        $data['dataartikel']=$this->m_info->getdetail($id);
        if ($data['dataartikel']) {
            $username=$this->session->userdata('username');
            date_default_timezone_set('Asia/Jakarta');
            $data['tanggal']=date("Y-m-d");
            $data['datauser']=$this->m_user->getnama($username);
            $data['dataartikel']=$this->m_info->getdetail($id);

            $data['path'] = base_url('assets');

            $data['title']='Detail Lowongan';
            $data['page']='member/v_infodetail';
            $this->load->view('member/v_dashboard', $data);
        }else{
            redirect("member/info");
        }
    }


    function pekerjaan(){
        $id=$this->uri->segment(4);
        $data['dataartikel']=$this->m_alumni->getdetail($id);
        if ($data['dataartikel']) {
            $username=$this->session->userdata('username');
            date_default_timezone_set('Asia/Jakarta');
            $data['tanggal']=date("Y-m-d");
            $data['datauser']=$this->m_user->getnama($username);
            $data['title']='Pekerjaan';
            $config['base_url']=base_url()."admin/alumni/pekerjaan/index";
            $config['total_rows']= $this->db->query("SELECT * FROM pekerjaan WHERE `nim`='".$id."';")->num_rows();
            $config['per_page']=10;
            $config['num_links']=3;
            $config['uri_segment']=4;
            $config['next_tag_open'] = '<li>'; $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>'; $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a class="bg-orange">'; $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>'; $config['num_tag_close'] = '</li>';
            $config['first_link']='< Pertama';
            $config['last_link']='Terakhir >';
            $config['next_link']='>';
            $config['prev_link']='<';
            $this->pagination->initialize($config);
            $data['datapekerjaan']=$this->m_pekerjaan->getall($id, $config);
            $data['page']='admin/v_pekerjaan';
            $this->load->view('admin/v_dashboard', $data);
        }else{
            redirect("admin/alumni");
        }
    }

    function detail_pekerjaan(){
        $id=$this->uri->segment(4);
        $data['datapekerjaan']=$this->m_pekerjaan->getdetail($id);
        if ($data['datapekerjaan']) {
            $username=$this->session->userdata('username');
            date_default_timezone_set('Asia/Jakarta');
            $data['tanggal']=date("Y-m-d");
            $data['datauser']=$this->m_user->getnama($username);

            $data['provinsi']=$this->m_wilayah->get_all_provinsi();
            $data['path'] = base_url('assets');

            $data['title']='Detail Pekerjaaan';
            $data['page']='admin/v_detail_pekerjaan';
            $this->load->view('admin/v_dashboard', $data);
        }else{
            redirect("admin/alumni");
        }
    }

    function editbio(){
            $nim=$this->input->post('nim');
            $nim_baru=$this->input->post('nim_baru');
            if ($nim==$nim_baru) {
                $this->form_validation->set_rules('nama','nama','required|trim|min_length[4]|max_length[50]|xss_clean');
                $this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required|trim|xss_clean');
                $this->form_validation->set_rules('tempat_lahir','tempat lahir','required|trim|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('msg_error',validation_errors());
                    redirect("admin/alumni/detail/$nim");
                }else{
                    $data2['nama']=$this->input->post('nama');
                    $this->m_alumni->edituser($nim, $data2);
                    $data['tanggal_lahir']=$this->input->post('tanggal_lahir');
                    $data['tempat_lahir']=$this->input->post('tempat_lahir');
                    $data['jenis_kelamin']=$this->input->post('jenis_kelamin');
                    $data['agama']=$this->input->post('agama');
                    $this->m_alumni->edit($nim, $data);
                    $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
                    redirect("admin/alumni/detail/$nim");
                }
            }else{
                $this->form_validation->set_rules('nim_baru','NIM','required|trim|callback_cek_username|alpha_dash|min_length[4]|max_length[50]|xss_clean');
                $this->form_validation->set_rules('nama','nama','required|trim|min_length[4]|max_length[50]|xss_clean');
                $this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required|trim|xss_clean');
                $this->form_validation->set_rules('tempat_lahir','tempat lahir','required|trim|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('msg_error',validation_errors());
                    redirect("admin/alumni/detail/$nim");
                }else{
                    $data2['username']=$this->input->post('nim_baru');
                    $data2['nama']=strtoupper($this->input->post('nama'));
                    $this->m_alumni->edituser($nim, $data2);
                    $data['nim']=$this->input->post('nim_baru');
                    $data['tahun_masuk']="20".substr($this->input->post('nim_baru'), 0, 2);
                    $data['tanggal_lahir']=$this->input->post('tanggal_lahir');
                    $data['tempat_lahir']=$this->input->post('tempat_lahir');
                    $data['jenis_kelamin']=$this->input->post('jenis_kelamin');
                    $data['agama']=$this->input->post('agama');
                    $this->m_alumni->edit($nim, $data);
                    $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
                    redirect("admin/alumni/detail/$nim_baru");
                }
            }
    }

    function editaka(){
        $nim=$this->input->post('nim');
        $this->form_validation->set_rules('tanggal_lulus','tanggal lulus','required|trim|xss_clean');
        $this->form_validation->set_rules('ipk','IPK','required|trim|min_length[3]|max_length[4]|numeric|xss_clean');
        $this->form_validation->set_rules('no_ijazah','nomor ijazah','required|trim|xss_clean');
        $this->form_validation->set_rules('no_transkrip','nomor transkrip','required|trim|xss_clean');
        $this->form_validation->set_rules('judul_ta','judul TA/Skripsi','required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("admin/alumni/detail/$nim");
        }else{
            $data['tanggal_lulus']=$this->input->post('tanggal_lulus');
            $data['ipk']=$this->input->post('ipk');
            $data['prodi']=$this->input->post('prodi');
            $data['no_ijazah']=$this->input->post('no_ijazah');
            $data['no_transkrip']=$this->input->post('no_transkrip');
            $data['judul_ta']=$this->input->post('judul_ta');
            $this->m_alumni->edit($nim, $data);
            $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
            redirect("admin/alumni/detail/$nim");
        }
    }

    function editkon(){
        $nim=$this->input->post('nim');
        $this->form_validation->set_rules('no_hp','Nomor HP','trim|required|min_length[11]|max_length[12]|numeric|xss_clean');
        $this->form_validation->set_rules('email','email','required|trim|valid_email|xss_clean');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("admin/alumni/detail/$nim");
        }else{
            $data['no_hp']=$this->input->post('no_hp');
            $data['email']=$this->input->post('email');
            $this->m_alumni->edituser($nim, $data);
            $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
            redirect("admin/alumni/detail/$nim");
        }
    }

    function editalamat(){
        $nim=$this->input->post('nim');
        $this->form_validation->set_rules('alamat','alamat','required|trim|xss_clean');
        $this->form_validation->set_rules('rt','RT','required|trim|max_length[3]|numeric|xss_clean');
        $this->form_validation->set_rules('rw','RW','required|trim|max_length[3]|numeric|xss_clean');
        $this->form_validation->set_rules('kelurahan','kelurahan','required|trim|xss_clean');
        $this->form_validation->set_rules('kecamatan','kecamatan','required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("admin/alumni/detail/$nim");
        }else{
            $data['alamat']=$this->input->post('alamat');
            $data['rt']=$this->input->post('rt');
            $data['rw']=$this->input->post('rw');
            $data['kecamatan']=$this->input->post('kecamatan');
            $data['kelurahan']=$this->input->post('kelurahan');
            $this->m_alumni->edit($nim, $data);
            $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
            redirect("admin/alumni/detail/$nim");
        }
    }

    function editkota(){
        $nim=$this->input->post('nim');
        $this->form_validation->set_rules('propinsi','propinsi','required|trim|callback_cek_propinsi|xss_clean');
        $this->form_validation->set_rules('kota','kabupaten/kota','required|trim|callback_cek_kabupaten|xss_clean');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("admin/alumni/detail/$nim");
        }else{
            $provinsi=$this->m_alumni->getpropinsi($this->input->post('propinsi'));
            $data['propinsi']=$provinsi[0]->nama;
            $kota=$this->m_alumni->getkota($this->input->post('kota'));
            $data['kota']=$kota[0]->nama;
            $this->m_alumni->edit($nim, $data);
            $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
            redirect("admin/alumni/detail/$nim");
        }
    }

    function hapus(){
        $nim=$this->input->post('nim');
        $foto=$this->m_alumni->get_foto($nim);
        if ($foto!="nopic.jpg") {
            unlink('./uploads/infra/'.$foto);
        }
        $this->session->set_flashdata('msg_success','Data Alumni telah dihapus.');
        $this->m_alumni->hapusalumni($nim);
        redirect('admin/alumni');
    }


    function editpass(){
			$nim=$this->input->post('nim');
        $this->form_validation->set_rules('passwordlama','Password Lama','required|trim|xss_clean');
				if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("admin/alumni/detail/$nim");
        }else{
						$data['datauser']=$this->m_user->getnama($username);
            $username=$this->session->userdata('username');
            $password=$this->input->post('passwordlama');
            $cek=$this->m_user->cek($username, md5($password));
            if($cek->num_rows()>0){
                $this->form_validation->set_rules('passwordbaru','passwordbaru','required|trim|min_length[6]|max_length[12]|xss_clean');
                $this->form_validation->set_rules('passwordbaru2','passwordbaru2','required|trim|xss_clean');
                if($this->form_validation->run()==false){
                    $this->session->set_flashdata('message','Password harus diisi dengan 6-12 Karakter.');
                    redirect("admin/alumni/detail/$nim");
                }else{
                    $passwordbaru=$this->input->post('passwordbaru');
                    $passwordbaru2=$this->input->post('passwordbaru2');
                        if ($passwordbaru==$passwordbaru2) {
                            $data['password']=md5($passwordbaru);
                            $this->m_user->ubahakun($username, $data);
                            $this->session->set_flashdata('message','Password berhasil diubah.');
                            redirect("admin/alumni/detail/$nim");
                        }else{
                            $this->session->set_flashdata('message','Masukan password baru 2 kali dengan benar.');
                            redirect("admin/alumni/detail/$nim");
                        }
                }
            }else{
                //login gagal
                $this->session->set_flashdata('message','Password anda salah.');
                redirect("admin/alumni/detail/$nim");
            }
        }
    }

		function tambah_artikel() {
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
					$data['page']='member/v_tambah_artikel';
					$this->load->view('member/v_dashboard', $data);
				}
		}
}
?>
