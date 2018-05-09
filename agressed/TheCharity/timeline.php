<?php include "Initialize.php";?>
<!DOCTYPE html>
<html lang="en">
   <?php give_head();?>
    <body>
        <div id="page">
            <!-- Top Bar -->
            <?php //give_topbar();?>
            <!-- Top Bar -->
            <?//php give_header();?>
            <!-- Sticky Navbar -->
            <div class="page-header page-title-center tb-pad-60">
                <div class="image-bg content-in fixed contain" data-background="img/sections/gallery/gallery-1.jpg">
                    <div class="overlay-white"></div>
                </div>
                <div class="container">
                    <div class="col-md-12">
                        <h1 class="title">Makenna Turner</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="timeline.php">Profile</a>
                            </li>
                            <li class="active">Makenna Turner</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- page-header -->
            <section id="about-us" class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <!-- Video -->
                            <div class="video-bg">
<img src="port.jpg"></div>
                        </div>
                        <div class="col-md-6">
                            <!-- Title -->
                            <div class="section-title text-center">
                                <!-- Heading -->
                                <h2 class="title">Boulder, CO.</h2>
                            </div>
                            <!-- Content -->
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                           <!-- <a class="btn btn-default white top-margin-15" href="#">LEARN MORE</a>-->
                        </div>
                    </div>
                </div>
            </section>
            <?//php make_faq();?>
            <!-- Features -->
            <section id="services" class="page-section">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="timeliner">
                                
                                <?php 
                                make_timelineright("LYNX","University of Colorado Denver<br> National Arts & Media Camp","mountainnoborder.png");
                                make_timelineleft("MIT Launch ","Massachusetts Institute of Technology <br> Entreprenuerial Program","rocket.png");
                                make_timelineright("HOBY","University of Denver <br> Leadship Camp","theatoranew.png")
                                
                                
                                ?>
                              
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- services -->
            
            <!-- Fun-factor -->
        
            <!-- team -->
           
            <!-- clients -->
     <?php //give_feet();?>
            <!-- footer -->
        </div>
        <!-- page -->
        <!-- Scripts -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- Menu jQuery plugin -->
        <script type="text/javascript" src="js/hover-dropdown-menu.js"></script>
        <!-- Menu jQuery Bootstrap Addon -->
        <script type="text/javascript" src="js/jquery.hover-dropdown-menu-addon.js"></script>
        <!-- Scroll Top Menu -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <!-- Sticky Menu -->
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <!-- Bootstrap Validation -->
        <script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
        <!-- PieChart -->
        <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
        <!-- Animations -->
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <!-- Owl Carousel Slider -->
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <!-- Parallax BG -->
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <!-- Custom Js Code -->
        <script type="text/javascript" src="js/custom.js"></script>
        <!-- Scripts -->
    </body>
</html>