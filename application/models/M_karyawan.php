<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_karyawan extends CI_Model
{
    public function read_all_data()
    {
        $result = $this->db->query("SELECT * FROM read_all_karyawan()");
        return $result->result_array();
    }

    public function read_data_by_id($id)
    {
        $result = $this->db->query("SELECT * FROM read_karyawan_by_id('$id')");
        return $result->row_array();
    }

    public function create_data($nama, $jenis_kelamin, $jabatan, $alamat, $agama, $no_hp, $email, $status_pernikahan, $total_gaji_akhir)
    {
        $this->db->trans_start();
        $this->db->query("SELECT * FROM create_karyawan('$nama', '$jenis_kelamin', '$jabatan', '$alamat', '$agama', '$no_hp', '$email', '$status_pernikahan', $total_gaji_akhir)");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true) {
            return true;
        } else {
            return false;
        }
    }

    public function update_data($nama, $jenis_kelamin, $jabatan, $alamat, $agama, $no_hp, $email, $status_pernikahan, $total_gaji_akhir, $id_karyawan)
    {
        $this->db->trans_start();
        $this->db->query("SELECT * FROM update_karyawan('$nama', '$jenis_kelamin', '$jabatan', '$alamat', '$agama', '$no_hp', '$email', '$status_pernikahan', $total_gaji_akhir, '$id_karyawan')");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_data($id_karyawan)
    {
        $this->db->trans_start();
        $this->db->query("SELECT * FROM delete_karyawan('$id_karyawan')");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true) {
            return true;
        } else {
            return false;
        }
    }
}