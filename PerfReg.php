<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfomance</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="PatronReg.css">
    <link rel="stylesheet" href="TicketRep.css">
</head>
<body>
    <?php include('headerAdmin.html') ?>
    <main>
        <form action="" id="fff" method="POST">
            <section class="welcome">
                 <label for="perfid">Performance Id</label>
                <input type="text" id="perfId" name="perfId" 
                value=<?php  
                    $con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343"); 

                    $result = mysqli_query($con,'SELECT max(Performance_PK_PerformanceId) as id from Performance');
                    
                    $id=mysqli_fetch_array($result);
                   
    
                    if(empty($id)) 
                    {   
                        $id=0;
                    }
                   
                    
                    echo $id['id']+1;
                ?>>
                <label for="prodName">Production Name</label>
                <input type="text" id="prodName" name="prodName">
                <label for="type">Type</label>
                <select id="type" name="type">
                    <option> -- select--</option>
                    <option>Play</option>
                    <option>Musical</option>
                    <option>History</option>
                    <option>Comedy</option>
                    <option>Tradegy</option>
                    <option>Drama</option>
                    <option>Melodrama</option>
                    <option>Farce</option>
                </select>
                <br>
                <!-- <input type="submit" value="Search" id="submit" name="search"> -->
                <!-- <input type="submit" value="Edit" id="submit" name="edit"> -->
                
            </section>
            <section class="login">
                    <label for="perfTime">Performance Time</label>
                    <label><input type="radio" id="perfTime"  value="Mantiee" name="perfTime">Mantiee</label> 
                    <label><input type="radio" id="perfTime" value="Evening" name="perfTime">Evening</label>
                    <label for="perfEndDate">Performance Date</label>
                    <input type="date" id="perfEndDate" name="perfEndDate">
                    <br>
                    <br>
                    <input type="submit" value="Register" id="submit" name="Register">
                    <!-- <input type="submit" value="Delete" id="submit" name="Delete"> -->
            </section>
        </form>
        <!-- <p>Notice!  Search then Edit </p> -->
    </main>

    <?php
     
		$con = mysqli_connect("localhost", "root", "april232002","madelliontheathercs343");


		if (!$con)
		{
			die('Could not connect: ' . mysqli_connect_error());
           
		}
      
        $result = mysqli_query($con, "SELECT * from  ProductionDetail where Date >= curDate() ");
        
        echo "<br><BR><table cellpadding=5  cellspacing=0 id='table' >  <tr>
                <td>PerformanceId</td>
                <td>Production_Name</td>
                <td>Production_Type</td>
                <td>Time</td>
                <td>Date</td>
        </tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['PerformanceId'] . "</td>";
            echo "<td>" . $row['Production_Name'] . "</td>";
            echo "<td>" . $row['Production_Type'] . "</td>";
            echo "<td>" . $row['Time'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";   
        if(isset($_POST['Register']))
        {  
            $result = mysqli_query($con,"SELECT Production_PK_ProductionId as id from production where production_Name='$_POST[prodName]'");
            $id=mysqli_fetch_array($result);
           
          
            if(empty($id))
            {
                $sqlInsert="INSERT INTO production ( `production_Name`, `Production_Type`, `Active`)
                VALUES ('$_POST[prodName]','$_POST[type]','1')";

                  mysqli_query($con, $sqlInsert);
                
            }
            $result = mysqli_query($con,"select Production_PK_ProductionId from production where production_Name='$_POST[prodName]'");
            $id=mysqli_fetch_array($result);
            $id=(string)$id[0];
             

           $sqlll="INSERT INTO performance (`Time`, `Date`, `Production_FK_ProductionId`) 
           VALUES ('$_POST[perfTime]','$_POST[perfEndDate]','$id')";

         mysqli_query($con, $sqlll);

         echo"
         <script type='text/javascript'> 
         location.replace('PerfReg.php')
         </script>";
            

         }
       
        if(isset($_POST['edit']))
        {
            $sql="UPDATE performance
            set Time='$_POST[perfTime]', 
                Date='$_POST[perfEndDate]' 
            where Performance_PK_PerformanceId=$_POST[perfId]";

            mysqli_query($con, $sql);
               echo"
                    <script type='text/javascript'> 
                    location.replace('PerfReg.php')
                    </script>";
    

        }
   
           
        
        
      


	?>





</body>
</html>
<!-- <script>
    var tableRow=document.getElementsByTagName('tr')

    Array.from(tableRow).foreach((row,index)=>
    {
        tableRow.addEventListener('click',function()
        {
            alert('yaa')

        }
        )
    })
   


</script> -->


