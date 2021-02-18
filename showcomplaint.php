<?php 
require_once("header.php");
require_once('./config/dbconfig.php');
$db = new operationscomplaint();
$result=$db->view_record();
?> 
<div class="content-wrapper">
    <div class="container-fluid">
   
        <div class="row">
                <div class="col-xl-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                                <div class="custom-title text-center"><h3>Complaints</h3></div>
                            </div>
                        </div>
                        <div class="card-body- pt-3 pb-4">
                        
                            <div class="table-responsive">
                                <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                    <thead>
                                    <tr>
                                    <th>Dairy No</th>
                                    <th>  Title</th>
                                    <th>  CNIC Number</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th  >View</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                    <th>Dairy No</th>
                                    <th>  Title</th>
                                    <th>  CNIC Number</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th  >View</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    
                                    <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                    <td><?php echo $data['dairynumber'] ?></td>
                                    <td><?php echo $data['complainttitle'] ?></td>
                                    <td><?php echo $data['cnicno'] ?></td>
                                    
                                    <td><?php echo $data['priority']; if($data['status']=="inprocess"){ ?></td>
                                    
                                    <td><button type="button" class="btn btn-warning">In Process</button></td>
                                    <?php } else if($data['status']=="closed"){?>
                                        <td><button type="button" class="btn btn-success">Closed</button></td>
                                        <?php } else{?>
                                            <td><button type="button" class="btn btn-danger">Not process yet</button></td>
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
require_once("footer.php");
?>