<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function dashboard_view()
    {
        $this->load->view('welcome_message');
    }
}
