<?php
	include_once('config/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
		//include sidebar section
		include("sections\header.php");
	?>
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
  <link href="css/searchstyle.css" rel="stylesheet">
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
      include("sections\sidebar.php");
    ?>
  <!-- container section start -->
  <section id="container" class="">
    <section id="main-content">
        <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Informasi Pencarian barang berdasarkan Kwitansi</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Belanja</li>
              <li><i class="fa fa-files-o"></i>Informasi Pencarian Barang</li>
            </ol>
          </div>
        </div>
		 <div class="row">
			 <div class="col-lg-6">
				<div class="recent">
				  <h3>Masukkan nomor kwitansi pembelian:</h3>
				</div>
			  <input type="text" id="search" name="search" placeholder="Search..">
			</div>
		</div>
		<br/>
		<div class="row">
		<div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                Striped Table
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No Kwitansi</th>
                    <th>Jumlah Pembelian barang</th>
                    <th>Total Harga pembelian</th>
                    <th>Nama Barang</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
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

  <script>
		$(document).ready(function(){
			$('#search').change(function(){
				var value_id = $(this).val();
				console.log("no kwitansi > "+value_id);
				$.ajax({
					type: 'POST',
					url: 'scripts/cari_barang_basedon_kwitansi.php',
					dataType: 'json',
					data: {'id_barang':value_id},
					success:function(data){
						console.log("is success? > "+data);
						console.log("is success? jumlah pembelian => "+data.jumlah_barang_dibeli);
						console.log("is success? harga beli => "+data.total_harga_pembelian);
						console.log("is success? no kwitansi => "+data.no_kwitansi);
						console.log("is success? nama barang => "+data.nama_barang);

						var markup = "<tr><td></td><td>" + data.no_kwitansi + "<input type=\"hidden\" name=\"idbarangterbeli\" id=\"idbarangterbeli\" value="+data.id_barang_terbeli+" /></td><td>" + data.jumlah_barang_dibeli + "</td><td>" + data.total_harga_pembelian + "</td><td>" + data.nama_barang + "</td><td><form method=\"post\" action=""><input type=\"file\" name=\"uploadreceipt\" id=\"uploadreceipt\" multiple=\"multiple\"> <input type=\"submit\">Upload</button></form><td/></tr>";
						$("table tbody").append(markup);
					}

				})
			})

		})
	</script>

	<script>
		$('#uploadreceipt').filestyle({
		 input : false,
		 buttonName : 'btn-danger',
		 iconName : 'glyphicon glyphicon-folder-close'
		});

</script>

</body>

</html>
