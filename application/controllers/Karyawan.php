<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan');
        $this->load->model('M_detail_gaji');
    }

    public function karyawan_view()
    {
        $data['karyawan'] = $this->M_karyawan->read_all_data();
        $this->load->view('karyawan/view', $data);
    }

    public function create_view()
    {
        $this->load->view('karyawan/create');
    }
    
    public function create_karyawan()
    {
        $nama = trim($this->input->post('nama'));
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $jabatan = $this->input->post('jabatan');
        $alamat = trim($this->input->post('alamat'));
        $agama = $this->input->post('agama');
        $no_hp = "+62".trim($this->input->post('no_hp'));
        $email = trim($this->input->post('email'));
        $status = $this->input->post('status');

        if ($jabatan == 'Manager') {
            $gaji_pokok = 20000000;
            $transport = 1500000;
            $tunjangan_keluarga = 2500000;
        } elseif ($jabatan == 'Superintendent') {
            $gaji_pokok = 15000000;
            $transport = 1250000;
            $tunjangan_keluarga = 2000000;
        } elseif ($jabatan == 'Supervisor') {
            $gaji_pokok = 10000000;
            $transport = 1000000;
            $tunjangan_keluarga = 1500000;
        } else {
            $gaji_pokok = 5000000;
            $transport = 750000;
            $tunjangan_keluarga = 1000000;
        }
        $bpjs = ($gaji_pokok * 4)/100;
        $gaji_pokok_asli = $gaji_pokok - $bpjs;
        $total_gaji_akhir = $gaji_pokok_asli + $transport + $tunjangan_keluarga;

        $result_karyawan = $this->M_karyawan->create_data($nama, $jenis_kelamin, $jabatan, $alamat, $agama, $no_hp, $email, $status, $total_gaji_akhir);
        $id_karyawan = $result_karyawan['create_karyawan'];
        $result_detail_gaji = $this->M_detail_gaji->create_data($gaji_pokok_asli, $transport, $tunjangan_keluarga, $bpjs, $id_karyawan);
        if ($result_detail_gaji == false) {
            $this->session->set_flashdata('create_fail', 'create_fail');
        } else {
            $this->session->set_flashdata('create_success', 'create_success');
        }
        redirect('karyawan_view');
    }

    public function update_view($id)
    {
        $data['karyawan'] = $this->M_karyawan->read_data_by_id($id);
        $this->load->view('karyawan/update', $data);
    }

    public function update_karyawan()
    {
        $id = $this->input->post('id');
        $nama = trim($this->input->post('nama'));
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $jabatan = $this->input->post('jabatan');
        $alamat = trim($this->input->post('alamat'));
        $agama = $this->input->post('agama');
        $no_hp = "+62".trim($this->input->post('no_hp'));
        $email = trim($this->input->post('email'));
        $status = $this->input->post('status');

        if ($jabatan == 'Manager') {
            $gaji_pokok = 20000000;
            $transport = 1500000;
            $tunjangan_keluarga = 2500000;
        } elseif ($jabatan == 'Superintendent') {
            $gaji_pokok = 15000000;
            $transport = 1250000;
            $tunjangan_keluarga = 2000000;
        } elseif ($jabatan == 'Supervisor') {
            $gaji_pokok = 10000000;
            $transport = 1000000;
            $tunjangan_keluarga = 1500000;
        } else {
            $gaji_pokok = 5000000;
            $transport = 750000;
            $tunjangan_keluarga = 1000000;
        }
        $bpjs = ($gaji_pokok * 4)/100;
        $gaji_pokok_asli = $gaji_pokok - $bpjs;
        $total_gaji_akhir = $gaji_pokok_asli + $transport + $tunjangan_keluarga;

        $result_karyawan = $this->M_karyawan->update_data($nama, $jenis_kelamin, $jabatan, $alamat, $agama, $no_hp, $email, $status, $total_gaji_akhir, $id);
        $result_detail_gaji = $this->M_detail_gaji->update_data($gaji_pokok_asli, $transport, $tunjangan_keluarga, $bpjs, $id);
        if ($result_karyawan == false) {
            $this->session->set_flashdata('update_fail', 'update_fail');
        } else {
            $this->session->set_flashdata('update_success', 'update_success');
        }
        redirect('karyawan_view');
    }

    public function delete_karyawan()
    {
        $id = $this->input->post('id');
        $result = $this->M_karyawan->delete_data($id);
        if ($result == false) {
            $this->session->set_flashdata('delete_fail', 'delete_fail');
        } else {
            $this->session->set_flashdata('delete_success', 'delete_success');
        }
        redirect('karyawan_view');
    }
}
