<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 26/10/2015
 * Time: 8:59 PM
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
            <h2 class="text-center">Add New Blog Post</h2>
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
            <?php echo form_open_multipart('admin/addBlogPostProcess',array('class'=>"form-horizontal")); ?>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Blog Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" placeholder="Blog Title" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="category" class="col-sm-3 control-label">Category</label>
                <div class="col-sm-9">
                    <select id="category" name="category" class="form-control">
                        <option>Select Category</option>
                        <?php foreach($categories as $category){
                            ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->category; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">body</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" placeholder="Body of Blog Post. Leave blank if not applicable." name="description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="excerpt" class="col-sm-3 control-label">Excerpt</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="excerpt" placeholder="Excerpt of Blog Post. Leave blank if not applicable." name="excerpt"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Published date</label>
                <div class="col-sm-2">
                    <select class="form-control" name="day">
                        <?php for($i=1; $i<=31;$i++){
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="month">
                        <?php for($i=1; $i<=12;$i++){
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>

                <div class="col-sm-3">
                    <select class="form-control" name="year">
                        <?php
                        $year = date('Y',time());
                        for($i=$year+5; $i>=$year-10;$i--){
                            ?>
                            <option value="<?php echo $i; ?>"
                                <?php if($i == $year){ echo 'selected'; }  ?>><?php echo $i; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputFile">Featured image</label>
                <div class="col-sm-9">
                    <input type="file" id="InputFile" name="userFile">
                    <p class="help-block">only .jpg pics. Leave it blank if not applicable</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Add New Blog Post</button>
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
    CKEDITOR.replace( 'description' );

    // Replace the <textarea id="excerpt"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'excerpt' );
</script>
</body>
</html>