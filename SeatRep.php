<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Report</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="PatronReg.css">
    <link rel="stylesheet" href="TicketRep.css">
</head>
<body>
    <?php include('headerAdmin.html') ?>
    <main>
        <?php
            $con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343");
            if (!$con)
            {
                die('Could not connect: ' . mysqli_connect_error());
            }
            $result = mysqli_query($con, "SELECT * from soldTickets;");
            echo "<table cellpadding=5  cellspacing=0>  <tr>
                <td>Performance_Id</td>
                <td>Production Name</td>
                <td>Performance Time</td>
                <td>Performance Date</td>
                <td>No of Seats Sold</td> 
            </tr>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['PerformanceId'] . "</td>";
                echo "<td>" . $row['Production_Name'] . "</td>";
                echo "<td>" . $row['Time'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['TicketSold'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($con);
        ?>

</main>
        
</body>
</html>