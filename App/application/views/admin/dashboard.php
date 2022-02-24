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

    <title>EUROMEGA | Dashboard</title>
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

      @media only screen and (max-width: 600px) {
        /*small screen*/
        #imgho{
          width: 100% !important;
        }
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

      <div class="ustify-content-end" id="navbarNavDropdown">
          <a class="btn btn-lg btn-danger" href="<?=base_url()?>index.php/welcome/logout" title="Logout" style="float:right;">
            <i class="fas fa-sign-out-alt"></i>
          </a>
      </div>

    </div>
  </nav>

  <div class="container">
    <br>
    <div class="container">

      <center>
        <a href="#" class="btn btn-lg" style="background-color: green; background-image: linear-gradient(to right, yellowgreen, green); color: white;width: 60%;border-radius: 50px; font-size:16px;">
          <i class="fas fa-user"></i> <?= ucfirst($username)?>
        </a>
      </center>
      <br>

      <div class="row">
             
            <div class="col-sm-12 col-md-6 col-lg-6" style="padding:10px;">
              <center>
              <div data-aos="fade-up" data-aos-duration="500">
                <a href="<?=base_url()?>index.php/welcome/postjob" id="linkdash" style="text-decoration: none;">
                  <div class="card" style="width: 25rem;" id="imgho">
                    <img src="<?=base_url()?>assets/Emega/job1.jpg" class="card-img-top" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="color:green;">Post Vacancies</h4>
                    </div>
                  </div>
                </a>
              </div>
              </center>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6" style="padding:10px;">
              <center>
              <div data-aos="fade-up" data-aos-duration="1000">
                <a href="<?=base_url()?>index.php/welcome/getjob" style="text-decoration: none;">
                  <div class="card" style="width: 25rem;" id="imgho">
                    <img src="<?=base_url()?>assets/Emega/job3.jpeg" class="card-img-top" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="color:green;">
                        View Vacancies 
                          <span class="badge rounded-pill bg-danger" style="font-size:14px;">
                            <?php
                              if(isset($vacs)){
                                foreach($vacs as $row){
                                  echo $row['val'];
                                }
                              }else{
                                echo'0';
                              }
                            ?>
                          </span>
                      </h4>
                    </div>
                  </div>
                </a>
              </div>
              </center>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6" style="padding:10px;">
              <center>
              <div data-aos="fade-up" data-aos-duration="1000">
                <a href="<?=base_url()?>index.php/welcome/job_application" style="text-decoration: none;">
                  <div class="card" style="width: 25rem;" id="imgho">
                    <img src="<?=base_url()?>assets/Emega/job2.jpg" class="card-img-top" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="color:green;">
                        View Applicants 
                          <span class="badge rounded-pill bg-danger" style="font-size:14px;">
                            <?php
                              if(isset($apps)){
                                foreach($apps as $row){
                                  echo $row['val'];
                                }
                              }else{
                                echo'0';
                              }
                            ?>
                          </span>
                      </h4>
                    </div>
                  </div>
                </a>
              </div>
              </center>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6" style="padding:10px;">
              <center>
              <div>
                <a href="<?=base_url()?>index.php/welcome/password" style="text-decoration: none;">
                  <div class="card" style="width: 25rem;" id="imgho">
                    <img src="<?=base_url()?>assets/Emega/password2.jpg" class="card-img-top" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="color:green;">Change Password</h4>
                    </div>
                  </div>
                </a>
              </div>
              </center>
            </div>

      </div>
    </div>

  </div>

  <br>

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