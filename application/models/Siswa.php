<?php
class Siswa extends CI_Model
{

    public function get_all()
    {
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $query = $this->db->get();
        return $query->result();
    }
	public function get_by_kelas($kelas)
    {
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->where('siswa.id_kelas', $kelas);
		$query = $this->db->get();
		return $query->result();
    }
	public function get_by_nisn($nisn)
    {
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->where('siswa.nisn', $nisn);
		$this->db->or_where('siswa.nis', $nisn);
		$query = $this->db->get();
		
		return $query->row();
    }

	public function get_by_user($username,$password)
    {
        $this->db->where('nis', $username);
		$this->db->where('nisn', $password);

        $query = $this->db->get('siswa');
        return $query->row();
    }

	public function get_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('siswa.nis', $id);
		$query = $this->db->get();
		return $query->row();
    }
	public function insert($nisn,$nis,$nama,$kelas,$alamat,$telepon,$spp)
    {
		$data = array(
			'nisn' => $nisn,
			'nis'=>$nis,
			'nama_siswa' => $nama,
			'id_kelas' => $kelas,
			'alamat' => $alamat,
			'no_telp' => $telepon,
			'id_spp' => $spp,
	);
	return $this->db->insert('siswa', $data);
    }
	public function update($id,$nisn,$nama,$kelas,$alamat,$telepon,$spp){
		$this->db->set('nisn', $nisn);
		$this->db->set('nama_siswa', $nama);
		$this->db->set('id_kelas', $kelas);
		$this->db->set('alamat', $alamat);
		$this->db->set('no_telp', $telepon);
		$this->db->set('id_spp', $spp);

		$this->db->where('nis', $id);
		return $this->db->update('siswa');
	}
	public function delete($id){
		return $this->db->delete('siswa', array('nis' => $id));  
	}

}
