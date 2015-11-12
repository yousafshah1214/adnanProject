<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 19/10/2015
 * Time: 12:41 PM
 */ ?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('admin'); ?>">Dashboard</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('admin/allevents'); ?>">Events <span class="sr-only"></span></a></li>
                <li><a href="<?php echo site_url('admin/alluniversities'); ?>">Universities</a></li>
                <li><a href="<?php echo site_url('admin/allunits'); ?>">Units</a></li>
                <li><a href="<?php echo site_url('admin/allslides'); ?>">Slides</a></li>
                <li><a href="<?php echo site_url('admin/allblogposts'); ?>">Blogposts</a></li>
                <li><a href="<?php echo site_url('admin/allgalleries'); ?>">Gallery</a></li>
                <li><a href="<?php echo site_url('admin/allcategories'); ?>">Categories</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('admin/addUnit'); ?>">Unit</a></li>
                        <li><a href="<?php echo site_url('admin/addUniversity'); ?>">University</a></li>
                        <li><a href="<?php echo site_url('admin/addSlide'); ?>">Slide</a></li>
                        <li><a href="<?php echo site_url('admin/addblogpost'); ?>">Blogpost</a></li>
                        <li><a href="<?php echo site_url('admin/addGallery'); ?>">Gallery</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo site_url('admin/addEvent'); ?>">Event</a></li>
                        <li><a href="<?php echo site_url('admin/addCategory'); ?>">Category</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Edit<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('admin/editChairmanMessage'); ?>">Chairman Message</a></li>
                        <li><a href="<?php echo site_url('admin/editOverview'); ?>">Program Overview</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>