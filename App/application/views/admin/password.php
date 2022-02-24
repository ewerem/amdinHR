<?php
  //session_start();
  if($this->session->userdata('user') != ''){
    $username = $this->session->userdata('user');
  }else{
    redirect('welcome/admin', 'refresh');
  }

?>

<!Doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/Emega/favicon/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/aos.css" rel="stylesheet">
    <!--sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>EUROMEGA | Password</title>
    <style type="text/css">
      body{
        font-family: lucida sans;
      }

      #elink{
        padding-right: 20px;
        padding-left: 20px;
        color: green;
        border-radius: 10px;
      }

      #elink:hover{
        background-color: green;
        color: white;
        border-radius: 10px;
      }

      #topsc{
        height: 170px;
        background-color: rgba(30, 130, 76, 0.6);
      }

      #dlink{
        color: green;
        border-radius: 10px;
      }

      #dlink:hover{
        border: 2px solid green;
        color: green;
        border-radius: 10px;
      }

    </style>
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white;border-bottom:4px solid green;" id="top">
    <div class="container-fluid">
        <div data-aos="zoom-in" data-aos-duration="1000">
          <img src="<?=base_url()?>assets/Emega/logo.png" style="width:150px;">
        </div> 
      <!--
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-bars"></span>
      </button>
    -->

      <div class="justify-content-end" id="navbarNavDropdown">
          <a class="btn btn-lg btn-success" href="<?=base_url()?>index.php/welcome/dashboard" style="float:right;">
            <i class="fas fa-arrow-circle-left"></i>
          </a>
      </div>

    </div>
  </nav>

  <div class="container">
    <br>
      <center>
        <a href="#" class="btn btn-lg" style="background-color: green; background-image: linear-gradient(to right, yellowgreen, green); color: white;width: 60%;border-radius: 50px; font-size:16px;">
           Change Password
        </a>
      </center>
      <br>

    <div class="container">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div data-aos="fade-up" data-aos-duration="1000">

            <div id="contact-form">
              <br>
              <form method="post" action="<?=base_url()?>index.php/welcome/change_pass" class="row g-3 needs-validation" novalidate style="padding:10px;border:1px solid green;border-radius: 5px;">
              <p style="color:#CC3333;font-size: 14px;"><i><b>Instruction:</b> Please fill in the correct informations before submitting. Thanks</i></p>

              <div class="col-md-12">
                <label for="validationCustom01" class="form-label" style="color:green;">Current Password</label>
                <input type="text" name="opass" class="form-control form-control-lg" id="validationCustom01" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-12">
                <label for="validationCustom02" class="form-label" style="color:green;">New Password</label>
                <input type="password" name="npass" class="form-control form-control-lg" id="validationCustom02" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-12">
                <label for="validationCustom02" class="form-label" style="color:green;">Re-type New Password</label>
                <input type="password" name="npass2" class="form-control form-control-lg" id="validationCustom02" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-12">
                <button class="btn btn-success btn-lg" type="submit" style="width:100%;">
                  Submit Changes <i class="fas fa-paper-plane"></i>
                </button>
              </div>

            </form>
            </div>

          </div>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>

  </div>

      <?php 
          if(isset($_GET['good'])){
      ?>
        <script>swal("Successful", "Password Changed Successfully !", "success");</script>
      <?php
          }else if(isset($_GET['wrong'])){
      ?>
        <script>swal("Failed", "Make sure the Current Password is correct and the New Password you entered is the same with the Re-type New Password you entered !", "error");</script>
      <?php
          }
      ?> 

  <br><br>

<div style="background-image: url('<?=base_url()?>assets/Emega/dot-map.png');">
  <div style="background-color:rgba(255, 255, 224, 0.5);">
    <div class="container">
      <br>
      <div id="footer">
        <center style="color:green;font-size: 14px;">
          &copy; Copyright <script> var d = new Date();var n = d. getFullYear(); document.write(n);</script> EMANL, All rights reserved
        </center>
      </div>
      <br>
    </div>
  </div>
</div>

    
    <!-- JavaScript-->
    <!--<script src="<?//=base_url()?>assets/js/jquery-3.6.0.min.js"></script>-->
    <script src="<?=base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/js/aos.js"></script>
    <script>
      AOS.init();

      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
      })()

    </script>

</body>
</html>