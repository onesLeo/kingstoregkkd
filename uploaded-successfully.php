<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belanja Barang">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Belanja, barang, gkkd, berkat, diberkati">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>King Store Gkkd - dimana belanja mendatangkan berkat</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/daterangepicker.css" rel="stylesheet" />
    <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
    <!-- date picker -->

    <!-- color picker -->

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <?php
    //include sidebar section
    session_start();
    include("sections\sidebar.php");

    $no_kwitansi_finalpage = $_SESSION["no_kwitansi"];
    $no_telp_finalpage = $_SESSION["no_telp"];
    $cabang_penerima = $_SESSION["cabang_penerima"];

    session_unset();
    session_destroy();

    ?>
    <!-- container section start -->
    <section id="container" class="">
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-files-o"></i> Upload</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index">Home</a></li>
                            <li><i class="icon_document_alt"></i>Belanja</li>
                            <li><i class="fa fa-files-o"></i>Informasi Upload</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="recent">
                        <h3>Informasi Upload</h3>
                    </div>
                    <div class="">
                        <p><h4>Bukti pembayaran anda telah diupload secara success, Admin akan segera melakukan pengecekan 1x24 jam</h4></p>
                    </div>
                </div>
                </div>
                <!-- page end-->
            </section>
        </section>

    </section>
    <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>


    <script src="js/jquery.tagsinput.js"></script>

    <!-- colorpicker -->

    <!-- bootstrap-wysiwyg -->
    <script src="js/jquery.hotkeys.js"></script>
    <script src="js/bootstrap-wysiwyg.js"></script>
    <script src="js/bootstrap-wysiwyg-custom.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-colorpicker.js"></script>
    <script src="js/daterangepicker.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- custome script for all page -->
    <script src="js/scripts.js"></script>
</body>

</html>
