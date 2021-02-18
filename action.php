<?php
require_once("header.php");
if ($_SESSION['role'] == 'AC' || $_SESSION['role'] == 'UP') {
    require_once('./config/dbconfig.php');
    $id = $_GET["C_ID"];
    $db = new operationscomplaintremarks();
    $db2 = new operationsuser();

    $db3 = new operationscomplaint();
    $result = $db3->get_record($id);
    $data = mysqli_fetch_assoc($result);
    $city = $data['city'];
    if ($_SESSION['userid'] == $data['user_id'] or $_SESSION['role'] == 'UP'  ) {

?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title text-center">
                                <h3>Complaint Detail</h3>
                            </div>
                        </div>
                    </div>
                    <?php $db->Store_Record($id); ?>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form method="post">
                                <div class="form-group">
                                    <label for="status"><b>Status</b></label>
                                    <select class="form-control" id="staus" name="status">


                                        <option value="inprocess">In Process</option>
                                        <option value="closed">Closed</option>

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="remarks"><b>Remarks</b></label>

                                    <textarea name="remarks" class="form-control" id="remarks" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="msubcat"><b>Transfer Application</b></label>
                                    <select class="form-control" id="user" name="user">
                                        <option value=""> Select User</option>
                                        <?php
                                        $data2 = $db2->get_usercity($city);
                                        while ($data = mysqli_fetch_assoc($data2)) {

                                        ?>

                                            <option value="<?php echo $data['user_id']; ?>">

                                                <?php echo $data['firstname'] . " " . $data['lastname']; ?>

                                            </option>

                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>


                                <div class="col-md-12">
                                    <div>
                                        <a href="complaintdetail.php?C_ID=<?php echo $id ?>" class="btn btn-purple rounded-0">Back</a>
                                    </div>
                                    <div class="text-right" style="margin-top: -45px;">
                                        <button type="submit" name="btn_addremarks" class="btn btn-purple rounded-0">Add Remarks</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php
    } else {

    ?> <script>
            $(document).ready(function() {
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
                        <a href="index.php" class="btn btn-primary">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} else {

    ?> <script>
        $(document).ready(function() {
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
                    <a href="index.php" class="btn btn-primary">Okay</a>
                </div>
            </div>
        </div>
    </div>
<?php

}
require_once("footer.php");
?>