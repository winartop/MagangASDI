<?Php

Class event extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('m_event');
        $this->load->library('pagination');
    }

    function index() {
			$config['base_url']=base_url()."event/index";
			date_default_timezone_set('Asia/Jakarta');
			$data['tanggal']=date("Y-m-d");
				$data['title']='Lowongan Kerja';
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
					$config['total_rows']= $this->db->query("SELECT * FROM artikel WHERE `id_kategori`='1';")->num_rows();
					$this->pagination->initialize($config);
					$data['dataartikel']=$this->m_event->getinfo($config);
					$this->load->view('pengunjung/v_event', $data);

    }

    function cari() {
        $config['base_url'] = site_url('event/index');
        $config['total_rows'] = $this->Model_artikel->br()->num_rows();
        $config['per_page'] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['pagination'] = $this->pagination->create_links();
        $keyword = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('v_artikel');
        $this->db->where('id_kategori', $keyword);
        $data['artikel'] = $this->db->get()->result();
        $data['kategori'] = $this->db->get('kategori')->result();
        $this->load->view('pengunjung/v_event', $data);
    }

		function detail(){
				$id=$this->uri->segment(3);
				$data['dataartikel']=$this->m_event->getdetail($id);
				if ($data['dataartikel']) {
						date_default_timezone_set('Asia/Jakarta');
						$data['tanggal']=date("Y-m-d");
						$data['dataartikel']=$this->m_event->getdetail($id);

						$data['path'] = base_url('assets');

						$this->load->view('pengunjung/v_infodetail', $data);
				}else{
						redirect("member/info");
				}
		}

    function pencarian(){
        $config['base_url'] = site_url('event/index');
        $config['total_rows'] = $this->Model_artikel->br()->num_rows();
        $config['per_page'] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['pagination'] = $this->pagination->create_links();
        $keyword = $this->input->post('cari');
        $this->db->select('*');
        $this->db->from('v_artikel');
        $this->db->where('judul',$keyword);
        $data['artikel'] = $this->db->get()->result();
        $data['kategori'] = $this->db->get('kategori')->result();
        $this->load->view('pengunjung/v_event', $data);
    }




}
?>
