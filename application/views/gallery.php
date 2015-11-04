<?php
    $this->load->view('includes/head.php');
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
    <div class="page-header" style="background-image:url(images/img2.jpg)">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-sm-6 hidden-xs">
          			<ol class="breadcrumb">
            			<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
            			<li class="active">Gallery</li>
          			</ol>
            	</div>
            	<div class="col-md-6 col-sm-6 col-xs-12">
    				<h2>Gallery</h2>
                </div>
           	</div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="double-border"></div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full" style="padding: 40px 0 50px;">
    		<div class="container">
                <ul class="grid-holder col-4 gallery-grid magnific-gallery sort-destination" data-sort-id="gallery">
                <?php
                    foreach($galleries as $gallery){
                        // showing gallery images
                        ?>
                        <li class="grid-item format-image projects">
                            <div class="grid-item-inner">
                                <a href="<?php echo base_url('includes/images/'.$gallery->featured_image); ?>" class="media-box">
                                    <img src="<?php echo base_url('includes/images/'.$gallery->featured_image); ?>" alt="">
                                    <span class="gallery-cat"><?php echo $gallery->heading; ?></span>
                                </a>
                            </div>
                        </li>
                    <?php
                    }
                ?>
                </ul>
                <!-- Pagination -->
                <?php echo $pagination; ?>
<!--                <ul class="pagination">-->
<!--                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>-->
<!--                    <li><a href="#">1</a></li>-->
<!--                    <li class="active"><a href="#">2</a></li>-->
<!--                    <li><a href="#">3</a></li>-->
<!--                    <li><a href="#">4</a></li>-->
<!--                    <li><a href="#">5</a></li>-->
<!--                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>-->
<!--                </ul>-->
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
<script src="<?php echo base_url('includes/includes/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script><!-- Maginific Popup -->
<script>
	$('.magnific-gallery').magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'image',
		gallery:{enabled:true}
		// other options
	});
</script> 
</body>
</html>