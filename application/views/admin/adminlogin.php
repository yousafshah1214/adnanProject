<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 18/10/2015
 * Time: 7:03 PM
 */
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url("includes/images/favicon.ico"); ?>">

    <title>Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('includes/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Please Login</h3>
                </div>
            </div>
            <?php if(!is_null($this->session->flashdata('error'))){
                ?>
                <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error'); ?></div>
            <?php
            } ?>
            <?php echo form_open('adminlogin/verify'); ?>
                <div class="form-group">
                    <label for="InputUsername">Username</label>
                    <input type="text" class="form-control" id="InputUsername" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url("includes/js/ie10-viewport-bug-workaround.js"); ?>"></script>
</body>
</html>
