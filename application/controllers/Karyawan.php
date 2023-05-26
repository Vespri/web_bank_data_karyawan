<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function karyawan_view()
    {
        $this->load->view('welcome_message');
    }
    
    public function create_karyawan()
    {
        $this->load->view('welcome_message');
    }

    public function update_karyawan()
    {
        $this->load->view('welcome_message');
    }

    public function delete_karyawan()
    {
        $this->load->view('welcome_message');
    }
}
