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
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Total Karyawan Tiap Jabatan</h5>
                                    </div>
                                </div>
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('components/js') ?>

</body>

</html>