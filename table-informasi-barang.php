<?php
	include_once('config/connection.php');
?>
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

	  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

	<!-- (Optional) Latest compiled and minified JavaScript translation files -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

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
      include("sections\sidebar.php");
	  session_start();
    ?>
  <!-- container section start -->
  <section id="container" class="">
    <section id="main-content">
        <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Form Belanja</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>Isi Belanja</li>
            </ol>
          </div>
        </div>        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Table Admin - Manage Barang
              </header>
              <div class="panel-body">
                  <table class="table table-striped table-advance table-hover">
                      <tbody>
                      <tr>
                          <th><i class=""></i> Nama Barang</th>
                          <th><i class=""></i> Harga Satuan Barang</th>
                          <th><i class=""></i> Quantity</th>
                          <th><i class=""></i> Action</th>
                      </tr>

                      <?php
                      $sql_query = "SELECT * FROM INFORMASI_BARANG";
                      $result = mysqli_query($db, $sql_query);
                      while ($rows = mysqli_fetch_assoc($result)){
                          ?>
                          <tr>
                              <td><?php echo $rows["nama_barang"] ?> </td>
                              <td><?php echo $rows["qty_barang"] ?> </td>
                              <td><?php echo $rows["harga_perqty"] ?> </td>
                              <td>
                                  <div class="btn-group">
                                      <form method="post" action="">
                                          <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                          <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                          <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                      </form>
                                  </div>
                              </td>
                          </tr>
                          <?php
                      }
                      ?>
                      </tbody>
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
  <script src="js/scripts.js"></script>
  
  
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap-select.min.js"></script>
  <!-- nice scroll -->

  
  	<script>
		$(document).ready(function(){
			$('#pbarang').change(function(){
				var value_id = $(this).val();
				console.log("id brg > "+value_id);
				$.ajax({
					type: 'GET',
					url: 'scripts/get_informasi_barang.php',
					dataType: 'json',
					data: {id_barang:value_id},
					success:function(data){
						console.log("is success? > "+data);
						console.log("is success? qty barang => "+data.qty_barang);
						console.log("is success? harga barang => "+data.harga_perqty);
						console.log("is success? id barang => "+data.id_informasi_barang);
						$("#qtytersedia").val(data.qty_barang);
						$("#hpbarang").val(data.harga_perqty);
						$("#idbarang").val(data.id_informasi_barang);
					}
					
				})
			})
			
		})
	</script>
  
  	<script>
		$(document).ready(function(){
			$('#gkkdsatelit').change(function(){
				var value_id = $(this).val();
				var gkkd_satelit_name = $("#gkkdsatelit option:selected").html();
				console.log("id satelit > "+value_id);
				console.log("satelit name > "+gkkd_satelit_name);
				$("#namasatelit").val(gkkd_satelit_name);
			})
			
		})
	</script>
  
  	<script>
		$(document).ready(function(){
			$('#jpembelian').change(function(){
				var jumlah_beli = $(this).val();
				var hrgPerQty = $("#hpbarang").val();
				var qtyTersedia = $("#qtytersedia").val();
				console.log("harga per quantity "+hrgPerQty);
				console.log("qty tersedia "+qtyTersedia);
				hrgPerQty = parseInt(hrgPerQty,10);
				jumlah_beli = parseInt(jumlah_beli,10);
				qtyTersedia = parseInt(qtyTersedia,10);
				console.log("jumlah pembelian "+jumlah_beli);
				if(jumlah_beli > qtyTersedia ){
					alert("Jumlah beli melebihi quantity yang tersedia! Harap mengurangi jumlah pembelian!");
					$("#tharga").val("");
					$("#jpembelian").val("");
					return false;
				}
				if(jumlah_beli >0 ){
					var total_pembayaran = jumlah_beli * hrgPerQty;
					$("#tharga").val(total_pembayaran);
				}else{
					alert("Jumlah pembelian harus lebih besar dari 0!");
					$("#tharga").val("");
					$("#jpembelian").val("");
					return false;
				}

			})
			
		})
	</script>

  
</body>

</html>
