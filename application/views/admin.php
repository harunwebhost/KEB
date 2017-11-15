  <?php require_once('template_part/header.php');?>  

    <div class="single_content">
        <div class="container">
          <div class="row">
            
            <div class="col-xs-12 col-sm-8 col-md-8 custom_right">
            <div class="tab_menu">
                  <ul>
                   <?php 
                    $get=$this->input->get();
                    if(isset($get['selected'])){
                    $selected=$get['selected']; 
                    ?>
                    <li><a href="<?php echo base_url();?>index.php/admin/admin/create?edit_id=<?php echo $selected;?>">Edit</a></li>
                    <li><a href="">Delete</a></li>
                    <?php } ?>
                  </ul>
                </div><!--end tab_menu-->
                


              <div class="single_content_left padding-border-right-twenty">
                <div class="tab_menu">
                  <ul>
                    <li class="active"><a href="single-course-right-sidebar.html#explore_program" data-toggle="tab">Explore This Program</a></li>
                    <li><a href="single-course-right-sidebar.html#what_learn" data-toggle="tab">What you’llearn </a></li>
                    <li><a href="single-course-right-sidebar.html#cost" data-toggle="tab">What it costs</a></li>
                    <li><a href="single-course-right-sidebar.html#admission_requirements" data-toggle="tab">Admission Requirements</a></li>
                  </ul>
                </div><!--end tab_menu-->
                <div class="tab-content single_tab_content">
                  <div role="tabpanel" class="tab-pane active" id="explore_program">
                    <h1>What Covered In <?php echo $selected_course[0]['course_title']?> </h1>
                    <p><?php echo $selected_course[0]['course_description'] ?></p>
                    <h1>Benifits from the Course</h1>
                    <!-- Print Benifit From the course -->
                    <div class="content_left features">
                    <ul>
                    <?php foreach ($benifits as  $benifit) {?>
                     <li><i class="fa fa-check-circle-o"></i><?php echo $benifit['benifit_title'] ?></li>
                      <p><?php echo $benifit['description'] ?></p>
                    <?php } ?>
                    </ul>
                  </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12">
                        <h1>Topics</h1>
                    <div class="content_left features">
                    <ul>
                    <?php foreach ($topic as  $singletopic) {?>
                     <li><i class="fa fa-check-circle-o"></i><?php echo $singletopic['course_topic_title'] ?></li>
                      <p><?php echo $singletopic['course_topic_description'] ?></p>
                    <?php } ?>
                    </ul>
                  

                        </div>
                      </div>
                     
                    </div><!--end row-->
                  
                  </div><!--end tab-pane-->
                  <div role="tabpanel" class="tab-pane" id="what_learn">
                    <h1>What you will learn In this Course</h1>
                    <ul class="content_left features">
                    <?php foreach ($topic as $value) {?>
                      <li><i class="fa fa-check-circle-o"></i> <strong><?php echo $value['course_topic_title'] ?></strong></li>
                        <p><?php echo $value['course_topic_description'] ?></p>
                    <?php } ?>
                    </ul>
                  </div><!--end tab-pane-->
                  <div role="tabpanel" class="tab-pane" id="cost">
                    <h1>Total Cost And Duration</h1>
                    <div class="item_inner program">
                    <ul>
                      <li><span>Course Code:</span>010117</li>
                      <li><span>Couse Name:</span><?php echo $selected_course[0]['course_title']?></li>
                      <li><span>Length of Study:</span><?php echo $selected_course[0]['course_duration']?></li>
                      <li><span>Theory:</span><?php echo $selected_course[0]['theroy']?> Min</li>
                      <li><span>Practical :</span><?php echo $selected_course[0]['practicle']?> Min</li>
                      <li><span>Fees :</span>Rs :- <?php echo $selected_course[0]['Fees']?> </li>
                      <li><span>Contact More Info :</span>+91 7411033926</li>
                      <li><span>Email:</span>ajaz@fastech.com</li>
                    </ul>
                  </div>
                  </div><!--end tab-pane-->
                  <div role="tabpanel" class="tab-pane" id="admission_requirements">
                    <h1>Admission & Eligibility</h1>
                    <p>No Admin Eligibility</p>
                  </div><!--end tab-pane-->
                </div><!--end tab-content-->
              </div><!--end single content left-->
            </div><!--end custom_right-->

            <div class="col-xs-12 col-sm-4 col-md-4 custom_left">
              <div class="sidebar">
                <div class="sidebar_item">
                  <div class="item_inner program">
                    <h4>Program At a Glance</h4>
                    <ul>
                      <li><span>Course Code:</span>010117</li>
                      <li><span>Couse Name:</span><?php echo $selected_course[0]['course_title']?></li>
                      <li><span>Length of Study:</span><?php echo $selected_course[0]['course_duration']?></li>
                      <li><span>Theory:</span><?php echo $selected_course[0]['theroy'];?>Min </li>
                      <li><span>Practical :</span><?php echo $selected_course[0]['practicle']?> Min</li>
                      <li><span>Fees :</span>Rs :- <?php echo $selected_course[0]['Fees']?> </li>
                      <li><span>Contact More Info :</span>+91 7411033926</li>
                      <li><span>Email:</span>ajaz@fastech.com</li>
                    </ul>
                  </div>
                </div><!--end sidebar item-->
          
                <div class="sidebar_item">
                  <div class="item_inner slider">
                    <h4>What Students Say</h4>
                    <div id="single_banner">
                      <ul class="slides">
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                          <div class="carousal_bottom">
                            <div class="thumb">
                              <img src="http://themes.iamabdus.com/royal/1.3/img/courses/testi_thumb.png" draggable="false" alt="" />
                            </div>
                            <div class="thumb_title">
                              <span class="author_name">Jeremy Asigner</span>
                              <span class="author_designation">Web Developer<a href="single-course-right-sidebar.html#"> Here</a></span>
                            </div>
                          </div>
                        </li>
                       
                      </ul>
                    </div><!--end banner-->
                  </div><!--slider-->
                </div><!--end sidebar item-->

              

              </div><!--end sidebar-->
            </div>

          </div><!--end row-->
        </div><!--end container-->
      </div><!--end single content-->

  <?php require_once('template_part/footer.php');?>


      

      

