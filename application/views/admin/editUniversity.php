<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 19/10/2015
 * Time: 11:08 PM
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
            <h2 class="text-center">Edit University</h2>
            <br>
            <?php if(validation_errors()){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>
            <?php echo form_open('admin/editUniversityProcess',array('class'=>"form-horizontal")); ?>
            <input type="hidden" name="id" value="<?php echo $university->id; ?>"/>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">University name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" value="<?php echo $university->name; ?>" placeholder="University name" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="link" class="col-sm-3 control-label">University Website Link</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="link" value="<?php echo $university->link; ?>" placeholder="University Website Link leave blank if not applicable." name="link">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Add New University</button>
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