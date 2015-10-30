<?php
    // including head of html
    $this->load->view("includes/head.php");
    // head ends here
?>

<div class="body"> 
	<!-- Start Site Header -->
	<?php
        // including header here
        $this->load->view('includes/header.php');
	// header end here 
        ?>
	<!-- End Site Header -->
    <!-- Start Hero Slider -->
    <div class="hero-slider">
      <div class="slider-rev-cont">
          <div class="tp-banner-container">
            <div class="tp-limited">
              <ul>
                <?php foreach($slides as $slide){
                    ?>
                    <!-- SLIDE  -->
                    <li data-delay="5000" data-masterspeed="600" data-slotamount="7" data-transition="fade">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo base_url("includes/images/".$slide->featured_image); ?>" alt="">
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr whiter h2 tp-resizeme"
                             data-x="right"
                             data-hoffset="-20"
                             data-y="center"
                             data-voffset="-40"
                             data-speed="1000"
                             data-start="600"
                             data-easing="Back.easeInOut"
                             data-endspeed="300">
                            <?php echo $slide->heading; ?>
                        </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption customin whiter customout tp-resizeme"
                             data-x="right"
                             data-hoffset="-20"
                             data-y="center"
                             data-voffset="20"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:100% 50%;"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"

                             data-start="1100"
                             data-speed="600"
                             data-easing="Linear.easeNone"
                             data-endspeed="600"
                             data-endeasing="Linear.easeNone"
                            ><hr class="md">
                        </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption sfr whiter para text-align-right tp-resizeme"
                             data-x="right"
                             data-hoffset="-20"
                             data-y="center"
                             data-voffset="80"
                             data-speed="1400"
                             data-start="1000"
                             data-easing="Back.easeInOut"
                             data-endspeed="300">
                            <?php echo $slide->content; ?>
                        </div>
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption sfr whiter tp-resizeme"
                             data-x="right"
                             data-hoffset="-20"
                             data-y="center"
                             data-voffset="160"
                             data-speed="1000"
                             data-start="1800"
                             data-easing="Back.easeInOut"
                             data-endspeed="300">
                            <a href="#" class="btn btn-lg btn-default">Support</a>
                        </div>
                    </li>
                  <?php
                } ?>
              </ul>
            </div>
        </div>
      </div>
    </div>
    <!-- End Hero Slider -->
    <div class="double-border"></div>
    <!-- Start Lead Block -->
    <div class="lead-block">
    	<div class="container">
            <div class="tabs">
                <div class="nav-tabs-bar">
                    <ul class="nav nav-tabs">
                        <li class="active"> <a data-toggle="tab" href="#sampletab1">Our Mission</a> </li>
                        <li> <a data-toggle="tab" href="#sampletab2">Why you should join us</a> </li>
                    </ul>
                    <a href="#" class="pull-right">more about us <i class="fa fa-angle-right"></i></a>
                </div>
                <div class="tab-content">
                    <div id="sampletab1" class="tab-pane active">
                        <div class="row">
                        	<div class="col-md-8 col-sm-8">
                        		<p class="lead"><?php echo $overview->heading; ?></p>
                        		<p><?php echo $overview->content; ?></p>
                                <hr class="md"><div class="clearfix"></div>
                                <a href="#" class="btn btn-lg btn-primary"><i class="fa fa-cloud-download"></i> Download Form</a>
                            </div>
                            <div class="col-md-4 col-sm-4 hidden-xs">
                            	<img src="<?php echo base_url("includes/images/$overview->featured_image"); ?>" alt="" style="margin-top:-40px">
                            </div>
                        </div>
                    </div>
                    <div id="sampletab2" class="tab-pane">
                    	<div class="row">
                            <?php
                                $id = 0;
                                $arr = array('label-info','label-warning','label-success');
                                foreach($why_join as $content){
                                    ?>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="icon-block"><span class="icon <?php echo $arr[$id]; ?>"><i class="fa <?php echo $content->icon ?>"></i></span>
                                            <h2><?php echo $content->heading; ?></h2>
                                            <p><?php echo $content->content; ?></p>
                                        </div>
                                    </div>
                            <?php
                                    $id = $id + 1;
                                }
                            ?>
                            <div class="text-align-center">
                            	<div class="spacer-20"></div>
                            	<a href="#" class="btn btn-primary btn-lg secondary-color-bg">Join now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Lead Block -->
  	<!-- Start Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-8 border-col">
                        <!-- Latest Posts -->
                        <div class="latest-posts">
                            <h3 class="title"><i class="fa fa-folder"></i> CHAIRMAN MESSAGE</h3>
                            <ul class="posts-listing">
                            	<li class="post-list-item format-standard">
                                	<div class="row">
                                        <div class="col-md-5 col-sm-6" data-appear-animation="fadeInLeft" data-appear-animation-delay="1">
                                			<a href="#" class="media-box"><img src="<?php echo base_url("includes/images/$message->featured_image"); ?>" alt="" class="img-thumbnail post-thumb"></a>
                                        </div>
                                        <div class="col-md-7 col-sm-6" data-appear-animation="fadeInLeft" data-appear-animation-delay="1">
                                            <h3 class="post-title"><a href="#"><?php echo $message->heading; ?></a></h3>
                                            <span class="post-time meta-data"><?php echo $message->date; ?></span>
                                            <p class="post-excerpt">
                                                <?php
                                                echo $message->excerpt;
                                                ?>
                                            </p>
                                        </div>
                                   	</div>
                                </li>
                            </ul>
                            <a href="<?php echo site_url("message"); ?>" class="btn toblog btn-default pull-right">View More</a>
                        </div>
                  	</div>
                    <!-- Sidebar -->
                    <div class="col-md-4 sidebar right-sidebar">
                    	<div class="widget sidebar-widget upcoming-events-widget">
                            <h3 class="title widgettitle"><i class="fa fa-calendar"></i> PNSS-1 Project Timeline</h3>
                            <ul class="upcoming-events">
                            	<?php foreach($events as $event){
                                    ?>
                                    <li data-appear-animation="fadeInRight" data-appear-animation-delay="1">

                                    <span class="event-date">
                                    	<span class="day"><?php echo date('d',$event->date); ?></span>
                                        <span class="monthyear"><?php echo date('M',$event->date); ?> <?php echo date('Y',$event->date); ?></span>
                                   	</span>
                                        <div class="event-excerpt">
                                            <div class="event-cats meta-data"><a href="#"><?php echo $event->type; ?></a></div>
                                            <h5 class="event-title"><a href="#"><?php echo $event->title; ?></a></h5>
                                            <p class="event-location"><i class="fa fa-map-marker"></i> <?php echo $event->city.', '.$event->country;  ?></p>
                                        </div>
                                    </li>
                                <?php
                                } ?>
                            </ul>
                            <div class="upcoming-events-footer">
                            	<hr class="sm">
                                <a href="#">See all events</a>
                            </div>
                        </div>
                    </div>
              	</div>
          	</div>
        </div>
   	</div>
    <!-- Our Partners -->
    <div class="our-partners">
    	<div class="container">
        	<h2 class="title"><small>List of</small>PNSS-1 Units</h2>
        	<div class="row">
            	<div class="col-md-3">
                	<p class="margin-0">PNSS-1 is divided into following 33 units for universities to design and develop:
