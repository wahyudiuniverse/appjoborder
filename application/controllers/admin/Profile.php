<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
	}
	
    public function index($id_kandidat = null)
	{
		$data['id_kandidat'] = $id_kandidat;
		$data['jumlah_all_kandidat'] = $this->Kandidat_model->jumlah_kandidat();
		$data['jumlah_kandidat_hari_ini'] = $this->Kandidat_model->jumlah_kandidat_hari_ini();
		$data['jumlah_kandidat_bulan_ini'] = $this->Kandidat_model->jumlah_kandidat_bulan_ini();

        $data['sub_view'] = $this->load->view('admin/profile.php', $data, TRUE);
		$this->load->view('admin/_partials/skeleton.php', $data);
	}

	public function show_profile($id_kandidat = null)
	{
		$data['id_kandidat'] = $id_kandidat;
		$data['data_kandidat'] = $this->Kandidat_model->get_kandidat($id_kandidat);

        $data['sub_view'] = $this->load->view('admin/profile.php', $data, TRUE);
		$this->load->view('admin/_partials/skeleton.php', $data);
	}
}