<?php 
   require_once("header.php");
   require_once('./config/dbconfig.php');
$db = new operationscomplaint();

$result1234=$db->view_expiredcomplaints();

?>
<div class="content-wrapper">
<div class="container-fluid">

<div class="row">
        <div class="col-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Expired Complaints (Need Attention)</div>
                    </div>
                </div>
                <div class="card-body- pt-3 pb-4">
                        
                            <div class="table-responsive">
                                <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Dairy No</th>

                                        <th>  Title</th>
                                        <th>Phone No</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                    <th>Dairy No</th>
                                    <th>  Title</th>
                                    <th>Phone No</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th  >Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    
                                    <?php 
                                    while($data = mysqli_fetch_assoc($result1234))
                                    {
                                ?>
                                    <td><?php echo $data['dairynumber'] ?></td>
                                    <td><?php echo $data['complainttitle'] ?></td>
                                    <td><?php echo $data['contactno'] ?></td>
                                    <td><?php echo $data['priority'] ?></td>
                                    <?php
                                    if($data['status']==null)
                                    {
                                    ?>
                                    <td><button type="button" class="btn btn-danger">Not process yet</button></td>
                                    <?php }else{
                                      
                                        ?>
                                        <td><button type="button" class="btn btn-warning">In Process</button></td>
                                    <?php }?> 
                                    
                                   <td><a href="complaintdetail.php?C_ID=<?php echo $data['complaint_id'] ?>" >Detail</a></td>
                            </tr>
                            <?php
                                    }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
        </div>
     
    </div>
</div>
</div>
</div>

<?php
require_once('footer.php');
?>