<?php 
require_once("header.php");
if($_SESSION['role']=='Admin'){
require_once('./config/dbconfig.php');
$db = new operationscategory();
?>  
 <div class="content-wrapper">
<div class="container-fluid">
               <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                    <div class="custom-title-wrap bar-primary">
                                        <div class="custom-title text-center"><h3> Add Category</h3></div>
                                    </div>
                                </div>
                                <?php $db->Store_Record(); ?>
                                <div class="card-body">
                                <div class="col-md-12"> 
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail11"><b>Category Name</b></label>
                                            <input type="input" name="cat_name" class="form-control rounded-0" placeholder="Enter Category Name">
                                          
                                        </div>
                                        </div>
                                      <div class="col-md-12">  
                                        <div class="text-right">
                                            <button type="submit" name="btn_addcat" class="btn btn-purple rounded-0">Add Category</button>
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