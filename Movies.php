<?php
    session_start();

    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();

  
    $query="Select Image from Movies";

    $result = $db->query($query);
    $data=[];
    $i=0;
    while($row=$result->fetch_assoc())
    {
        $data[$i]="Images/".$row['Image'];

        $i++;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    
    <link rel="stylesheet" href="PatronReg.css">
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="TicketRep.css">
    <!-- <script src="search.js"></script> -->
   
</head>
<body>
    <?php include('headerUserSearch.php') ?>
    <main>   
        <section class="welcome" style="justify-content:space-between">
            <!-- <button class="bu pre" style="background-color:transparent;border:none;color:white;font-weight:bold;font-size:32px"><</button>
            <button class="bu next" style="background-color:transparent;border:none;color:white;font-weight:bold;font-size:32px">></button> -->
            <script type="text/javascript">
                    let pre=document.querySelector('.pre');
                    let next=document.querySelector('.next');
                    let welcome=document.querySelector('.welcome');

                    let imgs = <?php echo json_encode($data);?>

                   
                    let current=0;
                    
                    welcome.style.backgroundImage=`url('${imgs[current]}')`;
                    welcome.style.backgroundRepeat='no-repeat';
                    welcome.style.backgroundSize='100% 100%';
                    welcome.style.height='70vh';
                   
                    let imgLength=imgs.length-1

                    // pre.addEventListener('click',function()
                    // {    
                    //     current<0?current=imgLength-1:current--;
                    //     welcome.style.backgroundImage=`url('${imgs[current]}')`;
                        
                    // })
                    // next.addEventListener('click',function()
                    // {   
                    //     current>imgLength-1?current=0:current++;
                    //     welcome.style.backgroundImage=`url('${imgs[current]}')`;
                           
                    // })

                    var timer=setInterval(function()
                    {
                        welcome.style.backgroundImage=`url('${imgs[current]}')`;
                        current++;
                        if(current==imgs.length)
                        {
                            current=0
                        }
                    },1500)
                   
            </script>        
        </section>
        <section class="login" id="login" style="background-color:transparent">
            <table cellspacing=0>
            <?php
                $qu ="select Movies_PK_Movie_Id, Image, Movie_Name, Writer, Director,
                Producer,Duration,Movie from Movies";

                $res=$db->query($qu);

                while ($row=$res->fetch_assoc())
                {   
                    echo "<tr width:100%>
                            <td style=\"background-image: url('Images/$row[Image]');
                                       background-repeat:no-repeat;
                                       background-size:100% 100%;
                                       height:50vh;width:50%;\"> 
                                </td>
                            <td> 
                                $row[Movie_Name] <br> Writer:
                                $row[Writer] <br> Director: 
                                $row[Director] <br> Producer:
                                $row[Producer] <br> Duration: 
                                $row[Duration] <br><br><br><br>
                            <a href='registerview.php?id=$row[Movies_PK_Movie_Id]' style=\" color:#22223b;\">PLAY</a></td>
                         </tr>";
                }
            ?>
            </table>
        </section>
    </main>

</body>
</html>


<script>
    var searchForm=document.getElementById('s');
    var search=document.getElementById('Search');
    var searched=document.getElementById('searchedMovie')  
    searchForm.addEventListener('submit',function(e){
        e.preventDefault();
        var xhttp= new XMLHttpRequest();

        xhttp.open('POST','search.php',true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.onload=function()
        {  
           searched.innerHTML=this.responseText;
           setTimeout(() => {
            searched.innerHTML="";
            }, "10000");
        
            
        }

        xhttp.send('search='+search.value);
   
         
    }
    )
    search.addEventListener('search',function(){
  
        var xhttp= new XMLHttpRequest();

        xhttp.open('POST','search.php',true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

        xhttp.onload=function()
        {
            searched.innerHTML=this.responseText;
            setTimeout(() => {
            searched.innerHTML="";
            }, "10000");
        }
        xhttp.send('search='+search.value);
    
    }
    )

</script>    