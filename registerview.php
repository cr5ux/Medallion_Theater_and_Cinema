
<?php

    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();
    session_start();

    $Value=$_GET['id'];
   
    $InsertView ="Call InsertViewed($_SESSION[PatronID], $Value)";

    $db->query($InsertView);
    
    while(mysqli_next_result($db)){;}

   // $_SESSION['vid']=$Value;

   
    header ('Location: play.php?id='.$Value );
   

?>