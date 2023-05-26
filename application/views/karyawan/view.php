<!doctype html>
<html lang="en">

<?php $this->load->view('components/header') ?>

<body>

    <?php $this->load->view('components/popUp') ?>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <?php $this->load->view('components/sidebar') ?>

        <!--  Main wrapper -->
        <div class="body-wrapper">

            <?php $this->load->view('components/navbar') ?>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Data Karyawan</h5>
                        <a href="<?= base_url('create_view') ?>" class="btn btn-primary m-1">Tambah Karyawan</a>
                        <div class="mt-4 table-responsive">
                            <table class="table text-nowrap mb-0 align-middle text-center">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">No.</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nama</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Jenis Kelamin</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Jabatan</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Alamat</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Agama</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nomor HP</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Email</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Status Pernikahan</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Total Gaji Akhir</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Detail Gaji</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Aksi</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($karyawan as $data) {
                                        $id_karyawan = $data['p_id_karyawan'];
                                        $nama = $data['p_nama'];
                                        $jenis_kelamin = $data['p_jenis_kelamin'];
                                        $jabatan = $data['p_jabatan'];
                                        $alamat = $data['p_alamat'];
                                        $agama = $data['p_agama'];
                                        $no_hp = $data['p_no_hp'];
                                        $email = $data['p_email'];
                                        $status_pernikahan = $data['p_status_pernikahan'];
                                        $total_gaji_akhir = $data['p_total_gaji_akhir'];
                                        $gaji_pokok = $data['p_gaji_pokok'];
                                        $transport = $data['p_transport'];
                                        $tunjangan_keluarga = $data['p_tunjangan_keluarga'];
                                        $bpjs = $data['p_bpjs'];
                                        $no++;
                                    ?>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><?= $no ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?= $nama ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?= $jenis_kelamin ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?= $jabatan ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?= $alamat ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?= $agama ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?= $no_hp ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?= $email ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <?php
                                            if ($status_pernikahan == 'Belum Menikah') {
                                                echo '<span class="btn btn-info fw-semibold mb-1">Belum Menikah</span>';
                                            } elseif ($status_pernikahan == 'Menikah') {
                                                echo '<span class="btn btn-success fw-semibold mb-1">Menikah</span>';
                                            } elseif ($status_pernikahan == 'Cerai Hidup') {
                                                echo '<span class="btn btn-danger fw-semibold mb-1">Cerai Hidup</span>';
                                            } else {
                                                echo '<span class="btn btn-secondary fw-semibold mb-1">Cerai Mati</span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">
                                                Rp&nbsp;&nbsp;<?= number_format($total_gaji_akhir,0,",",".") ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <button class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#detail<?= $id_karyawan ?>"><i
                                                    class="ti ti-info-circle"></i></button>
                                            <div class="modal fade" id="detail<?= $id_karyawan ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Gaji
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">Gaji Pokok :
                                                                    Rp&nbsp;&nbsp;<?= number_format($gaji_pokok,0,",",".") ?>
                                                                </li>
                                                                <li class="list-group-item">Transport :
                                                                    Rp&nbsp;&nbsp;<?= number_format($transport,0,",",".") ?>
                                                                </li>
                                                                <li class="list-group-item">Tunjangan Keluarga :
                                                                    Rp&nbsp;&nbsp;<?= number_format($tunjangan_keluarga,0,",",".") ?>
                                                                </li>
                                                                <li class="list-group-item">BPJS :
                                                                    Rp&nbsp;&nbsp;<?= number_format($bpjs,0,",",".") ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="<?= base_url('update_view') ?>/<?= $id_karyawan ?>"
                                                class="btn btn-info"><i class="ti ti-pencil"></i></a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus<?= $id_karyawan ?>"><i
                                                    class="ti ti-trash"></i></button>
                                            <div class="modal fade" id="hapus<?= $id_karyawan ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda
                                                                yakin ingin menghapus data ini ?
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?= base_url('delete_karyawan') ?>" method="post">
                                                            <input type="text" name="id" value="<?= $id_karyawan ?>"
                                                                hidden>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('components/js') ?>

</body>

</html>