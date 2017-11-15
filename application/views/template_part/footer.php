<?php 
  $cont=count($header_menus);
  $start=$cont/2;
  //$end=$start;
  /*
  echo "<pre>".$header_menus[0]['main_course_id'];
  print_r($header_menus);*/
  //array_slice($header_menus, offset)
?>
<footer class="footer-v1">
  <div class="menuFooter clearfix">
    <div class="container">
      <div class="row clearfix">

        <div class="col-sm-3 col-xs-6">
          <h5>Main Course</h5>
          <ul class="menuLink">
            <?php 
            $i=0;
           for ($i=0;$i<=$start;$i++) {
            ?>
            <li><a href="<?php echo $mian_course_url.$header_menus[$i]['main_course_id']; ?>">
            <?php echo $header_menus[$i]['main_course_title']; ?> </a></li>
            <?php } $i++;?>
            </ul>
        </div><!-- col-sm-3 col-xs-6 -->

        <div class="col-sm-3 col-xs-6 borderLeft">
          <h5>Main Course:</h5>
          <ul class="menuLink">
            <?php 
           for ($i=$start+1;$i<=$cont;$i++) {
            ?>
            <li><a href="<?php echo $mian_course_url.$header_menus[$i]['main_course_id']; ?>">
            <?php echo $header_menus[$i]['main_course_title']; ?> </a></li>
            <?php } $i++;?>
            
          </ul>
        </div><!-- col-sm-3 col-xs-6 -->

        <div class="col-sm-3 col-xs-6 borderLeft">
          <div class="footer-address">
            <h5>Location:</h5>
            <address>FastechComputers<br>
              Near to LET Collage <br>
              Gokak.
            </address>
            <a href="contact-us.html"><span class="place"><i class="fa fa-map-marker"></i>Main Campus</span></a>
          </div>
        </div><!-- col-sm-3 col-xs-6 -->

        <div class="col-sm-3 col-xs-6 borderLeft">
          <div class="socialArea">
            <h5>Find us on:</h5>
            <ul class="list-inline ">
            <li><a href="index.html#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="index.html#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="index.html#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="index.html#"><i class="fa fa-pinterest-p"></i></a></li>
            <li><a href="index.html#"><i class="fa fa-flickr"></i></a></li>
            <li><a href="index.html#"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
          </div><!-- social -->
          <div class="contactNo">
            <h5>Call us on:</h5>
            <h3><a href="tel:+917411033926">+91 7411033926</h3>
          </div><!-- contactNo -->
        </div><!-- col-sm-3 col-xs-6 -->

      </div><!-- row -->
    </div><!-- container -->
  </div><!-- menuFooter -->

  <div class="footer clearfix">
    <div class="container">
      <div class="row clearfix">
        <div class="col-sm-6 col-xs-12 copyRight">
          <p>© 2016 Copyright FastechComputers</p>
        </div><!-- col-sm-6 col-xs-12 -->
        <div class="col-sm-6 col-xs-12 privacy_policy">
          <a href="contact-us.html">Contact us</a>
          <a href="privacy-policy.html">Privacy Policy</a>
        </div><!-- col-sm-6 col-xs-12 -->
      </div><!-- row clearfix -->
    </div><!-- container -->
  </div><!-- footer -->
</footer>

</div>
<style type="text/css">
  .mce-notification-inner {display: none;}
</style>
<!-- JQUERY SCRIPTS -->
<script src="<?php echo $link;?>"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?>"></script>

<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.flexslider.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.themepunch.tools.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.themepunch.revolution.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/pop-up/jquery.magnific-popup.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/animation/waypoints.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/count-up/jquery.counterup.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/animation/wow.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/animation/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/fullcalendar.min.js');?>"></script>
 <script src="<?php echo base_url('assets/plugins/owl-carousel/owl.carousel.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/timer/jquery.syotimer.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/smoothscroll/SmoothScroll.js');?>"></script>
<script src="<?php echo base_url('assets/js/custom.js');?>"></script>
<script src="<?php echo base_url('assets/js/validation.js');?>"></script>
<script>

  $.validate({
    lang: 'en'
  });
</script>
</body>
</html>

