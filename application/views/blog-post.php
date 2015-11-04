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
    <div class="page-header">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-sm-6 hidden-xs">
          			<ol class="breadcrumb">
            			<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
            			<li class="active">Blog</li>
          			</ol>
            	</div>
            	<div class="col-md-6 col-sm-6 col-xs-12">
    				<h2>Blog</h2>
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
            	<div class="col-md-12">
              		<a href="<?php echo site_url('blog'); ?>" class="basic-link inverted"><i class="fa fa-angle-left"></i> Back to blog</a>
<!--              		<a href="contact.html" class="btn btn-primary btn-lg pull-right"><i class="fa fa-pencil"></i> Contribute a write up</a>-->
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
                		<div class="entry single-post">
                            <h2 class="title"><?php echo $post->heading; ?></h2>
                            <div class="meta-data">
                                <span><i class="fa fa-calendar"></i> Posted on <?php echo date('dS',$post->date); ?> <?php echo date('F',$post->date); ?> <?php echo date('Y',$post->date); ?></span>
                            </div>
                            <img src="<?php echo base_url('includes/images/'.$post->featured_image); ?>" alt="" class="img-thumbnail post-single-image">
                            <article class="post-content"> 
                                <?php echo $post->content; ?>
                            </article>
                            
                            <!-- Related Posts -->
                      <?php
                        $num = count($relatedPosts);
                        if($num > 0){
                            ?>
                            <div class="related-posts">
                                <h4 class="title">You might also like</h4>
                                <div class="row">
                                    <?php foreach($relatedPosts as $post){
                                        ?>
                                        <div class="col-md-4 related-post format-standard">
                                            <a href="<?php echo site_url('blog/post/'.$post->id); ?>" class="media-box"><img src="<?php echo base_url('includes/images/'.$post->featured_image); ?>" alt="" class="img-thumbnail post-thumb"></a>
                                            <h3 class="post-title"><a href="<?php echo site_url('blog/post/'.$post->id); ?>"><?php echo $post->heading; ?></a></h3>
                                            <span class="post-time meta-data">Posted on <?php echo date('dS',$post->date); ?> <?php echo date('F',$post->date); ?> <?php echo date('Y',$post->date); ?></span>
                                        </div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                            <?php
                        }
                      ?>
                    </div>
                </div>
                <!-- Start Sidebar -->
                    <?php $this->load->view('includes/sidebar.php'); ?>
              </div>
            </div>
       	</div>
   	</div>
    <!-- End Body Content -->
    <!-- Start Footer -->
    <?php
        $this->load->view('includes/footer.php');
    ?>
    <!-- End Footer -->
  	<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> 
</div>

</body>
</html>