</p>
                </div>
            	<div class="col-md-9">
                    <?php
                        $total = count($units);
                        $perRow = ceil($total/3);
                        $unitsArr = array_chunk($units,$perRow); ?>
                    <?php foreach($unitsArr as $units){
                        ?>
                        <ul class="partner">

                            <?php foreach($units as $unit){
                                ?>
                                    <li data-appear-animation="fadeInDown" data-appear-animation-delay="10"><?php echo $unit->title; ?></li>
                            <?php
                            } ?>
                        </ul>
                    <?php
                    } ?>
                </div>
          	</div>
       	</div>
    </div>
    <!-- Start Featured Projects -->
    <div class="featured-projects">
    	<div class="container">
            <a href="#" class="btn toblog btn-default pull-right">See All</a>
        	<h2><small>List of Participated</small> University's</h2>
        	<div class="row">
            	<?php
                    $total = count($universities);
                    $perRow = ceil($total/3);
                    $universitiesArr = array_chunk($universities , $perRow);
                    foreach($universitiesArr as $universities){
                        ?>
                        <div class="col-md-4 col-sm-4 format-standard">
                            <ul>

                                <?php foreach($universities as $university){
                                    ?>
                                    <li data-appear-animation="fadeInLeft" data-appear-animation-delay="1"><a href="#"><?php echo $university->name; ?></a></li>
                                <?php
                                } ?>

                            </ul>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- End Featured Projects -->
    <!-- Start Footer -->
<?php
        $this->load->view('includes/footer.php');
        ?>
    <!-- End Footer -->
  	<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> 
</div>

</body>
</html>