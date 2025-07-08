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
		$this->load->model("Registrasi_model");
		$this->load->model("Kandidat_model");
		$this->load->model("Auth_model");
		$this->load->library('session');

		//cek session login
		if (!$this->Auth_model->check_login()) {
			redirect('auth');
		}
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
		$data['all_screening'] = $this->Kandidat_model->get_screening($id_kandidat);
		$data['data_active_screening'] = $this->Kandidat_model->get_active_screening($id_kandidat);
		// $data_active_screening = $this->Kandidat_model->get_active_screening($id_kandidat);

		if (empty($data['data_active_screening'])) {
			$data['status_active_screening'] = "0";
		} else {
			$data['status_active_screening'] = "1";
		}

		$seed_verifikasi = array(
			"kandidat_id" => $id_kandidat,
			"jenis_dokumen" => "nama_ktp",
		);

		$data_verifikasi = $this->Kandidat_model->get_status_verifikasi_json($seed_verifikasi);

		if (($data_verifikasi['verifikasi']['verifikasi_ktp'] == "1")) {
			$data['status_verifikasi_ktp'] = '<img src="' . base_url('assets/icon/verified.png') . '" alt="" width="20px" class="mx-2">';
			$data['status_verifikasi_ktp_screening'] = "<font color='#00FF00'>Sudah Verifikasi</font>";
		} else {
			$data['status_verifikasi_ktp'] = '<img src="' . base_url('assets/icon/not-verified.png') . '" alt="" width="20px" class="mx-2">';
			$data['status_verifikasi_ktp_screening'] = "<font color='#FF0000'>Belum Verifikasi</font>";
		}

		if (($data_verifikasi['verifikasi']['verifikasi_nama'] == "1")) {
			$data['status_verifikasi_nama'] = '<img src="' . base_url('assets/icon/verified.png') . '" alt="" width="20px" class="mx-2">';
		} else {
			$data['status_verifikasi_nama'] = '<img src="' . base_url('assets/icon/not-verified.png') . '" alt="" width="20px" class="mx-2">';
		}

		if (($data_verifikasi['verifikasi']['verifikasi_ktp'] == "1") && ($data_verifikasi['verifikasi']['verifikasi_nama'] == "1")) {
			$data['status_verifikasi_dokumen_screening'] = '<img src="' . base_url('assets/icon/verified.png') . '" alt="" width="25px" class="mx-2">';
		} else {
			$data['status_verifikasi_dokumen_screening'] = '<img src="' . base_url('assets/icon/not-verified.png') . '" alt="" width="25px" class="mx-2">';
		}


		$data['all_company'] = $this->Registrasi_model->getAllCompany();
		$data['all_project'] = $this->Registrasi_model->getAllProject();
		$data['all_jabatan'] = $this->Registrasi_model->getAllJabatan();
		$data['all_provinsi'] = $this->Registrasi_model->getAllProvinsi();
		$data['all_sumber_info'] = $this->Registrasi_model->get_all_sumber_info();
		$data['all_interviewer'] = $this->Registrasi_model->get_all_interviewer();
		$data['all_family_relation'] = $this->Registrasi_model->getAllFamilyRelation();

		$data['sub_view'] = $this->load->view('admin/profile.php', $data, TRUE);
		$this->load->view('admin/_partials/skeleton.php', $data);
	}

	//mengambil Json data verifikasi kandidat
	public function get_status_verifikasi()
	{
		$postData = $this->input->post();

		// get data 
		$data = $this->Kandidat_model->get_status_verifikasi_json($postData);
		echo json_encode($data);
	}

	//save data verifikasi kandidat
	public function save_status_verifikasi()
	{
		$postData = $this->input->post();

		//kolom verifikasi
		$kolom = "";
		if ($postData['jenis_dokumen'] == "nik") {
			$kolom = "nik";
		} else if ($postData['jenis_dokumen'] == "nama") {
			$kolom = "nama";
		}

		if ($kolom != "") {
			if ($kolom == "nama") {
				$data_kandidat = $this->Kandidat_model->get_data_kandidat_by_kolom($postData['kandidat_id'], $kolom);

				//Cek variabel post
				$datarequest = [
					'id_kandidat'        		=> $postData['kandidat_id'],
					'kolom'        				=> $postData['jenis_dokumen'],
					'nilai_sebelum'        		=> $data_kandidat,
					'nilai_sesudah'        		=> strtoupper(trim($postData['nama_verifikasi'])),
					'status'        			=> $postData['status_verifikasi'],
					'verified_by_id'        	=> $postData['user_nip'],
					'verified_by'    			=> strtoupper(trim($postData['user_name'])),
					'verified_on'        		=> date('Y-m-d H:i:s'),
				];

				// save data diri
				$data = $this->Kandidat_model->save_status_verifikasi($datarequest, $postData['kandidat_id'], $kolom);
			} else if ($kolom == "nik") {
				$data_kandidat = $this->Kandidat_model->get_data_kandidat_by_kolom($postData['kandidat_id'], $kolom);

				//Cek variabel post
				$datarequest = [
					'id_kandidat'        		=> $postData['kandidat_id'],
					'kolom'        				=> $postData['jenis_dokumen'],
					'nilai_sebelum'        		=> $data_kandidat,
					'nilai_sesudah'        		=> strtoupper(trim($postData['nik_verifikasi'])),
					'status'        			=> $postData['status_verifikasi'],
					'verified_by_id'        	=> $postData['user_nip'],
					'verified_by'    			=> strtoupper(trim($postData['user_name'])),
					'verified_on'        		=> date('Y-m-d H:i:s'),
				];

				// save data diri
				$data = $this->Kandidat_model->save_status_verifikasi($datarequest, $postData['kandidat_id'], $kolom);
			}
		}


		echo json_encode($data);
	}
}
