<?php
class Client extends CI_Controller
{
	public function __construct()
	{
			parent::__construct();
			$this->check_login();
			$this->load->model('Siswa');
			$this->load->model('Pembayaran');
			$this->load->model('Spp');

	}
    public function index()
    {
		$this->load->view('client/home');

    }
	public function dashboard()
    {
		$tahun=$this->input->get('tahun')??"";
		$spp=$this->Spp->get_all();

		$siswa=$this->Siswa->get_by_nisn($this->session->userdata('id'));
		$pembayaran=$this->Pembayaran->get_by_siswa($this->session->userdata('id'),$tahun);
		
        $this->load->view('client/view',["siswa"=>$siswa,"spp"=>$spp,'pembayaran'=>$pembayaran],false);
    }
	public function check_login(){
		if($this->uri->segment(2)!="auth" && $this->uri->segment(2)!=""){
			if($this->session->userdata('type')!="client" || empty($this->session->userdata('id'))){
				redirect('client/auth/login');
			}	
		}
	}
    public function auth($type="")
    {
		if($type=="login"){
			$this->load->view('client/auth/login');
		}elseif($type=="check"){
			extract($this->input->post());
			$get=$this->Siswa->get_by_user($nis,$nisn);
			if($get){
				$this->session->set_userdata('type',"client");
				$this->session->set_userdata('id',$get->nisn);
				$this->session->set_userdata('nama',$get->nama_siswa);
				
				redirect('client/dashboard');
			}else{
				$this->session->set_flashdata('error', 'Login Gagal, Periksa Kembali');
				redirect('client/auth/login');

			}
		}elseif($type=="logout"){
				$this->session->sess_destroy();
				redirect('client/auth/login');
			
			
		}else{
			redirect('client/auth/login');
		}
    }

}
