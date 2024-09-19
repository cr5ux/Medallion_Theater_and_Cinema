<?php
    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();

     
    if(isset($_GET['val']))
    {   
      
        $sqlSeat ="SELECT SeatDetail.*
        from  SeatDetail
        where SeatDetail.SeatId NOT IN
        (SELECT  Seats_FK_SeatId
        FROM  Tickets, SeatDetail
        WHERE SeatDetail.SeatId = Tickets.Seats_FK_SeatId AND 
        (Tickets.Reserved='1' or Tickets.Purchased='1') AND 
        Tickets.Performance_FK_PerformanceId='$_GET[val]');";
    

        $result= $db->query($sqlSeat);
        
         $array=[];
         $i=0;
        while($row = $result->fetch_assoc())
        {
            $array[$i]["SeatId"]=$row["SeatId"];
            $array[$i]["Seat_No"]=$row["Seat_No"];
            $array[$i]["Category_Name"]=$row["Category_Name"];
            $array[$i]["Price"]=$row["Price"];
         
            $i++;
           
        }
      
          echo json_encode($array);

    } 
    
   

 ?>   