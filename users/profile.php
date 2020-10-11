<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" /> -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Informasi Profil</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">


  <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($_SESSION['udata']->NamaLengkap);?></h4>
  <hr>
    <!-- <h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5> -->
<form class="form-horizontal style-form" method="post" name="profile" >

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
<div class="col-sm-4">
<input type="text" name="fullname"  disabled value="<?php echo htmlentities($_SESSION['udata']->NamaLengkap);?>" class="form-control" >
 </div>
<label class="col-sm-2 col-sm-2 control-label">Email</label>
 <div class="col-sm-4">
<input type="email" name="useremail"  disabled value="<?php echo htmlentities($_SESSION['udata']->Surel);?>" class="form-control" readonly>
</div>
 </div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Nomor HP</label>
 <div class="col-sm-4">
<input type="text" name="contactno"  disabled value="<?php echo htmlentities($_SESSION['udata']->NoHP);?>" class="form-control">
</div>
<label class="col-sm-2 col-sm-2 control-label">Alamat</label>
<div class="col-sm-4">
<textarea  name="address" disabled  class="form-control"><?php echo htmlentities($_SESSION['udata']->Alamat);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Unit Kerja</label>
<div class="col-sm-4">
<input type="text" name="country"  disabled value="<?php echo htmlentities($_SESSION['udata']->NamaUnitKerja);?>" class="form-control">

</div>

<label class="col-sm-2 col-sm-2 control-label">Instansi</label>
<div class="col-sm-4">
<input type="text" name="country"  disabled value="<?php echo htmlentities($_SESSION['udata']->NamaInstansi);?>" class="form-control">
</div>
</div>

<!-- 
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Potition</label>
<div class="col-sm-4">
<input type="text" name="pincode" maxlength="6"  disabled value="<?php echo htmlentities($row['pincode']);?>" class="form-control">
</div>
<label class="col-sm-2 col-sm-2 control-label">Reg Date </label>
<div class="col-sm-4">
<input type="text" name="regdate"  value="<?php echo htmlentities($row['regDate']);?>" class="form-control" readonly>
 </div>
</div> -->













                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <?php include("includes/footer.php");?>
  </section>
  <!-- <script
   src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
   crossorigin="anonymous">
  </script>
  <script src="assets/js/token.js"> 
  </script>     -->


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<!-- <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script> -->
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  
	
	<script src="assets/js/form-component.js"></script>    

  </body>
</html>
