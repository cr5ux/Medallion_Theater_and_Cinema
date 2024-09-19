<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
            <form action="" method="POST">
                <label for="username">Username</label>
                <br>
                <input type="text" id="username" name="uname">
                <br>
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" id="password" name="pword">
                <br><br>
                <input type="submit" value="login" id="submit" name="login">
            </form>
        </section>  
    </main>
    <br><br><br>
    <footer>
        <a href="HomePage.php"><i class='fas fa-uses'>Users</i></a>
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

    $username='Admin';
    $password='123456';
    if(isset($_POST['login']))
    {
        if($_POST['uname']===$username)
        {   
            if($_POST['pword']===$password)
            { 
                // location.href='HomePage.php'
            //location.replace('https://www.google.com')
            echo "<script>
                window.location.assign('ReservedSeats.php')
                </script>";
            }
            else
            {
                echo "<script>
                alert('Password not correct')
                </script>";
            }
        }
        else if($_POST['login']!=$username)
        {   
            echo "<script>
            alert('Username not correct')
            </script>";
        }
    }

?>
