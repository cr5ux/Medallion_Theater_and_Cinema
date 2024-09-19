<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Update</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="PatronReg.css">
</head>
<body>
    <?php include('headerAdmin.html') ?>

    <main>
        <form action="" id="fff" method="POST">
            <section class="welcome">
                <label for="CatId">Category Id</label>
                <input type="text" id="CatId" name="CatId">
                <label for="CatName">Category Name</label>
                <input type="text" id="CatName" name="Catname">
                <label for="Price">Price</label>
                <input type="text" id="Price" name="Price" >
            </section>
            <section class="login">
                <input type="submit" value="Search" id="submit" name="search">
                <input type="submit" value="Edit" id="submit" name="edit">

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
        if(isset($_POST['search']))
        {
            $result = mysqli_query($con,"SELECT * from SeatCategory where SeatCategory_PK_CategoryId =".$_POST['CatId']);

            $query=mysqli_fetch_array($result);
        
            echo " 
                <script>
                var id=document.getElementById('CatId')
                var catname = document.getElementById('CatName');
                var price = document.getElementById('Price'); 
                
                id.value=$query[SeatCategory_PK_CategoryId]
                catname.value='$query[Category_Name]'
                price.value='$query[Price]'
                   
                </script>";


        }
        ?>
    
</body>
</html>