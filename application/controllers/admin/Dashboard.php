<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('url_helper');
		$this->load->helper('html');
		$this->load->database();
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->model("Kandidat_model");
		$this->load->model("Auth_model");

		//cek session login
		if(!$this->Auth_model->check_login()){
			redirect('auth');
		}
	}
	
    public function index()
	{
		$data['jumlah_all_kandidat'] = $this->Kandidat_model->jumlah_kandidat();
		$data['jumlah_kandidat_hari_ini'] = $this->Kandidat_model->jumlah_kandidat_hari_ini();
		$data['jumlah_kandidat_bulan_ini'] = $this->Kandidat_model->jumlah_kandidat_bulan_ini();

        $data['sub_view'] = $this->load->view('admin/dashboard.php', $data, TRUE);
		$this->load->view('admin/_partials/skeleton.php', $data);
	}
}