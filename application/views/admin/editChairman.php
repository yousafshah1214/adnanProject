<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 20/10/2015
 * Time: 12:34 PM
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
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h2 class="text-center">Edit Chairman Message</h2>
            <br>
            <?php if(validation_errors()){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>
            <?php echo form_open_multipart('admin/editChairmanMessageProcess',array('class'=>"form-horizontal")); ?>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Chairman name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $chairman->heading; ?>" id="title" placeholder="Chairman Name" name="name">
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" placeholder="Description" name="desc" id="desc"><?php echo $chairman->content; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Excerpt</label>
                <div class="col-sm-9">
                    <textarea class="form-control" placeholder="Excerpt" name="excerpt" id="excerpt"><?php echo $chairman->excerpt; ?></textarea>
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
                    <button type="submit" class="btn btn-primary">Save Chairman Message</button>
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

<script src="<?php echo base_url('includes/includes/ckeditor/ckeditor.js'); ?>"></script>

<script>
        // Replace the <textarea id="desc"> with a CKEditor
        // instance, using default configuration.
    CKEDITOR.replace( 'desc' );

        // Replace the <textarea id="excerpt"> with a CKEditor
        // instance, using default configuration.
    CKEDITOR.replace( 'excerpt' );
</script>
</body>
</html>