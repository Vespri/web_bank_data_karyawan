<!doctype html>
<html lang="en">

<?php $this->load->view('components/header') ?>

<body>
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
                        <h5 class="card-title fw-semibold mb-4">Tambah Data Karyawan Baru</h5>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('update_karyawan') ?>" method="post" id="karyawan">
                                <input type="text" name="id" value="<?= $karyawan['p_id_karyawan'] ?>" hidden>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $karyawan['p_nama'] ?>"
                                            placeholder="Nama Karyawan" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Laki-Laki" <?= $karyawan['p_jenis_kelamin'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?= $karyawan['p_jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jabatan" class="form-label">Jabatan</label>
                                        <select class="form-select" name="jabatan" id="jabatan" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Manager" <?= $karyawan['p_jabatan'] == 'Manager' ? 'selected' : '' ?>>Manager</option>
                                            <option value="Superintendent" <?= $karyawan['p_jabatan'] == 'Superintendent' ? 'selected' : '' ?>>Superintendent</option>
                                            <option value="Supervisor" <?= $karyawan['p_jabatan'] == 'Supervisor' ? 'selected' : '' ?>>Supervisor</option>
                                            <option value="Officer" <?= $karyawan['p_jabatan'] == 'Officer' ? 'selected' : '' ?>>Officer</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" placeholder="Isi Alamat Karyawan" name="alamat"
                                            id="alamat" form="karyawan" required><?= $karyawan['p_alamat'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="agama" class="form-label">Agama</label>
                                        <select class="form-select" name="agama" id="agama" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Islam" <?= $karyawan['p_agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                            <option value="Kristen Protestan" <?= $karyawan['p_agama'] == 'Kristen Protestan' ? 'selected' : '' ?>>Kristen Protestan</option>
                                            <option value="Katolik" <?= $karyawan['p_agama'] == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                                            <option value="Hindu" <?= $karyawan['p_agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                            <option value="Buddha" <?= $karyawan['p_agama'] == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                                            <option value="Konghucu" <?= $karyawan['p_agama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                                            <option value="Lainnya" <?= $karyawan['p_agama'] == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor HP</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="62">+62</span>
                                            <input type="text" class="form-control" id="no_hp" value="<?= substr($karyawan['p_no_hp'], 3) ?>" name="no_hp"
                                                placeholder="8987654321" aria-describedby="62" required />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= $karyawan['p_email'] ?>" id="email"
                                            placeholder="email@gmail.com" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status Pernikahan</label>
                                        <select class="form-select" name="status" id="status" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Belum Menikah" <?= $karyawan['p_status_pernikahan'] == 'Belum Menikah' ? 'selected' : '' ?>>Belum Menikah</option>
                                            <option value="Menikah" <?= $karyawan['p_status_pernikahan'] == 'Menikah' ? 'selected' : '' ?>>Menikah</option>
                                            <option value="Cerai Hidup" <?= $karyawan['p_status_pernikahan'] == 'Cerai Hidup' ? 'selected' : '' ?>>Cerai Hidup</option>
                                            <option value="Cerai Mati" <?= $karyawan['p_status_pernikahan'] == 'Cerai Mati' ? 'selected' : '' ?>>Cerai Mati</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="check_button">Submit</button>
                                    <button type="submit" class="btn btn-primary" id="submit_button" hidden></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('components/js') ?>
    <script>
    let no_hp = document.getElementById("no_hp");

    let check_button = document.getElementById("check_button");
    let submit_button = document.getElementById("submit_button");

    check_button.addEventListener("click", function() {
        if (no_hp.value.trim() != null && isNaN(no_hp.value.trim())) {
            swal({
                title: "Info!",
                text: "Format Nomor HP Salah",
                icon: "info"
            });
        } else {
            submit_button.click();
        }
    });
    </script>

</body>

</html>