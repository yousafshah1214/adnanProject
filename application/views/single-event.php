<?php
// including header here
    $this->load->view('includes/head.php');
// header end here
?>
<div class="body">
	<!-- Start Site Header -->
    <?php
    // including header here
        $this->load->view('includes/header.php');
    // header end here
    ?>
    <!-- End Site Header -->
    <!-- Start Page Header -->
    <div class="page-header" style="">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-sm-6 hidden-xs">
          			<ol class="breadcrumb">
            			<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
            			<li class="active">Events</li>
          			</ol>
            	</div>
            	<div class="col-md-6 col-sm-6 col-xs-12">
    				<h2>Events</h2>
                </div>
           	</div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="double-border"></div>
    <!-- Secondary Header -->
    <div class="secondary-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-3 col-sm-3 col-xs-6">
                	<div class="single-event-info">
                    	<span class="day"><?php echo date('l',$event->date); ?></span>
                        <span class="date"><?php echo date('d F, Y',$event->date); ?></span>
<!--                        <span class="time">3:00 pm</span>-->
                    </div>
                </div>
            	<div class="col-md-5 col-sm-5 col-xs-6">
                	<span class="event-single-venue">
                		<span><i class="fa fa-map-marker"></i></span>
                    	<span><?php echo $event->location; ?></span>
                    	<span><?php echo $event->city; ?>, <?php echo $event->country; ?></span>
<!--                        <a href="#" class="basic-link">Get Directions <i class="fa fa-angle-right"></i></a>-->
                   	</span>
                </div>
            	<div class="col-md-4 col-sm-4 col-xs-12">
<!--                	<a href="#" class="event-register-block">Register for Event</a>-->
                </div>
            </div>
        </div>
    </div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
    		<div class="container">
        		<div class="row">
            		<div class="col-md-9">
                   		<h2 class="title"><?php echo $event->title; ?> <label class="label label-primary"><i class="fa fa-briefcase"></i> <?php echo $event->type ?> </label></h2>
                    	<div class="entry">
                       		<?php if(strlen($event->featured_image) >0){
                                ?>
                                <div class="flexslider" data-pagination="yes" data-style="slide">
                                    <ul class="slides">
                                        <li>
                                            <img src="<?php echo base_url('includes/images/'.$event->featured_image);  ?>" alt="">
                                        </li>
                                    </ul>
                                </div>
                                <?php
                            } ?>
                    		<p><?php echo $event->description; ?></p>
                            
                            <br>
                            <br>
                            <br>
                       	</div>
                   	</div>
                    
                    <!-- Start Sidebar -->
                    <div class="col-md-3 sidebar right-sidebar">
                  <?php if(count($related) > 0){
                      ?>
                      <div class="widget sidebar-widget upcoming_events_widget">
                          <h3 class="title">Upcoming Events</h3>
                          <ul class="upcoming-events">
                              <?php foreach($related as $event){
                                  ?>
                                  <li>
                                      <img src="http://placehold.it/80x80&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail event-thumb">
                                    <span class="event-date">
                                        <span class="day"><?php echo date('j',$event->date); ?></span>
                                        <span class="monthyear"><?php echo date('M, Y',$event->date); ?></span>
                                    </span>
                                      <div class="event-excerpt">
                                          <div class="event-cats meta-data"><a href="">World</a></div>
                                          <h5 class="event-title"><a href="<?php echo site_url('event/detail/'.$event->id); ?>"><?php echo $event->title; ?></a></h5>
                                          <p class="event-location"><i class="fa fa-map-marker"></i> <?php echo $event->location.", ".$event->city.", ".$event->country; ?></p>
                                      </div>
                                  </li>
                              <?php
                              } ?>
                          </ul>
                      </div>
                        <?php
                  } ?>
                    	<?php if(count($categories) > 0){
                            ?>
                            <div class="widget sidebar-widget custom_categories_widget">
                                <h3 class="title">Event Categories</h3>
                                <ul>
                                    <?php foreach($categories as $category){ ?>
                                    <li>
                                        <a href="<?php echo site_url('event/category/'.$category->category); ?>"><?php echo $category->category ?></a> <div style="clear:both;"></div>
                                    </li>
                                    <?php
                                    } ?>
                                </ul>
                            </div>
                        <?php
                        } ?>
                    </div>
              	</div>
            </div>
       	</div>
   	</div>
    <!-- End Body Content -->
    <!-- Start Footer -->
<?php
        // including header here
        $this->load->view('includes/footer.php');
	// header end here 
        ?>
    <!-- End Footer -->
  	<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> 
</div>
</body>
</html>