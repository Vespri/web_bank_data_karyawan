<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan');
    }

    public function dashboard_view()
    {
        $this->load->view('dashboard');
    }
}
