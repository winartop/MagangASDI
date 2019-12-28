<?php
Class Laporan extends CI_Controller{

  function __construct(){
    parent::__construct();
        if($this->session->userdata('level')!='admin'){
          redirect('login');
        }
        $this->load->library('pdf');
  }

  function index(){
    $username=$this->session->userdata('username');
    $data['datauser']=$this->m_user->getnama($username);
        $data['userdetail']=$this->m_user->getuser($username);
        $data['admin_num']=$this->m_user->admin_num();
        $data['title']='Pengaturan';
    $data['page']='admin/v_laporan';
        $this->load->view('admin/v_dashboard', $data);

  }

    function laporanAlumni(){
      date_default_timezone_set('Asia/Jakarta');
      $currentTime = date( 'yyyy-mm-dd hh:mm:ss \G\M\T', time());
      $currentTime = date( 'd-m-Y h:i:s A', time () );
      $image1 = "assets/gambar/asdi.png";
      $pdf = new FPDF('L','mm','A4');
      // membuat halaman baru
      $pdf->AddPage();
      // mencetak string

      $pdf->Image($image1, 30,3,30,30);
      $pdf->Cell(10,1,'',0,1);
      // mencetak string
      $pdf->SetFont('Arial','B',14);
      $pdf->Cell(280,6,'PORTAL PORTOFOLIO ALUMNI',0,1,'C');
      $pdf->Cell(280,6,'AKADDEMI SENI DAN DESAIN SURAKARTA',0,1,'C');
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(280,6,'Jl. Garuda Mas No.3, Pabelan, Kartasura, Surakarta 57162 telp. (0271) 7652997, (0271) 7652998',0,1,'C');
      $pdf->SetLineWidth(0);
      $pdf->SetLineWidth(1);
      $pdf->Line(10,33,285,33);
      $pdf->SetLineWidth(0);
      $pdf->Line(10,34,285,34);
      // Memberikan space kebawah agar tidak terlalu rapat
      $pdf->Cell(10,6,'',0,1);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(280,6,'LAPORAN ALUMNI ASDI YANG TERDAFTAR DI PORLIO-ALUMNI',0,1,'C');
      $pdf->SetFont('Arial','B',8);
      // Memberikan space kebawah agar tidak terlalu rapat
      $pdf->Cell(10,1,'',0,1);
      $pdf->Cell(45,2,"Di Cetak pada Tanggal : ".date("D-d/m/Y"),0,0,'C');
      $pdf->Cell(10,6,'',0,1);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(8,6,'NO',1,0,'C');
      $pdf->Cell(23,6,'NIM',1,0,'C');
      $pdf->Cell(40,6,'NAMA',1,0,'C');
      $pdf->Cell(56,6,'PRODI',1,0,'C');
      $pdf->Cell(35,6,'NO_HP',1,0,'C');
      $pdf->Cell(35,6,'EMAIL',1,0,'C');
      $pdf->Cell(20,6,'ANGKTAN ',1,0,'C');
      $pdf->Cell(50,6,'ALAMAT',1,1,'C');
      $pdf->SetFont('Arial','',8);
      $this->db->select('*');
      $this->db->from('alumni');
      $this->db->join('user', 'user.username=alumni.nim');
      $alumni = $this->db->get()->result();
      $no=1;
      foreach ($alumni as $row) {
         $pdf->Cell(8,6,$no,1,0,'C');
         $pdf->Cell(23,6,$row->nim,1,0);
         $pdf->Cell(40,6,$row->nama,1,0);
         $pdf->Cell(56,6,$row->prodi,1,0);
         $pdf->Cell(35,6,$row->no_hp,1,0,'C');
         $pdf->Cell(35,6,$row->email,1,0);
         $pdf->Cell(20,6,$row->tahun_masuk,1,0,'C');
         $pdf->Cell(50,6,$row->alamat,1,1);
      $no++;
      }
      $pdf->Output("Laporan_Alumni","I");
    }

    function laporanEvent(){
      date_default_timezone_set('Asia/Jakarta');
      $currentTime = date( 'yyyy-mm-dd hh:mm:ss \G\M\T', time());
      $currentTime = date( 'd-m-Y h:i:s A', time () );
      $image1 = "assets/gambar/asdi.png";
      $pdf = new FPDF('P','mm','A4');
      // membuat halaman baru
      $pdf->AddPage();
      // mencetak string

      $pdf->Image($image1, 15,3,30,30);
      $pdf->Cell(10,1,'',0,1);
      // mencetak string
      $pdf->SetFont('Arial','B',14);
      $pdf->Cell(200,6,'PORTAL PORTOFOLIO ALUMNI',0,1,'C');
      $pdf->Cell(200,6,'AKADDEMI SENI DAN DESAIN SURAKARTA',0,1,'C');
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(200,6,'Jl. Garuda Mas No.3, Pabelan, Kartasura, Surakarta 57162 telp. (0271) 7652997, (0271) 7652998',0,1,'C');
      $pdf->SetLineWidth(0);
      $pdf->SetLineWidth(1);
      $pdf->Line(10,33,200,33);
      $pdf->SetLineWidth(0);
      $pdf->Line(10,34,200,34);
      // Memberikan space kebawah agar tidak terlalu rapat
      $pdf->Cell(10,6,'',0,1);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(200,6,'LAPORAN ARTIKEL EVENT KAMPUS ASDI YANG TERDAFTAR DI PORLIO-ALUMNI',0,1,'C');
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(10,1,'',0,1);
      $pdf->Cell(45,2,"Di Cetak pada Tanggal : ".date("D-d/m/Y"),0,0,'C');
      $pdf->Cell(10,6,'',0,1);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(8,6,'NO',1,0,'C');
      $pdf->Cell(40,6,'JUDUL',1,0,'C');
      $pdf->Cell(56,6,'KATEGORI',1,0,'C');
      $pdf->Cell(35,6,'TANGGAL',1,1,'C');
      $pdf->SetFont('Arial','',8);
      $this->db->select('*');
      $this->db->from('artikel');
      $this->db->join('kategori', 'kategori.id_kategori=artikel.id_kategori WHERE kategori.id_kategori="1"');
      $artikel = $this->db->get()->result();
      $no=1;
      foreach ($artikel as $row) {
         $pdf->Cell(8,6,$no,1,0,'C');
         $pdf->Cell(40,6,$row->judul,1,0);
         $pdf->Cell(56,6,$row->nama_kategori,1,0);
         $pdf->Cell(35,6,$row->tanggal,1,1,'C');
      $no++;
      }
      $pdf->Output("Laporan_Artikel_Event","I");
    }

    function laporanLoker(){
      date_default_timezone_set('Asia/Jakarta');
      $currentTime = date( 'yyyy-mm-dd hh:mm:ss \G\M\T', time());
      $currentTime = date( 'd-m-Y h:i:s A', time () );
      $image1 = "assets/gambar/asdi.png";
      $pdf = new FPDF('P','mm','A4');
      // membuat halaman baru
      $pdf->AddPage();
      // mencetak string

      $pdf->Image($image1, 15,3,30,30);
      $pdf->Cell(10,1,'',0,1);
      // mencetak string
      $pdf->SetFont('Arial','B',14);
      $pdf->Cell(200,6,'PORTAL PORTOFOLIO ALUMNI',0,1,'C');
      $pdf->Cell(200,6,'AKADDEMI SENI DAN DESAIN SURAKARTA',0,1,'C');
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(200,6,'Jl. Garuda Mas No.3, Pabelan, Kartasura, Surakarta 57162 telp. (0271) 7652997, (0271) 7652998',0,1,'C');
      $pdf->SetLineWidth(0);
      $pdf->SetLineWidth(1);
      $pdf->Line(10,33,200,33);
      $pdf->SetLineWidth(0);
      $pdf->Line(10,34,200,34);
      // Memberikan space kebawah agar tidak terlalu rapat
      $pdf->Cell(10,6,'',0,1);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(200,6,'LAPORAN ARTIKEL EVENT KAMPUS ASDI YANG TERDAFTAR DI PORLIO-ALUMNI',0,1,'C');
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(10,6,'',0,1);
      $pdf->Cell(45,2,"Di Cetak pada Tanggal : ".date("D-d/m/Y"),0,0,'C');
      $pdf->Cell(10,6,'',0,1);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(8,6,'NO',1,0,'C');
      $pdf->Cell(60,6,'JUDUL',1,0,'C');
      $pdf->Cell(56,6,'KATEGORI',1,0,'C');
      $pdf->Cell(35,6,'TANGGAL',1,1,'C');
      $pdf->SetFont('Arial','',8);
      $this->db->select('*');
      $this->db->from('artikel');
      $this->db->join('kategori', 'kategori.id_kategori=artikel.id_kategori WHERE kategori.id_kategori="2"');
      $artikel = $this->db->get()->result();
      $no=1;
      foreach ($artikel as $row) {
         $pdf->Cell(8,6,$no,1,0,'C');
         $pdf->Cell(60,6,$row->judul,1,0);
         $pdf->Cell(56,6,$row->nama_kategori,1,0);
         $pdf->Cell(35,6,$row->tanggal,1,1,'C');
      $no++;
      }
      $pdf->Output("Laporan_Artikel_Event","I");
    }

    function laporanPekerjaan(){
      date_default_timezone_set('Asia/Jakarta');
      $currentTime = date( 'yyyy-mm-dd hh:mm:ss \G\M\T', time());
      $currentTime = date( 'd-m-Y h:i:s A', time () );
      $image1 = "assets/gambar/asdi.png";
      $pdf = new FPDF('L','mm','A4');
      // membuat halaman baru
      $pdf->AddPage();
      // mencetak string

      $pdf->Image($image1, 30,3,30,30);
      $pdf->Cell(10,1,'',0,1);
      // mencetak string
      $pdf->SetFont('Arial','B',14);
      $pdf->Cell(280,6,'PORTAL PORTOFOLIO ALUMNI',0,1,'C');
      $pdf->Cell(280,6,'AKADDEMI SENI DAN DESAIN SURAKARTA',0,1,'C');
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(280,6,'Jl. Garuda Mas No.3, Pabelan, Kartasura, Surakarta 57162 telp. (0271) 7652997, (0271) 7652998',0,1,'C');
      $pdf->SetLineWidth(0);
      $pdf->SetLineWidth(1);
      $pdf->Line(10,33,285,33);
      $pdf->SetLineWidth(0);
      $pdf->Line(10,34,285,34);
      // Memberikan space kebawah agar tidak terlalu rapat
      $pdf->Cell(10,6,'',0,1);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(280,6,'LAPORAN ALUMNI ASDI YANG TERDAFTAR DI PORLIO-ALUMNI',0,1,'C');
      $pdf->SetFont('Arial','B',8);
      // Memberikan space kebawah agar tidak terlalu rapat
      $pdf->Cell(10,1,'',0,1);
      $pdf->Cell(45,2,"Di Cetak pada Tanggal : ".date("D-d/m/Y"),0,0,'C');
      $pdf->Cell(10,6,'',0,1);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(8,6,'NO',1,0,'C');
      $pdf->Cell(21,6,'NIM',1,0,'C');
      $pdf->Cell(40,6,'NAMA',1,0,'C');
      $pdf->Cell(39,6,'BIDANG PEKERJAAN',1,0,'C');
      $pdf->Cell(30,6,'NAMA KANTOR',1,0,'C');
      $pdf->Cell(25,6,'JABATAN',1,0,'C');
      $pdf->Cell(40,6,'PENDAPATAN',1,0,'C');
      $pdf->Cell(26,6,'Tahun Wisuda',1,0,'C');
      $pdf->Cell(40,6,'ALAMAT',1,1,'C');
      $pdf->SetFont('Arial','',8);
      $this->db->select('*');
      $this->db->from('pekerjaan');
      $this->db->join('alumni', 'alumni.nim=pekerjaan.nim');
      $this->db->join('user', 'user.username=alumni.nim');
      $alumni = $this->db->get()->result();
      $no=1;
      foreach ($alumni as $row) {
         $pdf->Cell(8,6,$no,1,0,'C');
         $pdf->Cell(21,6,$row->nim,1,0);
         $pdf->Cell(40,6,$row->nama,1,0);
         $pdf->Cell(39,6,$row->jenis_pekerjaan,1,0,'C');
         $pdf->Cell(30,6,$row->nama_kantor,1,0,'C');
         $pdf->Cell(25,6,$row->jabatan,1,0,'C');
         $pdf->Cell(40,6,$row->pendapatan,1,0,'L');
         $pdf->Cell(26,6,$row->tanggal_lulus,1,0,'C');
         $pdf->Cell(40,6,$row->kota,1,1);
      $no++;
      }
      $pdf->Output("Laporan_Alumni","I");
    }



}
