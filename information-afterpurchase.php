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
	  include_once("config/connection.php");
      include("sections/sidebar.php");
	  $sql_select="select no_telp, no_rekening_pembayaran from informasi_data_gkkd order by id_informasi_data_gkkd desc";
	  if($result = mysqli_query($db,$sql_select)){
		while($rows = mysqli_fetch_row($result)){
			$no_telp = $rows[0];
			$no_rek = $rows[1];
		}
	  }
	  $_SESSION["no_telp"] = $no_telp;
	  $jumlah_akhir_pembelian = $_SESSION["jml_beli"];
	  $total_akhir_pembayaran = $_SESSION["tot_harga"];
    ?>
  <!-- container section start -->
  <section id="container" class="">
    <section id="main-content">
        <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Informasi Pembayaran</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Belanja</li>
              <li><i class="fa fa-files-o"></i>Informasi Pembayaran</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Pembayaran
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " action="scripts/process_final_page.php" id="informationpurchasing" method="post" >
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">No Rekening Pembayaran<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="nrpembayaran" readonly name="nrpembayaran" type="text" value="<?php echo $no_rek ?>" /></input>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Jumlah pembelian akhir <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" disabled=true id="thpembayaran" name="thpembayaran" type="text" value="<?php echo $jumlah_akhir_pembelian ?>" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Total harga pembayaran<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" readonly id="jpembelianakhir" name="jpembelianakhir" type="text" value="<?php echo $total_akhir_pembayaran ?>" />
                      </div>
                    </div>
                <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Proses Pembayaran</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
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
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
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
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>
</body>

</html>
