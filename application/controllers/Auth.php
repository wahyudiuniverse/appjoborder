<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

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
		$this->load->view('login');
	}

	//Menampilkan Register tanpa parameter untuk proses POST variable
	public function API_login_cis($nip, $pin)
	{
		// $data['nik'] = $nik;
		//menampilkan view form pengisian data
		// $this->load->view('frontend/templates/header');
		// //$this->load->view('templates/sidebar', $data);
		// $this->load->view('frontend/templates/topbar_register');
		// $this->load->view('frontend/tes_api_bank', $data);
		// $this->load->view('frontend/templates/footer');
		//$bank_code = $this->Employees_model->get_id_bank($id_bank);

		$curl = curl_init();
		//$nik = '3201293010880006';
		curl_setopt_array($curl, [
			CURLOPT_URL => "https://apps-cakrawala.com/index.php/admin/auth/login_cis?nip=" . $nip . "&pin=" . $pin,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$pesan = array(
			'status' => false,
			'message' => "cURL Error #:" . $err,
		);

		if ($err) {
			echo json_encode($pesan);
		} else {
			echo $response;
		}
	}
}
