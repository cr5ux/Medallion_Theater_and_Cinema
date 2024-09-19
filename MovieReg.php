<?php
    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="PatronReg.css">
</head>
<body>
    <?php include('headerAdmin.html') ?>
    <main>
        <form action="" id="fff" method="POST" enctype="multipart/form-data">
            <section class="welcome">
                <label for="ID">Movie Id </label>
                <input type="text" id="ID" name="ID" 
                    value=<?php  
                    
                    $result = $db->query('SELECT max(Movies_PK_Movie_Id) as id from movies;');
                    $id=$result->fetch_assoc();
                    
                    echo $id['id']+1; ?>
                >
                <label for="Writer">Writer </label>
                <input type="text" id="Writer" name="Writer">
                <label for="Producer">Producer</label>
                <input type="text" id="Producer" name="Producer">
                <label for="Buget">Budget</label>
                <input type="text" id="Budget" name="Budget">
                <label for="CellPhone">CellPhone</label>
                <input type="tel" id="CellPhone" name="CellPhone">
                <label for="Image">Image</label>
                <input type="file" id="Image" name="Image" accept="image/*">
                <input type="submit" value="Register" id="submit"  name="register"   class="reg">
                <br>
            </section>
            <section class="login">
                <label for="Moviename">Movie_Name</label>
                <input type="text" id="Moviename"  name="Moviename">  
                <label for="Director">Director</label>
                <input type="text" id="Director" name="Director">
                <label for="Duration">Duration </label>
                <input type="text" id="Duration" name="Duration">
                <label for="Email">Email</label>
                <input type="email" id="Email" name="Email">
                <label for="Video">Movie</label>
                <input type="file" id="Video" name="Video" accept="video/*">
               
                <input type="submit" value="Search" id="submit" name="search">
                <input type="submit" value="Edit" id="submit" name="edit" >             
            </section>
        </form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p>Notice!  Search then Edit </p>
    </main>

</body>
</html>

<?php
    
  

    if(isset($_POST['search']))
    {
        $search ="Select * from Movies 
        where Movies_PK_Movie_Id=$_POST[ID]";
    
        $resultSearch=$db->query($search) ;

        $query=$resultSearch->fetch_assoc();
        
        echo " 
            <script>

                var reg= document.getElementsByClassName('reg')
                alert(reg);
                reg[0].style.visibility='hidden';
                     
                var id=document.getElementById('ID')
                var Moviename = document.getElementById('Moviename');
                var Writer = document.getElementById('Writer');
                var Director = document.getElementById('Director');
                var Producer = document.getElementById('Producer');
                var Duration = document.getElementById('Duration');
                var Budget = document.getElementById('Budget');
                var Cellphone = document.getElementById('CellPhone');
                var email = document.getElementById('Email');
                
                
            
                id.value= $query[Movies_PK_Movie_Id]
                Moviename.value= '$query[Movie_Name]'
                Writer.value = '$query[Writer]'
                Director.value='$query[Director]'
                Producer.value='$query[Producer]'
                Duration.value='$query[Duration]'
                Budget.value='$query[Budget]'
                CellPhone.value='$query[Cellphone]'
                email.value='$query[Email]'
        
        </script>";
    }

    if(isset($_POST['register']))
    {   
       
            $Image_Name=$_FILES['Image']['name'];
            $ImageTemp=$_FILES['Image']['tmp_name'];
            $ImageFolder='Images/'.$Image_Name;
    
            $Video_Name=$_FILES['Video']['name'];
            $VideoTemp=$_FILES['Video']['tmp_name'];
            $VideoFolder='Video/'.$Video_Name;
    
            $insert="INSERT INTO `movies`( `Image`, `Movie_Name`, `Writer`, `Director`, `Producer`, `Duration`, `Budget`, `Movie`, `Cellphone`, `Email`) 
                 VALUES ('$Image_Name','$_POST[Moviename]','$_POST[Writer]','$_POST[Director]','$_POST[Producer]','$_POST[Duration]',".doubleval($_POST['Budget']).",'$Video_Name','$_POST[CellPhone]','$_POST[Email]')";
    
            $db->query($insert);
    
            move_uploaded_file($ImageTemp,$ImageFolder);
            move_uploaded_file($VideoTemp,$VideoFolder);
           
            echo"
                <script type='text/javascript'> 
                location.replace('MovieReg.php')
                </script>";

     
       

    }
    
    if(isset($_POST['edit']))
    {
        $update="UPDATE `movies` 
                SET `Image`='$_POST[Image]',
                    `Movie_Name`='$_POST[Moviename]',
                    `Writer`='$_POST[Writer]',
                    `Director`='$_POST[Director]',
                    `Producer`='$_POST[Producer]',
                    `Duration`='$_POST[Duration]',
                    `Budget`='".doubleval($_POST['Budget'])."',
                    `Movie`='$_POST[Video]',
                    `Cellphone`='$_POST[CellPhone]',
                    `Email`='$_POST[Email]' 
                WHERE Movies_PK_Movie_Id =$_POST[ID]";
        $db->query($update);
        echo"
            <script type='text/javascript'> 
            location.replace(MovieReg.php')
            </script>";
    }


?>

