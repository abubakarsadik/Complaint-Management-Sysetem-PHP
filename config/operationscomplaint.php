<?php     
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operationscomplaint extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_complaint']))
            {
                $FirstName = $db->check($_POST['firstname']);
                $LastName = $db->check($_POST['lastname']);
                $FatherName = $db->check($_POST['fathername']);
                $Cnic = $db->check($_POST['cnic']);
                $Phone = $db->check($_POST['phone']);
                $City = $db->check($_POST['city']);
                $MainCat = $db->check($_POST['maincat']);
                $SubCat = $db->check($_POST['subcat']);
                $User = $db->check($_POST['user']);
                $Date = $db->check($_POST['date']);
                $Address = $db->check($_POST['address']);
                $Title = $db->check($_POST['title']);
                $DairyNo = $db->check($_POST['dairyno']);
                $Detail = $db->check($_POST['detail']);
                $Priority= $db->check($_POST['priority']);
                
       /*         if($_FILES['file']['size']>0)
                {
                   
                    $File= "Files/".$this->generateRandomString();
                move_uploaded_file($_FILES['file']['tmp_name'],$File);
                }
                else
                {
                    $File = "";
                }
                */

                if($_FILES['file']['size']>0)
                {
                    $temp = $_FILES["file"]["name"];
                    $newfilename =rand(1111111111,9999999999).$temp;
                    $File= "Files/".$newfilename;
                move_uploaded_file($_FILES['file']['tmp_name'],$File);
                }
                else
                {
                    $File = "";
                }
       
               

                if($this->insert_record($FirstName,$LastName,$FatherName,$Cnic,$Phone,$City,$MainCat,$SubCat,$File,$User,$Date,$Address,$Title,$DairyNo,$Detail,$Priority))
                {
                    ?> <script>
                    $(document).ready(function(){
                        $("#exampleModal").modal('show');
                    });
                   </script>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                                                    
                                                </div>
                                                <div class="modal-body">
                                                    Complaint Added Successfully!
                                                </div>
                                                <div class="modal-footer">
                                                <a  href="newcomplaint.php" class="btn btn-primary">Okay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                   <?php
                   
                }
                else
                {?>
                 <script>
                    $(document).ready(function(){
                        $("#exampleModal").modal('show');
                    });
                   </script>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Failed!</h5>
                                                   
                                                </div>
                                                <div class="modal-body">
                                                    Failed To Add New Complaint!
                                                </div>
                                                <div class="modal-footer">
                                                    <a  href="newcomplaint.php" class="btn btn-primary">Okay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                <?php } 
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($FirstName,$LastName,$FatherName,$Cnic,$Phone,$City,$MainCat,$SubCat,$File,$User,$Date,$Address,$Title,$DairyNo,$Detail,$Priority)
        {
            global $db;
            $query = "INSERT INTO `complaint` ( `complainttitle`, `dairynumber`, `firstname`, `lastname`, `fathername`, `contactno`, `address`, `priority`, `description`, `category_id`, `subcategory_id`, `user_id`, `city`, `attachment`, `cnicno`, `lastdatetoreply`) VALUES 
            ( '$Title', '$DairyNo', '$FirstName', '$LastName', '$FatherName', '$Phone','$Address', '$Priority', '$Detail', '$MainCat', '$SubCat', '$User', '$City', '$File', '$Cnic','$Date')";
            $result = mysqli_query($db->connection,$query);
      
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        // View All Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from complaint";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }
        public function view_recordnotprocess()
        {
            global $db;
            $date=date('Y-m-d');
            $uid=$_SESSION['userid'];
            if($_SESSION["role"]=='AC'){
                $query = "select * from complaint where complaint.status is null and (complaint.lastdatetoreply>'$date' or complaint.lastdatetoreply='$date') and complaint.user_id=$uid";
                $result = mysqli_query($db->connection,$query);
                return $result;
            }else{

            $query = "select * from complaint where complaint.status is null and (complaint.lastdatetoreply>'$date' or complaint.lastdatetoreply='$date')";
            $result = mysqli_query($db->connection,$query);
            return $result;
            }
        }





        public function view_recordinprocess()
        {
            global $db;
            $date=date('Y-m-d');
            $uid=$_SESSION['userid'];
            if($_SESSION["role"]=='AC'){
                $query = "select * from complaint where complaint.status='inprocess' and (complaint.lastdatetoreply>'$date' or complaint.lastdatetoreply='$date') and user_id=$uid";
             $result = mysqli_query($db->connection,$query);
                return $result;
            }else{
            $query = "select * from complaint where complaint.status='inprocess' and (complaint.lastdatetoreply>'$date' or complaint.lastdatetoreply='$date') ";
            $result = mysqli_query($db->connection,$query);
            return $result;
            }
        }




        public function view_recordclosed()
        {
            global $db;
            $uid=$_SESSION['userid'];
            
            if($_SESSION["role"]=='AC'){
                $query = "select * from complaint where complaint.status='closed' and user_id=$uid";
                $result = mysqli_query($db->connection,$query);
                return $result;
            }else{
            $query = "select * from complaint where complaint.status='closed' ";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }
    }
        public function view_mustresolvedtoday()
        {
            global $db;
            $date=date('Y-m-d');
            $uid=$_SESSION['userid'];
            
            if($_SESSION["role"]=='AC'){
                $query = "select * from complaint where (complaint.status='inprocess' or complaint.status is null) and complaint.lastdatetoreply='$date' and user_id=$uid";
                $result = mysqli_query($db->connection,$query);
                return $result;
            }else{
            $query = "select * from complaint where (complaint.status='inprocess' or complaint.status is null) and complaint.lastdatetoreply='$date'";
            $result = mysqli_query($db->connection,$query);
            return $result;
            }
        }

        public function view_expiredcomplaints()
        {
            global $db;
            $date=date('Y-m-d');
            $uid=$_SESSION['userid'];
            
            if($_SESSION["role"]=='AC'){
                $query = "select * from complaint where (complaint.status='inprocess' or complaint.status is null) and complaint.lastdatetoreply<'$date' and complaint.user_id=$uid;";
                $result = mysqli_query($db->connection,$query);
                return $result;
            }else{
            $query = "select * from complaint where (complaint.status='inprocess' or complaint.status is null) and complaint.lastdatetoreply<'$date'";
            $result = mysqli_query($db->connection,$query);
            return $result;
            }
        }

        // Get Particular Record
        public function get_record($id)
        {
            global $db;
            $sql = "select complaint.*, user.firstname as fname, user.lastname as lname, city.* , category.* , subcategory.* from complaint join user on user.user_id=complaint.user_id join category on category.category_id=complaint.category_id JOIN subcategory on subcategory.subcategory_id=complaint.subcategory_id join city on city.city_id=complaint.city where complaint.complaint_id='$id' ";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Delete Record
        public function Delete_Record($id)
        {
            global $db;
            $query = "delete from user where user_id='$id'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function generateRandomString($length = 20) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

      

    }




?>