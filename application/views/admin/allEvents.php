<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 19/10/2015
 * Time: 7:48 PM
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
            <table id="table" class="table table-hover">
                <thead>
                <th>Sno.</th>
                <th>Event</th>
                <th>Date</th>
                <th>Type</th>
                <th>Location</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <?php
                $id = 0;
                foreach($events as $event){
                    $id = $id +1;
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $event->title; ?></td>
                        <td><?php echo date('d : M : Y',$event->date); ?></td>
                        <td><?php echo $event->type; ?></td>
                        <td><?php echo $event->city.' '.$event->country; ?></td>
                        <td>
                            <a href="<?php echo site_url('event/view/'.$event->id); ?>">
                                <button type="button" class="btn btn-success">View</button>
                            </a>
                            <a href="<?php echo site_url('admin/editEvent/'.$event->id); ?>">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                            <a href="<?php echo site_url('admin/deleteEvent/'.$event->id); ?>">
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