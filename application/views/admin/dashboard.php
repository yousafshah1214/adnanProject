<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 18/10/2015
 * Time: 8:55 PM
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
            <?php if(validation_errors()){
                ?>
                <div class="well alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>
            <?php if($this->session->flashdata('error')){
                ?>
                <div class="well alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php
            } ?>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('includes/js/bootstrap.js'); ?>"></script>
</body>
</html>