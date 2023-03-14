<?php
class Petugas extends CI_Model
{
    public function get_by_user($username,$password)
    {
        $this->db->where('username', $username);
		$this->db->where('password', $password);

        $query = $this->db->get('petugas');
        return $query->row();
    }

    public function get_all()
    {
        $query = $this->db->get('petugas');
        return $query->result();
    }
}
