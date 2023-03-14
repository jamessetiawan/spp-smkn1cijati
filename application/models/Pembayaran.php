<?php
class Pembayaran extends CI_Model
{

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('siswa', 'siswa.nisn = pembayaran.nisn');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_by_kelas($kelas, $tahun = "", $bulan = "")
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('siswa', 'siswa.nisn = pembayaran.nisn');
		$this->db->join('spp', 'spp.id_spp = pembayaran.id_spp');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$this->db->where('siswa.id_kelas', $kelas);
		if ($tahun != "" && $tahun != "semua") {
			$this->db->where('pembayaran.tahun_bayar', $tahun);
		}
		if ($bulan != "" && $bulan != "semua") {
			$this->db->where('pembayaran.bulan_bayar', $bulan);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('pembayaran.id_pembayaran', $id);
		$query = $this->db->get();
		return $query->row();
	}
	public function get_by_siswa($nisn, $tahun = "")
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('siswa', 'siswa.nisn = pembayaran.nisn');
		$this->db->join('spp', 'spp.id_spp = pembayaran.id_spp');
		if ($tahun != "" && $tahun != "semua") {
			$this->db->where('pembayaran.tahun_bayar', $tahun);
		}
		$this->db->where('pembayaran.nisn', $nisn);
		// echo $this->db->get_compiled_select();
		$query = $this->db->get();

		return $query->result();
	}
	public function insert($id_petugas, $nisn, $bulan, $tahun, $id_spp, $jumlah_bayar)
	{
		$data = array(
			'nisn' => $nisn,
			'id_petugas' => $id_petugas,
			'tgl_bayar' => date('Y-m-d'),
			'bulan_bayar' => $bulan,
			'tahun_bayar' => $tahun,
			'id_spp' => $id_spp,
			'jumlah_bayar_1' => $jumlah_bayar,
		);
		return $this->db->insert('pembayaran', $data);
	}
	public function update($id, $id_petugas, $nisn, $bulan, $tahun, $id_spp, $jumlah_bayar)
	{
		$this->db->set('id_petugas', $id_petugas);
		$this->db->set('nisn', $nisn);
		$this->db->set('bulan_bayar', $bulan);
		$this->db->set('tahun_bayar', $tahun);
		$this->db->set('id_spp', $id_spp);
		$this->db->set('jumlah_bayar', $jumlah_bayar);

		$this->db->where('id_pembayaran', $id);
		return $this->db->update('pembayaran');
	}
	public function delete($id)
	{
		return $this->db->delete('pembayaran', array('id_pembayaran' => $id));
	}
}
