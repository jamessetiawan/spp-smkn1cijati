<?php
class Kelas extends CI_Model
{
    public function get_all()
    {
        $query = $this->db->get('kelas');
        return $query->result();
    }
	public function get_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->where('id_kelas', $id);
		$query = $this->db->get();
		return $query->row();
    }
}
