<?php session_start() ?>

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
    <?php include('headerUser.php') ?>
    <main>
        <form action="" id="fff" method="POST">
            <section class="welcome">
                <label for="ID">Patron Id </label>
                <input type="text" id="Patron" name="Patron" 
                    value=<?php  
                    echo  $_SESSION['PatronID'] ?>
                readonly>
                <label for="firstname">First Name </label>
                <input type="text" id="firstname" name="Firstname">
                <label for="streetAddress">Street Address </label>
                <input type="text" id="streetAddress" name="StreetAddress">
                <label for="State">State </label>
                <input type="text" id="State"  name="State">
                <label for="CellPhone">CellPhone</label>
                <input type="tel" id="CellPhone" name="CellPhone">
                <br>
            </section>
            <section class="login">
                <label for="lastname">Last Name</label>
                <input type="text" id="Lastname"  name="Lastname">  
                <label for="city">City</label>
                <input type="text" id="city" name="City">
                <label for="Zipcode">Zipcode </label>
                <input type="text" id="Zipcode" name="Zipcode">
                <input type="submit" value="Edit" id="submit" name="edit" >             
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
      
       
       
        $result = mysqli_query($con,"SELECT `Patron_PK_Patronid`,`FristName`, `LastName`, `StreetAddress`, `City`, `State`, `ZipCode`, `CellPhone`, `Email` ,`Password`
            from Patron
            where Patron_PK_Patronid=".$_SESSION['PatronID']);

        $query=mysqli_fetch_array($result);
        
          echo " 
            <script>
                     
                var id=document.getElementById('Patron')
                var fname = document.getElementById('firstname');
                var lname = document.getElementById('Lastname');
                var streetAddress = document.getElementById('streetAddress');
                var city = document.getElementById('city');
                var state = document.getElementById('State');
                var zipcode =  document.getElementById('Zipcode');
                var Cellphone = document.getElementById('CellPhone');
               
              
            
                id.value= $query[Patron_PK_Patronid]
                fname.value= '$query[FristName]'
                lname.value = '$query[LastName]'
                streetAddress.value='$query[StreetAddress]'
                city.value='$query[City]'
                state.value='$query[State]'
                zipcode.value ='$query[ZipCode]'
                CellPhone.value='$query[CellPhone]'
                
        
        </script>";


        
        if(isset($_POST['edit']))
        { 
            $sql="UPDATE patron 
            set FristName='$_POST[Firstname]',  
            LastName='$_POST[Lastname]', 
            StreetAddress='$_POST[StreetAddress]',
             City='$_POST[City]', 
            `State`='$_POST[State]', 
            ZipCode='$_POST[Zipcode]', 
            CellPhone='$_POST[CellPhone]'
            where Patron_PK_Patronid=$_POST[Patron] ";

            mysqli_query($con, $sql);
            
               echo"<script type='text/javascript'> 
                    location.replace('ticket.php')
                    </script>";
        }

           
        
        mysqli_close($con);
      


	?>

</body>
</html>

