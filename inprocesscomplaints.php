<?php 
require_once("header.php");
if($_SESSION['role']=='Admin' || $_SESSION['role']=='AC' || $_SESSION['role']=='UP' ){
require_once('./config/dbconfig.php');
$db = new operationscomplaint();
$result=$db->view_recordinprocess();
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
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                    <td><?php echo $data['dairynumber'];
                                    if ($_SESSION['userid'] == $data['user_id'] and $_SESSION['role'] == 'UP') { ?>
                                        <div class="text-right" style=" padding-left:-50px; margin-top:-20px;"> <span style=" background-color:lawngreen;">Assigned To Me</span> </div>
                                    <?php } ?> </td>
                                    <td><?php echo $data['complainttitle'] ?></td>
                                    <td><?php echo $data['contactno'] ?></td>
                                    <td><?php echo $data['priority'] ?></td>
                                    <td><button type="button" class="btn btn-warning">In Process</button></td>
                                    
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
}else {
                  
    ?> <script>
    $(document).ready(function(){
        $("#exampleModal").modal('show');
    });
   </script>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alert!</h5>
                                    
                                </div>
                                <div class="modal-body">
                                Insufficient Privileges!
                                </div>
                                <div class="modal-footer">
                                <a  href="index.php" class="btn btn-primary">Okay</a>
                                </div>
                            </div>
                        </div>
                    </div>
   <?php
   
}
require_once("footer.php");
?>