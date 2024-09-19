<?php
    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();


    if(isset($_POST['search']))
    {
    
        $SearchQuery="select Movies_PK_Movie_Id, Image,Movie_Name from Movies where Movie_Name like '$_POST[search]%'";
        $result= $db->query($SearchQuery);

        while ($row=$result->fetch_assoc())
        {   
            if($row==" ")
            {
                echo "No Results"; //??should be corrected
            }
            else
            {  echo "<tr>
                <td style=\"background-image: url('Images/$row[Image]');
                background-repeat:no-repeat;
                background-size:100% 100%;
                height:70px;width:50%;\">
                </td>
                <td>
                    $row[Movie_Name]<br>
                    <a href='registerview.php?id=$row[Movies_PK_Movie_Id]' style=\" color:#22223b;\">PLAY</a></td>
                </tr>";

            }
          
        };

       
    }


?>