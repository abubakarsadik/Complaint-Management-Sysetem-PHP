<?php 
   
    require_once('./config/operationscategory.php');
    require_once('./config/operationsuser.php');
    require_once('./config/operationssubcategory.php');
    require_once('./config/operationscomplaint.php');
    require_once('./config/operationscomplaintremarks.php');
    require_once('./config/operationscity.php');
    class dbconfig
    {
        public $connection;

        public function __construct()
        {
            $this->db_connect();
        }
       
        public function db_connect()
        {
            $this->connection = mysqli_connect('localhost','root','','cms_sgd');
            if(mysqli_connect_error())
            {
                die(" Connect Failed ");
            }
        }

        public function check($a)
        {
            $return = mysqli_real_escape_string($this->connection,$a);
            return $return;
        }


    }




?>