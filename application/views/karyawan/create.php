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
                                <form action="<?= base_url('create_karyawan') ?>" method="post" id="karyawan">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Nama Karyawan" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jabatan" class="form-label">Jabatan</label>
                                        <select class="form-select" name="jabatan" id="jabatan" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Superintendent">Superintendent</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Officer">Officer</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" placeholder="Isi Alamat Karyawan" name="alamat"
                                            id="alamat" form="karyawan" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="agama" class="form-label">Agama</label>
                                        <select class="form-select" name="agama" id="agama" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghucu">Konghucu</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor HP</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="62">+62</span>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                placeholder="8987654321" aria-describedby="62" required />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="email@gmail.com" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status Pernikahan</label>
                                        <select class="form-select" name="status" id="status" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
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