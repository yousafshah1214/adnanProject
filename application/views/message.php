<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 03/11/2015
 * Time: 4:41 PM
 */
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
                        <li class="active">Chairman Message</li>
                    </ol>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Chairman Message</h2>
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
                    <a href="<?php echo site_url('Home'); ?>" class="basic-link inverted"><i class="fa fa-angle-left"></i> Back to home</a>
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
                    <div class="col-md-12">
                        <div class="entry single-post">
                            <h2 class="title"><?php echo $overview->heading; ?></h2>
                            <!--                            <div class="meta-data">-->
                            <!--                                <span><i class="fa fa-calendar"></i> Posted on --><?php //echo date('dS',$post->date); ?><!-- --><?php //echo date('F',$post->date); ?><!-- --><?php //echo date('Y',$post->date); ?><!--</span>-->
                            <!--                            </div>-->
                            <article class="post-content">
                                <div class="col-sm-4">
                                    <img src="<?php echo base_url('includes/images/'.$overview->featured_image); ?>" alt="" class="img-thumbnail">
                                </div>
                                <div class="col-sm-8">
                                    <?php echo $overview->content; ?>
                                </div>
                            </article>
                        </div>
                    </div>
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