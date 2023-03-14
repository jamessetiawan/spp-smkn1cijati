<?php

class Admin extends CI_Controller
{

	public $type_data=["view","insert","update"];

	public function __construct()
	{
			parent::__construct();
			$this->check_login();
			$this->load->model('Siswa');
			$this->load->model('Kelas');
			$this->load->model('Petugas');
			$this->load->model('Pembayaran');
			$this->load->model('Spp');

	}
	public function check_login(){
		if($this->uri->segment(2)!="auth"){
			if($this->session->userdata('type')!="admin" || empty($this->session->userdata('id'))){
				redirect('admin/auth/login');
			}	
		}
	}

	public function auth($type=""){
		if($type=="login"){
			$this->load->view('admin/auth/login');
		}elseif($type=="check"){
			extract($this->input->post());
			$get=$this->Petugas->get_by_user($username,$password);
			if($get){
				$this->session->set_userdata('type',"admin");
				$this->session->set_userdata('id',$get->id_petugas);
				$this->session->set_userdata('level',$get->level);
				$this->session->set_userdata('nama',$get->nama_petugas);
				redirect('admin');
			}else{
				$this->session->set_flashdata('error', 'Login Gagal, Periksa Kembali');
				redirect('admin/auth/login');
			}
		}elseif($type=="logout"){
			$this->session->sess_destroy();
			redirect('admin/auth/login');
		
		}else{
			redirect('admin/auth/login');
		}
	}
    public function index()
    {
		$kelas=$this->Kelas->get_all();
        $this->load->view('admin/index',['kelas'=>$kelas],false);
    }
	

	public function pembayaran($kelas,$type,$id=""){
		if($type=="insert"){
			extract($this->input->post());
			$spp_id=$this->Spp->get_by_id($spp);
			$insert=$this->Pembayaran->insert($this->session->userdata('id'),$nisn,$bulan,$spp_id->tahun,$spp,$jml_pembayaran);
			if($insert){
				$this->session->set_flashdata('message', "Berhasil disimpan");
				redirect('admin/data-pembayaran/'.$kelas);
			}else{
				$this->session->set_flashdata('error', 'Kesalahan Proses');
				redirect('admin/data-pembayaran/'.$kelas);

			}
		}elseif($type=="update"){
			extract($this->input->post());
			$spp_id=$this->Spp->get_by_id($spp);
			$update=$this->Pembayaran->update($id,$this->session->userdata('id'),$nisn,$bulan,$spp_id->tahun,$spp,$jml_pembayaran);
			if($update){
				$this->session->set_flashdata('message', "Berhasil diubah");
				redirect('admin/data-pembayaran/'.$kelas);
			}else{
				$this->session->set_flashdata('error', 'Kesalahan Proses');
				redirect('admin/data-pembayaran/'.$kelas);
			}
		}elseif($type=="delete"){
			$delete=$this->Pembayaran->delete($id);
			if($delete){
				$this->session->set_flashdata('message', "Berhasil dihapus");
				redirect('admin/data-pembayaran/'.$kelas);
			}else{
				$this->session->set_flashdata('error', 'Kesalahan Proses');
				redirect('admin/data-pembayaran/'.$kelas);
			}
		}
	}

    public function data_pembayaran($param_kelas="all",$type="view",$id="")
    {
		if($param_kelas=="all" || !is_numeric($param_kelas) || !in_array($type, $this->type_data)){
			redirect('admin');
		}

		$tahun=$this->input->get('tahun');
		$bulan=$this->input->get('bulan');
		$kelas=$this->Kelas->get_all();
		$spp=$this->Spp->get_all();
		$detail=$this->Kelas->get_by_id($param_kelas);		
		$data=$this->Pembayaran->get_by_kelas($param_kelas,$tahun,$bulan)??[];

		$edit=[];
		if($id){
			$edit=$this->Pembayaran->get_by_id($id);
		}
		
        $this->load->view('admin/pembayaran/'.$type,["detail"=>$detail,'edit'=>$edit,'spp'=>$spp,'kelas'=>$kelas,'data'=>$data],false);
    }

	public function siswa($kelas,$type,$id=""){
		if($type=="insert"){
			extract($this->input->post());
			$spp_id=$this->Spp->get_by_id($spp);
			$insert=$this->Siswa->insert($nisn,$nis,$nama,$kelas,$alamat,$telepon,$spp);
			if($insert){
				$this->session->set_flashdata('message', "Berhasil disimpan");
				redirect('admin/data-siswa/'.$kelas);
			}else{
				$this->session->set_flashdata('error', 'Kesalahan Proses');
				redirect('admin/data-siswa/'.$kelas);

			}
		}elseif($type=="update"){
			extract($this->input->post());
			$spp_id=$this->Spp->get_by_id($spp);
			$update=$this->Siswa->update($nis,$nisn,$nama,$kelas,$alamat,$telepon,$spp);
			if($update){
				$this->session->set_flashdata('message', "Berhasil diubah");
				redirect('admin/data-siswa/'.$kelas);
			}else{
				$this->session->set_flashdata('error', 'Kesalahan Proses');
				redirect('admin/data-siswa/'.$kelas);
			}
		}elseif($type=="delete"){
			$delete=$this->Siswa->delete($id);
			if($delete){
				$this->session->set_flashdata('message', "Berhasil dihapus");
				redirect('admin/data-siswa/'.$kelas);
			}else{
				$this->session->set_flashdata('error', 'Kesalahan Proses');
				redirect('admin/data-siswa/'.$kelas);
			}
		}
	}
    public function data_siswa($param_kelas="all",$type="view",$id="")
    {
		if($param_kelas=="all" || !is_numeric($param_kelas) || !in_array($type, $this->type_data)){
			redirect('admin');
		}
		$spp=$this->Spp->get_all();
		$kelas=$this->Kelas->get_all();
		$detail=$this->Kelas->get_by_id($param_kelas);
		$data=$this->Siswa->get_by_kelas($param_kelas)??[];
		
		$edit=[];
		if($id){
			$edit=$this->Siswa->get_by_id($id);
		}
        $this->load->view('admin/siswa/'.$type,["detail"=>$detail,"spp"=>$spp,"edit"=>$edit,"kelas"=>$kelas,"data"=>$data],FALSE);

    }

}
