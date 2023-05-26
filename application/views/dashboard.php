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
    <script src="<?= base_url() ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script>
    // =====================================
    // Data Karyawan
    // =====================================
    const BASE_URL = '<?= base_url(); ?>';
    $.ajax({
        url: `${BASE_URL}Dashboard/chart_karyawan/`,
        method: "GET",
        success: function(data) {
            var value = [];
            i = 0;
            do {
                value.push(data.data[i].total);
                i++;
            } while (i < data.data.length);
            var chart = {
                series: [{
                    name: "Total Karyawan:",
                    data: value
                }],

                chart: {
                    type: "bar",
                    height: 345,
                    offsetX: -15,
                    toolbar: {
                        show: true
                    },
                    foreColor: "#adb0bb",
                    fontFamily: "inherit",
                    sparkline: {
                        enabled: false
                    },
                },

                colors: ["#5D87FF", "#49BEFF"],

                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "35%",
                        borderRadius: [6],
                        borderRadiusApplication: "end",
                        borderRadiusWhenStacked: "all",
                    },
                },
                markers: {
                    size: 0
                },

                dataLabels: {
                    enabled: false,
                },

                legend: {
                    show: false,
                },

                grid: {
                    borderColor: "rgba(0,0,0,0.1)",
                    strokeDashArray: 3,
                    xaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },

                xaxis: {
                    type: "category",
                    categories: ["Supervisor", "Officer", "Superintendent", "Manager"],
                    labels: {
                        style: {
                            cssClass: "grey--text lighten-2--text fill-color"
                        },
                    },
                },

                yaxis: {
                    show: true,
                    min: 0,
                    max: Math.max(...value),
                    tickAmount: 4,
                    labels: {
                        style: {
                            cssClass: "grey--text lighten-2--text fill-color",
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 3,
                    lineCap: "butt",
                    colors: ["transparent"],
                },

                tooltip: {
                    theme: "light"
                },

                responsive: [{
                    breakpoint: 600,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 3,
                            },
                        },
                    },
                }, ],
            };
            
    new ApexCharts(document.querySelector("#chart"), chart).render();
        },
    });

    </script>

</body>

</html>