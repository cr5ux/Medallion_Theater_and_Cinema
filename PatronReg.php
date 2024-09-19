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
    <header>
        <p></p>
        <nav>
            <ul id="nav">
                <li><a href="PatronReg.php">Sign Up</a></li>
                <li><a href="HomePage.php">Home</a></li>
                <li><a href="Admin.php">Admin</a></li>
            </ul>
        </nav>

    </header>
    <main>
        <form action="" id="fff" method="POST">
            <section class="welcome">
                <label for="ID">Patron Id </label>
                <input type="text" id="Patron" name="Patron" 
                    value=<?php  
                    $con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343"); 
                    $result = mysqli_query($con,'SELECT max(Patron_PK_Patronid) as id from patron;');
                    $id=mysqli_fetch_array($result);
                    
                    echo $id['id']+1; ?>
                >
                <label for="firstname">First Name </label>
                <input type="text" id="firstname" name="Firstname">
                <label for="streetAddress">Street Address </label>
                <input type="text" id="streetAddress" name="StreetAddress">
                <label for="State">State </label>
                <input type="text" id="State"  name="State">
                <label for="CellPhone">CellPhone</label>
                <input type="tel" id="CellPhone" name="CellPhone">
                <input type="submit" value="Register" id="submit"  name="register" >
                <br>
            </section>
            <section class="login">
                <label for="lastname">Last Name</label>
                <input type="text" id="Lastname"  name="Lastname">  
                <label for="city">City</label>
                <input type="text" id="city" name="City">
                <label for="Zipcode">Zipcode </label>
                <input type="text" id="Zipcode" name="Zipcode">
                <label for="Email">Email</label>
                <input type="email" id="Email" name="Email">
                <label for="password">Password</label>
                <input type="password" id="password" name="pword">             
            </section>
        </form>
        <br>
        <br>
        <br>
        <br>
        <p>Notice!  Search then Edit </p>
    </main>


    <?php
		$con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343");


		if (!$con)
		{
			die('Could not connect: ' . mysqli_connect_error());
           
		}
      
           
        if(isset($_POST['register']))
        {       
            $sql="INSERT INTO patron (`FristName`,  `LastName`, `StreetAddress`, `City`, `State`, `ZipCode`, `CellPhone`, `Email`,`Password`) 
            
                VALUES ('$_POST[Firstname]','$_POST[Lastname]','$_POST[StreetAddress]','$_POST[City]','$_POST[State]','$_POST[Zipcode]','$_POST[CellPhone]','$_POST[Email]','$_POST[pword]')";

               mysqli_query($con, $sql);

               echo"
                    <script type='text/javascript'> 
                    location.replace('PatronReg.php')
                    </script>";

        }
      
           
        
        mysqli_close($con);
      


	?>

</body>
</html>

