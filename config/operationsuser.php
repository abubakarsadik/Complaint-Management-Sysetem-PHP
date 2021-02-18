<?php     
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operationsuser extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_adduser']))
            {
                $FirstName = $db->check($_POST['firstname']);
                $LastName = $db->check($_POST['lastname']);
               
                $UserEmail = $db->check($_POST['email']);
                $Phone = $db->check($_POST['phone']);
                $City = $db->check($_POST['city']);
                $type = $db->check($_POST['type']);
                $Password = $db->check($_POST['password']);
            
                $query = "SELECT * FROM `user` where email='$UserEmail'";
                $result = mysqli_query($db->connection, $query);
                $row=mysqli_num_rows($result);
                if($row>0)
                {
                   echo '<div class="alert alert-danger"> User with same email already exsisted </div>';
                }
   
                else{


               if($this->insert_record($FirstName,$LastName,$UserEmail,$Phone,$City,$type,$Password))
                {
                  
                    ?> <script>
                    $(document).ready(function(){
                        $("#exampleModal").modal('show');
                    });
                   </script>
                   <?php 
                   $query="SELECT * from user ORDER BY user_id DESC LIMIT 1";
                   $result= mysqli_query($db->connection,$query);
                   $data=mysqli_fetch_assoc($result);
                   $name= $data['firstname']." ". $data['lastname'];
                   $pass=$data['password'];
                   $to=$data['email'];
                   $Body="Dear ".$name." Your Password for CMS Sargodha is ".$pass;
                   mail($to,"CMS Sargodha",$Body,$pass);

                   ?>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                                                    
                                                </div>
                                                <div class="modal-body">
                                                    User Added Successfully!
                                                </div>
                                                <div class="modal-footer">
                                                <a  href="adduser.php" class="btn btn-primary">Okay</a>
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
                                                    Failed To Add New User!
                                                </div>
                                                <div class="modal-footer">
                                                    <a  href="adduser.php" class="btn btn-primary">Okay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                <?php }
            }}
        }
        public function login()
        {
            global $db;
            if(isset($_POST['login']))
            {
                $Email = $_POST['email'];
                
                $Password =$_POST['password'];
                $query="SELECT * FROM `user` WHERE email='$Email' and password='$Password'";
      
                $result= mysqli_query($db->connection,$query);
                If(mysqli_num_rows($result)>0)
                {
                    session_start();
                    $data=mysqli_fetch_assoc($result);
                    $_SESSION["userid"] = $data['user_id'];
                    $_SESSION["username"] = $data['firstname']." ".$data['lastname'];
                    $_SESSION["role"]=$data['usertype'];
                    header("location:index.php");
                }
            }
        }
        // Insert Record in the Database Using Query    
        function insert_record($FirstName,$LastName,$UserEmail,$Phone,$City,$type,$Password)
        {
            global $db;
            $query = "INSERT INTO `user`( `firstname`, `lastname`, `email`, `contactno`, `city`, `usertype`, `password`) 
            VALUES ('$FirstName','$LastName','$UserEmail','$Phone','$City','$type','$Password')";

   
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

        public function changepassword()
        {
            global $db;
            $id=$_SESSION["userid"];
            if(isset($_POST['btn_change']))
            {
                
                $oldpass = $db->check($_POST['old_password']);
                $newpass = $db->check($_POST['new_password']);
                $query="select * from user where user_id=$id and password='$oldpass'";
                $result=mysqli_query($db->connection,$query);
           
                $no=mysqli_num_rows($result);
              
                if($no>0 )
               {
                $query = "UPDATE `user` SET `password`= '$newpass' WHERE user_id='$id'";
                if(mysqli_query($db->connection,$query))
                echo '<div class="alert alert-success"> Password Change Successfuly </div>';
               
               }
               else{
                echo '<div class="alert alert-danger"> Wrong Old Password </div>';
               
               }
      
        
            
        }
        }

        // View Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from user join city on city.city_id=user.city";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

          // View Database Record
          public function get_record($data)
          {
              global $db;
              $query = "select * from user where city='$data'";
              $result = mysqli_query($db->connection,$query);
              return $result;
          }

          public function get_usercity($data)
          {
              global $db;
              $query = "select * from user where city='$data' and user.usertype!='Entery Operator' and user.usertype!='Admin'";
              $result = mysqli_query($db->connection,$query);
              return $result;
          }
        
        // Delete Record
        public function Delete_Record($id)
        {
            global $db;
            echo $id;
            $query = "delete from user where user_id='$id'";
            $result = mysqli_query($db->connection,$query);
            if($result)
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
                                                    User Deleted Successfully!
                                                </div>
                                                <div class="modal-footer">
                                                <a  href="showuser.php" class="btn btn-primary">Okay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                   <?php
                   
                }
                else
                {?><script>
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
                                                    Failed To Delete User!
                                                </div>
                                                <div class="modal-footer">
                                                    <a  href="showuser.php" class="btn btn-primary">Okay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                <?php }
        }

        public function forgotpassword()
        {
            global $db;
            if (isset($_POST['forgot'])) {
    
                $Email = $_POST['email'];
                $query = "SELECT * FROM `user` WHERE email='$Email'";
    
                $result = mysqli_query($db->connection, $query);
                if (mysqli_num_rows($result) > 0) {
                    $data=mysqli_fetch_assoc(($result));
                   
                    $to=$data['email'];
                    $Password=$data['password'];
                    $Subject=" "."Password Reset";
                    $Body="Hi,".$data['firstname']." Your Paaword for this account is ".$data['password']."";
        
                  
                  
                   if(mail($to,$Subject,$Body,$Password)){
                        echo '<div class="alert alert-danger"> Password sent to your email.</div>';
                    }
               
    
                } else
                 {
                    
                    echo '<div class="alert alert-danger"> No account with this email.</div>';
                }
            }
        }

      

    }




?>