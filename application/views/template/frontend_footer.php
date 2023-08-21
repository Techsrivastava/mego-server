
    <div class="enquiry_section col_100 left"><!-- enquiry_section -->
      <div class="container"><!-- container -->
        <div class="row"><!-- row -->
          <div class="col-sm-4  col-lg-4  col-xs-12"><!-- column -->
            <h2>For any Help/Enquiry:</h2>
          </div>
          <!-- column -->
          <div class="col-sm-4  col-lg-4  col-xs-12"><!-- column -->
           
           
              <h2><img src="<?php echo base_url() ?>frontend_assets/images/envelope.png" class="img-responsive  pull-left" style="margin: 0 auto;">&nbsp;contact@mfinindia.org</h2>
          
          </div>
          <!-- column -->
          <div class="col-sm-4  col-lg-4  col-xs-12"><!-- column -->
            <h2><img src="<?php echo base_url() ?>frontend_assets/images/call_ic.png" class="img-responsive  pull-left">&nbsp;+91- 124 – 4576800 </h2>
          </div>
          <!-- column --> 
        </div>
        <!-- row --> 
      </div>
      <!-- container --> 
    </div>
    <!-- enquiry_section -->
    
    <div class="footer  col_100  left  com_pd"><!-- footer -->
      <div class="container"><!-- container -->
        <div class="row"><!-- row -->
          <ul class="footer_list">
            <li class=" col-md-4  col-lg-4  col-xs-12 col-sm-4 footer_list-item">
              <div class="list_details  col_100  left"><!-- list_details -->
                <h5>About Us</h5>
                <ul class="footer-list-style2">
                  <li><a href="#">About MFIN</a></li>
                  <li><a href="#">Governing Board</a></li>
                </ul>
              </div>
              <!-- list_details -->
              <div class="list_details  col_100  left"><!-- list_details -->
                <h5>News &amp; Events</h5>
                <ul class="footer-list-style2">
                  <li><a href="#">Press Releases and Coverage</a></li>
                  <li><a href="#">High Impact Coverage</a></li>
                  <li><a href="#">Opinions that Count</a></li>
                  <li><a href="#">Events</a></li>
                </ul>
              </div>
              <!-- list_details -->
              <div class="list_details  col_100  left"><!-- list_details -->
                <p style="margin: 0px;">MFIN Toll Free Helpline :</p>
                <h5 class="footer-single-style"><a href="callto:18001021080">18001021080</a></h5>
                <p style="margin-bottom: 0px;">(for the customers of MFIN member)</p>
              </div>
              <!-- list_details -->
              <div class="list_details  col_100  left"><!-- list_details -->
                <h5>Follow Us</h5>
                <ul class="social_linke_footer  pull-right">
                  <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#0"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#0"><i class="fa fa-youtube"></i></a></li>
                </ul>
              </div>
              <!-- list_details --> 
            </li>
            <li class=" col-md-4  col-lg-4  col-xs-12 col-sm-4 footer_list-item">
              <div class="list_details  col_100  left"><!-- list_details -->
                <h5>Microfinance</h5>
                <a href="#">Industry Overview</a> </div>
              <div class="list_details  col_100  left"><!-- list_details -->
                <h5>Our Work</h5>
                <ul class="footer-list-style2">
                  <li><a href="#">Strengthening the Ecosystem</a></li>
                  <li><a href="#">Support to the Members</a></li>
                  <li><a href="#">Client Protection</a></li>
                </ul>
              </div>
              <div class="list_details  col_100  left"><!-- list_details -->
                <h5>Members</h5>
                <ul class="footer-list-style2">
                  <li><a href="#">Members Profile</a></li>
                  <li><a href="#">Our Members</a></li>
                  <li><a href="#">Membership Advantages</a></li>
                  <li><a href="#">Process and Fees</a></li>
                </ul>
              </div>
            </li>
            <li class=" col-md-4  col-lg-4  col-xs-12 col-sm-4 footer_list-item">
              <div class="list_details  col_100  left"><!-- list_details -->
                <h5>Associates</h5>
                <ul class="footer-list-style2">
                  <li><a href="#">Associates Profile</a></li>
                  <li><a href="#">Our Associates</a></li>
                  <li><a href="#">Membership Advantages</a></li>
                  <li><a href="#">Process and Fees</a></li>
                </ul>
              </div>
              <div class="list_details  col_100  left"><!-- list_details -->
                <ul class="footer-list-style2">
                  <h5>Resource Centre</h5>
                  <li><a href="#">Regulatory Information</a></li>
                  <li><a href="#">MFIN Information Hub</a></li>
                  <li><a href="#">MFI Case Studies</a></li>
                  <li><a href="#">MFIN Videos</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <!-- row --> 
      </div>
      <!-- container --> 
    </div>

