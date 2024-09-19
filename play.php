<?php 
   echo "<script>alert('Payment Completed!!') </script>";
    session_start();
 
    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();

    //$id=$_SESSION['vid'];
    $id=$_GET['id'];

    $query="SELECT Movie FROM Movies 
            WHERE Movies_PK_Movie_Id=$id";

    $result=$db->query($query);
    $movie=$result->fetch_array();

  //Get View ID

  $ViewID=$db->query('Select max(MovieViewed_PK_View_Id) as ViewID from movieviewed ');
  $ViewID=$ViewID->fetch_assoc();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>

    <link rel="stylesheet" href="movies.css">
    <link rel="stylesheet" href="PatronReg.css">
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="TicketRep.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- <script src="search.js"></script> -->
</head>

<body>
    <?php include('headerUserSearch.php') ?>
  
    <main>
        <div class="mmain"> 
            <section class="welcome" id="fgf" >
                <video id="Movie" controls>
                    <source src=
                        <?php 
                            echo " \"Video/$movie[Movie]\" 
                                ";
                        ?>
                        >
                        Your browser does not support the video tag.
                                
                </video>  
            </section>
            <section class="login" id="fgf" style="display:flex;flex-direction:row;justify-content:left;color:black;height:30px;">
                <p id="view">view</p>

                <form id="likeform" style="display:flex;flex-direction:row;">
                    <button type="submit" id='like' name='like'  style='margin-top:20px;height:20px;background-color:transparent;font-family:time new roman; font-size:14px;color:black;border:none;' > LIKE</button>
                    <p id="LikeValue"> </p>
                </form>    
                <form id="disform" style="display:flex;flex-direction:row;">
                    <button type="submit" id='dis' name='dislike'  style='margin-top:20px;height:20px;background-color:transparent;font-family:time new roman; font-size:14px;color:black;border:none;' >DISLIKE </button>
                    <p id="DisLikeValue"> </p>
                </form>
            
            </section>
            <section class="login" id="fgf" style="display:flex;flex-direction:row;justify-content:left;color:black;padding-top:10px">
                <form id="Formm">
                    <input type="textarea" name="comment" id="comment" value="Comment">
                    <input type="submit" name="submit" id="sub" value="Go" style="width:30px;">
                <form>
                <table cellspacing=0 id="commentTable">
                    <?php
            
                        $qu ="call MovieComment($id)";

                        $res=$db->query($qu);

                        while ($row=$res->fetch_assoc())
                        {   
                            echo "<tr>
                                    <td>$row[FristName]  $row[LastName]<br>
                                        $row[COMMENT]<br></td> 
                                </tr>";
                        };
                        while(mysqli_next_result($db)){;}
                    ?>
                </table>
            </section>
        </div>         
        <section class="movie">
            <table cellspacing=0>
                <?php
                    $qu ="select Movies_PK_Movie_Id, Image from Movies";

                    $res=$db->query($qu);

                    while ($row=$res->fetch_assoc())
                    {   
                        echo "<tr width:100%>
                                <td style=\"background-image: url('Images/$row[Image]');
                                        background-repeat:no-repeat;
                                        background-size:100% 100%;
                                        height:40vh;width:100%;\"> 
                                        <a href='registerview.php ?id=$row[Movies_PK_Movie_Id]' style=\"color:white;font-weight:900;display:flex;justify-content:center\" >PLAY</a></td> 
                            </tr>";
                    }
                ?>
                </table>
        </section>
    </main>
</body>
</html>

<?php
     
    
     //No of Views
                       
     $Views ="Call MovieView($id);";
   
     $ViewResult=$db->query($Views); 
    
     $Res=$ViewResult->fetch_assoc();
     
     while(mysqli_next_result($db)){;}
     echo "<script>

             var p=document.getElementById('view')   
             p.textContent='Views:$Res[Total]'
     
             </script>";

 //No of Likes 
    
     $Liked=$db->query("Call MovieLiked($id);") ;    
     $Liked=$Liked->fetch_assoc(); 
     while(mysqli_next_result($db)){;}
     
     if(!isset($Liked['Total']))
     {
        $Liked['Total']=0;
      
     }
     echo "<script>
             var like=document.getElementById('LikeValue')   
             like.textContent='$Liked[Total]'
             
         </script> ";
         
 
 //No of Dislikes    
     $DisLiked=$db->query("Call MovieDisLiked($id);") ;    
     $DisLiked=$DisLiked->fetch_assoc();
     while(mysqli_next_result($db)){;}

    if(!isset($DisLiked['Total']))
    {
        $DisLiked['Total']=0;
    }
     echo "<script>
             var dislike=document.getElementById('DisLikeValue')   
             dislike.textContent='$DisLiked[Total]'
         </script>"; 
      
   
 ?>  
<script type="text/javascript">
        
        var like=document.getElementById('like')
        var dislike=document.getElementById('dis')
    
        
        var form=document.getElementById('Formm');
        var likeForm=document.getElementById('likeform');
        var disForm=document.getElementById('disform');
        var comment=document.getElementById('comment')

        form.addEventListener('submit',function(e)
        {   e.preventDefault();

            var xhttp = new XMLHttpRequest();
        
            var value=<?php echo $ViewID['ViewID']; ?>;
            var id=<?php echo $id; ?>;
            xhttp.open("POST","comment.php",true);
            xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhttp.onload=function()
            {              
                document.getElementById('comment').value='Comment';
                document.getElementById('commentTable').innerHTML=this.responseText;
            }
      
            xhttp.send("id="+id+"&comment="+document.getElementById('comment').value+"&ViewID="+value);
            
      
            
        }

        )

        var LikeValue= document.getElementById('LikeValue')
        var DisLikeValue=document.getElementById('DisLikeValue')
        
    
        likeForm.addEventListener('submit',function(e)
        {   
            e.preventDefault();
            var id=<?php echo $id; ?>;
            var xhttp = new XMLHttpRequest();
        
            var value=<?php echo $ViewID['ViewID']; ?>;
            xhttp.open("POST","like.php",true);
            xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhttp.onload=function()
            { 
            
                var data = JSON.parse(this.responseText);
                LikeValue.textContent=data[0];
                DisLikeValue.textContent=data[1];

            }
    
            xhttp.send("id="+id+"&Value=1&ViewID="+value);

        }
        )
        disForm.addEventListener('submit',function(e)
        {   e.preventDefault();

            var id=<?php echo $id; ?>;
            var xhttp = new XMLHttpRequest();
        
            var value=<?php echo $ViewID['ViewID']; ?>;
            xhttp.open("POST","like.php",true);
            xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhttp.onload=function()
            { 
                var data = JSON.parse(this.responseText);
              
                LikeValue.textContent=data[0];
                DisLikeValue.textContent=data[1];
            }
    
            xhttp.send("id="+id+"&Value=0&ViewID="+value);

        }
        )
       

        like.addEventListener('click',function()
        {  
            like.style.backgroundColor="green";
            dislike.style.backgroundColor="transparent";

          
        })

        dislike.addEventListener('click',function()
        {
            dislike.style.backgroundColor="green";
            like.style.backgroundColor="transparent";

             
        })

        var searchForm=document.getElementById('s');
        var search=document.getElementById('Search');
        var searched=document.getElementById('searchedMovie');

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

            xhttp.send('search='+search.value)
        
            
        }
        )
        search.addEventListener('input',function(){
    
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
        
        }
        )


    </script>






