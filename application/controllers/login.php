<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
        if($this->session->userdata('username')){
            $this->m_user->goPageUser();
        }
	}

	function index(){
        $this->data['title']='Login';
        $this->load->view('v_login', $this->data);
    }

	function proses(){
        $this->form_validation->set_rules('username','username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');

        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus diisi.');
            redirect('login/index');
        }else{
            $username=$this->input->post('username');
            // cek username sudah terdaftar?
            $cek_username=$this->m_user->cekusername($username);
            if($cek_username->num_rows()>0){
                // cek username sudah dikonfirmasi
                $cek_aktif=$this->m_user->cek_aktif($username);
                if($cek_aktif->num_rows()>0){
                    $password=$this->input->post('password');
                    // cek kecocokan username dan password
                    $cek=$this->m_user->cek($username, md5($password));
                    if($cek->num_rows()>0){
                    //login berhasil, buat session
                        $this->session->set_userdata('username',$username);
                        $this->m_user->goPageUser();
                    }else{
                        //login gagal
                        $this->session->set_flashdata('message',"Kombinasi Username dan Anda Password Salah. <a href='".site_url('login/lupa_password')."'>Klik disini jika lupa password!</a>");
                        redirect('login/index');
                    }
                }else{
                    //login gagal
                    $this->session->set_flashdata('message','Akun anda telah dibekukan atau belum mendapat konfirmasi dari Administrator.');
                    redirect('login/index');
                }
            }else{
                //login gagal
                $this->session->set_flashdata('message','Username tidak terdaftar.');
                redirect('login/index');
            }
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

		function reset_proses(){
        $data['title']='Lupa Password';
        $this->load->view('v_reset_proses', $data);
    }

}
?>
