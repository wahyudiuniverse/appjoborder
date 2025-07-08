<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('session');
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
		$data['all_jabatan'] = $this->Registrasi_model->getAllJabatan();
		$data['all_provinsi'] = $this->Registrasi_model->getAllProvinsi();
		$data['all_sumber_info'] = $this->Registrasi_model->get_all_sumber_info();
		$data['all_interviewer'] = $this->Registrasi_model->get_all_interviewer();
		$data['all_family_relation'] = $this->Registrasi_model->getAllFamilyRelation();

		$this->load->view('registrasi', $data);
	}

	//mengambil Json data kandidat berdasarkan nik nya
	public function cek_nik()
	{
		$postData = $this->input->post();

		// get data 
		$data = $this->Registrasi_model->cek_nik($postData["nik"]);
		echo json_encode($data);
	}

	//mengambil Json data Kota berdasarkan Provinsi
	public function getKotaByProv()
	{
		$postData = $this->input->post();

		// get data 
		$data = $this->Registrasi_model->getKotaByProvJson($postData);
		echo json_encode($data);
	}

	//mengambil Json data Jabatan berdasarkan projectnya
	public function getJabatanByProject()
	{
		$postData = $this->input->post();

		// get data 
		$data = $this->Registrasi_model->getJabatanByProjectJson($postData["project"]);
		echo json_encode($data);
	}

	//mengambil Json data Jabatan berdasarkan projectnya
	public function getJabatanByProject2($idproject)
	{
		// $postData = $this->input->post();

		// get data 
		$data = $this->Registrasi_model->getJabatanByProjectJson($idproject);
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

	//save data perusahaan kandidat
	public function save_perusahaan()
	{
		$postData = $this->input->post();

		// save data diri
		$data = $this->Registrasi_model->save_perusahaan($postData);

		echo json_encode($data);
	}

	//save data perusahaan kandidat
	public function save_project()
	{
		$postData = $this->input->post();

		//Cek variabel post
		$datarequest = [
			'project_id'        	=> $postData['project_id'],
			'project_name'        	=> strtoupper(trim($postData['project_name'])),
			'jabatan_id'        	=> $postData['jabatan_id'],
			'jabatan_name'        	=> strtoupper(trim($postData['jabatan_name'])),
			'area'        			=> $postData['area'],
			'sumber_info'        	=> $postData['sumber_info'],
			'interviewer'        	=> $postData['interviewer'],
		];

		// save data diri
		$data = $this->Registrasi_model->save_project($datarequest);

		echo json_encode($data);
	}

	//save data project kandidat
	public function save_project2()
	{
		$postData = $this->input->post();

		$id_kandidat = $postData["id_kandidat"];

		//Cek variabel post
		$datarequest = [
			'perusahaan_id'        	=> $postData['perusahaan_id'],
			'perusahaan_name'  		=> strtoupper(trim($postData['perusahaan_name'])),
			'project_id'        	=> $postData['project_id'],
			'project_name'        	=> strtoupper(trim($postData['project_name'])),
			'jabatan_id'        	=> $postData['jabatan_id'],
			'jabatan_name'        	=> $postData['jabatan_name'],
			'area'        			=> $postData['area'],
			'sumber_info'        	=> $postData['sumber_info'],
			'interviewer'        	=> $postData['interviewer'],
		];

		// save data diri
		$data = $this->Registrasi_model->save_project2($datarequest, $id_kandidat);
	}

	//save data diri kandidat
	public function save_data_diri()
	{
		$postData = $this->input->post();

		// $id_kandidat = $postData["id_kandidat"];

		//Cek variabel post
		$datarequest = [
			'project_id'        	=> $postData['project_id'],
			'project_name'        	=> strtoupper(trim($postData['project_name'])),
			'jabatan_id'        	=> $postData['jabatan_id'],
			'jabatan_name'        	=> strtoupper(trim($postData['jabatan_name'])),
			'area'        			=> $postData['area'],
			'sumber_info'        	=> $postData['sumber_info'],
			'interviewer'        	=> $postData['interviewer'],

			'nik'        				=> $postData['nik'],
			'nama'  					=> strtoupper(trim($postData['nama'])),
			'jenis_kelamin'        		=> $postData['jenis_kelamin'],
			'tempat_lahir'        		=> strtoupper(trim($postData['tempat_lahir'])),
			'tanggal_lahir'        		=> $postData['tanggal_lahir'],
			'asal_kota'        			=> strtoupper(trim($postData['asal_kota'])),
			'alamat_domisili'        	=> strtoupper(trim($postData['alamat_domisili'])),
			'nomor_tlp'        			=> $postData['nomor_tlp'],
			'nama_kontak_darurat'       => strtoupper(trim($postData['nama_kontak_darurat'])),
			'hubungan_kontak_darurat'   => $postData['hubungan_kontak_darurat'],
			'nomor_tlp_kontak_darurat'  => $postData['nomor_tlp_kontak_darurat'],
			'status_nikah'        		=> $postData['status_nikah'],
		];

		// save data diri
		$data = $this->Registrasi_model->save_data_diri($datarequest);

		echo json_encode($data);
	}

	//save pengalaman kandidat
	public function save_pengalaman()
	{
		$postData = $this->input->post();

		$id_kandidat = $postData["id_kandidat"];

		//Cek variabel post
		$datarequest = [
			'pengalaman_kerja'        		=> $postData['pengalaman_kerja'],
			'kontak_person_sebelumnya'      => $postData['kontak_person_sebelumnya'],
		];

		// save data diri
		$data = $this->Registrasi_model->save_pengalaman($datarequest, $id_kandidat);
	}

	function upload_dokumen()
	{
		$postData = $this->input->post();
		$image = $_FILES;
		$return_file_data = array();
		foreach ($image as $key => $img) {
			$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
			$name = pathinfo($img['name'], PATHINFO_FILENAME);
			$yearmonth = date('Y/m');
			if ($name == "pasfoto") {
				if (!is_dir('./uploads/document/pasfoto/' . $yearmonth)) {
					mkdir('./uploads/document/pasfoto/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/pasfoto/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/pasfoto/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						// $path_file_return = 'https://karir.onecorp.co.id/uploads/document/pasfoto/' . $yearmonth . '/';
						// $file_data_return = $path_file_return . $nama_file;
						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			} else if ($name == "ktp") {
				if (!is_dir('./uploads/document/ktp/' . $yearmonth)) {
					mkdir('./uploads/document/ktp/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/ktp/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/ktp/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						// $path_file_return = 'https://karir.onecorp.co.id/uploads/document/ktp/' . $yearmonth . '/';
						// $path_file_return = 'http://localhost/appjoborder/uploads/document/ktp/' . $yearmonth . '/';
						// $file_data_return = $path_file_return . $nama_file;
						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			} else if ($name == "cv") {
				if (!is_dir('./uploads/document/cv/' . $yearmonth)) {
					mkdir('./uploads/document/cv/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/cv/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/cv/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			} else if ($name == "kk") {
				if (!is_dir('./uploads/document/kk/' . $yearmonth)) {
					mkdir('./uploads/document/kk/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/kk/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/kk/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			} else if ($name == "npwp") {
				if (!is_dir('./uploads/document/npwp/' . $yearmonth)) {
					mkdir('./uploads/document/npwp/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/npwp/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/npwp/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			} else if ($name == "skck") {
				if (!is_dir('./uploads/document/skck/' . $yearmonth)) {
					mkdir('./uploads/document/skck/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/skck/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/skck/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			} else if ($name == "ijazah") {
				if (!is_dir('./uploads/document/ijazah/' . $yearmonth)) {
					mkdir('./uploads/document/ijazah/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/ijazah/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/ijazah/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			} else if ($name == "sim") {
				if (!is_dir('./uploads/document/sim/' . $yearmonth)) {
					mkdir('./uploads/document/sim/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/sim/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/sim/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			} else if ($name == "paklaring") {
				if (!is_dir('./uploads/document/paklaring/' . $yearmonth)) {
					mkdir('./uploads/document/paklaring/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/paklaring/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/paklaring/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			} else if ($name == "dokumen_pendukung") {
				if (!is_dir('./uploads/document/dokumen_pendukung/' . $yearmonth)) {
					mkdir('./uploads/document/dokumen_pendukung/' . $yearmonth, 0777, TRUE);
				}
				if (!empty($img['name'])) {
					$config['upload_path'] = './uploads/document/dokumen_pendukung/' . $yearmonth;
					$config['allowed_types'] = '*';
					// $config['max_size'] = '100'; 
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$config['overwrite'] = FALSE;
					$config['file_name'] = $name . '_' . $postData['id_kandidat'] . '_' . time();

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($key)) {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
						die;
					} else {
						$nama_file = $this->upload->data('file_name');
						$path_file = '/uploads/document/dokumen_pendukung/' . $yearmonth . '/';
						$file_data = $path_file . $nama_file;
						$this->Registrasi_model->save_dokumen($file_data, $postData['id_kandidat'], $name);

						$return_file_data[] = array(
							"link_file" => $file_data,
						);
					}
				}
			}
		}

		echo json_encode($return_file_data);
		// $this->load->view('imgtest');
	}

	//finish registrasi kandidat
	public function finish_register()
	{
		$postData = $this->input->post();

		$id_kandidat = $postData["id_kandidat"];

		$tanggal_registrasi = date('Y-m-d H:i:s');

		//Cek variabel post
		$datarequest = [
			'status_finish'        		=> "1",
			'tanggal_registrasi'		=> $tanggal_registrasi,

			'file_pasfoto'				=> $postData["link_file_pasfoto"],
			'file_ktp'					=> $postData["link_file_ktp"],
			'file_cv'					=> $postData["link_file_cv"],
			'file_kk'					=> $postData["link_file_kk"],
			'file_npwp'					=> $postData["link_file_npwp"],
			'file_skck'					=> $postData["link_file_skck"],
			'file_ijazah'				=> $postData["link_file_ijazah"],
			'file_sim'					=> $postData["link_file_sim"],
			'file_paklaring_1'			=> $postData["link_file_paklaring"],
			'file_lainnya'				=> $postData["link_file_dokumen_pendukung"],
		];

		// save data diri
		$data = $this->Registrasi_model->finish_register($datarequest, $id_kandidat);

		echo json_encode($tanggal_registrasi);
	}
}
