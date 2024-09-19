<?php

    class connect 
    {

        protected $host='localhost';
        private $username='root';
        private  $password='april232002';
        private  $db='madelliontheathercs343';
    
        function  __construct()
        {
    
        }
        function  getconnection()
        {
            $conn=new mysqli($this->host,$this->username,$this->password,$this->db);
            if($conn->connect_error)
            {
                die('there is a connection error!'.$conn->connect_error);
            }
            return $conn;
        }
    


        
    }














?>