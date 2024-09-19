<?php

    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();
    session_start();

    
    $tikid=$_GET['Tikid'];
    $patid =$get['patid'];

    $sql="UPDATE Tickets
    SET Purchased='1'
    WHERE Tickets_PK_TicketId=$_POST[tikId]" ;

    $db->query($sql);
    
  
    
    header ('Location: ReservedSeats.php' );

?>