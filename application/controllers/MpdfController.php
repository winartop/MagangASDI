<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MpdfController extends CI_Controller {

  function __construct() {
      parent::__construct();
      $this->load->library('mpdf');
  }

	public function index()
	{
		$data = $this->load->view('admin/mpdf_v');
	}

	public function printPDF()
	{
		$mpdf = new vendor\Mpdf\Mpdf();
		$data = $this->load->view('admin/v_alumni', [], TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
	}

}
