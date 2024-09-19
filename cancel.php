<?php

    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();
    session_start();

    $tikid=$_GET['Tikid'];
    $patid =$_GET['patid'];

    $sql="UPDATE Tickets
          SET Reserved='0'
          WHERE Tickets_PK_TicketId=$tikid";

    $db->query($sql);
    
  
    
    header ('Location: ReservedSeats.php' );

?>