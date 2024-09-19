<?php 
    session_start();
    include('Connection.php');
    $con=new connect;
    $db=$con->getconnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="HomePage.css"> 
</head>
<body>
    <?php include('headerUser.php') ?>
    <main>
        <form action="" id="fff" method="POST">
            <section class="welcome">
                Old Password <input type="password" id="old"name="Old">
                <br>
                <br>
                <br>
            </section>
            <section class="login">
               New Password <input type="password" id="newpassword" name="new">
               Confirm Password <input type="password" id="confpassword" name="conf">
                <br><br><br>
                <button type="submit" id="submit" name="change" reload="false"> Change</button>
            </section>
        </form>
    </main>

</body>
</html>
<?php

    if(isset($_POST['change']))
    {
        $query="Select Password from patron where Patron_PK_PatronId=$_SESSION[PatronID]";

        $result=$db->query($query);
        $result=$result->fetch_assoc();

        if($result['Password']==$_POST['Old'])
        {
            if($_POST['new']==$_POST['conf'])
            {
              $update= "UPDATE patron 
                        set  Password='$_POST[conf]'
                        where Patron_PK_Patronid=$_SESSION[PatronID]";

              $db-> query($update) ;
              
              echo "<script> alert('Password Changed')</script>";
              echo"<script type='text/javascript'> 
              location.replace('ticket.php')
              </script>";
            }
            else
            {
                echo "<script> alert('New Passwords not Similar')</script>";
            }
        }
        else
        {
            echo "<script> alert('Incorrect Old Password')</script>";
        }

    }


?>