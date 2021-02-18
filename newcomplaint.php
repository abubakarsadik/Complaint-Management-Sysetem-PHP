<?php
require_once("header.php");
if($_SESSION['role']=='Entery Operator' ){
require_once('./config/dbconfig.php');
$db = new operationscomplaint();
$db4 = new operationsuser();

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title text-center">
                                <h2>New Complaint</h2>
                            </div>
                        </div>
                    </div>
                    <?php
                    $db->Store_Record();
                    ?>
                    <div class="card-body">
                        <div class="stepy-tab" style="margin-top:-10px; margin-bottom:-10px;">
                            <ul id="default-titles" class="stepy-titles">
                                <li id="default-title-0" class="current-step">
                                    <div>Step 1</div>
                                </li>
                                <li id="default-title-1" class="">
                                    <div>Step 2</div>
                                </li>
                                <li id="default-title-2" class="">
                                    <div>Step 3</div>
                                </li>

                            </ul>
                        </div>
                        <form class="" method="POST" id="default" enctype="multipart/form-data">
                            <fieldset title="Step1" class="step" id="default-step-0">
                                <legend> </legend>

                                <h3>Personal Information</h3>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>First Name</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Last Name</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-4 col-form-label col-form-label-sm" required><b>Father Name</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fathername" class="form-control" placeholder="Father Name">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-4 col-form-label col-form-label-sm" required><b>CNIC Number</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="cnic" class="form-control" placeholder="CNIC Number">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-4 col-form-label col-form-label-sm" required><b>Contact Number</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="phone" class="form-control" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="city"><b>City</b></label>
                                        <select class="form-control" id="city" name="city" >
                                            <option value="">Select City</option>
                                           
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="user"><b>Assigned To</b></label>
                                        <select class="form-control" id="user" name="user">
                                        <option value="">Select User</option>
                                      
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 col-form-label col-form-label-sm" required><b>Address</b></label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="address" placeholder="Address" row="2"></textarea>
                                    </div>
                                </div>

                            </fieldset>
                            <fieldset title="Step 2" class="step" id="default-step-1">
                                <legend> </legend>
                                <h5 class="mb-3">
                                    <h3>Complaint Information</h3>
                                </h5>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-4 col-form-label col-form-label-sm" required><b>Complaint Title</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="title" class="form-control" placeholder="Complaint Title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 col-form-label col-form-label-sm" required><b>Dairy Number</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="dairyno" class="form-control" placeholder="Dairy Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country"><b>Main Category</b></label>
                                        <select id="mcat"  class="form-control" name="maincat">
                                            <option value="">Select Main Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="state"><b>Subategory</b></label>
                                        <select id="scat"  class="form-control" name="subcat">
                                        <option value="">Select Subcategory</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-4 col-form-label col-form-label-sm" required><b>Complaint Detail</b></label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="detail" placeholder="Complaint Detail" row="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Attachment</b></label>
                                    <div class="col-sm-12">
                                        <input type="file" name="file" class="form-control"  >
                                    </div>
                                </div>

                            </fieldset>

                            <fieldset title="Step3" class="step" id="default-step-0">
                                <legend> </legend>

                                <h3>Additional Information</h3>
                                <br>
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="city"><b>Priority</b></label>
                                        <select class="form-control" id="priority" name="priority">
                                            <option value="Null">Select Priority</option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Last Date To Reply</b></label>
                                        <div class="input-group date dpYears" data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?php date("Y-m-d") ?>">
                                            <input type="text" class="form-control" placeholder="2020-12-23" aria-label="Right Icon" name="date" aria-describedby="dp-ig">
                                            <div class="input-group-append">
                                                <button id="dp-ig" class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar f14"></i></button>
                                            </div>
                                        </div>
                                    </div>




                            </fieldset>

                            <input type="submit" class="finish btn btn-danger" name="btn_complaint" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        function loadData(type, mcatid) {
            $.ajax({
                url: "config/catsubcat.php",
                type: "POST",
                data: {
                    type: type,
                    id: mcatid
                },
                success: function(data) {
                    if (type == "mcat") {
                        $("#scat").html(data);
                    } else {
                        $("#mcat").append(data);
                    }

                }
            });
        }

        loadData();

        $("#mcat").on("change", function() {
            var mcat = $("#mcat").val();

            if (mcat != "") {
                loadData("mcat", mcat);
            } else {
                $("#scat").html("");
            }


        })
    });
</script>


<?php
}
require_once("footer.php");
?>

<script type="text/javascript">
    $(document).ready(function() {
        function loadData2(type, city) {
            $.ajax({
                url: "config/cityuser.php",
                type: "POST",
                data: {
                    type: type,
                    id: city
                },
                success: function(data) {
                    if (type == "user") {
                        $("#user").html(data);
                    } else {
                        $("#city").append(data);
                    }

                }
            });
        }

        loadData2();

        $("#city").on("change", function() {
            var city = $("#city").val();

            if (city != "") {
                loadData2("user", city);
            } else {
                $("#user").html("");
            }


        })
    });
</script>

