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
                	<span class="big">All the latest happenings</span>
<!--                    <a href="contact.html" class="btn btn-primary btn-lg pull-right"><i class="fa fa-pencil"></i> Contribute a write up</a>-->
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
                        <?php $num = count($blogs);
                        if($num > 0){
                            ?>
                            <ul class="posts-listing">
                                <?php foreach($blogs as $blog){
                                    ?>
                                    <li class="post-list-item format-standard">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <a href="<?php echo site_url('blog/post/'.$blog->id); ?>" class="media-box"><img src="<?php echo base_url('includes/images/'.$blog->featured_image); ?>" alt="<?php echo $blog->heading; ?>" class="img-thumbnail post-thumb"></a>
                                            </div>
                                            <div class="col-md-7">
                                                <h3 class="post-title"><a href="<?php echo site_url('blog/post/'.$blog->id); ?>"><?php echo $blog->heading; ?></a></h3>
                                                <span class="post-time meta-data">Posted on <?php echo date('dS',$blog->date); ?> <?php echo date('F',$blog->date); ?> <?php echo date('Y',$blog->date); ?></span>
                                                <p class="post-excerpt"><?php echo $blog->excerpt; ?></p>
                                                <a href="<?php echo site_url('blog/post/'.$blog->id); ?>" class="btn btn-sm btn-default">Continue reading <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                } ?>

                            </ul>
                            <!-- Pagination -->
                            <ul class="pagination">
                                <?php  echo $pagination; ?>
<!--                                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>-->
<!--                                <li><a href="#">1</a></li>-->
<!--                                <li class="active"><a href="#">2</a></li>-->
<!--                                <li><a href="#">3</a></li>-->
<!--                                <li><a href="#">4</a></li>-->
<!--                                <li><a href="#">5</a></li>-->
<!--                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>-->
                            </ul>
                        <?php
                        }
                        else{
                            ?>
                            <br>
                            <br>
                            <div class="well">No posts to show</div>
                        <?php
                        }?>
                   	</div>
                    <!-- Start Sidebar -->
                    <?php $this->load->view('includes/sidebar.php'); ?>
                    <!-- End Sidebar -->
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