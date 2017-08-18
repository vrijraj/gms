<?php
include ("check.php");
error_reporting(0);
$a=$_GET["id"];

$sql = "DELETE FROM games_data WHERE G_ID=$a";

if (mysqli_query($db, $sql)) {
    $msg="Games has been Delected Successfully";
    echo "Record deleted successfully";
    header('Location: /gms/showgames/'.urlencode($msg).'');
    exit;
} else {
    echo"<center><h2 style='margin-top:5%;color:#1a237e'>Error</h2></center>";
    echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
    
   <center> Error deleting record!! " // mysqli_error($db)
        ."<br>
    <br><img src='/gms/img/auth.png' width='10%'>
    <h2 style='color:#880e4f '>Your are not Authorized User so you need to Grant Permission</h2>
    <a href='/gms/showgames'><button>Go Back</button></a>
    </center>
    
    </div>";
}

?>
<html>
    <head>
    <title>Deleating Games...</title>
        <link rel="shortcut icon" href="/gms/img/fav.png" type="image/x-icon" />
    </head>
    
    <body style="background-color:#eceff1 ">
        
        <footer><br><br><br><br><br><br><hr><center>&copy;Video Game Management System</center></footer>
    </body>
</html>


