<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();
 

    class operationscity extends dbconfig
    {
       
       
        // View Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from city";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }
    }




?>