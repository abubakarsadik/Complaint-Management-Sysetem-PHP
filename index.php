<?php
require_once("header.php");
require_once('./config/dbconfig.php');
$db = new operationscomplaint();
$result123 = $db->view_mustresolvedtoday();
$result1234 = $db->view_expiredcomplaints();

?>
<div class="content-wrapper">

    <!--creative states-->
    <div class="creative-state-area">
        <div class="row">
            <div class="col-lg-7 col-12">
                <h4 class="creative-state-title">Overall Complaints Report</h4>
            </div>
            <div class="col-lg-5  col-12 text-lg-right">
                <div class="row short-states mb-lg-0 mb-4">


                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class=" bg-danger text-center pull-left">

                </div>
                <div class="creative-state-info text-center pull-left">
                    <h3 class="mt-4"><?php echo $result3 + $result + $result2 + $result4; ?></h3>
                    <p class="mb-0">Total Complaints</p>



                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class=" bg-warning text-center pull-left">

                </div>
                <div class="creative-state-info text-center pull-left">
                    <h3 class="mt-4"><?php echo $result2; ?></h3>
                    <p class="mb-0">Resolved Complaints</p>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class=" bg-purple text-center pull-left">
                </div>
                <div class="creative-state-info text-center pull-left">
                    <h3 class="mt-4"><?php echo $result3 + $result; ?></h3>
                    <p class="mb-0">Pending Complaints</p>

                </div>
            </div>
        </div>
    </div>
    <!--/creative states-->

    <div class="container-fluid">

        <!--sales report & active user-->
        <div class="row">
            <div class="col-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title">Complaint Need Attention (Must Resolve Today)</div>
                        </div>
                    </div>
                    <div class="card-body- pt-3 pb-4">

                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Dairy No</th>

                                        <th> Title</th>
                                        <th>Phone No</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Dairy No</th>
                                        <th> Title</th>
                                        <th>Phone No</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    while ($data = mysqli_fetch_assoc($result123)) {
                                    ?>
                                        <td><?php echo $data['dairynumber'];
                                            if ($_SESSION['userid'] == $data['user_id'] and $_SESSION['role'] == 'UP') { ?>
                                                <div class="text-right" style=" padding-left:-50px; margin-top:-20px;"> <span style=" background-color:lawngreen;">Assigned To Me</span> </div>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $data['complainttitle'] ?></td>
                                        <td><?php echo $data['contactno'] ?></td>
                                        <td><?php echo $data['priority'] ?></td>
                                        <?php
                                        if ($data['status'] == null) {
                                        ?>
                                            <td><button type="button" class="btn btn-danger">Not process yet</button></td>
                                        <?php } else {

                                        ?>
                                            <td><button type="button" class="btn btn-warning">In Process</button></td>
                                        <?php } ?>

                                        <td><a href="complaintdetail.php?C_ID=<?php echo $data['complaint_id'] ?>">Detail</a></td>
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
        <!--/sales report & active user-->





    </div>
    <?php
    require_once('footer.php');
    ?>