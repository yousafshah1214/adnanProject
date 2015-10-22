<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 20/10/2015
 * Time: 6:00 PM
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
            <h2 class="text-center">Add New Slide</h2>
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
            <?php echo form_open_multipart('admin/addSlideProcess',array('class'=>"form-horizontal")); ?>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Slide Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" placeholder="Slide Title" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Slide Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" placeholder="Description about slide. Leave blank if not applicable." name="description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputFile">File input</label>
                <div class="col-sm-9">
                    <input type="file" id="InputFile" name="userFile">
                    <p class="help-block">only .jpg pics. Leave it blank if not applicable</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Add New Slide</button>
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