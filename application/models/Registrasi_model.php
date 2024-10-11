<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi_model extends CI_model
{
    //mengambil data perusahaan
    public function getAllCompany()
    {
        //$otherdb = $this->load->database('default', TRUE);

        $query = $this->db->get('perusahaan')->result_array();

        return $query;
    }

    //mengambil data project
    public function getAllProject()
    {
        $this->db->select('a.*');
        $this->db->join('(select max(id) as maxid from vacant group by project_id,project_name) b', 'a.id = b.maxid', 'inner');
        $this->db->from('vacant a');

        $query = $this->db->get()->result_array();

        return $query;
    }

    //ambil data jabatan berdasarkan project untuk Json
    public function getJabatanByProjectJson($postData)
    {
        //$otherdb = $this->load->database('default', TRUE);

        $this->db->select('a.*');
        $this->db->from('vacant a');
        $this->db->group_by('jabatan_id');
        // $this->db->join('(select max(id) as maxid from vacant group by jabatan_id,jabatan_name where project_id = '.$postData['project'].') b', 'a.id = b.maxid', 'inner');
        $this->db->where('project_id', $postData['project']);

        $query = $this->db->get()->result_array();

        return $query;
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
        $this->db->where('jabatan_id', $postData['jabatan']);

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
        $query = $this->db->get('interviewer')->result_array();

        return $query;
    }

    //save data diri kandidat
	public function save_data_diri($postData)
	{
		//update data
		$this->db->insert('kandidat', $postData);
    }

    //save data diri employee
	public function save_pengalaman($datarequest, $nik)
	{
		//update data
		$this->db->where('nik', $nik);
		$this->db->update('kandidat', $datarequest);
    }
}
