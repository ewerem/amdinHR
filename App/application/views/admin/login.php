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

    <title>EUROMEGA | Admin</title>
    <style type="text/css">
      body{
        font-family: sans-serif;
      }

      @media only screen and (max-width: 600px) {
        /*small screen*/
        #logo-big{
          display: none;
        }
      }

      @media only screen and (min-width: 800px){
        /*large screen*/
        #logo-small{
          display: none;
        }
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
        height: 250px;
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

      .swal-button {
        background-color: red;
        color: white;
      }

    </style>
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white;border-bottom:1px solid #eee;" id="top">
    <div class="container-fluid">
      <a class="navbar-brand" id="logo-big" href="<?=base_url()?>index.php">
        <div data-aos="zoom-in" data-aos-duration="1000">
          <img src="<?=base_url()?>assets/Emega/logo.png" style="width:150px;">
        </div>
      </a>  
      <!-- small screen -->
      <div data-aos="zoom-in" data-aos-duration="1000" id="logo-small">
          <img src="<?=base_url()?>assets/Emega/logo.png" style="width:150px;">
      </div>
    </div>
  </nav>

  <div>
      <img src="<?=base_url()?>assets/Emega/bg4.png" style="width: 100%;height: 90px;">
  </div>

<!--
  <div style="background-image: url('<?=base_url()?>assets/Emega/ga.jpg');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
    <div id="topsc">
      <br>
      <center>
        <h4 style="color:white;font-size: 40px;">
          <br>
          <div data-aos="zoom-in" data-aos-duration="1000">
            Login Here
          </div>
          <i class="fas fa-arrow-circle-down" style="font-size:40px;"></i>
        </h4>
      </center>
    </div>
  </div>
-->

    <div class="container">
      <br>
      <div class="row">
      <div class="col-sm-12 col-md-2 col-lg-3"></div>
      <div class="col-sm-12 col-md-8 col-lg-6">

        <div data-aos="zoom-in" data-aos-duration="1000">
          <center>
            <i class="fas fa-user" style="color:white; font-size: 60px;border-radius: 100%; padding:20px;padding-left: 23px; padding-right: 23px;background-color: green;"></i>
            <p></p>
            <h4 style="color:green; font-weight: bold;">Admin Login</h4>
          </center>
        </div>
        <br>

        <div data-aos="fade-up" data-aos-duration="1000">
        <div id="contact-form">
          <br>
          <form method="post" action="<?=base_url()?>index.php/welcome/login" class="row g-3 needs-validation" novalidate style="padding:10px;border:1px solid green;border-radius: 5px;">

            <div class="col-md-12">
              <label for="validationCustom01" class="form-label" style="color:green;"><i class="fas fa-user"></i> Username</label>
              <input type="text" name="username" class="form-control form-control-lg" id="validationCustom01" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="validationCustom02" class="form-label" style="color:green;"><i class="fas fa-lock"></i> Password</label>
              <input type="password" name="password" class="form-control form-control-lg" id="validationCustom02" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-12">
              <button class="btn btn-success btn-lg" type="submit" style="width:100%;">
                Submit <i class="fas fa-paper-plane"></i>
              </button>
            </div>

          </form>
        </div>
        </div>

      </div>
      <div class="col-sm-12 col-md-2 col-lg-3"></div>
    </div>

    </div>  

    <?php 
        if(isset($_GET['wrong'])){
    ?>
      <script>swal("Access Declined", "Wrong Authentication !", "error");</script>
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