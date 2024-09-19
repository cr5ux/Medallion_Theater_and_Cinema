
<?php
    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();




    if(isset($_POST['Value']))
    {
        $like ="Call InsertLiked($_POST[ViewID],$_POST[Value])";

        $db->query($like);
       
    }
        //No of Likes 
            
    $Liked=$db->query("Call MovieLiked($_POST[id])")  ;  
    $Liked=$Liked->fetch_assoc(); 
    while(mysqli_next_result($db)){;}
    
    if(!isset($Liked['Total']))
    {
        $Liked['Total']=0;
    
    }

    //No of Dislikes    
    $DisLiked=$db->query("Call MovieDisLiked($_POST[id])") ;    
    $DisLiked=$DisLiked->fetch_assoc();
    while(mysqli_next_result($db)){;}

    if(!isset($DisLiked['Total']))
    {
        $DisLiked['Total']=0;
    }

     $array =array(intVal($Liked['Total']), intVal($DisLiked['Total']));
        
    echo json_encode($array);
    
    

?>