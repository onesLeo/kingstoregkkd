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
                            <li><i class="fa fa-files-o"></i>GKKD SATELIT</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Table Admin - Manage GKKD Satelit Information
                            </header>
                            <div class="panel-body">
                                <div id="alert_message"></div>
                                <table id="inf_barang" class="table table-striped table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class=""></i> No Telp</th>
                                        <th><i class=""></i> No Rekening Pembayaran</th>
                                        <th><i class=""></i> Alamat Sekre</th>
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
                var dataTable = $('#inf_barang').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        url: "scripts/data-admin/fetch-dataadmin.php",
                        type: "POST"
                    }
                });
            }

            function update_data(id, column_name, value) {
                $.ajax({
                    url: "scripts/data-admin/update-inf-dataadmin.php",
                    method: "POST",
                    data: {id: id, column_name: column_name, value: value},
                    success: function (data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        $('#inf_barang').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function () {
                    $('#alert_message').html('');
                }, 5000);
            }

            $(document).on('blur', '.update', function () {
                var id = $(this).data("id");
                var column_name = $(this).data("column");
                var value = $(this).text();
                update_data(id, column_name, value);
            });

            $(document).on('click', '.delete', function () {
                var id = $(this).attr("id");
                if (confirm("Are you sure you want to remove this?")) {
                    $.ajax({
                        url: "scripts/data-admin/delete-inf-dataadmin.php",
                        method: "POST",
                        data: {id: id},
                        success: function (data) {
                            $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                            $('#inf_barang').DataTable().destroy();
                            fetch_data();
                        }
                    });
                    setInterval(function () {
                        $('#alert_message').html('');
                    }, 5000);
                }
            });
        });
    </script>

</body>

</html>