<script type="text/javascript" src="<?php echo base_url() ?>frontend_assets/js/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>frontend_assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>frontend_assets/js/jquery.fancybox.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>frontend_assets/js/owl.carousel.min.js"></script> 
<script type="text/javascript">
					var owl = $('#main_slider');
				owl.owlCarousel({
				    items:1,
				    loop:true,
				    margin:0,
				    dots:true,
				    autoplay:true,
				    smartSpeed:500,
				    // animateOut: 'fadeOut',
				    autoplayTimeout:60000
				});
				</script> 
<script type="text/javascript">
							$(document).ready(function() {
							  $('.menu_btn').on('click', function(e) {
								 
								 e.stopPropagation();
							    $('.content').addClass('isOpen');
								  $('body').css("overflow","hidden");
								  

							  } );
								
								$('.content').on('click', function() {
								 
							    if($('.content').hasClass('isOpen')){
									$('.content').removeClass('isOpen');
									$('body').css("overflow","auto");
								}

							  }	)
							
								
						     $(".nav li a").hover(function() {
						      $(this).addClass("active");
						      }, function(){
						        $(this).removeClass('active');
						    });
						});
							
							$('[data-fancybox]').fancybox({
    youtube : {
        controls : 0,
        showinfo : 0
    },
    vimeo : {
        color : 'f00'
    }
							})
								
						</script> 
