<?php
    session_start();

    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();
  
    if(isset($_POST['comment']))
    {   
        // $s = "Select Comment from movieviewed where MovieViewed_PK_View_Id=$_POST[ViewID]";
        
        // $s=$db->query($s);
        // $s=$s->fetch_assoc();

        // $comment=$s['Comment']."\n".$_POST['comment'];
        // $sql="UPDATE movieviewed
        //       SET Comment='$comment' 
        //       WHERE MovieViewed_PK_View_Id=$_POST[ViewID]";
          

        // $db->query($sql);
        $sql="INSERT INTO `comment`(`Comment`, `Date`, `MovieViewed_FK_View_Id`)
                     VALUES ('$_POST[comment]',curdate(),'$_POST[ViewID]')";
            
        $db->query($sql);
        $qu ="call MovieComment($_POST[id])";

        $res=$db->query($qu);
        
        while ($row=$res->fetch_assoc())
        {   
            echo "<tr width:100%>
                    <td>$row[FristName]  $row[LastName]<br>
                        $row[COMMENT]</td> 
                 </tr>";
        };

    }  
?>