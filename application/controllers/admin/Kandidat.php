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

class Kandidat extends CI_Controller
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

	//load datatables Employee
	public function list_kandidat()
	{

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->Kandidat_model->list_kandidat($postData);

		echo json_encode($data);
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
}