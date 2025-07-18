<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Screening_model extends CI_model
{
    //mengambil data perusahaan
    public function getAllCompany()
    {
        //$otherdb = $this->load->database('default', TRUE);

        $query = $this->db->get('perusahaan')->result_array();

        return $query;
    }

    //mengambil data Project
    public function getAllProject()
    {
        //$otherdb = $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->group_by('title');

        $query = $this->db->get()->result_array();

        return $query;

        // $query = $this->db->get('projects')->result_array();

        // return $query;
    }

    //mengambil data Project
    public function getAllJabatan()
    {
        //$otherdb = $this->load->database('default', TRUE);

        // $query = $this->db->get('jabatan')->result_array();

        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->where('level >=', 'C1');

        $query = $this->db->get()->result_array();

        return $query;
    }

    //mengambil data Provinsi
    public function getAllProvinsi()
    {
        //$otherdb = $this->load->database('default', TRUE);

        $query = $this->db->get('provinsi')->result_array();

        return $query;
    }

    //mengambil data project by vacant
    public function getAllProjectVacant()
    {
        $this->db->select('a.*');
        $this->db->join('(select max(id) as maxid from vacant group by project_id,project_name) b', 'a.id = b.maxid', 'inner');
        $this->db->from('vacant a');

        $query = $this->db->get()->result_array();

        return $query;
    }

    //ambil data kota berdasarkan provinsi untuk Json
    public function getKotaByProvJson($postData)
    {
        //$otherdb = $this->load->database('default', TRUE);

        $this->db->select('a.*');
        $this->db->from('kabupaten_kota a');
        // $this->db->join('(select max(id) as maxid from vacant group by jabatan_id,jabatan_name where project_id = '.$postData['project'].') b', 'a.id = b.maxid', 'inner');
        $this->db->where('id_prov_bps', $postData['provinsi']);

        $query = $this->db->get()->result_array();

        return $query;
    }

    //ambil data project vacant
    public function get_project_vacant_json($postData)
    {
        $this->db->select('count(*) as allcount');
        $this->db->select('kandidat_id');
        $this->db->where('nik', $postData['nik_kandidat']);
        $this->db->where('status_finish', '0');
        $this->db->from('screening');

        $query_cek = $this->db->get()->row_array();

        if ($query_cek['allcount'] > '0') {
            $result = array(
                "status" => "0",
                "project" => $query_cek,
            );
        } else {
            //$otherdb = $this->load->database('default', TRUE);
            // $company = $this->get_company_by_project($project_id);

            $this->db->select('*');
            $this->db->from('job_order_master');

            $query = $this->db->get()->result_array();

            $result = array(
                "status" => "1",
                "project" => $query,
            );
        }

        return $result;
    }

    //ambil data jabatan vacant berdasarkan project untuk Json
    public function get_jabatan_vacant($id_job_order = "")
    {
        //---begin ambil company----
        $this->db->select('*');
        $this->db->where('id', $id_job_order);
        $this->db->from('job_order_master');

        $query_job_order_master = $this->db->get()->row_array();

        //$otherdb = $this->load->database('default', TRUE);
        if (empty($query_job_order_master)) {
            $company = $this->get_company_by_project("");
        } else {
            $company = $this->get_company_by_project($query_job_order_master['project_id']);
        }
        //---end ambil company----

        //---begin ambil vacant----
        $this->db->select('*');
        $this->db->where('job_master_id', $id_job_order);
        $this->db->from('job_order');

        $query_job_order = $this->db->get()->row_array();

        if (empty($query_job_order)) {
            $job_order_id = "";
        } else {
            $job_order_id = $query_job_order['id'];
        }

        $this->db->select('*');
        $this->db->where('job_order_id', $job_order_id);
        $this->db->group_by("jabatan_id");
        $this->db->from('vacant');

        $query = $this->db->get()->result_array();
        //---end ambil vacant----

        $result = array(
            "company" => $company,
            "jabatan" => $query,
        );

        return $result;
    }

    //ambil data jabatan vacant berdasarkan project untuk Json
    public function get_area_vacant($postData)
    {

        //---begin ambil area vacant----
        $this->db->select('*');
        $this->db->where('job_order_id', $postData["project"]);
        $this->db->where('jabatan_id', $postData["jabatan"]);
        $this->db->from('vacant');

        $query = $this->db->get()->result_array();
        //---end ambil vacant----

        $result = array(
            "area_json" => $query,
        );

        return $result;
    }

    //ambil data job order master
    public function get_job_order_master($id_job_order_master)
    {
        $this->db->select('*');
        $this->db->where('id', $id_job_order_master);
        $this->db->from('job_order_master');

        $query = $this->db->get()->row_array();

        return $query;
    }

    //ambil data vacant
    public function get_vacant($id_vacant)
    {
        $this->db->select('*');
        $this->db->where('id', $id_vacant);
        $this->db->from('vacant');

        $query = $this->db->get()->row_array();

        return $query;
    }

    //ambil data jabatan berdasarkan project untuk Json
    public function getJabatanByProjectJson($project_id)
    {
        //$otherdb = $this->load->database('default', TRUE);
        $company = $this->get_company_by_project($project_id);

        $this->db->select('a.*');
        $this->db->select('b.designation_id');
        $this->db->select('b.designation_name');
        $this->db->join('jabatan b', 'a.posisi = b.designation_id', 'left');
        $this->db->from('mappring_project_jabatan a');
        $this->db->where('project_id', $project_id);

        $query = $this->db->get()->result_array();

        $result = array(
            "company" => $company,
            "jabatan" => $query,
        );

        return $result;
    }

    //ambil data company berdasarkan project
    public function get_company_by_project($project_id = "")
    {
        //$otherdb = $this->load->database('default', TRUE);
        $result = array();

        $this->db->select('company_id');
        $this->db->select('title');
        $this->db->where('project_id', $project_id);
        $this->db->from('projects');

        $query = $this->db->get()->result_array();

        if (empty($query)) {
            $result = array(
                "company_id" => "",
                "company_name" => "",
            );

            return $result;
        } else {
            $this->db->select('company_id');
            $this->db->select('name');
            $this->db->where('company_id', $query[0]['company_id']);
            $this->db->from('companies');

            $query2 = $this->db->get()->result_array();

            if (empty($query2)) {
                $result = array(
                    "company_id" => "",
                    "company_name" => "",
                );

                return $result;
            } else {
                $result = array(
                    "company_id" => $query2[0]['company_id'],
                    "company_name" => $query2[0]['name'],
                );

                return $result;
            }
        }
    }

    //ambil data area berdasarkan project untuk Json
    public function getAreaByJabatanJson($postData)
    {
        //$otherdb = $this->load->database('default', TRUE);

        $this->db->select('a.*');
        $this->db->from('vacant a');
        $this->db->group_by('area');
        // $this->db->join('(select max(id) as maxid from vacant group by jabatan_id,jabatan_name where project_id = '.$postData['project'].') b', 'a.id = b.maxid', 'inner');
        $this->db->where('project_id', $postData['project']);
        $this->db->where('jabatan_name', $postData['jabatan']);

        $query = $this->db->get()->result_array();

        return $query;
    }

    //mengambil data sumber info
    public function get_all_sumber_info()
    {
        $query = $this->db->get('sumber_info')->result_array();

        return $query;
    }

    //mengambil data interviewer
    public function get_all_interviewer()
    {
        $this->db->select('*');
        $this->db->from('interviewer');
        $this->db->where('status_aktif', "1");
        $this->db->order_by('region', 'ASC');

        $query = $this->db->get()->result_array();

        return $query;
    }

    //mengambil data family relation
    public function getAllFamilyRelation()
    {
        $query = $this->db->get('family_relation')->result_array();

        return $query;
    }

    //ambil data jabatan berdasarkan project untuk Json
    public function getAllRegion()
    {
        //$otherdb = $this->load->database('default', TRUE);

        $this->db->select('region');
        $this->db->from('interviewer');
        $this->db->group_by('region');

        $query = $this->db->get()->result_array();

        return $query;
    }

    //save data perusahaan kandidat
    public function save_perusahaan($postData)
    {
        //save data
        $this->db->insert('kandidat', $postData);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    //save data project kandidat
    public function save_project($postData)
    {
        //save data
        $this->db->insert('kandidat', $postData);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    //save data screening kandidat
    public function save_mulai_screening($postData)
    {
        //save data
        $this->db->insert('screening', $postData);
        $insert_id = $this->db->insert_id();

        $this->db->select('*');
        $this->db->where('id', $insert_id);
        $this->db->from('screening');

        $query = $this->db->get()->row_array();

        return $query;

        // return $insert_id;
    }

    //save data project employee
    public function save_project2($datarequest, $id_kandidat)
    {
        //update data
        $this->db->where('id', $id_kandidat);
        $this->db->update('kandidat', $datarequest);
    }

    //save data diri kandidat
    public function save_data_diri($datarequest, $id_kandidat)
    {
        //update data
        $this->db->where('id', $id_kandidat);
        $this->db->update('kandidat', $datarequest);
    }

    //save data pengalaman employee
    public function save_pengalaman($datarequest, $id_kandidat)
    {
        //update data
        $this->db->where('id', $id_kandidat);
        $this->db->update('kandidat', $datarequest);
    }

    //save data dokumen employee
    public function save_dokumen($file_data, $id_kandidat, $name)
    {
        //update data
        if ($name == "pasfoto") {
            //Cek variabel post
            $datarequest = [
                'file_pasfoto'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        } else if ($name == "ktp") {
            //Cek variabel post
            $datarequest = [
                'file_ktp'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        } else if ($name == "cv") {
            //Cek variabel post
            $datarequest = [
                'file_cv'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        } else if ($name == "kk") {
            //Cek variabel post
            $datarequest = [
                'file_kk'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        } else if ($name == "npwp") {
            //Cek variabel post
            $datarequest = [
                'file_npwp'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        } else if ($name == "skck") {
            //Cek variabel post
            $datarequest = [
                'file_skck'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        } else if ($name == "ijazah") {
            //Cek variabel post
            $datarequest = [
                'file_ijazah'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        } else if ($name == "sim") {
            //Cek variabel post
            $datarequest = [
                'file_sim'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        } else if ($name == "paklaring") {
            //Cek variabel post
            $datarequest = [
                'file_paklaring_1'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        } else if ($name == "dokumen_pendukung") {
            //Cek variabel post
            $datarequest = [
                'file_lainnya'   => $file_data,
            ];

            $this->db->where('id', $id_kandidat);
            $this->db->update('kandidat', $datarequest);
        }
    }

    //finish registrasi kandidat
    public function finish_register($datarequest, $id_kandidat)
    {
        //update data
        $this->db->where('id', $id_kandidat);
        $this->db->update('kandidat', $datarequest);

        $this->db->select('*');
        $this->db->from('kandidat');
        $this->db->where('id', $id_kandidat);

        $query = $this->db->get()->row_array();

        return $query;
    }

    function tgl_indo($tanggal)
    {
        if (($tanggal == "") || ($tanggal == "0") || empty($tanggal)) {
            return "";
        } else {
            // $input = '06/10/2011 19:00:02';
            $timetodate = strtotime($tanggal);
            $date = date('Y-m-d', $timetodate);


            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $date);

            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun

            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }
    }

	//mengambil Json data verifikasi kandidat
	public function get_status_verifikasi()
	{
		$postData = $this->input->post();

		// get data 
		$data = $this->Kandidat_model->get_status_verifikasi_json($postData);
		echo json_encode($data);
	}
}
