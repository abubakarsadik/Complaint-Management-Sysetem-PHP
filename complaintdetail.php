<?php 

require_once('./config/dbconfig.php');
if(isset($_GET['C_ID'])){
$db = new operationscomplaint();
$db2 = new operationscomplaintremarks();
$id=$_GET['C_ID'];
$result=$db->get_record($id);
$data = mysqli_fetch_assoc($result);
}else{
    header("location:index.php");
}
require_once("header.php");
$result2=$db2->get_record($id);

?> 

<div class="content-wrapper">
    <div class="container-fluid">
<div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                            <div class="custom-title text-center"><h3>Complaint Detail</h3></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                               
                                <tbody>
                                <tr>
                                    <th>Title:</th>
                                    <th scope="col" colspan="3" ><?php echo $data['complainttitle']; ?></th>
                                   
                                </tr>
                                <tr>
                                     <th  >Status:</th>
                                    <td ><?php if($data['status']==NULL)
											{ echo "Not Process Yet";
                                            } else {
										 echo $data['status'];
										 }?></td>
                                    <th  >Assigned To:</th>
                                    <td ><?php echo $data['fname']." ".$data['lname']; ?></td>
                                    
                                </tr>
                                <tr>
                                    <th>Dairy Number:</th>
                                    <td><?php echo $data['dairynumber']; ?></td>
                                    <th>Priority:</th>
                                    <td><?php echo $data['priority']; ?></td>
                                </tr>
                                <tr>
                                     <th>Complaint Date:</th>
                                    <td><?php echo $data['date']; ?></td>
                                    <th>Solve Before:</th>
                                    <td><?php echo $data['lastdatetoreply']; ?></td>
                                </tr>
                                <tr>
                                     <th>Category:</th>
                                    <td><?php echo $data['categoryname']; ?></td>
                                    <th>SubCategory:</th>
                                    <td><?php echo $data['subcategoryname']; ?></td>
                                </tr>
                                <tr>
                                     <th colspan="1" >Complaint Description:</th>
                                    <td colspan="3"><?php echo $data['description']; ?></td>
                                    
                                </tr>
                                <tr>
                                     <th colspan="1" >Attachment:</th>
                                    <td colspan="3"><?php $cfile=$data['attachment'];
                                            if($cfile=="" || $cfile=="NULL")
                                            {
                                            echo "File NA";
                                            }
                                            else{?>
                                            <a href="<?php echo ($data['attachment']);?>" target="_blank"> View File</a>
                                            <?php } ?>
                                    </td>
                                    
                                </tr>
                              
                                
                                <tr>
                                   <b> <th colspan="4" style="text-align:center; font-size:20px">Personal Infromation</th></b>
                                </tr>
                                <tr>
                                     <th> First Name:</th>
                                    <td><?php echo $data['firstname']; ?></td>
                                    <th>Last Name:</th>
                                    <td><?php echo $data['lastname']; ?></td>
                                </tr>
                                <th>Father Name:</th>
                                    <td><?php echo $data['fathername']; ?></td>
                                     <th>City:</th>
                                    <td><?php 
                                    
                                    
                                    
                                    echo $data['cityname'];
                                    
                                    ?></td>
                                    
                                </tr>
                                <tr>
                                     <th>CNIC Number:</th>
                                    <td><?php echo $data['cnicno']; ?></td>
                                    <th>Contact Number:</th>
                                    <td><?php echo $data['contactno']; ?></td>
                                </tr>                            
                                <tr>
                                     <th colspan="1" >Address:</th>
                                    <td colspan="3"><?php echo $data['address']; ?></td>
                                    
                                </tr>
                                <tr>
                                   <b> <th colspan="4" style="text-align:center; font-size:20px">Remarks</th></b>
                                </tr>
                                <?php 
                               $con= mysqli_connect('localhost','root','','cms_sgd');
               $query="SELECT * FROM `complaintremarks` WHERE complaint_id='$id'";
              
               $result123 = mysqli_query($con, $query);
              
                                while($dataremarks = mysqli_fetch_assoc($result123) )
                                {
                                    
                                 ?> 
                                  <tr>
                                     <th  >Remarks From:</th>
                                    <td><?php echo $dataremarks['user']; ?></td>
                                    <th  >Remarks Date:</th>
                                    <td><?php echo $dataremarks['date']; ?></td>
                                    
                                </tr>
                       
                                <tr  class="alert alert-success" >
                                     <th colspan="1" >Remarks:</th>
                                    <td colspan="3"><?php echo $dataremarks['remarks']; ?></td>
                                    
                                </tr>
                                 <?php 
                                 
                                 }                        
                                ?>
                                 <tr>
                                     <th colspan="1" >Action:</th>
                                    <td colspan="3"><?php if($data['status']=="closed" || $_SESSION["role"]=="Entery Operator"){?>
                                        <button type="button" class="btn btn-primary" disabled>Take Action</button>
                               
                               <?php     } else {?> 

                             <a href="action.php?C_ID=<?php echo $data["complaint_id"];  ?>">   <button type="button" class="btn btn-primary">Take Action</button></td>
                                <?php } ?>
                            </td>
                                    
                                </tr>

                             
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    </div>
<?php
require_once("footer.php");
?>