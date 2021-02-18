<?php     
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operationscomplaintremarks extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record($id)
        {
            global $db;
            if(isset($_POST['btn_addremarks']))
            {
                $Remarks = $db->check($_POST['remarks']);
                $Status = $db->check($_POST['status']);
                $User = $db->check($_POST['user']);
                $Complaint_ID = $id;
   
                if($this->insert_record($Remarks,$Status,$Complaint_ID, $User))
                {
                    echo '<div class="alert alert-success"> Remarks Has Been Saved :) </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($Remarks,$Status,$Complaint_ID, $User)
        {
            global $db;
            $user = $_SESSION["username"];
            $query = "INSERT INTO `complaintremarks`(`remarks`, `status`, `complaint_id` , `user`) VALUES ('$Remarks','$Status','$Complaint_ID', '$user')";
           
            $query2=" UPDATE `complaint` SET `status`='$Status' where complaint_id='$Complaint_ID'";
        
            if($User!="")
            {
                $query3="update complaint set user_id='$User' where complaint_id='$Complaint_ID'";  
                mysqli_query($db->connection,$query3);
            }
            mysqli_query($db->connection,$query2);
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
        

        // Get Particular Record
        public function get_record($id)
        {
            global $db;
            $sql = "SELECT * FROM `complaintremarks` WHERE complaint_id=$id";
            $data = mysqli_query($db->connection,$sql);
            $b=mysqli_fetch_assoc($data);
            return $data;

        }
    }




?>