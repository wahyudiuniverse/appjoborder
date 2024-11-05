<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_model
{
    public function check_login()
	{
		if (!$this->session->has_userdata("employee_id")) {
			return false;
		} else {
			return true;
		}
	}
}
