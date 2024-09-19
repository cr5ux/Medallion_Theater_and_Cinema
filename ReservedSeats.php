<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="PatronReg.css">
    <link rel="stylesheet" href="TicketRep.css">


</head>
<body>
    <?php include('headerAdmin.html') ?>


    <main>
        <form action="" id="fff" method="POST">
            <section class="welcome">
                <label for="tikId">Ticket Id</label>
                <input type="text" id="tikId" name="tikId" >
                <!-- <label for="PatId">Patron Id</label>
                <input type="text" id="PatId" name="Patid"> -->

            </section>
            <section class="login">
                <input type="submit" value="Purchase" id="submit" name="Purchase">
                <input type="submit" value="Cancel" id="submit" name="Cancel">
            </section>
        </form>
      

        <p>Notice!  Search then Edit</p>
    </main>

    <?php
		$con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343");


		if (!$con)
		{
			die('Could not connect: ' . mysqli_connect_error());
           
		}
        $result = mysqli_query($con, "SELECT * from Reserved; ");
        
        echo "<table cellpadding=5  cellspacing=0>  <tr>
                <td>Ticket Id</td>
                <td>Patron Id</td>
                <td>Performance Id</td>
                <td>Date</td>
                <td>Seat_No</td>
                <td>Price </td>
        
        </tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['Tickets_PK_TicketId'] . "</td>";
            echo "<td>" . $row['Patron_FK_PatronId'] . "</td>";
            echo "<td>" . $row['Performance_FK_PerformanceId'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>";
            echo "<td>" . $row['Seat_No'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td><a href='Purchase.php ?Tikid=$row[Tickets_PK_TicketId]' style=\" color:#22223b;font-size:20px\"><u>Purchase<u></a></td>";
            echo "<td><a href='cancel.php ?Tikid=$row[Tickets_PK_TicketId]' style=\" color:#22223b;font-size:20px\"><u>Cancel</u></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        
           
        if(isset($_POST['Purchase']))
        {       
            $sql="UPDATE Tickets
                  SET Purchased='1'
                  WHERE Tickets_PK_TicketId=$_POST[tikId]";

               mysqli_query($con, $sql);
               echo"
               <script type='text/javascript'> 
               location.replace('ReservedSeats.php')
               </script>";

        }
        if(isset($_POST['Cancel']))
        {       
            $sql="UPDATE Tickets
                  SET Reserved='0'
                  WHERE Tickets_PK_TicketId=$_POST[tikId]";

               mysqli_query($con, $sql);
               echo"
               <script type='text/javascript'> 
               location.replace('ReservedSeats.php')
               </script>";

        }
        mysqli_close($con);

    ?>
    
    </body>
</html>
