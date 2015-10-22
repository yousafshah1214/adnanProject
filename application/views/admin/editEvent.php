<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 20/10/2015
 * Time: 11:28 AM
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
            <h2 class="text-center">Edit Event</h2>
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
            <?php echo form_open_multipart('admin/editEventProcess',array('class'=>"form-horizontal")); ?>
            <input type="hidden" value="<?php echo $event->id; ?>" name="id">
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Event Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $event->title; ?>" id="title" placeholder="Event Title" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" placeholder="Description about event. Leave blank if not applicable." name="description"><?php echo $event->description; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="col-sm-3 control-label">Type</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="type" value="<?php echo $event->type; ?>" placeholder="Event Type" name="type">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputCity">City</label>
                <div class="col-sm-9">
                    <input type="text" id="InputCity" value="<?php echo $event->city; ?>" class="form-control" name="city" placeholder="City">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputCountry">Country</label>
                <div class="col-sm-9">
                    <input type="text" id="InputCountry" value="<?php echo $event->country; ?>" class="form-control" name="country" placeholder="Country">
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Event Title</label>
                <div class="col-sm-2">
                    <select class="form-control" name="day">
                        <?php for($i=1; $i<=31;$i++){
                            ?>
                            <option value="<?php echo $i; ?>"
                                <?php
                                    if(date('d',$event->date) == $i){
                                        echo "selected";
                                    }
                                ?>
                                ><?php echo $i; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="month">
                        <?php for($i=1; $i<=12;$i++){
                            ?>
                            <option value="<?php echo $i; ?>"
                                <?php
                                if(date('n',$event->date) == $i){
                                    echo "selected";
                                }
                                ?>
                                ><?php echo $i; ?></option>
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
                                <?php
                                if(date('Y',$event->date) == $i){
                                    echo "selected";
                                }
                                ?>
                                ><?php echo $i; ?></option>
                        <?php
                        } ?>
                    </select>
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
                    <button type="submit" class="btn btn-primary">Save Event</button>
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