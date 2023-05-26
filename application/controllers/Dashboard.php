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

    public function chart_karyawan()
    {
        $data['jumlah_karyawan'] = $this->M_karyawan->count_all();

        foreach ($data['jumlah_karyawan'] as $value) {

            if ($value['p_jabatan'] == 'Manager') {
                $data_karyawan['Manager'] = $value['p_karyawan'];
            }
            if ($value['p_jabatan'] == 'Superintendent') {
                $data_karyawan['Superintendent'] = $value['p_karyawan'];
            }
            if ($value['p_jabatan'] == 'Supervisor') {
                $data_karyawan['Supervisor'] = $value['p_karyawan'];
            }
            if ($value['p_jabatan'] == 'Officer') {
                $data_karyawan['Officer'] = $value['p_karyawan'];
            }
        }

        if (!isset($data_karyawan)) {
            $callback = array(
                'data' => [
                    ['total' => 0],
                    ['total' => 0],
                    ['total' => 0],
                    ['total' => 0],
                ],
            );
        } else {
            $callback = array(
                'data' => [
                    ['total' => isset($data_karyawan['Manager']) ? $data_karyawan['Manager'] : 0],
                    ['total' => isset($data_karyawan['Superintendent']) ? $data_karyawan['Superintendent'] : 0],
                    ['total' => isset($data_karyawan['Supervisor']) ? $data_karyawan['Supervisor'] : 0],
                    ['total' => isset($data_karyawan['Officer']) ? $data_karyawan['Officer'] : 0],
                ],
            );
        }

        header('Content-Type: application/json');

        echo json_encode($callback);
    }
}
