<?php
	include_once('config/config.php');
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
    ?>
  <!-- container section start -->
  <section id="container" class="">
    <section id="main-content">
        <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Form Belanja</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>Isi Belanja</li>
            </ol>
          </div>
        </div>        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Form Belanja 
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " id="form_pembelian" method="post" >
                   <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">Pilih Barang</label>
                    <div class="col-lg-10">
                      
                      <select id="pbarang" name="pbarang" data-live-search=true  class="form-control selectpicker input-sm m-bot15">
                                              <option data-token="0">----</option>
											  <?php
												$sql_query = "select id_informasi_barang, nama_barang, qty_barang, harga_perqty from informasi_barang order by id_informasi_barang asc";
												$result = mysqli_query($db,$sql_query);
												while( $rows = mysqli_fetch_assoc($result) ) {
											 ?>
											 <option value="<?php echo $rows["id_informasi_barang"] ?>" data-token="<?php echo $rows["nama_barang"] ?>"> <?php echo $rows["nama_barang"] ?> </option>
											<?php }?>
                          </select>
                    </div>
                  </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Qty tersedia <span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="qtytersedia" disabled=true name="qtytersedia" type="text" />
                      </div>
					</div>
					
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Harga per barang <span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" disabled=true id="hpbarang" name="hpbarang" type="text" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="jpembelian" class="control-label col-lg-2">Jumlah pembelian <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="jpembelian" name="jpembelian" type="text" />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Total Harga <span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" disabled=true id="tharga" name="tharga" type="text" />
                      </div>
                    </div>
                <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Proses Pembelian</button>
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
  
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <!--<script src="js/form-validation-script.js"></script>-->
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  
  
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap-select.min.js"></script>

	<!-- (Optional) Latest compiled and minified JavaScript translation files -->
	<script src="js/i18n/defaults-*.min.js"></script>
	<script src="js/jquery-1.8.3.min.js"></script>
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
						$("#qtytersedia").val(data.qty_barang);
						$("#hpbarang").val(data.harga_perqty);
					}
					
				})
			})
			
		})
	</script>
  
  	<script>
		$(document).ready(function(){
			$('#jpembelian').change(function(){
				var jumlah_beli = $(this).val();
				var hrgPerQty = $("#hpbarang").val();
				console.log("harga per quantity "+hrgPerQty);
				hrgPerQty = parseInt(hrgPerQty,10);
				jumlah_beli = parseInt(jumlah_beli,10);
				console.log("jumlah pembelian "+jumlah_beli);
				if(jumlah_beli >0 ){
					var total_pembayaran = jumlah_beli * hrgPerQty;
					$("#tharga").val(total_pembayaran);
				}else{
					alert("Jumlah pembelian harus lebih besar dari 0!");
				}

			})
			
		})
	</script>

  
</body>

</html>
