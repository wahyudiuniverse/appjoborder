<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('url_helper');
		$this->load->helper('html');
		$this->load->database();
		$this->load->helper('security');
		$this->load->library('form_validation');
        $this->load->model("Registrasi_model");
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{

		$data['all_company'] = $this->Registrasi_model->getAllCompany();
		$data['all_project'] = $this->Registrasi_model->getAllProject();
		$data['all_sumber_info'] = $this->Registrasi_model->get_all_sumber_info();
		$data['all_interviewer'] = $this->Registrasi_model->get_all_interviewer();

		$this->load->view('registrasi',$data);
	}

	//mengambil Json data Jabatan berdasarkan projectnya
    public function getJabatanByProject()
    {
        $postData = $this->input->post();

        // get data 
        $data = $this->Registrasi_model->getJabatanByProjectJson($postData);
        echo json_encode($data);
    }

	//mengambil Json data Jabatan berdasarkan projectnya
    public function getAreaByJabatan()
    {
        $postData = $this->input->post();

        // get data 
        $data = $this->Registrasi_model->getAreaByJabatanJson($postData);
        echo json_encode($data);
    }

	//save data diri kandidat
	public function save_data_diri()
	{
		$postData = $this->input->post();

		// save data diri
		$data = $this->Registrasi_model->save_data_diri($postData);
	}

	//save pengalaman kandidat
	public function save_pengalaman()
	{
		$postData = $this->input->post();

		$nik = $postData["nik"];

		//Cek variabel post
		$datarequest = [
			'pengalaman_kerja'        	=> $postData['pengalaman_kerja'],
			'kontak_person_sebelumnya'        	=> $postData['kontak_person_sebelumnya'],
		];
		
		// save data diri
		$data = $this->Registrasi_model->save_pengalaman($datarequest, $nik);
	}
}