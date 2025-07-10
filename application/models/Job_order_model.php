<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_order_model extends CI_model
{
	//---------------GENERAL JOB ORDER----------------------------
	public function clean_post($post_name)
	{
		$name = trim($post_name);
		$Evalue = array('-', 'alert', '<script>', '</script>', '</php>', '<php>', '<p>', '\r\n', '\n', '\r', '=', "'", '/', 'cmd', '!', "('", "')", '|');
		$post_name = str_replace($Evalue, '', $name);
		$post_name = preg_replace('/^(\d{1,2}[^0-9])/m', '', $post_name);
		// $post_name = htmlspecialchars(trim($post_name), ENT_QUOTES, "UTF-8");

		return $post_name;
	}

	//mengambil data Project dari CIS
	public function getAllProject()
	{
		//$otherdb = $this->load->database('default', TRUE);
		$database_cis = $this->load->database('database_cis', TRUE);

		// $this->db->select('*');
		// $this->db->from('projects');
		// $this->db->group_by('title');

		$database_cis->select('*');
		$database_cis->from('xin_projects');
		// $database_cis->group_by('title');

		// $query = $this->db->get()->result_array();
		$query = $database_cis->get()->result_array();

		return $query;

		// $query = $this->db->get('projects')->result_array();

		// return $query;
	}

	//mengambil data Jabatan by project_id dari CIS
	public function getAllJabatan($project_id)
	{
		//$otherdb = $this->load->database('default', TRUE);
		$database_cis = $this->load->database('database_cis', TRUE);

		// $this->db->select('*');
		// $this->db->from('projects');xin_projects_posisi
		// $this->db->group_by('title');

		$database_cis->select('*');
		$database_cis->where('project_id', $project_id);
		$database_cis->join('xin_designations', 'xin_projects_posisi.posisi = xin_designations.designation_id', 'left');
		$database_cis->from('xin_projects_posisi');
		// $database_cis->group_by('title');

		// $query = $this->db->get()->result_array();
		$query = $database_cis->get()->result_array();

		return $query;

		// $query = $this->db->get('projects')->result_array();

		// return $query;
	}
	//---------------END GENERAL JOB ORDER----------------------------

	//---------------MASTER JOB ORDER----------------------------
	//mengambil data jumlah JO by id master JO
	public function get_jumlah_jo($id_master_jo)
	{
		$this->db->select('count(*) as allcount');
		$this->db->where('job_master_id', $id_master_jo);
		// $this->db->group_by('title');
		$this->db->from('job_order');

		$query = $this->db->get()->result();

		return $query[0]->allcount;
	}

	//mengambil data rekap jumlah request, fulfill, vacant by id master JO
	public function get_rekap_vacant($id_master_jo)
	{
		$request = "0";
		$fulfill = "0";
		$vacant = "0";

		//ambil semua id job order di satu project
		$this->db->select('*');
		$this->db->where('job_master_id', $id_master_jo);
		$this->db->from('job_order');

		$list_job_order = $this->db->get()->result_array();

		if (!empty($list_job_order)) {
			//hitung rekap jumlah request, fulfill, vacant
			$this->db->select('sum(jumlah_request) as request');
			$this->db->select('sum(jumlah_vacant) as vacant');
			$this->db->select('sum(jumlah_fill) as fulfill');
			$this->db->where('finish_on IS NULL');
			$this->db->group_start();
			foreach ($list_job_order as $record) {
				$this->db->or_where('job_order_id', $record['id']);
			}
			$this->db->group_end();
			$this->db->from('vacant');

			$rekap = $this->db->get()->row_array();

			if (!empty($rekap)) {
				if ($rekap['request'] == "") {
					$request = "0";
				} else {
					$request = $rekap['request'];
				}
				if ($rekap['fulfill'] == "") {
					$fulfill = "0";
				} else {
					$fulfill = $rekap['fulfill'];
				}
				if ($rekap['vacant'] == "") {
					$vacant = "0";
				} else {
					$vacant = $rekap['vacant'];
				}
			} else {
				$request = "0";
				$fulfill = "0";
				$vacant = "0";
			}

			// $request = $rekap['request'];
			// $fulfill = $rekap['fulfill'];
			// $vacant = $rekap['vacant'];
		}

		$result = array(
			"request" => $request,
			"fulfill" => $fulfill,
			"vacant" => $vacant,
		);

		return $result;
	}

	//get data master JO
	public function get_master_JO($id_master_jo)
	{
		//cek data apakah sudah ada project di master
		$this->db->select('*');
		$this->db->where('id', $id_master_jo);
		$this->db->from('job_order_master');

		$query = $this->db->get()->row_array();

		return $query;
	}

	//get data master JO by JO
	public function get_master_JO_by_jo($id_jabatan_jo)
	{
		$result = null;
		//cek data apakah sudah ada project di master
		$this->db->select('*');
		$this->db->where('id', $id_jabatan_jo);
		$this->db->from('job_order');

		$query = $this->db->get()->row_array();

		if (!empty($query)) {
			//ambil value JO masternya
			$this->db->select('*');
			$this->db->where('id', $query['job_master_id']);
			$this->db->from('job_order_master');

			$query2 = $this->db->get()->row_array();

			if (!empty($query2)) {
				$result = $query2;
			} else {
				$result = null;
			}
		} else {
			$result = null;
		}

		return $result;
	}

	//add data master JO
	public function add_master_JO($postData)
	{
		//cek data apakah sudah ada project di master
		$this->db->select('count(*) as allcount');
		$this->db->select('id');
		$this->db->where('project_id', $postData['project_id']);
		$this->db->from('job_order_master');

		$query = $this->db->get()->result();

		if ($query[0]->allcount > 0) {
			return $query[0]->id;
		} else {
			$this->db->insert('job_order_master', $postData);
			$insert_id = $this->db->insert_id();

			return $insert_id;
		}
	}

	/*
	* persiapan data untuk datatable pagination
	* data list Rekapitulasi Job Order
	* 
	* @author Fadla Qamara
	*/
	function list_rekap_jo($postData = null)
	{

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search 
		$searchQuery = "";
		if ($searchValue != '') {
			// if (strlen($searchValue) >= 3) {
			$searchQuery = " (project_id like '%" . $searchValue .  "%' or project_name like '%" . $searchValue . "%') ";
			// }
		}

		## Kondisi Default 
		$kondisiDefaultQuery = "";

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		if ($kondisiDefaultQuery != '') {
			$this->db->where($kondisiDefaultQuery);
		}
		$records = $this->db->get('job_order_master')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if ($kondisiDefaultQuery != '') {
			$this->db->where($kondisiDefaultQuery);
		}
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		$records = $this->db->get('job_order_master')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		// $this->db->select('xin_designations.designation_name');
		if ($kondisiDefaultQuery != '') {
			$this->db->where($kondisiDefaultQuery);
		}
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('job_order_master')->result();

		#Debugging variable
		$tes_query = $this->db->last_query();
		// $totalRecords = $tes_query;
		//print_r($tes_query);

		$data = array();

		foreach ($records as $record) {
			$jumlah_jo = $this->get_jumlah_jo($record->id);
			$data_rekap = $this->get_rekap_vacant($record->id);

			//Button
			$button_view_detail = '<button onclick="open_detail(' . $record->id . ')" class="btn btn-sm btn-outline-success">View Detail</button>';

			$data[] = array(
				"aksi" => $button_view_detail,
				"project_name" => strtoupper($record->project_name),
				"project_id" => $record->project_id,
				"jumlah_jo" => $jumlah_jo,
				"jumlah_request" => $data_rekap['request'],
				"jumlah_fulfill" => $data_rekap['fulfill'],
				"jumlah_vacant" => $data_rekap['vacant'],
			);
		}



		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		//print_r($this->db->last_query());
		//die;

		return $response;
	}
	//---------------END MASTER JOB ORDER----------------------------

	//---------------JOB ORDER----------------------------
	//mengambil data jumlah area by id jabatan JO
	public function get_jumlah_area($id_jabatan_jo)
	{
		$this->db->select('count(*) as allcount');
		$this->db->where('job_order_id', $id_jabatan_jo);
		$this->db->where('finish_on IS NULL');
		// $this->db->group_by('title');
		$this->db->from('vacant');

		$query = $this->db->get()->result();

		return $query[0]->allcount;
	}

	//mengambil data rekap jumlah request, fulfill, vacant by id jabatan JO
	public function get_rekap_vacant_area($id_jabatan_jo)
	{
		$request = "0";
		$fulfill = "0";
		$vacant = "0";

		//hitung rekap jumlah request, fulfill, vacant
		$this->db->select('sum(jumlah_request) as request');
		$this->db->select('sum(jumlah_vacant) as vacant');
		$this->db->select('sum(jumlah_fill) as fulfill');
		$this->db->where('finish_on IS NULL');
		$this->db->where('job_order_id', $id_jabatan_jo);
		$this->db->from('vacant');

		$rekap = $this->db->get()->row_array();

		if (!empty($rekap)) {
			if($rekap['request'] == ""){
				$request = "0";
			} else{
				$request = $rekap['request'];
			}
			if ($rekap['fulfill'] == "") {
				$fulfill = "0";
			} else {
				$fulfill = $rekap['fulfill'];
			}
			if ($rekap['vacant'] == "") {
				$vacant = "0";
			} else {
				$vacant = $rekap['vacant'];
			}
		} else {
			$request = "0";
			$fulfill = "0";
			$vacant = "0";
		}

		$result = array(
			"request" => $request,
			"fulfill" => $fulfill,
			"vacant" => $vacant,
		);

		return $result;
	}

	//mengambil data rekap jumlah request, fulfill, all on going vacant
	public function get_rekap_vacant_on_going_all()
	{
		$request = "0";
		$fulfill = "0";
		$vacant = "0";

		//hitung rekap jumlah request, fulfill, vacant
		$this->db->select('sum(jumlah_request) as request');
		$this->db->select('sum(jumlah_vacant) as vacant');
		$this->db->select('sum(jumlah_fill) as fulfill');
		$this->db->where('finish_on IS NULL');
		$this->db->from('vacant');

		$rekap = $this->db->get()->row_array();

		if (!empty($rekap)) {
			if ($rekap['request'] == "") {
				$request = "0";
			} else {
				$request = $rekap['request'];
			}
			if ($rekap['fulfill'] == "") {
				$fulfill = "0";
			} else {
				$fulfill = $rekap['fulfill'];
			}
			if ($rekap['vacant'] == "") {
				$vacant = "0";
			} else {
				$vacant = $rekap['vacant'];
			}
		} else {
			$request = "0";
			$fulfill = "0";
			$vacant = "0";
		}

		$result = array(
			"request" => $request,
			"fulfill" => $fulfill,
			"vacant" => $vacant,
		);

		return $result;
	}

	//get data jabatan JO
	public function get_jabatan_JO($id_jabatan_jo)
	{
		//cek data apakah sudah ada project di master
		$this->db->select('*');
		$this->db->where('id', $id_jabatan_jo);
		$this->db->from('job_order');

		$query = $this->db->get()->row_array();

		return $query;
	}

	//add data jabatan JO
	public function add_jabatan_JO($postData)
	{
		//cek data apakah sudah ada project di master
		$this->db->select('count(*) as allcount');
		$this->db->select('id');
		$this->db->where('jabatan_id', $postData['jabatan_id']);
		$this->db->from('job_order');

		$query = $this->db->get()->result();

		if ($query[0]->allcount > 0) {
			// return $query[0]->id;
			// get_rekap_vacant
			$data_vacant = $this->get_rekap_vacant($postData['id_master_jo']);
			$result = array(
				"status" => "0",
				"id" => $query[0]->id,
				"data_vacant" => $data_vacant,
			);
			return $result;
		} else {
			$this->db->insert('job_order', $postData);
			$insert_id = $this->db->insert_id();

			$data_vacant = $this->get_rekap_vacant($postData['id_master_jo']);

			$result = array(
				"status" => "1",
				"id" => $insert_id,
				"data_vacant" => $data_vacant,
			);
			return $result;
			// return $insert_id;
		}
	}

	/*
	* persiapan data untuk datatable pagination
	* data list Rekapitulasi Job Order
	* 
	* @author Fadla Qamara
	*/
	function list_jabatan_jo($postData = null)
	{
		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search 
		$searchQuery = "";
		if ($searchValue != '') {
			// if (strlen($searchValue) >= 3) {
			$searchQuery = " (jabatan_id like '%" . $searchValue .  "%' or jabatan_name like '%" . $searchValue . "%') ";
			// }
		}

		## Kondisi Default 
		// $kondisiDefaultQuery = "'job_master_id' = " . $postData['id_master_jo'] . "";
		$kondisiDefaultQuery = "job_master_id = '" . $postData['id_master_jo'] . "'";

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		if ($kondisiDefaultQuery != '') {
			$this->db->where($kondisiDefaultQuery);
		}
		$records = $this->db->get('job_order')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if ($kondisiDefaultQuery != '') {
			$this->db->where($kondisiDefaultQuery);
		}
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		$records = $this->db->get('job_order')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		// $this->db->select('xin_designations.designation_name');
		if ($kondisiDefaultQuery != '') {
			$this->db->where($kondisiDefaultQuery);
		}
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('job_order')->result();

		#Debugging variable
		$tes_query = $this->db->last_query();
		// $totalRecords = $tes_query;
		//print_r($tes_query);

		$data = array();

		foreach ($records as $record) {
			$jumlah_area = $this->get_jumlah_area($record->id);
			$data_rekap_vacant_area = $this->get_rekap_vacant_area($record->id);

			//Button
			$button_view_detail = '<button onclick="open_detail(' . $record->id . ')" class="btn btn-sm btn-outline-success">View Detail</button>';

			$data[] = array(
				"aksi" => $button_view_detail,
				"jabatan_id" => $record->jabatan_id,
				"jabatan_name" => strtoupper($record->jabatan_name),
				"jumlah_area" => $jumlah_area,
				"jumlah_request" => $data_rekap_vacant_area['request'],
				"jumlah_fulfill" => $data_rekap_vacant_area['fulfill'],
				"jumlah_vacant" => $data_rekap_vacant_area['vacant'],
				"kriteria" => strtoupper($record->kriteria),
				"jobdesc" => strtoupper($record->jobdesc),
				"benefit" => strtoupper($record->benefit),
			);
		}



		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		//print_r($this->db->last_query());
		//die;

		return $response;
	}
	//---------------END JOB ORDER----------------------------

	//---------------DETAIL JOB ORDER----------------------------

	//get data detail JO
	public function get_detail_JO($id_jabatan_jo)
	{
		//cek data apakah sudah ada project di master
		$this->db->select('*');
		$this->db->where('id', $id_jabatan_jo);
		$this->db->from('job_order');

		$query = $this->db->get()->row_array();

		return $query;
	}

	//add data detail JO
	public function add_detail_JO($postData)
	{
		//cek data apakah sudah ada project di master
		$this->db->select('count(*) as allcount');
		$this->db->select('id');
		$this->db->where('area_id', $postData['area_id']);
		$this->db->where('finish_on IS NULL');
		$this->db->from('vacant');

		$query = $this->db->get()->result();

		if ($query[0]->allcount > 0) {
			$data_vacant = $this->get_rekap_vacant_area($postData['job_order_id']);
			$data_area = $this->get_jumlah_area($postData['job_order_id']);
			$result = array(
				"status" => "0",
				"id" => $query[0]->id,
				"data_vacant" => $data_vacant,
				"data_area" => $data_area,
			);
			return $result;
		} else {
			$this->db->insert('vacant', $postData);
			$insert_id = $this->db->insert_id();

			$data_vacant = $this->get_rekap_vacant_area($postData['job_order_id']);
			$data_area = $this->get_jumlah_area($postData['job_order_id']);
			$result = array(
				"status" => "1",
				"id" => $insert_id,
				"data_vacant" => $data_vacant,
				"data_area" => $data_area,
			);
			return $result;
		}
	}

	/*
	* persiapan data untuk datatable pagination
	* data list Rekapitulasi Job Order
	* 
	* @author Fadla Qamara
	*/
	function list_detail_jo($postData = null)
	{
		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		//variabel filter (diambil dari post ajax di view)
		$filter_status = $postData['selected_filter'];

		## Search 
		$searchQuery = "";
		if ($searchValue != '') {
			// if (strlen($searchValue) >= 3) {
			$searchQuery = " (region like '%" . $searchValue .  "%' or area like '%" . $searchValue . "%' or detail_area like '%" . $searchValue . "%' or pic_vacant_name like '%" . $searchValue . "%' or created_by like '%" . $searchValue . "%') ";
			// }
		}

		## Kondisi Default 
		// $kondisiDefaultQuery = "'job_master_id' = " . $postData['id_master_jo'] . "";
		$kondisiDefaultQuery = "job_order_id = '" . $postData['id_jabatan_jo'] . "'";

		## Filter
		$filterStatus = "";
		if (($filter_status == "all")) {
			$filterStatus = "";
		} else if(($filter_status == "on_going")) {
			$filterStatus = "(finish_on IS NULL OR finish_on = '')";
		} else {
			$filterStatus = "(finish_on IS NOT NULL OR finish_on != '')";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		if ($kondisiDefaultQuery != '') {
			$this->db->where($kondisiDefaultQuery);
		}
		if ($filterStatus != '') {
			$this->db->where($filterStatus);
		}
		$records = $this->db->get('vacant')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if ($kondisiDefaultQuery != '') {
			$this->db->where($kondisiDefaultQuery);
		}
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		if ($filterStatus != '') {
			$this->db->where($filterStatus);
		}
		$records = $this->db->get('vacant')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		// $this->db->select('xin_designations.designation_name');
		if ($kondisiDefaultQuery != '') {
			$this->db->where($kondisiDefaultQuery);
		}
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		if ($filterStatus != '') {
			$this->db->where($filterStatus);
		}
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('vacant')->result();

		#Debugging variable
		$tes_query = $this->db->last_query();
		// $totalRecords = $tes_query;
		//print_r($tes_query);

		$data = array();

		foreach ($records as $record) {
			// $jumlah_area = $this->get_jumlah_area($record->id);
			// $data_rekap_vacant_area = $this->get_rekap_vacant_area($record->id);
			$status_vacant = "<font style='color: rgb(35, 37, 148);'><strong>ON GOING</strong></font>";

			if(($record->finish_on == "") || ($record->finish_on == null)){
				$status_vacant = "<font style='color: rgb(35, 37, 148);'><strong>ON GOING</strong></font>";
			} else {
				$status_vacant = "<font style='color: rgb(23, 124, 38);'><strong>FINISHED</strong></font>";
			}

			//Button
			$button_view_detail = '<button onclick="open_detail(' . $record->id . ')" class="btn btn-sm btn-outline-success">history screening</button>';

			$data[] = array(
				"aksi" => $button_view_detail,
				"region" => strtoupper($record->region),
				"area" => strtoupper($record->area),
				"detail_area" => strtoupper($record->detail_area),
				"jumlah_request" => $record->jumlah_request,
				"jumlah_fill" => $record->jumlah_fill,
				"jumlah_vacant" => $record->jumlah_vacant,
				"pic_vacant_name" => strtoupper($record->pic_vacant_name),
				"status_vacant" => strtoupper($status_vacant),
				"created_by" => strtoupper($record->created_by),
				"created_on" => $record->created_on,
				"finish_on" => $record->finish_on,
			);
		}



		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		//print_r($this->db->last_query());
		//die;

		return $response;
	}
	//---------------END DETAIL JOB ORDER----------------------------

	//-------------------MASTER TABLE INTERVIEWER----------------------------------------

	//ambil data interviewer
	public function get_data_interviewer($postData)
	{
		$this->db->select('*');

		$this->db->from('interviewer',);
		$this->db->where($postData);
		$this->db->limit(1);
		// $this->db->where($searchQuery);

		$query = $this->db->get()->row_array();

		return $query;
	}

	//add data interviewer
	public function add_interviewer($postData)
	{
		$this->db->insert('interviewer', $postData);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//update data interviewer
	public function update_interviewer($postData, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('interviewer', $postData);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/*
	* persiapan data untuk datatable pagination
	* data list interviewer
	* 
	* @author Fadla Qamara
	*/
	function list_interviewer($postData = null)
	{

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		//variabel filter (diambil dari post ajax di view)
		// $project = $postData['project'];

		## Search 
		$searchQuery = "";
		if ($searchValue != '') {
			// if (strlen($searchValue) >= 3) {
			$searchQuery = " (nip = '" . $searchValue .  "' or nama like '%" . $searchValue . "%' or nama_lengkap like '%" . $searchValue . "%' or jabatan like '%" . $searchValue . "%' or area like '%" . $searchValue . "%' or region like '%" . $searchValue . "%') ";
			// }
		}

		## Filter
		// $filterProject = "";
		// if (($project != null) && ($project != "") && ($project != '0')) {
		//     $filterProject = "project_id = '" . $project . "'";
		// } else {
		//     $filterProject = "";
		// }

		## Kondisi Default 
		// $kondisiDefaultQuery = "(project_id in (SELECT project_id FROM xin_projects_akses WHERE nip = " . $session_id . ")) AND `user_id` != '1'";
		// $kondisiDefaultQuery = "(
		// 	karyawan_id = " . $emp_id . "
		// AND	pkwt_id = " . $contract_id . "
		// )";
		// $kondisiDefaultQuery = "`status_finish` = '1'";

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');
		// $this->db->where($kondisiDefaultQuery);

		// $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
		$records = $this->db->get('interviewer')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		// $this->db->where($kondisiDefaultQuery);
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
		$records = $this->db->get('interviewer')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		// $this->db->where($kondisiDefaultQuery);
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('(SELECT contract_id, employee_id, from_date, to_date  FROM xin_employee_contract WHERE contract_id IN ( SELECT MAX(contract_id) FROM xin_employee_contract GROUP BY employee_id)) b', 'b.employee_id = xin_employees.employee_id', 'left');
		// $this->db->join('(select max(contract_id), employee_id from xin_employee_contract group by employee_id) b', 'b.employee_id = xin_employees.employee_id', 'inner');
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('interviewer')->result();

		#Debugging variable
		$tes_query = $this->db->last_query();
		// $totalRecords = $tes_query;
		//print_r($tes_query);

		$data = array();

		foreach ($records as $record) {
			$status = "";
			if ($record->status_aktif == '1') {
				$status = "AKTIF";
			} else if ($record->status_aktif == '0') {
				$status = "TIDAK AKTIF";
			}

			$button_edit = '<button onclick="edit_interviewer(' . $record->id . ')" class="btn btn-sm btn-outline-success ladda-button mt-1" data-style="expand-right">Edit</button>';

			$data[] = array(
				"aksi" => $button_edit,
				"nip" => $record->nip,
				"nama" => $record->nama,
				"nama_lengkap" => $record->nama_lengkap,
				"jabatan" => $record->jabatan,
				"area" => $record->area,
				"region" => $record->region,
				"status" => $status,
			);
		}



		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		//print_r($this->db->last_query());
		//die;

		return $response;
	}

	//-------------------END MASTER TABLE INTERVIEWER----------------------------------------

	//-------------------MASTER TABLE PROVINSI----------------------------------------

	//ambil data provinsi
	public function get_data_provinsi($postData)
	{
		$this->db->select('*');

		$this->db->from('provinsi',);
		$this->db->where($postData);
		$this->db->limit(1);
		// $this->db->where($searchQuery);

		$query = $this->db->get()->row_array();

		return $query;
	}

	//add data provinsi
	public function add_provinsi($postData)
	{
		$this->db->insert('provinsi', $postData);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//update data provinsi
	public function update_provinsi($postData, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('provinsi', $postData);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//delete data provinsi
	public function delete_provinsi($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('provinsi');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/*
	* persiapan data untuk datatable pagination
	* data list provinsi
	* 
	* @author Fadla Qamara
	*/
	function list_provinsi($postData = null)
	{

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		//variabel filter (diambil dari post ajax di view)
		// $project = $postData['project'];

		## Search 
		$searchQuery = "";
		if ($searchValue != '') {
			// if (strlen($searchValue) >= 3) {
			$searchQuery = " (id_bps like '%" . $searchValue .  "%' or nama like '%" . $searchValue . "%') ";
			// }
		}

		## Filter
		// $filterProject = "";
		// if (($project != null) && ($project != "") && ($project != '0')) {
		//     $filterProject = "project_id = '" . $project . "'";
		// } else {
		//     $filterProject = "";
		// }

		## Kondisi Default 
		// $kondisiDefaultQuery = "(project_id in (SELECT project_id FROM xin_projects_akses WHERE nip = " . $session_id . ")) AND `user_id` != '1'";
		// $kondisiDefaultQuery = "(
		// 	karyawan_id = " . $emp_id . "
		// AND	pkwt_id = " . $contract_id . "
		// )";
		// $kondisiDefaultQuery = "`status_finish` = '1'";

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');
		// $this->db->where($kondisiDefaultQuery);

		// $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
		$records = $this->db->get('provinsi')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		// $this->db->where($kondisiDefaultQuery);
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
		$records = $this->db->get('provinsi')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		// $this->db->where($kondisiDefaultQuery);
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('(SELECT contract_id, employee_id, from_date, to_date  FROM xin_employee_contract WHERE contract_id IN ( SELECT MAX(contract_id) FROM xin_employee_contract GROUP BY employee_id)) b', 'b.employee_id = xin_employees.employee_id', 'left');
		// $this->db->join('(select max(contract_id), employee_id from xin_employee_contract group by employee_id) b', 'b.employee_id = xin_employees.employee_id', 'inner');
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('provinsi')->result();

		#Debugging variable
		$tes_query = $this->db->last_query();
		// $totalRecords = $tes_query;
		//print_r($tes_query);

		$data = array();

		foreach ($records as $record) {

			$button_edit = '<button onclick="edit_provinsi(' . $record->id . ')" class="btn btn-sm btn-outline-success ladda-button mt-1 mx-1" data-style="expand-right">Edit</button>';
			$button_delete = '<button onclick="show_delete_provinsi(' . $record->id . ')" class="btn btn-sm btn-outline-danger ladda-button mt-1 mx-1" data-style="expand-right">Delete</button>';

			$data[] = array(
				"aksi" => $button_edit . $button_delete,
				"id_bps" => $record->id_bps,
				"nama" => $record->nama,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		//print_r($this->db->last_query());
		//die;

		return $response;
	}

	//-------------------END MASTER TABLE PROVINSI----------------------------------------

	//-------------------MASTER TABLE AREA----------------------------------------

	//ambil data area
	public function get_data_area($postData)
	{
		$this->db->select('*');

		$this->db->from('kabupaten_kota',);
		$this->db->where($postData);
		$this->db->limit(1);
		// $this->db->where($searchQuery);

		$query = $this->db->get()->row_array();

		return $query;
	}

	//add data area
	public function add_area($postData)
	{
		$this->db->insert('kabupaten_kota', $postData);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//update data area
	public function update_area($postData, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('kabupaten_kota', $postData);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//delete data area
	public function delete_area($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kabupaten_kota');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/*
	* persiapan data untuk datatable pagination
	* data list area
	* 
	* @author Fadla Qamara
	*/
	function list_area($postData = null)
	{

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		//variabel filter (diambil dari post ajax di view)
		// $project = $postData['project'];

		## Search 
		$searchQuery = "";
		if ($searchValue != '') {
			// if (strlen($searchValue) >= 3) {
			$searchQuery = " (id_kab_kota_bps like '%" . $searchValue .  "%' or kabupaten_kota.nama like '%" . $searchValue . "%' or provinsi.nama like '%" . $searchValue . "%') ";
			// }
		}

		## Filter
		// $filterProject = "";
		// if (($project != null) && ($project != "") && ($project != '0')) {
		//     $filterProject = "project_id = '" . $project . "'";
		// } else {
		//     $filterProject = "";
		// }

		## Kondisi Default 
		// $kondisiDefaultQuery = "(project_id in (SELECT project_id FROM xin_projects_akses WHERE nip = " . $session_id . ")) AND `user_id` != '1'";
		// $kondisiDefaultQuery = "(
		// 	karyawan_id = " . $emp_id . "
		// AND	pkwt_id = " . $contract_id . "
		// )";
		// $kondisiDefaultQuery = "`status_finish` = '1'";

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');
		// $this->db->where($kondisiDefaultQuery);

		// $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
		$records = $this->db->get('kabupaten_kota')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		// $this->db->where($kondisiDefaultQuery);
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
		$this->db->join('provinsi', 'kabupaten_kota.id_prov_bps = provinsi.id_bps', 'left');
		$records = $this->db->get('kabupaten_kota')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('kabupaten_kota.*');
		$this->db->select('provinsi.nama as provinsi');
		// $this->db->where($kondisiDefaultQuery);
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('(SELECT contract_id, employee_id, from_date, to_date  FROM xin_employee_contract WHERE contract_id IN ( SELECT MAX(contract_id) FROM xin_employee_contract GROUP BY employee_id)) b', 'b.employee_id = xin_employees.employee_id', 'left');
		// $this->db->join('(select max(contract_id), employee_id from xin_employee_contract group by employee_id) b', 'b.employee_id = xin_employees.employee_id', 'inner');
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->join('provinsi', 'kabupaten_kota.id_prov_bps = provinsi.id_bps', 'left');
		$records = $this->db->get('kabupaten_kota')->result();

		#Debugging variable
		$tes_query = $this->db->last_query();
		// $totalRecords = $tes_query;
		//print_r($tes_query);

		$data = array();

		foreach ($records as $record) {

			$button_edit = '<button onclick="edit_area(' . $record->id . ')" class="btn btn-sm btn-outline-success ladda-button mt-1 mx-1" data-style="expand-right">Edit</button>';
			$button_delete = '<button onclick="show_delete_area(' . $record->id . ')" class="btn btn-sm btn-outline-danger ladda-button mt-1 mx-1" data-style="expand-right">Delete</button>';

			$data[] = array(
				"aksi" => $button_edit . $button_delete,
				"provinsi" => $record->provinsi,
				"id_kab_kota_bps" => $record->id_kab_kota_bps,
				"nama" => $record->nama,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		//print_r($this->db->last_query());
		//die;

		return $response;
	}

	//-------------------END MASTER TABLE AREA----------------------------------------

	//-------------------MASTER TABLE REGION----------------------------------------

	//ambil data region
	public function get_data_region($postData)
	{
		$this->db->select('*');

		$this->db->from('region',);
		$this->db->where($postData);
		$this->db->limit(1);
		// $this->db->where($searchQuery);

		$query = $this->db->get()->row_array();

		return $query;
	}

	//ambil data semua region
	public function get_all_data_region()
	{
		$this->db->select('*');

		$this->db->from('region',);

		$query = $this->db->get()->result_array();

		return $query;
	}

	//add data region
	public function add_region($postData)
	{
		$this->db->insert('region', $postData);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//update data region
	public function update_region($postData, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('region', $postData);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//delete data region
	public function delete_region($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('region');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/*
	* persiapan data untuk datatable pagination
	* data list region
	* 
	* @author Fadla Qamara
	*/
	function list_region($postData = null)
	{

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		//variabel filter (diambil dari post ajax di view)
		// $project = $postData['project'];

		## Search 
		$searchQuery = "";
		if ($searchValue != '') {
			// if (strlen($searchValue) >= 3) {
			$searchQuery = " (nama like '%" . $searchValue .  "%') ";
			// }
		}

		## Filter
		// $filterProject = "";
		// if (($project != null) && ($project != "") && ($project != '0')) {
		//     $filterProject = "project_id = '" . $project . "'";
		// } else {
		//     $filterProject = "";
		// }

		## Kondisi Default 
		// $kondisiDefaultQuery = "(project_id in (SELECT project_id FROM xin_projects_akses WHERE nip = " . $session_id . ")) AND `user_id` != '1'";
		// $kondisiDefaultQuery = "(
		// 	karyawan_id = " . $emp_id . "
		// AND	pkwt_id = " . $contract_id . "
		// )";
		// $kondisiDefaultQuery = "`status_finish` = '1'";

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');
		// $this->db->where($kondisiDefaultQuery);

		// $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
		$records = $this->db->get('region')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		// $this->db->where($kondisiDefaultQuery);
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
		// $this->db->join('provinsi', 'kabupaten_kota.id_prov_bps = provinsi.id_bps', 'left');
		$records = $this->db->get('region')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		// $this->db->select('provinsi.nama as provinsi');
		// $this->db->where($kondisiDefaultQuery);
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		// if ($filterProject != '') {
		//     $this->db->where($filterProject);
		// }
		// $this->db->join('(SELECT contract_id, employee_id, from_date, to_date  FROM xin_employee_contract WHERE contract_id IN ( SELECT MAX(contract_id) FROM xin_employee_contract GROUP BY employee_id)) b', 'b.employee_id = xin_employees.employee_id', 'left');
		// $this->db->join('(select max(contract_id), employee_id from xin_employee_contract group by employee_id) b', 'b.employee_id = xin_employees.employee_id', 'inner');
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		// $this->db->join('provinsi', 'kabupaten_kota.id_prov_bps = provinsi.id_bps', 'left');
		$records = $this->db->get('region')->result();

		#Debugging variable
		$tes_query = $this->db->last_query();
		// $totalRecords = $tes_query;
		//print_r($tes_query);

		$data = array();

		foreach ($records as $record) {

			$button_edit = '<button onclick="edit_region(' . $record->id . ')" class="btn btn-sm btn-outline-success ladda-button mt-1 mx-1" data-style="expand-right">Edit</button>';
			$button_delete = '<button onclick="show_delete_region(' . $record->id . ')" class="btn btn-sm btn-outline-danger ladda-button mt-1 mx-1" data-style="expand-right">Delete</button>';

			$data[] = array(
				"aksi" => $button_edit . $button_delete,
				"nama" => $record->nama,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		//print_r($this->db->last_query());
		//die;

		return $response;
	}

	//-------------------END MASTER TABLE REGION----------------------------------------

	/*
	* persiapan data untuk create file excel
	* data list kandidat
	* 
	* @author Fadla Qamara
	*/
	function list_kandidat_print($postData = null)
	{

		$response = array();

		//variabel filter (diambil dari post ajax di view)
		$project = $postData['project'];
		$jabatan = $postData['jabatan'];
		$region = $postData['region'];
		$rekruter = $postData['rekruter'];
		$range_tanggal = $postData['range_tanggal'];
		$filter = $postData['filter'];

		## Search 
		$searchQuery = "";
		if ($filter != '') {
			// if (strlen($searchValue) >= 3) {
			$searchQuery = " (kandidat.id = '" . $filter .  "' or kandidat.nik like '%" . $filter . "%' or kandidat.nama like '%" . $filter . "%' or kandidat.project_name like '%" . $filter . "%' or kandidat.jabatan_name like '%" . $filter . "%' or kabupaten_kota.nama like '%" . $filter . "%' or interviewer.nama like '%" . $filter . "%' or interviewer.region like '%" . $filter . "%') ";
			// }
		}

		## Filter
		$filterProject = "";
		if (($project != null) && ($project != "") && ($project != '0')) {
			$filterProject = "project_id = '" . $project . "'";
		} else {
			$filterProject = "";
		}

		$filterJabatan = "";
		if (($jabatan != null) && ($jabatan != "") && ($jabatan != '0')) {
			$filterJabatan = "jabatan_id = '" . $jabatan . "'";
		} else {
			$filterJabatan = "";
		}

		$filterRekruter = "";
		if (($rekruter != null) && ($rekruter != "") && ($rekruter != '0')) {
			$filterRekruter = "interviewer = '" . $rekruter . "'";
		} else {
			$filterRekruter = "";
		}

		$filterRegion = "";
		if (($region != null) && ($region != "") && ($region != '0')) {
			$filterRegion = "region = '" . $region . "'";
		} else {
			$filterRegion = "";
		}

		$filterTanggal = "";
		if (($range_tanggal != null) && ($range_tanggal != "") && ($range_tanggal != '0')) {
			if (str_contains($range_tanggal, 'to')) {
				$array_tanggal = explode("to", $range_tanggal);
				$filterTanggal = "tanggal_registrasi >= '" . trim($array_tanggal[0]) . "' AND tanggal_registrasi <= '" . trim($array_tanggal[1]) . "'";
			} else {
				$filterTanggal = "tanggal_registrasi like '%" . $range_tanggal . "%'";
			}
		} else {
			$filterTanggal = "";
		}

		## Kondisi Default 
		$kondisiDefaultQuery = "`status_finish` = '1'";

		## Fetch records
		$this->db->select('kandidat.*');
		$this->db->select('kabupaten_kota.nama as nama_area');
		$this->db->select('interviewer.nama as nama_rekruter');
		$this->db->select('interviewer.region as region');
		$this->db->select('sumber_info.nama as nama_sumber_info');
		$this->db->select('family_relation.name as nama_hubungan_kondar');
		$this->db->where($kondisiDefaultQuery);
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		if ($filterProject != '') {
			$this->db->where($filterProject);
		}
		if ($filterJabatan != '') {
			$this->db->where($filterJabatan);
		}
		if ($filterRekruter != '') {
			$this->db->where($filterRekruter);
		}
		if ($filterRegion != '') {
			$this->db->where($filterRegion);
		}
		if ($filterTanggal != '') {
			$this->db->where($filterTanggal);
		}
		// $this->db->order_by($columnName, $columnSortOrder);
		$this->db->join('family_relation', 'family_relation.secid = kandidat.hubungan_kontak_darurat', 'left');
		$this->db->join('sumber_info', 'sumber_info.id = kandidat.sumber_info', 'left');
		$this->db->join('interviewer', 'interviewer.id = kandidat.interviewer', 'left');
		$this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');

		$records = $this->db->get('kandidat')->result();

		#Debugging variable
		$tes_query = $this->db->last_query();
		//print_r($tes_query);

		$data = array();

		foreach ($records as $record) {
			$nama_area = "";
			if (($record->nama_area != null) && ($record->nama_area != "") && ($record->nama_area != '0')) {
				$nama_area = $record->nama_area;
			} else {
				$nama_area = "";
			}

			$nama_rekruter = "";
			if (($record->nama_rekruter != null) && ($record->nama_rekruter != "") && ($record->nama_rekruter != '0')) {
				$nama_rekruter = $record->nama_rekruter;
			} else {
				$nama_rekruter = "";
			}

			$region = "";
			if (($record->region != null) && ($record->region != "") && ($record->region != '0')) {
				$region = $record->region;
			} else {
				$region = "";
			}

			$nama_sumber_info = "";
			if (($record->nama_sumber_info != null) && ($record->nama_sumber_info != "") && ($record->nama_sumber_info != '0')) {
				$nama_sumber_info = $record->nama_sumber_info;
			} else {
				$nama_sumber_info = "";
			}

			$file_pasfoto = "";
			if (($record->file_pasfoto != null) && ($record->file_pasfoto != "") && ($record->file_pasfoto != '0')) {
				$file_pasfoto = base_url() . ltrim($record->file_pasfoto, $record->file_pasfoto[0]);
			} else {
				$file_pasfoto = "";
			}

			$file_ktp = "";
			if (($record->file_ktp != null) && ($record->file_ktp != "") && ($record->file_ktp != '0')) {
				$file_ktp = base_url() . ltrim($record->file_ktp, $record->file_ktp[0]);
			} else {
				$file_ktp = "";
			}

			$file_cv = "";
			if (($record->file_cv != null) && ($record->file_cv != "") && ($record->file_cv != '0')) {
				$file_cv = base_url() . ltrim($record->file_cv, $record->file_cv[0]);
			} else {
				$file_cv = "";
			}

			$file_kk = "";
			if (($record->file_kk != null) && ($record->file_kk != "") && ($record->file_kk != '0')) {
				$file_kk = base_url() . ltrim($record->file_kk, $record->file_kk[0]);
			} else {
				$file_kk = "";
			}

			$file_npwp = "";
			if (($record->file_npwp != null) && ($record->file_npwp != "") && ($record->file_npwp != '0')) {
				$file_npwp = base_url() . ltrim($record->file_npwp, $record->file_npwp[0]);
			} else {
				$file_npwp = "";
			}

			$file_skck = "";
			if (($record->file_skck != null) && ($record->file_skck != "") && ($record->file_skck != '0')) {
				$file_skck = base_url() . ltrim($record->file_skck, $record->file_skck[0]);
			} else {
				$file_skck = "";
			}

			$file_ijazah = "";
			if (($record->file_ijazah != null) && ($record->file_ijazah != "") && ($record->file_ijazah != '0')) {
				$file_ijazah = base_url() . ltrim($record->file_ijazah, $record->file_ijazah[0]);
			} else {
				$file_ijazah = "";
			}

			$file_sim = "";
			if (($record->file_sim != null) && ($record->file_sim != "") && ($record->file_sim != '0')) {
				$file_sim = base_url() . ltrim($record->file_sim, $record->file_sim[0]);
			} else {
				$file_sim = "";
			}

			$file_paklaring_1 = "";
			if (($record->file_paklaring_1 != null) && ($record->file_paklaring_1 != "") && ($record->file_paklaring_1 != '0')) {
				$file_paklaring_1 = base_url() . ltrim($record->file_paklaring_1, $record->file_paklaring_1[0]);
			} else {
				$file_paklaring_1 = "";
			}

			$file_lainnya = "";
			if (($record->file_lainnya != null) && ($record->file_lainnya != "") && ($record->file_lainnya != '0')) {
				$file_lainnya = base_url() . ltrim($record->file_lainnya, $record->file_lainnya[0]);
			} else {
				$file_lainnya = "";
			}

			$data[] = array(
				$record->id,
				$record->nik,
				$record->nama,
				$record->jenis_kelamin,
				$record->project_name,
				$record->jabatan_name,
				$nama_area,
				$region,
				$nama_rekruter,
				strtoupper($nama_sumber_info),
				strtoupper($record->tempat_lahir),
				$record->tanggal_lahir,
				strtoupper($record->asal_kota),
				strtoupper($record->alamat_domisili),
				$record->nomor_tlp,
				strtoupper($record->nama_kontak_darurat),
				strtoupper($record->nama_hubungan_kondar),
				$record->nomor_tlp_kontak_darurat,
				$record->status_nikah,
				strtoupper($record->pengalaman_kerja),
				strtoupper($record->kontak_person_sebelumnya),
				$file_pasfoto,
				$file_ktp,
				$file_cv,
				$file_kk,
				$file_npwp,
				$file_skck,
				$file_ijazah,
				$file_sim,
				$file_paklaring_1,
				$file_lainnya,
				$record->tanggal_registrasi,
			);
		}

		return $data;
	}
}
