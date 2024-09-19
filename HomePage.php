<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madellion Theater</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <main class="main">
        <section class="welcome">
            <p> <Span>Welcome!</Span><br>To Medallion Theater</p>
        </section>
        <section class="login">
            <form action="" method="POST" >
                <label for="Email">Email</label><br>
                <input type="Email" id="Email" name="Email">
                <br>
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" id="password" name="pword">
                <br><br><br>
                <input type="submit" value="Log in" id="submit" name="login">
            </form>
            <p><a href="PatronReg.php"> Have No Account? Sign up</a> </p>
        </section>
    </main>
    <br><br>
    <footer>
        <a href="Admin.php"><i class='fas fa-usr-circle'>Admin</i></a> <br>
        <aside>
            <a href="https://www.facebook.com" class="fa fa-facebook"></a>
            <a href="https://www.twitter.com" class="fa fa-twitter"></a>
            <a href="https://www.instagram.com" class="fa fa-instagram"></a>
            <a href="https://www.pinterest.com" class="fa fa-pinterest"></a>
        </aside>
    </footer>
    
</body>
</html>

<?php
        $con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343");


		if (!$con)
		{
			die('Could not connect: ' . mysqli_connect_error());
           
		}

        if(isset($_POST['login']))
        {  
             
            $sql="SELECT Patron_PK_PatronId as ID,Email, FristName, LastName
                    From Patron 
                    where  Email = '$_POST[Email]' AND Password='$_POST[pword]'";
            $result=mysqli_query($con, $sql);
            $login = mysqli_fetch_assoc($result); 
           
            if($login==null)
            {
                echo "<script>
                    alert('Error Wrong password or username')
                    </script>";
            } 
            else
            {   
                $_SESSION['PatronID']=$login['ID']; 
                $_SESSION['Email']=$_POST['Email'];
                $_SESSION['FullName']=$login['FristName']." ".$login['LastName'];

                echo"
                    <script type='text/javascript'> 
                    location.replace('ticket.php')
                    </script>";
            } 

               

        }
    ?>