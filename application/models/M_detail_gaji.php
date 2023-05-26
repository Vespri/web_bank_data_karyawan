<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_detail_gaji extends CI_Model
{
    public function create_data($gaji_pokok, $transport, $tunjangan_keluarga, $bpjs, $id_karyawan)
    {
        $this->db->trans_start();
        $this->db->query("SELECT * FROM create_detail_gaji($gaji_pokok, $transport, $tunjangan_keluarga, $bpjs, '$id_karyawan')");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true) {
            return true;
        } else {
            return false;
        }
    }

    public function update_data($gaji_pokok, $transport, $tunjangan_keluarga, $bpjs, $id_karyawan)
    {
        $this->db->trans_start();
        $this->db->query("SELECT * FROM update_detail_gaji($gaji_pokok, $transport, $tunjangan_keluarga, $bpjs, '$id_karyawan')");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true) {
            return true;
        } else {
            return false;
        }
    }
}