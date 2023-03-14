<?php
class Spp extends CI_Model
{

    public function get_all()
    {
		$this->db->select('*');
		$this->db->from('spp');
        $query = $this->db->get();
        return $query->result();
    }
	public function get_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('spp');
		$this->db->where('id_spp', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
