<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 20/10/2015
 * Time: 3:57 PM
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
        <?php if($this->session->flashdata('error')){
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="well alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
        <?php
        } ?>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table id="table" class="table table-hover">
                <thead>
                <th>Sno.</th>
                <th>Slide title</th>
                <th>Slide Description</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <?php
                $id = 0;
                foreach($slides as $slide){
                    $id = $id +1;
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $slide->heading; ?></td>
                        <td><?php echo $slide->content; ?></td>
                        <td>
                            <a href="<?php echo site_url('admin/editSlide/'.$slide->id); ?>">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                            <a href="<?php echo site_url('admin/deleteSlide/'.$slide->id); ?>">
                                <button type="button" class="btn btn-warning">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('includes/js/bootstrap.js'); ?>"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url("includes/includes/DataTables/css/jquery.dataTables.css"); ?>">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="<?php echo base_url("includes/includes/DataTables/js/jquery.js"); ?>"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="<?php echo base_url("includes/includes/DataTables/js/jquery.dataTables.js"); ?>"></script>

<!--- DataTable initailize -->
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>
</body>
</html>