<!--<script type="text/javascript">
							$(document).ready(function() {
							  $('.menu_btn').on('click', function() {
							    $('.content').toggleClass('isOpen');

							    if ($(".content").hasClass('isOpen')){
							  	  $('.content').width(100% - 250);
							  }
							  });
						</script>--> 
<!-- <script type="text/javascript">
							$(document).ready(function(){
								$('.left_search').click(function(){
									$(".content").removeClass('isOpen');
								})
							})
						</script> --> 
<!-- 						<script type="text/javascript">
							$(function(){
							    $('isOpen::before').click(function() {
							        alert("Yes");
							    }); 
							});
						</script> --> 
<script type="text/javascript">
							// $(document).ready(function() {
							// 	    $('.menu_btn').click(function() {
							// 	        if ($('.content').hasClass("custom_op")) {
							// 	            $('.content').addClass('isOpen');
							// 	            // $('#homeSecLink').removeClass('active');
							// 	        } else {
							// 	            $('.content.isOpen::before').removeClass('isOpen');
							// 	            $('.content').addClass('custom_op');
							// 	        }
							// 	    });
							// 	});
						</script> 
<script type="text/javascript">
							$.sidebarMenu = function(menu) {
						  var animationSpeed = 300;
						  
						  $(menu).on('click', 'li a', function(e) {
						    var $this = $(this);
						    var checkElement = $this.next();

						    if (checkElement.is('.treeview-menu') && checkElement.is(':visible')) {
						      checkElement.slideUp(animationSpeed, function() {
						        checkElement.removeClass('menu-open');
						      });
						      checkElement.parent("li").removeClass("active");
						    }

						    //If the menu is not visible
						    else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
						      //Get the parent menu
						      var parent = $this.parents('ul').first();
						      //Close all open menus within the parent
						      var ul = parent.find('ul:visible').slideUp(animationSpeed);
						      //Remove the menu-open class from the parent
						      ul.removeClass('menu-open');
						      //Get the parent li
						      var parent_li = $this.parent("li");

						      //Open the target menu and add the menu-open class
						      checkElement.slideDown(animationSpeed, function() {
						        //Add the class active to the parent li
						        checkElement.addClass('menu-open');
						        parent.find('li.active').removeClass('active');
						        parent_li.addClass('active');
						      });
						    }
						    //if this isn't a link, prevent the page from being redirected
						    if (checkElement.is('.treeview-menu')) {
						      e.preventDefault();
						    }
						  });
						}

						$.sidebarMenu($('.sidebar-menu'))
						</script> 
<script type="text/javascript">
							var owl = $('#events_stories,#events_stories1');
							owl.owlCarousel({
							    items:1,
							    loop:true,
							    margin:0,
							    dots:true,
							    autoplay:false,
							    // animateOut: 'fadeOut',
							    autoplayTimeout:3000
							});
						</script> 
<script type="text/javascript">
							var owl = $('#client_success');
							owl.owlCarousel({
							    items:3,
							    loop:true,
							    margin:10,
							    dots:true,
							    autoplay:false,
							    // animateOut: 'fadeOut',
							    autoplayTimeout:3000,
							        responsiveClass:true

							 							});
						</script> 
<script type="text/javascript">
							$('#video_box').owlCarousel({
							    items: 1,
							    loop: true,
							    video: true,
							    lazyLoad: true
							}); 
						</script> 
<!-- <script type="text/javascript">
							$('.content.isOpen::before').click(function(){
								$('.content').removeClass('content.isOpen');
							})
						</script> -->
						<script type="text/javascript">
							$('#photo_features').owlCarousel({
							    loop:true,
							    margin:20,
							    dots:true,
							    autoplay:false,
							    nav:true,
							    navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
							    // animateOut: 'fadeOut',
							    autoplayTimeout:3000,
							     responsiveClass:true,
							    responsive:{
							        0:{
							            items:1,
							            nav:true,
							            dots:false,
							        },
							        600:{
							            items:2,
							            nav:true,
							        },
							        1000:{
							            items:3,
							            nav:true,
							            loop:false
							        }
							    }
							}); 
						</script> 
						<script type="text/javascript">
							$('#marquee_slider').owlCarousel({
							    loop:true,
							    margin:0,
							    dots:true,
							    autoplay:true,
							    nav:true,
							    navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
							    // animateOut: 'fadeOut',
							    autoplayTimeout:5000,
							     responsiveClass:true,
							    responsive:{
							        0:{
							            items:1,
							            nav:false,
							            dots:false,
							        },
							        600:{
							            items:2,
							            nav:true,
							        },
							        1000:{
							            items:5,
							            nav:true,
							            loop:false
							        }
							    }
							}); 
						</script> 
						<script type="text/javascript">
							$('#what_they_say').owlCarousel({
							    loop:true,
							    margin:0,
							    dots:true,
							    autoplay:true,
							    nav:true,
							    navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
							    // animateOut: 'fadeOut',
							    autoplayTimeout:3000,
							     responsiveClass:true,
							    responsive:{
							        0:{
							            items:1,
							            nav:false,
							            dots:false,
							        },
							        600:{
							            items:2,
							            nav:true,
							        },
							        1000:{
							            items:1,
							            nav:true,
							            margin:0,
							            dots:false
							        }
							    }
							}); 
						</script> 
						<script type="text/javascript">
							$(document).ready(function() {

  $(".toggle-accordion").on("click", function() {
    var accordionId = $(this).attr("accordion-id"),
      numPanelOpen = $(accordionId + ' .collapse.in').length;
    
    $(this).toggleClass("active");

    if (numPanelOpen == 0) {
      openAllPanels(accordionId);
    } else {
      closeAllPanels(accordionId);
    }
  })

  openAllPanels = function(aId) {
    console.log("setAllPanelOpen");
    $(aId + ' .panel-collapse:not(".in")').collapse('show');
  }
  closeAllPanels = function(aId) {
    console.log("setAllPanelclose");
    $(aId + ' .panel-collapse.in').collapse('hide');
  }
     
});
						</script>
						<script type="text/javascript">
							$('#mfin_reach').owlCarousel({
						    loop:true,
						    margin:10,
						    nav:true,
						    responsive:{
						        0:{
						            items:1
						        },
						        600:{
						            items:3
						        },
						        1000:{
						            items:1
						        }
						    }
						})
						</script>
</body>
</html>