<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{

	function __construct(){
		parent::__construct();
        if($this->session->userdata('level')!='member'){
        	redirect('login');
        }
	}

	function index(){
		$username=$this->session->userdata('username');
		$data['datauser']=$this->m_user->getnama($username);
	    $id=$username;
	    $data['dataalumni']=$this->m_alumni->getdetail($id);
	    if ($data['dataalumni']) {
	        $email=$this->session->userdata('email');
	        date_default_timezone_set('Asia/Jakarta');
	        $data['tanggal']=date("Y-m-d");
	        $data['datauser']=$this->m_user->getnama($email);
	        $data['dataprodi']=$this->m_prodi->getall();
	        $data['provinsi']=$this->m_wilayah->get_all_provinsi();
	        $data['path'] = base_url('assets');
          $data['datapekerjaan']=$this->m_pekerjaan->getlast($id);
	        $data['title']='Pratinjau';
	        $data['page']='member/v_pratinjau';
	        $this->load->view('member/v_dashboard', $data);
	    }else{
	        redirect("login");
	    }
	}

	
}
?>
