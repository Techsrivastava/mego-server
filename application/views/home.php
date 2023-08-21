<div class="main_slider  col_100  left"><!-- maiin_slider -->
      <div id="main_slider" class="owl-carousel owl-theme">
        <?php
        foreach($banners as $row)
        {

        ?>
        <div class="item">
          <div class="banner_content"><!-- banner_content -->
            <div class="container"><!-- container -->
              <div class="row"><!-- row -->
                <div class="col-md-6  col-lg-6"><!-- column -->
                  <h4><?php echo $row->TITLE; ?></h4>
                  <p><?php echo $row->DESCRIPTION; ?></p>
                  <div class="wht_view_more  col_100  left"><!-- wht_view_more --> 
                    <a href="#0" class="view-more">Read More</a> </div>
                </div>
                <!-- column --> 
              </div>
              <!-- row --> 
            </div>
            <!-- container --> 
          </div>
          <!-- banner_content --> 
          <img src="<?php echo base_url(); ?>assets/upload_image/banner/<?php echo $row->IMAGE; ?>" class="img-responsive"> </div>
          <?php
          }
          ?>
      </div>
    </div>
    <!-- main_slider -->
    <div class="about_section  col_100  left"><!-- about_section -->
      <div class="container"><!-- container -->
        <div class="row"><!-- row -->
          <div class="heading  col_100  left  text-center"><!-- heading -->
            <h1 class="title">What MFIN Does</h1>
            <p class="tag_heading"><?php echo $whatmfindoes->content; ?></p>
          </div>
          <!-- heading -->
          <div class="read_more  col_100  left  text-center"><!-- read_more --> 
            <a href="#0" class="read_more_btn">Read More<i class="fa fa-arrow-right"></i></a> </div>
          <!-- read_more -->
          <p class="tag_heading text-center">MFIN’s primary objective is to work towards the robust development of the microfinance sector, by promoting:</p>
          <ul class="about_list  col_100 left">
            <li class="col-md-4  col-lg-4  col-xs-12  col-sm-4  "><!-- column -->
              <div class="about-box  col_100 left text-center"><!-- about_box -->
                <div class="about_ic"><!-- about_ic --> 
                  <img src="<?php echo base_url() ?>frontend_assets/images/money_hand.png" class="img-responsive" style="margin: 0 auto;"> </div>
                <!-- about_ic -->
                <h3>Strengthening the Ecosystem</h3>
                <p class="tag_heading"><?php echo $strengtheningecosystem->content; ?></p>
                <a href="#0" class="view-more">Read More</a> </div>
              <!-- about_box --> 
            </li>
            <!-- column -->
            <li class="col-md-4  col-lg-4  col-xs-12  col-sm-4  "><!-- column -->
              <div class="about-box  col_100 left text-center"><!-- about_box --> 
                <img src="<?php echo base_url() ?>frontend_assets/images/shake_hands.png" class="img-responsive" style="margin: 0 auto;">
                <h3>Support to the Members</h3>
                <p class="tag_heading"><?php echo $supporttomembers->content; ?></p>
                <a href="#0" class="view-more">Read More</a> </div>
              <!-- about_box --> 
            </li>
            <!-- column -->
            <li class="col-md-4  col-lg-4  col-xs-12  col-sm-4  "><!-- column -->
              <div class="about-box  col_100 left text-center"><!-- about_box --> 
                <img src="<?php echo base_url() ?>frontend_assets/images/sheild.png" class="img-responsive" style="margin: 0 auto;">
                <h3>Client Protection</h3>
                <p class="tag_heading"><?php echo $clientProtection->content; ?></p>
                <a href="#0" class="view-more">Read More</a> </div>
              <!-- about_box --> 
            </li>
            <!-- column -->
          </ul>
        </div>
        <!-- row --> 
      </div>
      <!-- container --> 
    </div>
    <!-- about_section -->
    <div class="events_stories  col_100  left"><!-- events_stories -->
      <div class="container"><!-- container -->
        <div class="row"><!-- row -->
          <div class="col-md-5  col-lg-5  col-xs-12  col-sm-12 col-md-offset-1"><!-- column -->
            <div class="wht_heading  col_100  left  text-center"><!-- wht_heading -->
              <h3 class="tk-forma-djr-micro">Events</h3>
            </div>
            <!-- wht_heading -->
            <div class="events_stories_container  col_100 left"><!--  events_stories_container-->
              <div id="events_stories" class="owl-carousel owl-theme">
                <?php
                foreach ($events as $eventrow)
                {
                 
                ?>

                <div class="item"><!-- item -->
                  <div class="enents_fluid  col_100  left"><!-- events_fluid --> 
                    <img src="<?php echo base_url() ?>assets/upload_image/event/<?php echo $eventrow->image; ?>" class="img-responsive">
                    <div class="events_content  col_100  left  text-center"><!-- events_content -->
                      <p class="para text-center"><?php echo $eventrow->content; ?></p>
                      <?php
                        $rkdate=date("M", strtotime($eventrow->created_at));  
                        echo $rkdate; 
                      ?> </div>
                    <!-- events_content --> 
                  </div>
                  <!-- events_fluids --> 
                </div>

                <?php
                }

                ?>
               
              </div>
              <div class="wht_view_more  col_100  left"><!-- wht_view_more --> 
                <a href="#0" class="view-more">View more <i class="fa fa-arrow-right"></i></a> </div>
              <!-- wht_view_more --> 
            </div>
            <!-- events_stories_container --> 



          </div>
          <!-- column -->
          <div class="col-md-5  col-lg-5  col-xs-12  col-sm-12"><!-- column -->
            <div class="wht_heading  col_100  left  text-center"><!-- wht_heading -->
              <h3 class="tk-forma-djr-micro">Success Stories</h3>
            </div>
            <!-- wht_heading -->
            <div class="events_stories_container  col_100 left"><!--  events_stories_container-->
              <div id="events_stories1" class="owl-carousel owl-theme">
                <?php
                foreach ($successStories as $storiesrow)
                {
                 
                ?>
                <div class="item"><!-- item -->
                  <div class="enents_fluid  col_100  left"><!-- events_fluid --> 
                    <img src="<?php echo base_url() ?>assets/upload_image/stories/<?php echo $storiesrow->image; ?>" class="img-responsive">
                    <div class="events_content  col_100  left  text-center"><!-- events_content -->
                      <p class="para text-center "><?php echo $storiesrow->content; ?></p>
                      <?php
                        $rkdate=date("M", strtotime($storiesrow->created_at));  
                        echo $rkdate; 
                      ?>
                      </div>
                    <!-- events_content --> 
                  </div>
                  <!-- events_fluids --> 
                  
                </div>
                <!-- item -->
                <?php
              }
              ?>
              
              </div>
              <div class="wht_view_more  col_100  left"><!-- wht_view_more --> 
                <a href="#0" class="view-more">View More <i class="fa fa-arrow-right"></i></a> </div>
              <!-- wht_view_more --> 
            </div>
            <!-- events_stories_container --> 
          </div>
          <!-- column --> 
        </div>
        <!-- row --> 
      </div>
      <!-- container --> 
    </div>
    <!-- events_stories -->
    
    <div class="video_section col_100  left"><!-- video_section -->
      <div id="video_box" class="owl-carousel owl-theme">
        <div class="item"> 
          <!-- <img src="<?php echo base_url() ?>frontend_assets/images/video_bg.png" alt="" class="img-responsive" />--> 
          <a class="owl-video-play-icon" data-fancybox  href="https://youtu.be/XTiHKFW0Et8"></a>
          <div class="videos video1">
            <div class="video_content">
              <div class="contianer"><!-- container -->
                <div class="row"><!-- row -->
                  <h4>Customer Awareness on <br>
                    Loan Repayment post Moratorium</h4>
                </div>
                <!-- row --> 
              </div>
              <!-- container --> 
            </div>
          </div>
        </div>
        <div class="item"> 
          <!-- <img src="<?php echo base_url() ?>frontend_assets/images/video_bg.png" alt="" class="img-responsive" />--> 
          <a class="owl-video-play-icon" data-fancybox  href="https://youtu.be/XTiHKFW0Et8"></a>
          <div class="videos video1">
            <div class="video_content">
              <div class="contianer"><!-- container -->
                <div class="row"><!-- row -->
                  <h4>Customer Awareness on <br>
                    Loan Repayment post Moratorium</h4>
                </div>
                <!-- row --> 
              </div>
              <!-- container --> 
            </div>
          </div>
        </div>
        <div class="item"> 
          <!-- <img src="<?php echo base_url() ?>frontend_assets/images/video_bg.png" alt="" class="img-responsive" />--> 
          <a class="owl-video-play-icon" data-fancybox  href="https://youtu.be/XTiHKFW0Et8"></a>
          <div class="videos video1">
            <div class="video_content">
              <div class="contianer"><!-- container -->
                <div class="row"><!-- row -->
                  <h4>Customer Awareness on <br>
                    Loan Repayment post Moratorium</h4>
                </div>
                <!-- row --> 
              </div>
              <!-- container --> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- video_section -->
    
    <div class="clearfix"></div>
    <div class="news_media col_100 left com_pd"><!-- news_media -->
      <div class="container"><!-- container -->
        <div class="row"><!-- row -->
          <div class="col-md-6  col-lg-6  col-xs-12  col-sm-12"><!-- column -->
            <div class="heading  col_100  left  text-left"><!-- heading -->
              <h1 class="title bordr-none">News &amp; Media</h1>
            </div>
            <div class="tabbable-panel">
              <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                  <li class="active"> <a href="#tab_default_1" data-toggle="tab">Press Release</a> </li>
                  <li> <a href="#tab_default_2" data-toggle="tab">MFIN In News</a> </li>
                  <li> <a href="#tab_default_3" data-toggle="tab">Awards</a> </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_default_1">
                    <ul class="news_vertical">
                      <?php
                      foreach ($pressrelease as $pressreleaserow)
                      {
                       
                      ?>
                      <li class="col_100 left"> <a href="#0">
                        <div class="col-md-1 col-lg-1  col-xs-2  col-sm-2 padding_none"><!-- column -->
                          <div class="news_fluid"><!-- news_fluid -->
                            <div class="news_date  col_100  left"><!-- news_date -->
                              <h4>
                                <?php
                        $rkdated=date("d", strtotime($pressreleaserow->created_at));  
                        echo $rkdated; 
                      ?><br>
                                <?php
                        $rkdatem=date("M", strtotime($pressreleaserow->created_at));  
                        echo $rkdatem; 
                      ?></h4>
                            </div>
                            <!-- news_date -->
                            <div class="year  col_100  left  text-center"><!-- year -->
                              <p><?php
                        $rkdatey=date("Y", strtotime($pressreleaserow->created_at));  
                        echo $rkdatey; 
                      ?></p>
                            </div>
                            <!-- year --> 
                          </div>
                          <!-- news_fluid --> 
                        </div>
                        <!-- column -->
                        <div class="col-md-10 col-lg-10  col-xs-8  col-sm-8"><!-- column -->
                          <div class="news  col_100  left"><!-- news -->
                            <h4><?php echo $pressreleaserow->title; ?></h4>
                            <a target="_blank"  href="<?php echo base_url(); ?>assets/upload_image/news/<?php echo $pressreleaserow->file; ?>" class="download">View / Download</a> </div>
                          <!-- news --> 
                        </div>
                        <!-- column --> 
                        </a> 
                      </li>

                      <?php
                      }
                      ?>
                      
                    </ul>
                  </div>
                  <div class="tab-pane" id="tab_default_2">
                    <ul class="news_vertical">
                       <?php
                      foreach ($mfinnews as $mfinnewsrow)
                      {
                       
                      ?>
                      <li class="col_100 left"> <a href="#0">
                        <div class="col-md-1 col-lg-1  col-xs-2  col-sm-2 padding_none"><!-- column -->
                          <div class="news_fluid"><!-- news_fluid -->
                            <div class="news_date  col_100  left"><!-- news_date -->
                              <h4>
                                <?php
                        $rkdated=date("d", strtotime($mfinnewsrow->created_at));  
                        echo $rkdated; 
                      ?><br>
                                <?php
                        $rkdatem=date("M", strtotime($mfinnewsrow->created_at));  
                        echo $rkdatem; 
                      ?></h4>
                            </div>
                            <!-- news_date -->
                            <div class="year  col_100  left  text-center"><!-- year -->
                              <p><?php
                        $rkdatey=date("Y", strtotime($mfinnewsrow->created_at));  
                        echo $rkdatey; 
                      ?></p>
                            </div>
                            <!-- year --> 
                          </div>
                          <!-- news_fluid --> 
                        </div>
                        <!-- column -->
                        <div class="col-md-10 col-lg-10  col-xs-8  col-sm-8"><!-- column -->
                          <div class="news  col_100  left"><!-- news -->
                            <h4><?php echo $mfinnewsrow->title; ?></h4>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/upload_image/news/<?php echo $mfinnewsrow->file; ?>" class="download">View / Download</a> </div>
                          <!-- news --> 
                        </div>
                        <!-- column --> 
                        </a> 
                      </li>

                      <?php
                      }
                      ?>
                    </ul>
                  </div>
                  <div class="tab-pane" id="tab_default_3">
                    <ul class="news_vertical">
                      <?php
                      foreach ($awards as $awardsrow)
                      {
                       
                      ?>
                      <li class="col_100 left"> <a href="#0">
                        <div class="col-md-1 col-lg-1  col-xs-2  col-sm-2 padding_none"><!-- column -->
                          <div class="news_fluid"><!-- news_fluid -->
                            <div class="news_date  col_100  left"><!-- news_date -->
                               <?php
                        $rkdated=date("d", strtotime($awardsrow->created_at));  
                        echo $rkdated; 
                      ?><br>
                                <?php
                        $rkdatem=date("M", strtotime($awardsrow->created_at));  
                        echo $rkdatem; 
                      ?></h4>
                            </div>
                            <!-- news_date -->
                            <div class="year  col_100  left  text-center"><!-- year -->
                              <p><?php
                        $rkdatey=date("Y", strtotime($awardsrow->created_at));  
                        echo $rkdatey; 
                      ?></p>
                            </div>
                            <!-- year --> 
                          </div>
                          <!-- news_fluid --> 
                        </div>
                        <!-- column -->
                        <div class="col-md-10 col-lg-10  col-xs-8  col-sm-8"><!-- column -->
                          <div class="news  col_100  left"><!-- news -->
                            <h4><?php echo $awardsrow->title; ?></h4>
                            <a target="_blank"  href="<?php echo base_url(); ?>assets/upload_image/news/<?php echo $awardsrow->file; ?>" class="download">View / Download</a> </div>
                          <!-- news --> 
                        </div>
                        <!-- column --> 
                        </a> 
                      </li>

                      <?php
                      }
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- tab_panel -->
              <div class="read_more  col_100  left  text-center"><!-- read_more --> 
                <a href="#0" class="read_more_btn">View All<i class="fa fa-arrow-right"></i></a> </div>
            </div>
          </div>
          <!-- column -->
          <div class="col-md-6  col-lg-6  col-xs-12  col-sm-12"><!-- column -->
            <div class="heading  col_100  left  text-left"><!-- heading -->
              <h1 class="title bordr-none">Resource Center</h1>
            </div>
            <a href="#0" class="publication">Latest Publication</a>
            <div class="latest_publication  col_100  left">
              <div class="col-md-4  col-lg-4  col-xs-12  col-sm-12 padding_none  border_right"><!-- column --> 
                <img src="<?php echo base_url() ?>frontend_assets/images/latest_resource.jpg" class="img-responsive"> </div>
              <!-- column -->
              <div class="col-md-8  col-lg-8  col-xs-12  col-sm-12 padding_none"><!-- column -->
                <div class="latest_pub col_100  left"><!-- latest_pub -->
                  <h3>Micrometer Issue 34</h3>
                  <p>This is the 34th issue of the Micrometer and it provides an overview of the microfinance industry as on 30 June 2020(Q1_FY_20-21).</p>
                </div>
                <!-- lates_pub -->
                <div class="synopsis  col_100  left"><!-- synopsis --> 
                  <a href="#0"> <span><img src="<?php echo base_url() ?>frontend_assets/images/download.png" class="pull-left img-responsive"></span> <span>Synopsis</span> </a> </div>
                <!-- synopsis --> 
              </div>
              <!-- column --> 
            </div>
            <!-- latest_publication -->
            <div class="read_more  col_100  left  text-center"><!-- read_more --> 
              <a href="#0" class="read_more_btn">View All<i class="fa fa-arrow-right"></i></a> </div>
            <!-- read_more --> 
          </div>
          <!-- column --> 
        </div>
        <!-- row --> 
      </div>
      <!-- container --> 
    </div>
    <!-- news_media -->
    