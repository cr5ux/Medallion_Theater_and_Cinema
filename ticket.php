<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="PatronReg.css">
    <link rel="stylesheet" href="ticket.css">
    <script src="jquery.js"></script>
</head>
<body>
    <?php include('headerUser.php') ?>
    <main>
        <form action="" id="fff" method="POST">
            <section class="welcome">
                <label for="Patron">Patron Id </label>
                <input type="text" id="Patron" name="Patron" value=<?php echo $_SESSION['PatronID']; ?> readonly>
               
                <label for="production">Production</label>
                <select id="production" name="Prod" >
                    <option value="" selected>---select---</option>
                    <?php

                        $con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343");

                        $sqlProd ="SELECT *FROM  ProdDetail ORDER BY PerformanceId";
                        $result= mysqli_query($con, $sqlProd);

                        while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['PerformanceId'] . "'>" . $row['Production_Name'].' /' . $row['Production_Type'].' / '  . $row['Time'] .'  /' . $row['Date'] .'  /'. $row['PerformanceId']."</option>";
                        }  
                       
                    ?>
                </select>
    
                <label for="payment">Payment Option</label>
                <select id="payment" name="Payment">
                    <option selected>--Select--</option>
                    <option value="Reserved">In Cash</option>
                    <option>Bank of ABC</option>
                    <option>Bank of XYZ</option>
                    <option>Bank of RST</option>
                </select>
    
            </section>
            <section class="login">
                <label for="Ticket">Ticket Id</label>
                <input type="text" id="Ticket"  value=<?php  
                    $con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343"); 

                    $result = mysqli_query($con,'SELECT max(Tickets_PK_TicketId) as id from Tickets');
                    
                    $id=mysqli_fetch_array($result);
                   
    
                    if(empty($id)) 
                    {   
                        $id=0;
                    }
                   
                    
                    echo $id['id']+1;
                ?>
                readonly>

                <label for="Seat">Seat</label>
                <select id="Seat" name="Seat">
                    <option value="hhh" selected>-SeatNo/CategoryName/Price---</option>
                </select>

                <label for="Email">Email</label>
                <input type="email" id="Email" value=<?php echo $_SESSION['Email'];?> name="email" readonly>
                <input type="submit" value="Book" id="submit" name="Book">
            </section>
        </form>
        <br>
        <br>
        <br>
        <br>
        <?php include('Seats.html') ?>
       
        <!-- <p>Notice!  Search then Edit </p> -->
    </main>
        <br>
       
        <br>
        <br>
        <br>
        <br>
        <br>
        <aside>
            <div id="one">Orchestra</div>
            <div id="two">Mezzanine</div>
            <div id="three">Balcony</div>
            <div id="four">Box</div>
        </aside>
       
  
</body>
</html>
<script>
    var prod=document.getElementById('production');
        prod.addEventListener("change", function()
        { 
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "PopulateSeat.php?val=" + prod.value, true);
            xhr.onload= function()
            {
               var data=[];
               data=JSON.parse(this.responseText)
               var seat=document.getElementById('Seat');
               var i=seat.options.length-1
               
               if(i!=0)
               {
                    while (seat.childNodes.length>1) 
                    {
                        seat.removeChild(seat.options[i]);
                        i--;
                    }
               }
                
                var j=0;
                
                while(j<data.length)
                {
                    var optionn = document.createElement('option');
                    optionn.textContent="'"+data[j]['Seat_No']+ " / " +data[j]['Category_Name']+"/ "+data[j]['Price']+"'";
                    optionn.value=data[j]['SeatId'] ;

                    seat.add(optionn);
                    
                    j++;
                }

            };
            xhr.send();
            
        });


 </script>   
<?php
    $con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343");

    if (!$con)
    {
        die('Could not connect: ' . mysqli_connect_error());
        
    }

          
    
    
    
    if(isset($_POST['Payment']))
    {
        if($_POST['Payment']==='Reserved')
        {
            $purchased=0;
            $reserved=1;
        }
        else if($_POST['Payment']!='Reserved')
        {
            $purchased=1;
            $reserved=0;
        }
    }
    
    
    
    
    if(isset($_POST['Book']))
    {
        $sql="INSERT INTO tickets(`Patron_FK_PatronId`, `Seats_FK_SeatId`, `Performance_FK_PerformanceId`, `Date`, `Reserved`, `Purchased`)
        Values('$_POST[Patron]','$_POST[Seat]','$_POST[Prod]',CURDATE(),' $reserved ','$purchased') ";
            mysqli_query($con, $sql);

            if($reserved==1)
            {
                mail($_POST['email'],"Ticket reserved", "You have Reserved ticket at the medallion theater at seat $_POST[Seat] on Date". date("Y/m/d"));
            }
            else if($purchased==1)
            {
                mail($_POST['email'],"Ticket Purchased","You have Purchased ticket at the medallion theater at seat $_POST[Seat] on Date". date("Y/m/d"));
            }
            
            echo $_POST['Prod'];
            echo"
            <script type='text/javascript'> 
            location.replace('ticket.php')
            </script>";
       
    }

        
?>