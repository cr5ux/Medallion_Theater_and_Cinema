  

<link rel="stylesheet" href="PatronReg.css">
<link rel="stylesheet" href="header.css">
<header>
    <ul id="Plist"><li><a href="#"><?php echo $_SESSION['FullName']?></a></li>
            <ul id="list">
                <li><a href="editProfile.php">Edit Profile</a></li>
                <li><a href="ChangePassword.php">Change Password </a></li>
                <li><a href="HomePage.php">Log out</a></li>
            </ul>
    </ul>
    <section style="margin-left:10px">
        <form id="s">
            <input  type="search" name="Search" id="Search" value="Search">
        </form>
    </section> 
    
        <nav>
            <ul>
                <li><a href="ticket.php">Ticket</a></li>
                <li><a href="Movies.php">Movies</a></li>
                <li><a href="PatronReg.php">Sign Up</a></li>
                <li><a href="Admin.php">Admin</a></li>   
            </ul>
        </nav>

</header>
<table id='searchedMovie' cellspacing="0" >
        </table>