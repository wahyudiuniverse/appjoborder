<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kandidat_model extends CI_model
{
    //mengambil data all kandidat
    public function getAllKandidat()
    {
        //$otherdb = $this->load->database('default', TRUE);

        $query = $this->db->get('kandidat')->result_array();

        return $query;
    }

    public function clean_post($post_name)
	{
		$name = trim($post_name);
		$Evalue = array('-', 'alert', '<script>', '</script>', '</php>', '<php>', '<p>', '\r\n', '\n', '\r', '=', "'", '/', 'cmd', '!', "('", "')", '|');
		$post_name = str_replace($Evalue, '', $name);
		$post_name = preg_replace('/^(\d{1,2}[^0-9])/m', '', $post_name);
		// $post_name = htmlspecialchars(trim($post_name), ENT_QUOTES, "UTF-8");

		return $post_name;
	}

    //mengambil data all kandidat
    public function get_kandidat($id_kandidat = null)
    {
        ## Fetch records
        $this->db->select('kandidat.*');
        $this->db->select('kabupaten_kota.nama as nama_area');
        $this->db->select('interviewer.nama as nama_rekruter');
        $this->db->select('interviewer.region as region');
        $this->db->select('sumber_info.nama as nama_sumber_info');
        $this->db->select('family_relation.name as nama_hubungan_kondar');
        $this->db->where('kandidat.id', $id_kandidat);
        $this->db->join('family_relation', 'family_relation.secid = kandidat.hubungan_kontak_darurat', 'left');
        $this->db->join('sumber_info', 'sumber_info.id = kandidat.sumber_info', 'left');
        $this->db->join('interviewer', 'interviewer.id = kandidat.interviewer', 'left');
        $this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');
        $record = $this->db->get('kandidat')->row_array();

        $data = array();

        $nama_area = "";
        if (($record['nama_area'] != null) && ($record['nama_area'] != "") && ($record['nama_area'] != '0')) {
            $nama_area = $record['nama_area'];
        } else {
            $nama_area = "";
        }

        $nama_rekruter = "";
        if (($record['nama_rekruter'] != null) && ($record['nama_rekruter'] != "") && ($record['nama_rekruter'] != '0')) {
            $nama_rekruter = $record['nama_rekruter'];
        } else {
            $nama_rekruter = "";
        }

        $region = "";
        if (($record['region'] != null) && ($record['region'] != "") && ($record['region'] != '0')) {
            $region = $record['region'];
        } else {
            $region = "";
        }

        $nama_sumber_info = "";
        if (($record['nama_sumber_info'] != null) && ($record['nama_sumber_info'] != "") && ($record['nama_sumber_info'] != '0')) {
            $nama_sumber_info = $record['nama_sumber_info'];
        } else {
            $nama_sumber_info = "";
        }

        $file_pasfoto = "";
        if (($record['file_pasfoto'] != null) && ($record['file_pasfoto'] != "") && ($record['file_pasfoto'] != '0')) {
            $file_pasfoto = base_url() . ltrim($record['file_pasfoto'], $record['file_pasfoto'][0]);
        } else {
            $file_pasfoto = base_url() . "uploads/document/pasfoto/default_profile.jpg";
        }

        $file_ktp = "";
        if (($record['file_ktp'] != null) && ($record['file_ktp'] != "") && ($record['file_ktp'] != '0')) {
            $file_ktp = base_url() . ltrim($record['file_ktp'], $record['file_ktp'][0]);
        } else {
            $file_ktp = "";
        }

        $file_cv = "";
        if (($record['file_cv'] != null) && ($record['file_cv'] != "") && ($record['file_cv'] != '0')) {
            $file_cv = base_url() . ltrim($record['file_cv'], $record['file_cv'][0]);
        } else {
            $file_cv = "";
        }

        $file_kk = "";
        if (($record['file_kk'] != null) && ($record['file_kk'] != "") && ($record['file_kk'] != '0')) {
            $file_kk = base_url() . ltrim($record['file_kk'], $record['file_kk'][0]);
        } else {
            $file_kk = "";
        }

        $file_npwp = "";
        if (($record['file_npwp'] != null) && ($record['file_npwp'] != "") && ($record['file_npwp'] != '0')) {
            $file_npwp = base_url() . ltrim($record['file_npwp'], $record['file_npwp'][0]);
        } else {
            $file_npwp = "";
        }

        $file_skck = "";
        if (($record['file_skck'] != null) && ($record['file_skck'] != "") && ($record['file_skck'] != '0')) {
            $file_skck = base_url() . ltrim($record['file_skck'], $record['file_skck'][0]);
        } else {
            $file_skck = "";
        }

        $file_ijazah = "";
        if (($record['file_ijazah'] != null) && ($record['file_ijazah'] != "") && ($record['file_ijazah'] != '0')) {
            $file_ijazah = base_url() . ltrim($record['file_ijazah'], $record['file_ijazah'][0]);
        } else {
            $file_ijazah = "";
        }

        $file_sim = "";
        if (($record['file_sim'] != null) && ($record['file_sim'] != "") && ($record['file_sim'] != '0')) {
            $file_sim = base_url() . ltrim($record['file_sim'], $record['file_sim'][0]);
        } else {
            $file_sim = "";
        }

        $file_paklaring_1 = "";
        if (($record['file_paklaring_1'] != null) && ($record['file_paklaring_1'] != "") && ($record['file_paklaring_1'] != '0')) {
            $file_paklaring_1 = base_url() . ltrim($record['file_paklaring_1'], $record['file_paklaring_1'][0]);
        } else {
            $file_paklaring_1 = "";
        }

        $file_lainnya = "";
        if (($record['file_lainnya'] != null) && ($record['file_lainnya'] != "") && ($record['file_lainnya'] != '0')) {
            $file_lainnya = base_url() . ltrim($record['file_lainnya'], $record['file_lainnya'][0]);
        } else {
            $file_lainnya = "";
        }

        
        $data[] = array(
            "id" => $record['id'],
            "nik" => $record['nik'],
            "nama" => $record['nama'],
            "jenis_kelamin" => $record['jenis_kelamin'],
            "project_name" => $record['project_name'],
            "jabatan_name" => $record['jabatan_name'],
            "nama_area" => $nama_area,
            "region" => $region,
            "nama_rekruter" => $nama_rekruter,
            "nama_sumber_info" => strtoupper($nama_sumber_info),
            "tempat_lahir" => strtoupper($record['tempat_lahir']),
            "tanggal_lahir" => $record['tanggal_lahir'],
            "asal_kota" => strtoupper($record['asal_kota']),
            "alamat_domisili" => strtoupper($record['alamat_domisili']),
            "nomor_tlp" => $record['nomor_tlp'],
            "nama_kontak_darurat" => strtoupper($record['nama_kontak_darurat']),
            "nama_hubungan_kondar" => strtoupper($record['nama_hubungan_kondar']),
            "nomor_tlp_kontak_darurat" => $record['nomor_tlp_kontak_darurat'],
            "status_nikah" => $record['status_nikah'],
            "pengalaman_kerja" => strtoupper($record['pengalaman_kerja']),
            "kontak_person_sebelumnya" => strtoupper($record['kontak_person_sebelumnya']),
            "file_pasfoto" => $file_pasfoto,
            "file_ktp" => $file_ktp,
            "file_cv" => $file_cv,
            "file_kk" => $file_kk,
            "file_npwp" => $file_npwp,
            "file_skck" => $file_skck,
            "file_ijazah" => $file_ijazah,
            "file_sim" => $file_sim,
            "file_paklaring_1" => $file_paklaring_1,
            "file_lainnya" => $file_lainnya,
            "tanggal_registrasi" => $record['tanggal_registrasi'],
        );

        return $data[0];
    }

    /*
	* persiapan data untuk datatable pagination
	* data list kandidat
	* 
	* @author Fadla Qamara
	*/
    function list_kandidat($postData = null)
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
        $project = $postData['project'];
        $jabatan = $postData['jabatan'];
        $region = $postData['region'];
        $rekruter = $postData['rekruter'];
        $range_tanggal = $postData['range_tanggal'];

        ## Search 
        $searchQuery = "";
        if ($searchValue != '') {
            // if (strlen($searchValue) >= 3) {
            $searchQuery = " (kandidat.id = '" . $searchValue .  "' or kandidat.nik like '%" . $searchValue . "%' or kandidat.nama like '%" . $searchValue . "%' or kandidat.project_name like '%" . $searchValue . "%' or kandidat.jabatan_name like '%" . $searchValue . "%' or kabupaten_kota.nama like '%" . $searchValue . "%' or interviewer.nama like '%" . $searchValue . "%' or interviewer.region like '%" . $searchValue . "%') ";
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
        // $kondisiDefaultQuery = "(project_id in (SELECT project_id FROM xin_projects_akses WHERE nip = " . $session_id . ")) AND `user_id` != '1'";
        // $kondisiDefaultQuery = "(
        // 	karyawan_id = " . $emp_id . "
        // AND	pkwt_id = " . $contract_id . "
        // )";
        $kondisiDefaultQuery = "`status_finish` = '1'";

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
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
        $this->db->join('interviewer', 'interviewer.id = kandidat.interviewer', 'left');
        $this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');
        // $this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');
        $this->db->where($kondisiDefaultQuery);

        // $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
        $records = $this->db->get('kandidat')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
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
        $this->db->join('interviewer', 'interviewer.id = kandidat.interviewer', 'left');
        $this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');
        // $this->db->join('xin_designations', 'xin_designations.designation_id = xin_employees.designation_id', 'left');
        $records = $this->db->get('kandidat')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('kandidat.*');
        $this->db->select('kabupaten_kota.nama as nama_area');
        $this->db->select('interviewer.nama as nama_rekruter');
        $this->db->select('interviewer.region as region');
        // $this->db->select('xin_employees.status_resign');
        // $this->db->select('xin_employees.ktp_no');
        // $this->db->select('xin_employees.first_name');
        // $this->db->select('xin_employees.project_id');
        // $this->db->select('xin_employees.sub_project_id');
        // $this->db->select('xin_employees.designation_id');
        // // $this->db->select('xin_designations.designation_id');
        // $this->db->select('xin_designations.designation_name');
        // $this->db->select('xin_employees.penempatan');
        // $this->db->select('b.from_date');
        // $this->db->select('b.to_date');
        // $this->db->select('xin_employees.contract_start');
        // $this->db->select('xin_employees.contract_end');
        // $this->db->select('xin_employees.private_code');
        // $this->db->select('xin_projects.priority');
        // $this->db->select('xin_designations.designation_name');
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
        $this->db->join('interviewer', 'interviewer.id = kandidat.interviewer', 'left');
        $this->db->join('kabupaten_kota', 'kabupaten_kota.id = kandidat.area', 'left');
        // $this->db->join('(SELECT contract_id, employee_id, from_date, to_date  FROM xin_employee_contract WHERE contract_id IN ( SELECT MAX(contract_id) FROM xin_employee_contract GROUP BY employee_id)) b', 'b.employee_id = xin_employees.employee_id', 'left');
        // $this->db->join('(select max(contract_id), employee_id from xin_employee_contract group by employee_id) b', 'b.employee_id = xin_employees.employee_id', 'inner');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('kandidat')->result();

        #Debugging variable
        $tes_query = $this->db->last_query();
        // $totalRecords = $tes_query;
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

            $button_open_profile = '</br><button onclick="open_profile(' . $record->id . ')" class="btn btn-sm btn-outline-success ladda-button mt-1" data-style="expand-right">View</button>';

            $data[] = array(
                "id" => $record->id . $button_open_profile,
                "nik" => $record->nik,
                "nama" => $record->nama,
                "project_name" => $record->project_name,
                "jabatan_name" => $record->jabatan_name,
                "area" => $nama_area,
                "region" => $region,
                "interviewer" => $nama_rekruter,
                "tanggal_registrasi" => $record->tanggal_registrasi,

                // "employee_id" => $record->employee_id . $text_resign,
                // "ktp_no" => $record->ktp_no,
                // "first_name" => strtoupper($record->first_name),
                // "project" => strtoupper($this->get_nama_project($record->project_id)),
                // "sub_project" => strtoupper($this->get_nama_sub_project($record->sub_project_id)),
                // "designation_name" => strtoupper($record->designation_name),
                // "penempatan" => strtoupper($record->penempatan),
                // "periode" => $text_periode,
                // "pincode" => $text_pin,
                // $this->get_nama_karyawan($record->upload_by)
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

    /*
	* data jumlah seluruh kandidat
	* 
	* @author Fadla Qamara
	*/
    function jumlah_kandidat()
    {
        ## Kondisi Default 
        $kondisiDefaultQuery = "`status_finish` = '1'";

        ## Total number of records without filtering
        $this->db->select('count(id) as allcount');
        $this->db->where($kondisiDefaultQuery);
        $records = $this->db->get('kandidat')->result();
        $totalRecords = $records[0]->allcount;

        return $totalRecords;
    }

    /*
	* data jumlah kandidat hari ini
	* 
	* @author Fadla Qamara
	*/
    function jumlah_kandidat_hari_ini()
    {
        ## Kondisi Filter
        $searchQuery = " (tanggal_registrasi like '%" . date('Y-m-d') . "%') ";

        ## Kondisi Default 
        $kondisiDefaultQuery = "`status_finish` = '1'";

        ## Total number of records without filtering
        $this->db->select('count(id) as allcount');
        $this->db->where($kondisiDefaultQuery);
        $this->db->where($searchQuery);
        $records = $this->db->get('kandidat')->result();
        $totalRecords = $records[0]->allcount;

        return $totalRecords;
    }

    /*
	* data jumlah kandidat bulan ini
	* 
	* @author Fadla Qamara
	*/
    function jumlah_kandidat_bulan_ini()
    {
        ## Kondisi Filter
        $searchQuery = " (tanggal_registrasi like '%" . date('Y-m') . "%') ";

        ## Kondisi Default 
        $kondisiDefaultQuery = "`status_finish` = '1'";

        ## Total number of records without filtering
        $this->db->select('count(id) as allcount');
        $this->db->where($kondisiDefaultQuery);
        $this->db->where($searchQuery);
        $records = $this->db->get('kandidat')->result();
        $totalRecords = $records[0]->allcount;

        return $totalRecords;
    }
}