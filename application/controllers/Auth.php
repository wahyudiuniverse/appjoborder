<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	const SESSION_KEY = 'employee_id';

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
		$this->load->library('session');
		$this->load->model("Kandidat_model");
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
		$this->load->view('login');
	}

	//Menampilkan Register tanpa parameter untuk proses POST variable
	public function API_login_cis($nip, $pin)
	{
		$curl = curl_init();

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
			$result = json_decode($response, true);
			if ($result['status'] == "1") {
				$this->session->set_userdata($result['data']);
				echo json_encode($result);
			} else {
				// echo "ngga ada data";
				echo json_encode($result);
			}
		}
	}

	//Mengambil data employee
	public function API_get_employee($nip)
	{
		// set post fields
		$post = [
			'employee_id' => $nip,
		];

		$var_post= json_encode($post);

		// print("Masuk API");
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "http://localhost/apicakrawala/index.php/employees/getEmployee",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_HTTPHEADER => [],
			CURLOPT_POSTFIELDS => $var_post,
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
			$result = json_decode($response, true);
			if ($result['status'] == "1") {
				// $this->session->set_userdata($result['data']);
				echo json_encode($result);
			} else {
				// echo "ngga ada data";
				echo json_encode($result);
			}
		}
	}

	public function check_login()
	{
		if (!$this->session->has_userdata("employee_id")) {
			return false;
		} else {
			return true;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
		//return !$this->session->has_userdata(self::SESSION_KEY);
	}
}
