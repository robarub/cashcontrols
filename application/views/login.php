<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css">
  <title>System.....</title>
</head>

<body>
  <div class="login-page">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 mt-5">
          <h1>Bienvenido a.....</h1>
        </div>
        <div class="col-sm-6 mt-5">
          <h1 class="text-center">CASH CONTROLS</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 offset-sm-6 text-center mt-3">
          <h3>...LOGIN...</h3>
          <button type="button" name="button" id="login">
			  <img src="<?php echo base_url();?>assets/assets/img/login-icon1.png" class="img-fluid" alt="Login">
		  </button>
        </div>
      </div>
    </div>
  </div>

  <?php require_once 'complementos/footer.php'; ?>
  <script src="<?php echo base_url(); ?>assets/js/actividades.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/accouting.js"></script>
</body>
</html>
<script>
	$(document).ready(function () {
		$("#login").on("click", function () {
			window.location="login_form";
        })
    });
</script>
