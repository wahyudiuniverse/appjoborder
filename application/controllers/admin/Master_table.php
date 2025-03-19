<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

use function PHPUnit\Framework\isNull;

class Master_table extends CI_Controller
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
		$this->load->model("Registrasi_model");
		$this->load->model("Master_table_model");
		$this->load->model("Auth_model");

		//cek session login
		if(!$this->Auth_model->check_login()){
			redirect('auth');
		}
	}

    public function index()
	{
		$data['jumlah_all_kandidat'] = $this->Kandidat_model->jumlah_kandidat();
		$data['all_kandidat'] = $this->Kandidat_model->getAllKandidat();
		$data['all_company'] = $this->Registrasi_model->getAllCompany();
		$data['all_project'] = $this->Registrasi_model->getAllProject();
		$data['all_jabatan'] = $this->Registrasi_model->getAllJabatan();
		$data['all_provinsi'] = $this->Registrasi_model->getAllProvinsi();
		$data['all_interviewer'] = $this->Registrasi_model->get_all_interviewer();
		$data['all_region'] = $this->Registrasi_model->getAllRegion();
		$data['all_family_relation'] = $this->Registrasi_model->getAllFamilyRelation();
		
        $data['sub_view'] = $this->load->view('admin/kandidat.php', $data, TRUE);
		$this->load->view('admin/_partials/skeleton.php', $data);
	}

	public function interviewer()
	{
		$data['jumlah_all_kandidat'] = $this->Kandidat_model->jumlah_kandidat();
		$data['all_kandidat'] = $this->Kandidat_model->getAllKandidat();
		$data['all_company'] = $this->Registrasi_model->getAllCompany();
		$data['all_project'] = $this->Registrasi_model->getAllProject();
		$data['all_jabatan'] = $this->Registrasi_model->getAllJabatan();
		$data['all_provinsi'] = $this->Registrasi_model->getAllProvinsi();
		$data['all_interviewer'] = $this->Registrasi_model->get_all_interviewer();
		$data['all_region'] = $this->Registrasi_model->getAllRegion();
		$data['all_family_relation'] = $this->Registrasi_model->getAllFamilyRelation();
		
        $data['sub_view'] = $this->load->view('admin/master_table/interviewer.php', $data, TRUE);
		$this->load->view('admin/_partials/skeleton.php', $data);
	}

	//load datatables kandidat
	public function list_interviewer()
	{

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->Master_table_model->list_interviewer($postData);

		echo json_encode($data);
	}

	//mengambil Json data interviewer
	public function get_data_Interviewer()
	{
		$postData = $this->input->post();

		//Cek variabel post
		$datarequest = [
			'id'        => $postData['id']
		];

		// get data diri
		$data = $this->Master_table_model->get_data_interviewer($datarequest);

		if (empty($data)) {
			$data_empty = array();

			$response = array(
				'status'	=> "0",
				'pesan' 	=> "Belum ada data",
				'data'		=> $data_empty,
			);
		} else {
			$response = array(
				'status'	=> "1",
				'pesan' 	=> "Berhasil Fetch Data",
				'data'		=> $data,
			);
		}

		echo json_encode($response);
		// echo "<pre>";
		// print_r($response);
		// echo "</pre>";
	}

	//add data interviewer
	public function add_interviewer()
	{
		$postData = $this->input->post();

		//Cek variabel post
		$datarequest = [
			'nip'    		=> $postData['nip'],
			'nama'   		=> strtoupper($postData['nama']),
			'nama_lengkap'  => strtoupper($postData['nama_lengkap']),
			'jabatan'  		=> strtoupper($postData['jabatan']),
			'area'  		=> strtoupper($postData['area']),
			'region'  		=> strtoupper($postData['region']),
			'status_aktif'  => $postData['status'],
		];

		// save data diri
		$data = $this->Master_table_model->add_interviewer($datarequest);

		if ($data == false) {
			$response = array(
				'status'	=> "201",
				'pesan' 	=> "Data Interviewer tidak ditemukan",
			);
		} else {
			$response = array(
				'status'	=> "200",
				'pesan' 	=> "Berhasil Update Data",
			);
		}

		echo json_encode($response);
		// echo "<pre>";
		// print_r($response);
		// echo "</pre>";
	}

	//update data interviewer
	public function update_interviewer()
	{
		$postData = $this->input->post();

		//Cek variabel post
		$datarequest = [
			'nip'    		=> $postData['nip'],
			'nama'   		=> strtoupper($postData['nama']),
			'nama_lengkap'  => strtoupper($postData['nama_lengkap']),
			'jabatan'  		=> strtoupper($postData['jabatan']),
			'area'  		=> strtoupper($postData['area']),
			'region'  		=> strtoupper($postData['region']),
			'status_aktif'  => $postData['status'],
		];

		// save data diri
		$data = $this->Master_table_model->update_interviewer($datarequest, $postData['id']);

		if ($data == false) {
			$response = array(
				'status'	=> "201",
				'pesan' 	=> "Data Interviewer tidak ditemukan",
			);
		} else {
			$response = array(
				'status'	=> "200",
				'pesan' 	=> "Berhasil Update Data",
			);
		}

		echo json_encode($response);
		// echo "<pre>";
		// print_r($response);
		// echo "</pre>";
	}

	public function printExcel($project, $jabatan, $region,  $rekruter, $range_tanggal, $searchVal)
	{
		$postData = array();

		//variabel filter (diambil dari post ajax di view)
		$postData['project'] = $project;
		$postData['jabatan'] = $jabatan;
		$postData['region'] = $region;
		$postData['rekruter'] = $rekruter;
		$postData['range_tanggal'] = urldecode($range_tanggal);
		if ($searchVal == '-no_input-') {
			$postData['filter'] = '';
		} else {
			$postData['filter'] = urldecode($searchVal);
		}

		//cofigure nama file hasil download
		$timestamp = date('d-m-Y H.i.s');
		$postData['nama_file'] = 'Data Kandidat ' . $timestamp;

		// echo $postData['filter'];

		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$spreadsheet->getActiveSheet()->setTitle('Data Kandidat'); //nama Spreadsheet yg baru dibuat

		//data satu row yg mau di isi
		$rowArray = [
			'ID REGISTRASI',
			'NIK',
			'NAMA LENGKAP',
			'JENIS KELAMIN',
			'PROJECT/PRINCIPLE',
			'JABATAN/POSISI',
			'AREA/PENEMPATAN',
			'REGION',
			'REKRUTER',
			'SUMBER INFO',
			'TEMPAT LAHIR',
			'TANGGAL LAHIR',
			'ASAL KOTA PELAMAR',
			'ALAMAT LENGKAP',
			'NOMOR TELEPON / WHATSAPP',
			'NAMA KONTAK DARURAT',
			'HUBUNGAN KONTAK DARURAT',
			'NOMOR TELEPON KONTAK DARURAT',
			'STATUS MENIKAH',
			'PENGALAMAN KERJA',
			'KONTAK PERSON SEBELUMNYA',
			'PAS FOTO (TERBARU)',
			'FILE KTP',
			'FILE CV',
			'FILE KK',
			'FILE NPWP',
			'FILE SKCK',
			'FILE IJAZAH',
			'FILE SIM A / C',
			'FILE PAKLARING',
			'FILE DOKUMEN PENDUKUNG',
			'TANGGAL REGISTRASI',
		];

		$length_array = count($rowArray);
		//isi cell dari array
		$spreadsheet->getActiveSheet()
			->fromArray(
				$rowArray,   // The data to set
				NULL,
				'A1'
			);

		//set column width jadi auto size
		for ($i = 1; $i <= $length_array; $i++) {
			$spreadsheet->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
		}
		//set background color
		$spreadsheet
			->getActiveSheet()
			->getStyle('A1:AF1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('BFBFBF');

		$spreadsheet->getDefaultStyle()->getNumberFormat()->setFormatCode('@');

		//$spreadsheet->getActiveSheet()->getStyle('H')->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_EUR);

		// Get data
		$data = $this->Kandidat_model->list_kandidat_print($postData);
		// $data =$rowArray;
		$length_data = count($data);

		for ($i = 0; $i < $length_data; $i++) {
			for ($j = 0; $j < $length_array; $j++) {
				// $cell = chr($j + 65) . ($i);
				$spreadsheet->getActiveSheet()->getCell([$j + 1, $i + 2])->setvalueExplicit($data[$i][$j], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING2);
				// $spreadsheet->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
			}
		}

		// $spreadsheet->getActiveSheet()
		// 	->fromArray(
		// 		$data,  // The data to set
		// 		NULL,        // Array values with this value will not be set
		// 		'A2',
		// 		false,
		// 		false         // Top left coordinate of the worksheet range where
		// 		//    we want to set these values (default is A1)
		// 	);


		//set wrap text untuk row ke 1
		$spreadsheet->getActiveSheet()->getStyle('1:1')->getAlignment()->setWrapText(true);

		//set vertical dan horizontal alignment text untuk row ke 1
		// $spreadsheet->getDefaultStyle()->getNumberFormat()->setFormatCode('@');
		$spreadsheet->getDefaultStyle()->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
		// $spreadsheet->getActiveSheet()->getStyle('AC:AI')->getNumberFormat()->setFormatCode('Rp #,##0');
		$spreadsheet->getActiveSheet()->getStyle('1:1')
			->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('1:1')
			->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


		//----------------Buat File Untuk Download--------------
		$writer = new Xlsx($spreadsheet); // instantiate Xlsx

		$filename = $postData['nama_file'];

		header('Content-Type: application/vnd.ms-excel'); // generate excel file
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');


		$writer->save('php://output');
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

	//Mengambil data employee
	public function migrasi_kandidat($id_kandidat)
	{
		$data['id_kandidat'] = $id_kandidat;
		$data_kandidat = $this->Kandidat_model->get_kandidat($id_kandidat);
		$data_screening = $this->Kandidat_model->get_screening($id_kandidat);

		$data['all_company'] = $this->Registrasi_model->getAllCompany();
		$data['all_project'] = $this->Registrasi_model->getAllProject();
		$data['all_jabatan'] = $this->Registrasi_model->getAllJabatan();
		$data['all_provinsi'] = $this->Registrasi_model->getAllProvinsi();
		$data['all_sumber_info'] = $this->Registrasi_model->get_all_sumber_info();
		$data['all_interviewer'] = $this->Registrasi_model->get_all_interviewer();
		$data['all_family_relation'] = $this->Registrasi_model->getAllFamilyRelation();

		print("<pre>");
		print_r($data_kandidat);
		print("</pre>");
		// print("<script>alert('".$data_kandidat["nik"]."');</script>");

		// set post fields
		$post = [
			'nik_ktp' => $data_kandidat["nik"],
			'fullname' => $data_kandidat["nama"],
			'nama_ibu' => $data_kandidat["nama_ibu"],
			'tempat_lahir' => $data_kandidat["tempat_lahir"],
			'tanggal_lahir' => $data_kandidat["tanggal_lahir"],
			'company_id' => $data_kandidat["perusahaan_id"],
			'location_id' => $data_kandidat["kategori_karyawan"],
			'project' => $data_screening["project_id"],
			'sub_project' => $data_screening["sub_project_id"],
			'posisi' => $data_screening["jabatan_id"],
			'gender' => $data_kandidat["jenis_kelamin"],
			'status_kawin' => $data_kandidat["status_nikah"],
			'nik_ktp' => $data_kandidat["nik"],
			'nik_ktp' => $data_kandidat["nik"],
			'nik_ktp' => $data_kandidat["nik"],
			'nik_ktp' => $data_kandidat["nik"],
			'nik_ktp' => $data_kandidat["nik"],
			'nik_ktp' => $data_kandidat["nik"],
			'nik_ktp' => $data_kandidat["nik"],
			'nik_ktp' => $data_kandidat["nik"],
			'nik_ktp' => $data_kandidat["nik"],
		];

		print("<pre>");
		print_r($post);
		print("</pre>");

		// $var_post= json_encode($post);

		// // print("Masuk API");
		// $curl = curl_init();

		// curl_setopt_array($curl, [
		// 	CURLOPT_URL => "http://localhost/apicakrawala/index.php/employees/getEmployee",
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_ENCODING => "",
		// 	CURLOPT_MAXREDIRS => 10,
		// 	CURLOPT_TIMEOUT => 30,
		// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	CURLOPT_CUSTOMREQUEST => "POST",
		// 	CURLOPT_HTTPHEADER => [],
		// 	CURLOPT_POSTFIELDS => $var_post,
		// ]);

		// $response = curl_exec($curl);
		// $err = curl_error($curl);

		// curl_close($curl);

		// $pesan = array(
		// 	'status' => false,
		// 	'message' => "cURL Error #:" . $err,
		// );

		// if ($err) {
		// 	echo json_encode($pesan);
		// } else {
		// 	$result = json_decode($response, true);
		// 	if ($result['status'] == "1") {
		// 		// $this->session->set_userdata($result['data']);
		// 		echo json_encode($result);
		// 	} else {
		// 		// echo "ngga ada data";
		// 		echo json_encode($result);
		// 	}
		// }
	}
}