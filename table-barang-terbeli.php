<?php
include_once('config/connection.php');
?>
<!DOCTYPE html>
<html lang="en" id="live-update">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belanja Barang">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Belanja, barang, gkkd, berkat, diberkati">

    <title>King Store Gkkd - dimana belanja mendatangkan berkat</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    <link href="css/daterangepicker.css" rel="stylesheet"/>
    <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link href="css/bootstrap-colorpicker.css" rel="stylesheet"/>


    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>

</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <?php
    //include sidebar section
    include("sections\sidebar.php");
    session_start();
    ?>
    <!-- container section start -->
    <section id="container" class="">
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-files-o"></i> Table Informasi</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index">Home</a></li>
                            <li><i class="icon_document_alt"></i>Informasi</li>
                            <li><i class="fa fa-files-o"></i>Barang Terbeli</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Table Admin - Manage Barang Terbeli
                            </header>
                            <div class="panel-body">
                                <div id="alert_message"></div>
                                <table id="inf_barang_terbeli" class="table table-striped table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class=""></i> Nama Pembeli</th>
                                        <th><i class=""></i> No Kwitansi</th>
                                        <th><i class=""></i> Nama Barang</th>
                                        <th><i class=""></i> Jumlah Barang Dibeli</th>
                                        <th><i class=""></i> Total Harga Pembelian</th>
                                        <th><i class=""></i> Nama Tempat Pengiriman</th>
                                        <th><i class=""></i> Alamat Pengiriman</th>
                                        <th><i class=""></i> Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page end-->
            </section>
        </section>

    </section>

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>

    <!-- custom form validation script for this page-->
    <!--<script src="js/form-validation-script.js"></script>-->
    <!--custome script for all page-->
    <script src="js/scripts-liveupdate.js"></script>

    <script src="js/bootstrap-select.min.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function () {

            fetch_data();

            function fetch_data() {
                var dataTable = $('#inf_barang_terbeli').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        url: "scripts/barang-terbeli/fetch-barang-terbeli.php",
                        type: "POST"
                    }
                });
            }

            $(document).on('click', '.delete', function () {
                var id = $(this).attr("id");
                if (confirm("Remove it's not supported in this area!")) {
                    setTimeout(function () {
                        $('#alert_message').html('<div class="alert alert-danger"> Sorry can\'t delete this information</div>');
                    }, 1000);
                    setInterval(function () {
                        $('#alert_message').html('');
                    }, 5000);
                }
                setInterval(function () {
                    $('#alert_message').html('');
                }, 5000);
            });

        });
    </script>

</body>

</html>
