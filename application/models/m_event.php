<?php
class M_event extends CI_Model{

	function getinfo($config){
        $this->db->select('*');
        $this->db->from("artikel");
        $this->db->where('id_kategori', "1");
		$this->db->order_by("tanggal", "asc");
		$hasilquery=$this->db->get("",$config['per_page'], $this->uri->segment(4));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}
	}

  function getdetail($id){
        $this->db->select('*');
        $this->db->from("artikel");
        $this->db->where('id_kategori', "1");
        $this->db->where('id_artikel', $id);
    $hasilquery=$this->db->get();
    if ($hasilquery->num_rows > 0) {
      foreach ($hasilquery->result() as $value) {
        $data[]=$value;
      }
      return $data;
    }
  }

}
?>
