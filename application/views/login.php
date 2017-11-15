  <?php require_once('template_part/login_header.php');?>  

    <div class="single_content">
        <div class="container">
          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
            <form method="post" action="<?php echo base_url() ?>index.php/takein/index">
              <div class="list_block">
              <div class="formArea admission">
                <div class="formTitle">
                <h3>Login</h3>
                <p>Enter your User Name & password</p>
                </div><!-- formTitle -->
                <form action="#" method="post">
                <div class="row">
                <div class="form-group col-sm-6 col-sm-offset-3">
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Eamil" value="<?php echo set_value('email');?>">
                </div>
                </div>
                <div class="row">
                <div class="form-group col-sm-6 col-sm-offset-4">
                  <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password" value="<?php echo set_value('');?>">
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6 red">
                    <?php 
                    $session_out=$this->session->userdata('error');
                    if(isset($error) || isset($session_out)){
                      print_r($error);
                      unset($error);
                      echo $session_out;
                      $this->session->unset_userdata('error');
                      } ?>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                <button type="submit" class="btn btn-default btn-block commonBtn ">Login</button>
                </div>
                </div>
                </form>
              </div><!-- formArea -->
            </div>
                </form>
            </div><!--end custom_right-->

            

          </div><!--end row-->
        </div><!--end container-->
      </div><!--end single content-->

  <?php require_once('template_part/footer.php');?>


      <style type="text/css">
        .custom_right input[type="radio"]{
          display: block!important;
        }
        .red{
          color: red;
        }
      </style>

