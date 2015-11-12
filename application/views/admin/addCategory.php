<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 12/11/2015
 * Time: 1:04 PM
 */

    $this->load->view('admin/includes/head.php');
?>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php $this->load->view('admin/includes/nav.php'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3 col-lg-offset-3 col-sm-offset-3">
            <h2 class="text-center">Add New Category</h2>
            <br>
            <?php if(validation_errors()){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>
            <?php if($this->session->flashdata('error')){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php
            } ?>
            <?php echo form_open_multipart('admin/addCategoryProcess',array('class'=>"form-horizontal")); ?>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Category Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" placeholder="Category Title" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Category Type</label>
                <div class="col-sm-9">
                    <select class="form-control " name="type">
                    <option value="">Select Type</option>
                        <option value="event">Event</option>
                        <option value="blog">Blog</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Add New Category</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('includes/js/bootstrap.js'); ?>"></script>

</body>
</html>