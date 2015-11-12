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
                <?php if(count($featured) > 0){
                ?>
                <div class="col-md-5">
                	<h4>Featured Events</h4>
                    <div class="flexslider" data-arrows="yes" data-style="slide" id="featured-events">
                        <ul class="upcoming-events slides">
                        <?php foreach($featured as $event){
                            ?>
                            <li>
                                <img src="http://placehold.it/80x80&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail event-thumb">
                                <span class="event-date">
                                    <span class="day"><?php echo date('j',$event->date); ?></span>
                                    <span class="monthyear"><?php echo date('M, Y',$event->date); ?></span>
                                </span>
                                <div class="event-excerpt">
                                    <div class="event-cats meta-data"><a href=""><?php echo $event->type; ?></a></div>
                                    <h5 class="event-title"><a href="single-event.html"><?php echo $event->title; ?></a></h5>
                                    <p class="event-location"><i class="fa fa-map-marker"></i> <?php echo $event->location.", ".$event->city.", ".$event->country; ?></p>
                                </div>
                            </li>
                            <?php
                        } ?>
                        </ul>
                    </div>
                </div>
                <?php
                } ?>
            	<div class="col-md-6 col-md-offset-1">
                	<h4>Recently passed events</h4>
                    <ul class="passed-events angles">
                    	<?php foreach($recent as $event){
                            ?>
                            <li><a href="<?php echo site_url('event/detail/'.$event->id); ?>"><?php echo $event->title; ?></a></li>
                        <?php
                        } ?>
                    </ul>
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
                    	<div class="events-listing">
                            <div class="listing-header">
                                <h2 class="title ">Upcoming Events </h2>
                                <?php echo $pagination ?>
                            </div>
                            <ul class="upcoming-events listing-content">
                                <?php foreach($events as $event){
                                    ?>
                                    <li>
                                        <a href="<?php echo site_url('event/detail/'.$event->id); ?>" class="event-details-btn"><i class="fa fa-angle-right"></i></a>
                                        <img src="http://placehold.it/80x80&text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail event-thumb">
                                    <span class="event-date">
                                    	<span class="day"><?php echo date('j',$event->date); ?></span>
                                        <span class="monthyear"><?php echo date('M',$event->date).', '.date('y',$event->date);  ?></span>
                                   	</span>
                                        <div class="event-excerpt">
                                            <div class="event-cats meta-data"><a href=""><?php echo $event->type; ?></a></div>
                                            <h5 class="event-title"><a href="<?php echo site_url('event/detail/'.$event->id); ?>"><?php echo $event->title; ?></a></h5>
                                            <p class="event-location"><i class="fa fa-map-marker"></i> <?php echo $event->city; ?>, <?php echo $event->country; ?></p>
                                        </div>
                                    </li>
                                <?php
                                } ?>
                            </ul>
                        </div>
                        <br>
                        <br>
                   	</div>
                    
                    <!-- Start Sidebar -->
                    <div class="col-md-3 sidebar right-sidebar">
                    	<div class="widget sidebar-widget widget_categories">
                        	<h3 class="title">Event Categories</h3>
              				<ul>
                				<?php foreach($categories as $category){
                                    ?>
                                    <li><a href="<?php echo site_url('event/category/'.$category->category); ?>"><?php echo $category->category; ?></a><div style="clear: both;"></div></li>
                                <?php
                                } ?>
              				</ul>
                        </div>
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