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

    <title>EUROMEGA | ViewJobs</title>
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
           View vacancies
        </a>
      </center>
      <br>

    <div class="container">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">

          <?php
            if(isset($vacants)){
              $count = 1;
              foreach($vacants as $row){
          ?>
            <table class="table" style="border-bottom:1px solid green;">
              <tr>
                <td>
                  <h5 style="color:green;font-weight:bold;">
                    <i class="fas fa-arrow-circle-right"></i> <?=ucwords($row['title'])?>
                  </h5>
                  <p style="font-size: 14px; text-align:justify; word-spacing:1px;color: green;">
                     <i class="fas fa-map-marker-alt"></i> <?=ucfirst($row['locate'])?> | <i class="fas fa-clock"></i> <?=date('d/F/Y', strtotime($row['date']))?>
                  </p>
                  <a href="#" class="btn btn-sm btn-success" style="background-color:#44bd32" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$row['id']?>">More info</a>
                </td>
                <td style="width:30px;">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModaledit<?=$row['id']?>" title="Edit this vacancy">
                    <i class="fas fa-edit" style="font-size:22px;color:green;"></i>
                  </a>
                  <br><br><br>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModaldel<?=$row['id']?>" title="Delete this vacancy">
                    <i class="fas fa-times" style="font-size:25px;color:red;"></i>
                  </a>
                </td>
              </tr>
            </table>

            <!-- Modal more info-->
            <div class="modal fade" id="exampleModal<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6 class="modal-title"><b><i class="fas fa-info-circle"></i>More info</b></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <strong style="font-size:16px; color:green;">Experience</strong> <i class="fas fa-angle-right" style="color:green;"></i> <?=$row['locate']?>
                    <br><p></p>
                    <strong style="font-size:16px; color:green;">Deadline</strong> <i class="fas fa-angle-right" style="color:green;"></i> <?=$row['dline']?>
                    <br><p></p>
                    <p style="font-size:16px; text-align:justify; color:green;">
                      <b><u>Requirement</u></b>
                      <br>
                      <?=$row['req']?>
                    </p>

                  </div>
                </div>
              </div>
            </div>
            <!------------------------------------------->

            <!-- Modal edit-->
            <div class="modal fade" id="exampleModaledit<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6 class="modal-title"><b><i class="fas fa-edit"></i>Edit Vacancy</b></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <form method="post" action="<?=base_url()?>index.php/welcome/jobedit" class="row g-3 needs-validation" novalidate style="padding:10px;border:1px solid green;border-radius: 5px;">
                      <p style="color:#CC3333;font-size: 14px;"><i><b><u>Instruction:</u></b> Please enter new information to the field or fields you want to change and leave the rest as it is. Thanks</i></p>

                      <input type="hidden" name="idnum" value="<?php echo $row['id'];?>">

                      <div class="col-md-12">
                        <label for="validationCustom01" class="form-label" style="color:green;">Position</label>
                        <input type="text" name="title" value="<?=$row['title']?>" class="form-control form-control-lg" id="validationCustom01" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label for="validationCustom02" class="form-label" style="color:green;">Job Location</label>
                        <input type="text" name="locate" value="<?=$row['locate']?>" class="form-control form-control-lg" id="validationCustom02" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label for="validationCustom02" class="form-label" style="color:green;">Years of experience </label>
                        <input type="text" value="<?=$row['exp']?>" name="experience" class="form-control form-control-lg" id="validationCustom02" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label for="validationCustom02" class="form-label" style="color:green;">Job Deadline</label>
                        <input type="text" name="deadline" value="<?=$row['dline']?>" class="form-control form-control-lg" id="validationCustom02" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label for="validationCustom02" class="form-label" style="color:green;">Job Requiremnt/Certifications</label>
                        <textarea name="req" class="form-control form-control-lg" id="validationCustom02" required><?=$row['req']?></textarea>
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
            </div>
            <!------------------------------------------->

            <!-- Modal delete-->
            <div class="modal fade" id="exampleModaldel<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <center>
                      <form method="post" action="<?=base_url()?>index.php/welcome/jobdel">
                        <h5>Are you sure you want to delete?</h5>
                        <br>
                        <input type="hidden" name="idnum" value="<?php echo $row['id'];?>">
                        <button class="btn btn-lg btn-success">Yes</button>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" data-bs-dismiss="modal" aria-label="Close" class="btn btn-lg btn-danger">No</a>
                      </form>
                    </center>
                  </div>
                </div>
              </div>
            </div>
            <!------------------------------------------->


            <?php
                }
              }else{
                echo'<h4 style="color:red">';
                  echo'<i class="fas fa-angle-right"></i> No vacancies';
                echo'</h4>';
              }
            ?>

        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>

  </div>

      <?php 
          if(isset($_GET['good'])){
            echo'<script>swal("Successful", "Edited Successfully !", "success");</script>';
          }

          if(isset($_GET['goodrem'])){
            echo'<script>swal("Successful", "Deleted Successfully !", "success");</script>';
          }

          if(isset($_GET['wrong'])){
            echo'<script>swal("Failed", "Something went wrong !", "error");</script>';
          }
      ?> 

  <br><br>

<!--
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
-->

    
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