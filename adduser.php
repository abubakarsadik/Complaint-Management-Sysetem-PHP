<?php 
require_once("header.php");
if($_SESSION['role']=='Admin'){
require_once('./config/dbconfig.php');
$db = new operationsuser();
$db2= new operationscity();
$result= $db2->view_record();

?>  
 <div class="content-wrapper">
<div class="container-fluid">
               <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                    <div class="custom-title-wrap bar-primary">
                                        <div class="custom-title text-center"><h2> Add User</h2></div>
                                    </div>
                                </div>
                                <?php $db->Store_Record(); ?>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="first"><b>First Name</b></label>
                                                <input required type="input" name="firstname" class="form-control rounded-0" id="first" placeholder="First Name">
                                          
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="last"><b>Last Name</b></label>
                                                <input type="input" name="lastname" class="form-control rounded-0" id="last" placeholder="Last Name">
                                          
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email"><b>Email</b></label>
                                                <input type="email" name="email" class="form-control rounded-0" id="email" placeholder="exampale@email.com">
                                          
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone"><b>Contact Number</b></label>
                                                <input type="input" name="phone" class="form-control rounded-0" id="phone" placeholder="03xx xxxxxxx">
                                          
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-12" >
                                          <div class="form-group">
                                                <label for="city"><b>City</b></label>
                                                    <select class="form-control" id="city" name="city">
                                                    <option value="">Select City</option>
                                                    <?php 
                                                    while($data= mysqli_fetch_assoc(($result)))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $data['city_id'] ?>"><?php echo $data['cityname'] ?> </option>
                                                   
                                                    <?php } ?>
                                                    </select>
                                        
                                          </div>
                                        </div>

                                          <div class="col-md-12" >
                                          <div class="form-group">
                                                <label for="type"><b>User Type</b></label>
                                                    <select class="form-control" id="type" name="type">
                                                    <option value="NULL">Select Usertype</option>    
                                                     <option value="Admin">Admin</option>
                                                     <option value="Entery Operator">Entry Operator</option>
                                                     <option value="AC">AC or Lower Rank </option>
                                                     <option value="UP">Commissioner or Uper Rank </option> 
                                                        
                                                    </select>
                                        
                                          </div>
                                        </div>                                       
                                      
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="password"><b>Password</b></label>
                                                    <input required type="password" name="password" class="form-control" id="password" placeholder="Password" />
                                                </div>
                                        </div>
                                        <div class="col-md-12">

                                        <div class="text-right">
                                            <button type="submit" name="btn_adduser" class="btn btn-purple rounded-0">Add User</button>
                                        </div>
                                </div>
                                    </form>
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