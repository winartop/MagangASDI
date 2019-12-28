<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Daftar extends CI_Controller{
	function __construct(){
		parent::__construct();
        if($this->session->userdata('username')){
            $this->m_user->goPageUser();
        }
    $this->load->Model('m_user');
    $this->load->Model('m_pengurus');
    $this->load->Model('m_alumni');

	}

	function index(){
        $this->data['title']='Daftar';
        $this->form_validation->set_rules('username','username','required|trim|callback_cek_username|alpha_dash|min_length[4]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('nama','NAMA','required|trim|min_length[4]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('tahun_masuk','Tahun Masuk','required');
				$this->form_validation->set_rules('tanggal_lulus','Tanggal Lulus','required');
				$this->form_validation->set_rules('email','EMAIL','required|valid_email');
        $this->form_validation->set_rules('no_hp','NO_HP','required|trim|min_length[12]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('password','PASSWORD','required|trim|min_length[6]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password2','PASSWORD konfirmasi','required|trim|matches[password]|xss_clean');
        if($this->form_validation->run() == FALSE) {
            $this->load->view('v_daftar');
        }else{
            $data['username']=$this->input->post('username');
            if (condition) {
              // code...
            }
            $data['nama']   = strtoupper($this->input->post('nama'));
            $data['email']  =    $this->input->post('email');
            $data['no_hp']  =    $this->input->post('no_hp');
            $data['password'] =    md5($this->input->post('password'));
            $data['level']="member";
            $this->m_pengurus->tambah($data);

            $data2['nim']=$this->input->post('username');
						$data2['tahun_masuk']=$this->input->post('tahun_masuk');
						$data2['tanggal_lulus']=$this->input->post('tanggal_lulus');
            $this->m_alumni->tambah2($data2);

            $pesan['message'] = "Pendaftaran berhasil";

            $this->load->view('v_daftar',$pesan);
            $this->load->view('v_login');
        }


  }

		function lupa_password(){
        $data['title']='Lupa Password';
        $vals = array(
        'img_path' => './assets/captcha/',
            'img_url' => base_url().'assets/captcha/',
            'img_width' => 160,
            'img_height' => 50,
            'expiration' => 600
        );
        $cap = create_captcha($vals);
        $this->session->set_userdata('keycode',$cap['word']);
        $data['captcha_img'] = $cap['image'];
        $this->load->view('v_reset', $data);
    }


}
?>
