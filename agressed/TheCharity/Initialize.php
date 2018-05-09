<?php

$email = "turner.makenna@gmail.com";
$phone = "+1-303-665-4047";
    function give_number(){
        
    }
    function give_head($title = "Makenna Turner"){
        
        $head = "   <head>
        <meta charset='utf-8' />
        <title>$title</title>
        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <meta name='keywords' content='FoundationsLimited' />
        <meta name='description' content='Foundations Limited Site and Personal Account of Makenna Turner' />
        <meta name='author' content='Makenna Turner' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <!-- Favicon -->
        <link rel='shortcut icon' href='img/favicon.ico' />
        <!-- Font -->
        <link href='https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i' rel='stylesheet'>
        <!-- Font Awesome Icons -->
        <link href='css/font-awesome.min.css' rel='stylesheet' type='text/css' />
        <link rel='stylesheet' type='text/css' href='revolution/fonts/font-awesome/css/font-awesome.css'>
        <!-- Bootstrap core CSS -->
        <link href='css/bootstrap.min.css' rel='stylesheet' />
        <link href='css/hover-dropdown-menu.css' rel='stylesheet' />
        <!-- Icomoon Icons -->
        <link href='css/icons.css' rel='stylesheet' />
        <!-- REVOLUTION STYLE SHEETS -->
        <link rel='stylesheet' href='revolution/css/settings.css'>
        <!-- REVOLUTION LAYERS STYLES -->
        <link rel='stylesheet' type='text/css' href='revolution/css/layers.css'>
        <!-- REVOLUTION NAVIGATION STYLES -->
        <link rel='stylesheet' type='text/css' href='revolution/css/navigation.css'>
        <!-- Animations -->
        <link href='css/animate.min.css' rel='stylesheet' />
        <!-- Owl Carousel Slider -->
        <link href='css/owl/owl.carousel.css' rel='stylesheet' />
        <link href='css/owl/owl.theme.css' rel='stylesheet' />
        <link href='css/owl/owl.transitions.css' rel='stylesheet' />
        <!-- PrettyPhoto Popup -->
        <link href='css/prettyPhoto.css' rel='stylesheet' />
        <!-- Custom Style -->
        <link href='css/style.css' rel='stylesheet' />
        <link href='css/responsive.css' rel='stylesheet' />
        <!-- Color Scheme -->
        <link href='css/color.css' rel='stylesheet' />
    </head>";
        echo $head;
    }
    function give_header(){
        global $number;
        $head = "<header id='sticker' class='sticky-navigation'>
                <!-- Sticky Menu -->
                <div class='sticky-menu relative'>
                    <!-- navbar -->
                    <div class='navbar navbar-default navbar-bg-light' role='navigation'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='navbar-header'>
                                        <!-- Button For Responsive toggle -->
                                        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                                            <span class='sr-only'>Toggle navigation</span>
                                            <span class='icon-bar'></span>
                                            <span class='icon-bar'></span>
                                            <span class='icon-bar'></span></button>
                                        <!-- Logo -->
                                        <a class='navbar-brand' href='index.php'>
                                            <img class='site_logo' width='155' height='70' alt='Site Logo' src='img/yeslogo.png' />
                                        </a>
                                    </div>
                                    <!-- Navbar Collapse -->
                                    <div class='navbar-collapse collapse'>
                                        <!-- nav -->
                                        <ul class='nav navbar-nav'>
                                            <!-- Home Menu -->
                                            <li>
                                                <a href='index.php'>Home</a>
                                               
                                            </li>
                                             <li>
                                                <a href='causes.php'>Initiatives</a>  
                                                <ul class='dropdown-menu'>
                                                      <li>
                                                     <a href='events.php'>Events</a>
                                                     
                                                       </li>
                                                       <li><a href='be-a-volunteer.php'>
                                                                    Become a Volunteer</a></li>
                                                       <li><a href='faq.php'>
                                                                    FAQ</a></li>
                                                    </ul>
                                            </li>
                                             <li>
                                                <a href='about-me.php'>Profile</a>
                                            </li>
                                             <li>
                                                <a href='portfolio.php'>Portfolio</a>
                                            </li>
                                            <!-- Home Menu Ends -->
                                            <!-- About us Menu -->
                                            <li>
                                                <a href='timeline.php'>Timeline</a>
                                                
                                            </li>
                                            <!-- About Menu Ends -->
                                            <!-- Causes Menu -->
                                           
                                            <!-- Causes Menu Ends -->
                                         
                                            <!-- Events Menu Ends -->
                                            <!-- Portfolio Menu -->
                                           
                                            <!-- Portfolio Menu Ends -->
                                            <!-- Blog Menu -->
                                            
                                            <!-- Blog Menu Ends -->
                                            <!-- Contact Block -->
                                          
                                            <!-- Ends Widgets Block -->
                                            <!-- Header Donate Button -->
                                            <li class='hidden-767'>
                                                <a href='contact.html'><span class='btn btn-default-inverse'>Contact</span></a>
                                            </li>
                                        </ul>
                                        <!-- Right nav -->
                                        <!-- Header Contact Content -->
                                        <div class='bg-white hide-show-content no-display header-contact-content'>
                                            <p class='vertically-absolute-middle'>Call Us
                                                <strong>$number</strong></p>
                                            <button class='close'>
                                                <i class='fa fa-times'></i>
                                            </button>
                                        </div>
                                        <!-- Header Contact Content -->
                                        <!-- Header Search Content -->
                                        <div class='bg-white hide-show-content no-display header-search-content'>
                                            <form role='search' class='navbar-form vertically-absolute-middle'>
                                                <div class='form-group'>
                                                    <input type='text' placeholder='Enter your text &amp; Search Here' class='form-control' id='s' name='s' value='' />
                                                </div>
                                            </form>
                                            <button class='close'>
                                                <i class='fa fa-times'></i>
                                            </button>
                                        </div>
                                        <!-- Header Search Content -->
                                        <!-- Header Share Content -->
                                        <div class='bg-white hide-show-content no-display header-share-content'>
                                            <div class='vertically-absolute-middle social-icon gray-bg icons-circle i-3x'>
                                                <a href='#'>
                                                    <i class='fa fa-facebook'></i>
                                                </a>
                                                <a href='#'>
                                                    <i class='fa fa-twitter'></i>
                                                </a>
                                                <a href='#'>
                                                    <i class='fa fa-pinterest'></i>
                                                </a>
                                                <a href='#'>
                                                    <i class='fa fa-google'></i>
                                                </a>
                                                <a href='#'>
                                                    <i class='fa fa-linkedin'></i>
                                                </a>
                                            </div>
                                            <button class='close'>
                                                <i class='fa fa-times'></i>
                                            </button>
                                        </div>
                                        <!-- Header Share Content -->
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- navbar -->
                </div>
                <!-- Sticky Menu -->
            </header>";
            echo $head;
    }
    function give_panels(){
        $bub =" <section id='about-us' class='page-section top-pad-0'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div role='tabpanel' class='top-up'>
                                <!-- Nav tabs -->
                                <ul class='nav nav-tabs bg-color' role='tablist'>
                                    <li role='presentation' class='active'>
                                        <a href='#about' aria-controls='about' role='tab' data-toggle='tab'>About Us</a>
                                    </li>
                                    <li role='presentation'>
                                        <a href='#services' aria-controls='services' role='tab' data-toggle='tab'>Our Services</a>
                                    </li>
                                    <li role='presentation'>
                                        <a href='#why' aria-controls='why' role='tab' data-toggle='tab'>Why Choose Us?</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class='tab-content  bottom-margin-0'>
                                    <div role='tabpanel' class='tab-pane active' id='about' data-animation='fadeInRight'>
                                        <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='row'>
                                                    <!--  block -->
                                                    <div class='col-sm-4 col-md-4 bakery-block' data-animation='fadeInLeft'>
                                                        <!-- icon -->
                                                        <i class='icon-slideshare medium fill-icon fa-3x icons-circle border-color'></i>
                                                        <h5>Who we Are?</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
                                                    </div>
                                                    <!--  block -->
                                                    <div class='col-sm-4 col-md-4 bakery-block' data-animation='fadeInUp'>
                                                        <!-- icon -->
                                                        <!-- icon -->
                                                        <i class='icon-water medium fill-icon fa-3x icons-circle border-color'></i>
                                                        <h5>Vision</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
                                                    </div>
                                                    <!--  block -->
                                                    <div class='col-sm-4 col-md-4 bakery-block' data-animation='fadeInRight'>
                                                        <!-- icon -->
                                                        <i class='icon-line-graph medium fill-icon fa-3x icons-circle border-color'></i>
                                                        <h5>Mission</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tab1 -->
                                    <div role='tabpanel' class='tab-pane' id='services' data-animation='fadeInRight'>
                                        <div class='row'>
                                            <div class='container'>
                                                <div class='section-title'>
                                                    <!-- Heading -->
                                                    <h2 class='title'>Our Mission</h2>
                                                </div>
                                                <div class='row text-left'>
                                                    <div class='item-box icons-color col-sm-6 col-md-4'>
                                                        <a href='#'>
                                                            <!-- Icon -->
                                                            <i class='fa fa-lightbulb-o fa-2x'></i>
                                                            <!-- Title -->
                                                            <h5 class='title'>Charity For Education</h5>
                                                            <!-- Text -->
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</div>
                                                        </a>
                                                    </div>
                                                    <div class='item-box icons-color col-sm-6 col-md-4'>
                                                        <a href='#'>
                                                            <!-- Icon -->
                                                            <i class='fa fa-recycle fa-2x'></i>
                                                            <!-- Title -->
                                                            <h5 class='title'>Feed For Hungry Child</h5>
                                                            <!-- Text -->
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</div>
                                                        </a>
                                                    </div>
                                                    <div class='item-box icons-color col-sm-6 col-md-4'>
                                                        <a href='#'>
                                                            <!-- Icon -->
                                                            <i class='fa fa-tint fa-2x'></i>
                                                            <!-- Title -->
                                                            <h5 class='title'>Home For Homeless</h5>
                                                            <!-- Text -->
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</div>
                                                        </a>
                                                    </div>
                                                    <div class='item-box icons-color col-sm-6 col-md-4'>
                                                        <a href='#'>
                                                            <!-- Icon -->
                                                            <i class='fa fa-refresh fa-2x'></i>
                                                            <!-- Title -->
                                                            <h5 class='title'>Clean Water For People</h5>
                                                            <!-- Text -->
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</div>
                                                        </a>
                                                    </div>
                                                    <div class='item-box icons-color col-sm-6 col-md-4'>
                                                        <a href='#'>
                                                            <!-- Icon -->
                                                            <i class='fa fa-book fa-2x'></i>
                                                            <!-- Title -->
                                                            <h5 class='title'>Charity For Education</h5>
                                                            <!-- Text -->
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</div>
                                                        </a>
                                                    </div>
                                                    <div class='item-box icons-color col-sm-6 col-md-4'>
                                                        <a href='#'>
                                                            <!-- Icon -->
                                                            <i class='fa fa-cutlery fa-2x'></i>
                                                            <!-- Title -->
                                                            <h5 class='title'>Feed For Hungry Child</h5>
                                                            <!-- Text -->
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</div>
                                                        </a>
                                                    </div>
                                                    <div class='item-box icons-color col-sm-6 col-md-4'>
                                                        <a href='#'>
                                                            <!-- Icon -->
                                                            <i class='fa fa-home fa-2x'></i>
                                                            <!-- Title -->
                                                            <h5 class='title'>Home For Homeless</h5>
                                                            <!-- Text -->
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</div>
                                                        </a>
                                                    </div>
                                                    <div class='item-box icons-color col-sm-6 col-md-4'>
                                                        <a href='#'>
                                                            <!-- Icon -->
                                                            <i class='fa fa-life-ring fa-2x'></i>
                                                            <!-- Title -->
                                                            <h5 class='title'>Clean Water For People</h5>
                                                            <!-- Text -->
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</div>
                                                        </a>
                                                    </div>
                                                    <div class='item-box icons-color col-sm-6 col-md-4'>
                                                        <a href='#'>
                                                            <!-- Icon -->
                                                            <i class='fa fa-lightbulb-o fa-2x'></i>
                                                            <!-- Title -->
                                                            <h5 class='title'>Charity For Education</h5>
                                                            <!-- Text -->
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class='clearfix'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tab2 -->
                                    <div role='tabpanel' class='tab-pane' id='why' data-animation='fadeInRight'>
                                        <div class='row'>
                                            <div class='container'>
                                                <div class='col-sm-6 col-md-6'>
                                                    <div class='section-title text-left'>
                                                        <!-- Heading -->
                                                        <h2 class='title'>Why choose us?</h2>
                                                    </div>
                                                    <div class='panel-group no-list text-left' id='accordion1'>
                                                        <div class='panel panel-default active'>
                                                            <div class='panel-heading'>
                                                                <div class='panel-title'>
                                                                    <!-- Tab -->
                                                                    <a data-toggle='collapse' data-parent='#accordion1' href='#item1'>Worldwide charity programs</a>
                                                                </div>
                                                            </div>
                                                            <div id='item1' class='panel-collapse collapse in'>
                                                                <div class='panel-body'>
                                                                    <!-- Tab Content-->
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores ipsa esse obcaecati repudiandae veniam amet modi recusandae optio earum sequi accusantium culpa vitae iste sit commodi eaque voluptatem officia quam.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='panel panel-default active'>
                                                            <div class='panel-heading'>
                                                                <div class='panel-title'>
                                                                    <!-- Tab -->
                                                                    <a data-toggle='collapse' data-parent='#accordion1' href='#item2'>Leading volunteer groups</a>
                                                                </div>
                                                            </div>
                                                            <div id='item2' class='panel-collapse collapse'>
                                                                <div class='panel-body'>
                                                                    <!-- Tab Content-->Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque natus quaerat voluptate? Asperiores hic dolore voluptate corporis obcaecati reiciendis sunt ipsam iste. Eligendi inventore voluptatibus quia saepe odit deserunt nam?
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='panel panel-default'>
                                                            <div class='panel-heading'>
                                                                <div class='panel-title'>
                                                                    <!-- Tab -->
                                                                    <a data-toggle='collapse' data-parent='#accordion1' href='#item3'>Charity programs for children</a>
                                                                </div>
                                                            </div>
                                                            <div id='item3' class='panel-collapse collapse'>
                                                                <div class='panel-body'>
                                                                    <!-- Tab Content-->
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores ipsa esse obcaecati repudiandae veniam amet modi recusandae optio earum sequi accusantium culpa vitae iste sit commodi eaque voluptatem officia quam.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-sm-6 col-md-6'>
                                                    <div class='section-title text-left'>
                                                        <!-- Heading -->
                                                        <h2 class='title'>Our Skills</h2>
                                                    </div>
                                                    <div class='entry-content about-us text-left'>
                                                        <!-- Progress Bar 1 -->
                                                        <h6>Fund for Childerns</h6>
                                                        <div class='progress'>
                                                            <div data-percentage='60' aria-valuemax='100' aria-valuemin='0' aria-valuenow='60' role='progressbar' class='progress-bar'>
                                                                <span class='progress-label'>60%</span>
                                                            </div>
                                                        </div>
                                                        <!-- Progress Bar 2 -->
                                                        <h6>Fund for Plants</h6>
                                                        <div class='progress'>
                                                            <div data-percentage='65' aria-valuemax='100' aria-valuemin='0' aria-valuenow='65' role='progressbar' class='progress-bar'>
                                                                <span class='progress-label'>65%</span>
                                                            </div>
                                                        </div>
                                                        <!-- Progress Bar 3 -->
                                                        <h6>Fund for Educations</h6>
                                                        <div class='progress'>
                                                            <div data-percentage='80' aria-valuemax='100' aria-valuemin='0' aria-valuenow='80' role='progressbar' class='progress-bar'>
                                                                <span class='progress-label'>80%</span>
                                                            </div>
                                                        </div>
                                                        <!-- Progress Bar 4 -->
                                                        <h6>Fund for Refugees</h6>
                                                        <div class='progress'>
                                                            <div data-percentage='70' aria-valuemax='100' aria-valuemin='0' aria-valuenow='70' role='progressbar' class='progress-bar'>
                                                                <span class='progress-label'>70%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tab3 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>";
        
        echo $bub;
    }
    function give_revslider(){
        $slid = "<section class='slider'>
                <div id='rev_slider_1073_1_wrapper' class='rev_slider_wrapper fullscreen-container' data-alias='gym1' data-source='gallery' style='background-color:transparent;padding:0px;'>
                    <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
                    <div id='rev_slider_1073_1' class='rev_slider fullscreenbanner' style='display:none;' data-version='5.3.0.2'>
                        <ul>
                            <!-- SLIDE  -->
                            <li data-index='rs-3026' data-transition='slideoververtical' data-slotamount='default' data-hideafterloop='0' data-hideslideonmobile='off' data-easein='default' data-easeout='default' data-masterspeed='1500' data-thumb='../../assets/images/gym1-100x50.jpg' data-rotate='0' data-fstransition='fade' data-fsmasterspeed='1500' data-fsslotamount='7' data-saveperformance='off' data-title='Intro' data-param1='' data-param2='' data-param3='' data-param4='' data-param5='' data-param6='' data-param7='' data-param8='' data-param9='' data-param10='' data-description=''>
                                <!-- MAIN IMAGE -->
                                <img src='img/sections/slider/ThreefourMak.jpg' alt='' data-bgposition='center center' data-bgfit='cover' data-bgrepeat='no-repeat' class='rev-slidebg' data-no-retina>
                                <!-- LAYERS -->
                                <!-- LAYER NR. 1 -->
                                <div class='tp-caption Gym-Display   tp-resizeme' id='slide-3026-layer-1' data-x='['center','center','center','center']' data-hoffset='['0','0','0','0']' data-y='['middle','middle','middle','middle']' data-voffset='['-20','-20','-20','-22']' data-fontsize='['60','60','60','40']' data-lineheight='['70','70','50','40']' data-width='none' data-height='none' data-whitespace='nowrap' data-type='text' data-responsive_offset='on' data-frames='[{'from':'y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;','mask':'x:0px;y:[100%];s:inherit;e:inherit;','speed':2000,'to':'o:1;','delay':500,'ease':'Power4.easeInOut'},{'delay':'wait','speed':1000,'to':'y:[100%];','mask':'x:inherit;y:inherit;s:inherit;e:inherit;','ease':'Power2.easeInOut'}]' data-textAlign='['center','center','center','center']' data-paddingtop='[0,0,0,0]' data-paddingright='[0,0,0,0]' data-paddingbottom='[0,0,0,0]' data-paddingleft='[0,0,0,0]' style='z-index: 5; white-space: nowrap;text-transform:left;'>Together.</div>
                                <!-- LAYER NR. 4 -->
                                <div class='tp-caption Gym-Subline   tp-resizeme' id='slide-3026-layer-4' data-x='['center','center','center','center']' data-hoffset='['0','0','0','0']' data-y='['middle','middle','middle','middle']' data-voffset='['91','91','91','51']' data-fontsize='['30','30','30','18']' data-lineheight='['40','40','40','30']' data-fontweight='['100','100','100','400']' data-width='none' data-height='none' data-whitespace='nowrap' data-type='text' data-responsive_offset='on' data-frames='[{'from':'y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;','mask':'x:0px;y:[100%];s:inherit;e:inherit;','speed':2000,'to':'o:1;','delay':1000,'ease':'Power4.easeInOut'},{'delay':'wait','speed':1000,'to':'y:[100%];','mask':'x:inherit;y:inherit;s:inherit;e:inherit;','ease':'Power2.easeInOut'}]' data-textAlign='['left','left','left','left']' data-paddingtop='[0,0,0,0]' data-paddingright='[0,0,0,0]' data-paddingbottom='[0,0,0,0]' data-paddingleft='[0,0,0,0]' style='z-index: 8; white-space: nowrap;text-transform:left;'>We are stronger. </div>
                                <!-- LAYER NR. 6 -->
                                <div class='tp-caption' id='slide-2972-layer-3' data-x='['center','center','center','center']' data-hoffset='['0','0','0','0']' data-y='['middle','middle','middle','middle']' data-voffset='['180','180','210','140']' data-width='none' data-height='none' data-whitespace='nowrap' data-type='button' data-actions='[{'event':'click','action':'jumptoslide','slide':'rs-3027','delay':''}]' data-basealign='slide' data-responsive_offset='on' data-responsive='off' data-frames='[{'from':'y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;','speed':2000,'to':'o:1;','delay':1500,'ease':'Power4.easeInOut'},{'delay':'wait','speed':1000,'to':'y:[175%];','mask':'x:inherit;y:inherit;','ease':'Power2.easeInOut'},{'frame':'hover','speed':'300','ease':'Power2.easeOut','to':'o:1;rX:0;rY:0;rZ:0;z:0;'}]' data-textAlign='['left','left','left','left']'><a class='btn btn-default btn-lg	' href='contact.html'>Donate Now</a></div>
                            </li>
                        </ul>
                        <div class='tp-static-layers'>
                            <!-- LAYER NR. 22 -->
                            <div class='tp-caption   tp-static-layer' id='slider-1073-layer-2' data-x='['center','center','center','center']' data-hoffset='['0','0','0','0']' data-y='['top','top','top','top']' data-voffset='['30','30','30','30']' data-width='none' data-height='none' data-whitespace='nowrap' data-type='image' data-actions='[{'event':'click','action':'jumptoslide','slide':'rs-3026','delay':''}]' data-basealign='slide' data-responsive_offset='off' data-responsive='off' data-startslide='0' data-endslide='2' data-frames='[{'from':'opacity:0;','speed':1500,'to':'o:1;','delay':500,'ease':'Power3.easeInOut'},{'delay':'wait','speed':300,'to':'auto:auto;','ease':'nothing'}]' data-textAlign='['left','left','left','left']' data-paddingtop='[0,0,0,0]' data-paddingright='[0,0,0,0]' data-paddingbottom='[0,0,0,0]' data-paddingleft='[0,0,0,0]' style='z-index: 26;text-transform:left;border-width:0px;cursor:pointer;'></div>
                            <!-- LAYER NR. 26 -->
                            <div class='tp-caption gym-menuitem   tp-static-layer' id='slider-1073-layer-6' data-x='['left','left','left','left']' data-hoffset='['30','30','30','30']' data-y='['top','top','top','top']' data-voffset='['100','100','100','100']' data-width='none' data-height='none' data-whitespace='nowrap' data-type='text' data-actions='[{'event':'click','action':'jumptoslide','slide':'rs-3026','delay':''},{'event':'click','action':'simulateclick','layer':'slider-1073-layer-5','delay':''}]' data-basealign='slide' data-responsive_offset='off' data-responsive='off' data-startslide='0' data-endslide='1' data-frames='[{'from':'z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;','speed':1000,'to':'o:1;','delay':'bytrigger','ease':'Power3.easeInOut'},{'delay':'bytrigger','speed':800,'to':'x:-50px;opacity:0;','ease':'Power3.easeInOut'},{'frame':'hover','speed':'200','ease':'Linear.easeNone','to':'o:1;rX:0;rY:0;rZ:0;z:0;','style':'c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 0.25);bw:2px 2px 2px 2px;'}]' data-textAlign='['left','left','left','left']' data-paddingtop='[3,3,3,3]' data-paddingright='[5,5,5,5]' data-paddingbottom='[3,3,3,3]' data-paddingleft='[8,8,8,8]' data-lasttriggerstate='keep' style='z-index: 30; white-space: nowrap; font-size: 20px; line-height: 20px; font-weight: 300; color: rgba(255, 255, 255, 1.00);font-family:Raleway;text-transform:left;background-color:rgba(0, 0, 0, 1.00);border-color:rgba(255, 255, 255, 0);border-style:solid;border-width:2px;border-radius:3px 3px 3px 3px;cursor:pointer;'>WELCOME </div>
                            <!-- LAYER NR. 27 -->
                            <div class='tp-caption gym-menuitem   tp-static-layer' id='slider-1073-layer-7' data-x='['left','left','left','left']' data-hoffset='['30','30','30','30']' data-y='['top','top','top','top']' data-voffset='['135','135','135','135']' data-width='none' data-height='none' data-whitespace='nowrap' data-type='text' data-actions='[{'event':'click','action':'jumptoslide','slide':'rs-3027','delay':''},{'event':'click','action':'simulateclick','layer':'slider-1073-layer-5','delay':''}]' data-basealign='slide' data-responsive_offset='off' data-responsive='off' data-startslide='0' data-endslide='1' data-frames='[{'from':'z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;','speed':1000,'to':'o:1;','delay':'bytrigger','ease':'Power3.easeInOut'},{'delay':'bytrigger','speed':800,'to':'x:-50px;opacity:0;','ease':'Power3.easeInOut'},{'frame':'hover','speed':'200','ease':'Linear.easeNone','to':'o:1;rX:0;rY:0;rZ:0;z:0;','style':'c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 0.25);bw:2px 2px 2px 2px;'}]' data-textAlign='['left','left','left','left']' data-paddingtop='[3,3,3,3]' data-paddingright='[5,5,5,5]' data-paddingbottom='[3,3,3,3]' data-paddingleft='[8,8,8,8]' data-lasttriggerstate='keep' style='z-index: 31; white-space: nowrap; font-size: 20px; line-height: 20px; font-weight: 300; color: rgba(255, 255, 255, 1.00);font-family:Raleway;text-transform:left;background-color:rgba(0, 0, 0, 1.00);border-color:rgba(255, 255, 255, 0);border-style:solid;border-width:2px;border-radius:3px 3px 3px 3px;cursor:pointer;'>OUR OFFER </div>
                            <!-- LAYER NR. 28 -->
                            <div class='tp-caption gym-menuitem   tp-static-layer' id='slider-1073-layer-8' data-x='['left','left','left','left']' data-hoffset='['30','30','30','30']' data-y='['top','top','top','top']' data-voffset='['170','170','170','170']' data-width='none' data-height='none' data-whitespace='nowrap' data-type='text' data-actions='[{'event':'click','action':'jumptoslide','slide':'rs-3028','delay':''},{'event':'click','action':'simulateclick','layer':'slider-1073-layer-5','delay':''}]' data-basealign='slide' data-responsive_offset='off' data-responsive='off' data-startslide='0' data-endslide='1' data-frames='[{'from':'z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;','speed':1000,'to':'o:1;','delay':'bytrigger','ease':'Power3.easeInOut'},{'delay':'bytrigger','speed':800,'to':'x:-50px;opacity:0;','ease':'Power3.easeInOut'},{'frame':'hover','speed':'200','ease':'Linear.easeNone','to':'o:1;rX:0;rY:0;rZ:0;z:0;','style':'c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 0.25);bw:2px 2px 2px 2px;'}]' data-textAlign='['left','left','left','left']' data-paddingtop='[3,3,3,3]' data-paddingright='[5,5,5,5]' data-paddingbottom='[3,3,3,3]' data-paddingleft='[8,8,8,8]' data-lasttriggerstate='keep' style='z-index: 32; white-space: nowrap; font-size: 20px; line-height: 20px; font-weight: 300; color: rgba(255, 255, 255, 1.00);font-family:Raleway;text-transform:left;background-color:rgba(0, 0, 0, 1.00);border-color:rgba(255, 255, 255, 0);border-style:solid;border-width:2px;border-radius:3px 3px 3px 3px;cursor:pointer;'>CONTACT </div>
                        </div>
                    </div>
                </div>
                <!-- END REVOLUTION SLIDER -->
            </section>";
            echo $slid;
    }
    function give_topbar(){
        global $email;
        global $phone;
       $bar="<div id='top-bar' class='top-bar-section top-bar-bg-color'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <!-- Top Contact -->
                            <div class='top-contact link-hover-black'>
                                <a href='#'>
                                    <i class='fa fa-phone'></i>$phone</a>
                                <a href='#'>
                                    <i class='fa fa-envelope'></i>$email</a>
                            </div>
                            <!-- Top Social Icon -->
                            <div class='top-social-icon icons-hover-black'>
                               
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            echo $bar;
    }
    function give_feet(){
        $feet="       <section id='footer'>
                <div class='image-bg content-in fixed' data-background=''>
                    <div class='overlay-color'></div>
                </div>
                <div class='footer-widget'>
                    <div class='container'>
                        <div class='row widget-button'>
                            <div class='col-xs-12 col-sm-6 col-md-6 footer-logo'>
                                <img class='site_logo' width='155' height='70' alt='site_logo' src='img/logo-white.png' />
                            </div>
                            <div class='col-xs-12 col-sm-6 col-md-6'>
                                <div class='footer-button'>
                                    <h4>We Need Your Help</h4>
                                    <a href='contact.html'>
                                        <span class='btn btn-default btn-right'>Donate Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20'>
                                <div class='widget-title'>
                                    <!-- Title -->
                                    <h3 class='title'>Spread the word</h3>
                                </div>
                                <!-- Social Links -->
                                <div class='social-icon transparent-bg icons-circle i-3x'>
                                    <a href='#'>
                                        <i class='fa fa-facebook'></i>
                                    </a>
                                    <a href='#'>
                                        <i class='fa fa-twitter'></i>
                                    </a>
                                    <a href='#'>
                                        <i class='fa fa-pinterest'></i>
                                    </a>
                                    <a href='#'>
                                        <i class='fa fa-google'></i>
                                    </a>
                                    <a href='#'>
                                        <i class='fa fa-linkedin'></i>
                                    </a>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20'>
                                <div class='widget-title'>
                                    <!-- Title -->
                                    <h3 class='title'>Useful info</h3>
                                </div>
                                <nav>
                                    <ul>
                                        <!-- List Items -->
                                        <li>
                                            <a href='#'>Annual reports</a>
                                        </li>
                                        <li>
                                            <a href='#'>Our approach</a>
                                        </li>
                                        <li>
                                            <a href='#'>Statistics</a>
                                        </li>
                                        <li>
                                            <a href='#'>Stories from our work</a>
                                        </li>
                                        <li>
                                            <a href='#'>Why WaterAid?</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class='col-xs-12 col-sm-6 col-md-3 widget'>
                                <div class='widget-title'>
                                    <!-- Title -->
                                    <h3 class='title'>Useful links</h3>
                                </div>
                                <nav>
                                    <ul>
                                        <!-- List Items -->
                                        <li>
                                            <a href='#'>Careers</a>
                                        </li>
                                        <li>
                                            <a href='#'>Contact us</a>
                                        </li>
                                        <li>
                                            <a href='#'>Donate</a>
                                        </li>
                                        <li>
                                            <a href='#'>Media resources</a>
                                        </li>
                                        <li>
                                            <a href='#'>Publications</a>
                                        </li>
                                        <li>
                                            <a href='#'>Site map</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class='col-xs-12 col-sm-6 col-md-3 widget newsletter bottom-xs-pad-20'>
                                <div class='widget-title'>
                                    <!-- Title -->
                                    <h3 class='title'>Stay Informed</h3>
                                </div>
                                <div>
                                    <!-- Text -->
                                    <!-- Form -->
                                    <p class='form-message1'></p>
                                    <div class='clearfix'></div>
                                    <form id='subscribe_form' action='php/subscription.php' method='post' name='subscribe_form'>
                                        <div class='input-text form-group has-feedback'>
                                            <input type='email' value='' name='subscribe_email' placeholder='Email Address' size='25'>
                                            <button class='submit btn btn-default' type='submit'>Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- .newsletter -->
                        </div>
                        <div class='footer-bottom'>
                            <a href='http://zozothemes.com'>zozothemes.com</a>, 233 Test, Test 2705, Test City, NY, 10279, Test. Tel: (012) 345 - 6789
                        </div>
                        <div class='row copyright'>
                            <!-- Copyrights -->
                            <div class='col-xs-12 col-sm-6 col-md-6'><a href='http://zozothemes.com'>zozothemes.com</a> is a Creative Agency.
                                <br> &copy; 2017 <a href='http://zozothemes.com'>zozothemes.com</a>
                            </div>
                            <div class='col-xs-12  col-sm-6 col-md-6 text-right footer-bottom-menu gray-bg icons-circle i-3x'>
                                <!-- Terms Link -->
                                <a href='#'>Contact us</a> |
                                <a href='#'>FAQs</a> |
                                <a href='#'>Privacy policy</a> |
                                <a href='#'>Terms & conditions</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer-top -->
            </section>";
        echo $feet;
    }
    function give_funfactor(){
        $fun ="<section id='fun-factor' class='page-section tb-pad-80'>
                <div class='image-bg content-in fixed' data-background='img/sections/slider/charity-slide2.jpg'>
                    <div class='overlay-dark'></div>
                </div>
                <div class='container'>
                    <div class='row white top-pad-20 text-center'>
                        <div class='col-md-12'>
                            <h4 class='text-uppercase bottom-margin-10'>Working with us by <span class='text-color'>helping & donation</span></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                <br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <br> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <a href='contact.html' class='btn btn-default top-margin-10' data-animation='fadeInDown'>Donate Now</a>
                        </div>
                    </div>
                </div>
            </section>";
        
        echo $fun;
    }
    $bas = "";
    function make_timelineright($tit='TITLE',  $bod="TEXT TEXT TEXT TEXT", $img='service-5.jpg'){
        $time = "      <li>
                                    <div class='timeline-image'>
                                        <img width='200' height='200' class='img-circle' src='$img' alt=''>
                                    </div>
                                    <div class='timeline-panel'>
                                        <div class='timeline-heading'>
                                            <h4 class='subheading'>$tit</h4>
                                        </div>
                                        <div class='timeline-body'>
                                            <p class='text-muted'>$bod</p>
                                        </div>
                                    </div>
                                </li>";
        
        echo $time;
    }
     function make_timelineleft($tit='TITLE',  $bod="TEXT TEXT TEXT TEXT", $img='service-5.jpg'){
        $time = "     <li class='timeline-inverted'>
                                    <div class='timeline-image'>
                                        <img size='100%' width='200' height='200' class='img-circle' src='$img' alt=''>
                                    </div>
                                    <div class='timeline-panel'>
                                        <div class='timeline-heading'>
                                            <h4 class='subheading'>$tit</h4>
                                        </div>
                                        <div class='timeline-body'>
                                            <p class='text-muted'>$bod</p>
                                        </div>
                                    </div>
                                </li>";
        
        echo $time;
    }
    function make_timelinetop($timearray = null){
        
        echo "<section id='services' class='page-section'>
                <div class='container'>
        <div class='row'>
                        <div class='col-md-12'>";
        
       
    }
    function make_timelinebase(){
         echo "                  </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
                ";
    }
    function make_faq($tit,$array=null){
        $count = count($array);
        $names=array();
        $content=array();
        $max0="";
        $max1="";
        $max2="";
        $max3="";
        $max4="";
        if(is_array($array)){
        foreach($array as $i=> $e){
            $names[]=$i;
            $content[]=$e;
        }
        for($i = 0; $i < $count; $i++){
            $n = $names[$i];
            $c = $content[$i];
            switch($i){
                case 0:
                    
                    $max0 = "<div class='panel-group' id='accordion-faq1' role='tablist' aria-multiselectable='true'>
                                <div class='panel panel-default'>
                                    <div class='panel-heading' role='tab' id='headingOne'>
                                        <h4 class='panel-title'>
                                            <a data-toggle='collapse' data-parent='#accordion-faq1' href='#faq1' aria-expanded='true' aria-controls='faq1'>
                                            $n
                                            </a>
                                        </h4>
                                    </div>
                                    <div id='faq1' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>
                                        <div class='panel-body'>
                                        $c
                                        </div>
                                         </div>
                                    ";
                    break;
                    
                case 1:
                    $max1 = "   <div class='panel panel-default'>
                                    <div class='panel-heading' role='tab' id='headingTwo'>
                                        <h4 class='panel-title'>
                                            <a class='collapsed' data-toggle='collapse' data-parent='#accordion-faq1' href='#faq2' aria-expanded='false' aria-controls='faq2'>
$n                                            </a>
                                        </h4>
                                    </div>
                                    <div id='faq2' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingTwo'>
                                        <div class='panel-body'>
$c                                        </div>
                                    </div>
                                </div>";
                    
                    break;
                case 2:
                    $max2 =" <div class='panel panel-default'>
                                    <div class='panel-heading' role='tab' id='headingThree'>
                                        <h4 class='panel-title'>
                                            <a class='collapsed' data-toggle='collapse' data-parent='#accordion-faq1' href='#faq3' aria-expanded='false' aria-controls='faq3'>
$n                                            </a>
                                        </h4>
                                    </div>
                                    <div id='faq3' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingThree'>
                                        <div class='panel-body'>
$c                                        </div>
                                    </div>
                                </div>";
                    break;
                case 3:
                    $max3=" <div class='panel panel-default'>
                                    <div class='panel-heading' role='tab' id='headingFour'>
                                        <h4 class='panel-title'>
                                            <a class='collapsed' data-toggle='collapse' data-parent='#accordion-faq1' href='#faq4' aria-expanded='false' aria-controls='faq4'>
$n                                            </a>
                                        </h4>
                                    </div>
                                    <div id='faq4' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingFour'>
                                        <div class='panel-body'>
$c                                        </div>
                                    </div>
                                </div>";
                    break;
                case 4:
                    $max4=" <div class='panel panel-default'>
                                    <div class='panel-heading' role='tab' id='headingFive'>
                                        <h4 class='panel-title'>
                                            <a class='collapsed' data-toggle='collapse' data-parent='#accordion-faq1' href='#faq5' aria-expanded='false' aria-controls='faq5'>
$n                                            </a>
                                        </h4>
                                    </div>
                                    <div id='faq5' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingFive'>
                                        <div class='panel-body'>
$c                                        </div>
                                    </div>";
                    
                    
                    break;
            }
        }
        $faq ="     <div class='container'>
                    <div class='row'>
                        <div class='col-sm-12 col-md-6 faq'>
                            <div class='section-title text-left'>
                                <!-- Heading -->
                                <h2 class='title'>$tit</h2>
                            </div>
                            
        $max0
        $max1
        $max2
        $max3
        $max4
                                    
                                   
                                
                             
                               
                               
                               
                                </div>
                            </div>
                        </div>";
        echo $faq;
    }
    else{}
    }
?>


















