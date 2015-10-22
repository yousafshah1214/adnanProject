<!--header-->
<header class="site-header">
    	<div class="top-header hidden-xs">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-6">
                    	<div class="upcoming-event-bar">
                        	<h4><i class="fa fa-calendar"></i> Next Event</h4>
                            <div id="counter" class="counter" data-date="August 14, 2016">
                         		<div class="timer-col"> <span id="days"></span> <span class="timer-type">d</span> </div>
                        		<div class="timer-col"> <span id="hours"></span> <span class="timer-type">h</span> </div>
                      			<div class="timer-col"> <span id="minutes"></span> <span class="timer-type">m</span> </div>
                         		<div class="timer-col"> <span id="seconds"></span> <span class="timer-type">s</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    	<ul class="top-menu">
                        	<li class="secondary"><a href="#">Join Us</a></li>
                        </ul>
                    	<ul class="social-links social-links-lighter">
                        	<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        	<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                        	<li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                        	<li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
           	</div>
       	</div>
    	<div class="lower-header">
        	<div class="container for-navi">
             	<h1 class="logo">
                	<a href="<?php echo site_url('home'); ?>"><img src="<?php echo base_url("includes/images/logo.png"); ?>" alt="Site Logo"></a>
             	</h1>
              	<!-- Main Navigation -->
              	<nav class="main-navigation">
                  	<ul class="sf-menu">
                   		<li><a href="<?php echo site_url("home"); ?>">Home</a></li>
                        <li><a href="../blog.php">Blog</a></li>
                        <li><a href="../gallery.php">Gallery</a>
                        <li><a href="../events.php">Event</a></li>
                        <li><a href="../projects.php">Projects</a></li>
                        <li><a href="../single-event.php">Single Event</a></li>
                        <li><a href="../blog-post.php">Blog Post</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
                <!-- Mobile Menu Trigger Icon -->
                <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
	</header>