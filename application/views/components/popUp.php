<!-- Create Success -->
<?php if ($this->session->flashdata('create_success')) { ?>
<script>
swal({
    title: "Berhasil!",
    text: "Data Karyawan berhasil ditambahkan",
    icon: "success",
    timer: 2000,
    buttons: false
});
</script>
<?php } ?>

<!-- Create Fail -->
<?php if ($this->session->flashdata('create_fail')) { ?>
<script>
swal({
    title: "Gagal!",
    text: "Data Karyawan gagal ditambahkan",
    icon: "error",
    timer: 2000,
    buttons: false
});
</script>
<?php } ?>

<!-- Update Success -->
<?php if ($this->session->flashdata('update_success')) { ?>
<script>
swal({
    title: "Berhasil!",
    text: "Data Karyawan berhasil diubah",
    icon: "success",
    timer: 2000,
    buttons: false
});
</script>
<?php } ?>

<!-- Update Fail -->
<?php if ($this->session->flashdata('update_fail')) { ?>
<script>
swal({
    title: "Gagal!",
    text: "Data Karyawan gagal diubah",
    icon: "error",
    timer: 2000,
    buttons: false
});
</script>
<?php } ?>

<!-- Delete Success -->
<?php if ($this->session->flashdata('delete_success')) { ?>
<script>
swal({
    title: "Berhasil!",
    text: "Data Karyawan berhasil dihapus",
    icon: "success",
    timer: 2000,
    buttons: false
});
</script>
<?php } ?>

<!-- Delete Fail -->
<?php if ($this->session->flashdata('delete_fail')) { ?>
<script>
swal({
    title: "Gagal!",
    text: "Data Karyawan gagal dihapus",
    icon: "error",
    timer: 2000,
    buttons: false
});
</script>
<?php } ?>