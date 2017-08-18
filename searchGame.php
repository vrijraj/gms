<?php
include ("check.php");
error_reporting(0);
$query ="SELECT
G.G_ID,
G.G_NAME,
G.G_SIZE,
G.GC_ID,
GC.GC_NAME,
GSA.GSD_ID,
GSA.GSD_NAME,
GT.GT_NAME
FROM
games_cat AS GC,
games_data AS G,
games_size_data AS GSA,
game_type AS GT
WHERE
G.GC_ID=GC.GC_ID AND G.GSD_ID=GSA.GSD_ID AND G.GT_ID=GT.GT_ID order by G_TIME DESC";

//Get results
$result = $db->query($query) or die($db->error.__LINE__);

//Counting number row
$sql="SELECT * FROM games_data";

if ($result1=mysqli_query($db,$sql))
  {
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result1);
      // printf("Result set has %d rows.\n",$rowcount);
      // Free result set
      mysqli_free_result($result1);
  }

mysqli_close($db);

?>


<?php
error_reporting(0);
    //Personal Setting
	if (!empty($_GET['search_form']))
    {
        echo $_GET['search_text'];
    }
?>
 

  
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="/gms/img/fav.png" type="image/x-icon" />
   
    
    <title>Manage Games | vGMS</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="/gms/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="/gms/css/mdb.min.css" rel="stylesheet">

    <script>
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        })
    </script>
<!--    
========================================
-->
    
    <script>
        function asd()
        {
        document.getElementById('hide-on').style.display='none';
            
        }
        function pop()
        {
            confirm("Are u want to Delete ?");
        }
    </script>
     <!-- Coustom CSS    -->
    <style>
        @media print
        {    
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>


</head>

<body style="">

<!-- Navbar -->
<?php require 'nav.php';?>
<!-- Navbar -->
    
<br>

<!-- Main Content -->
<div class="container-fluid animated slideInUp " style="margin-bottom:1%">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 table-responsive" style="padding:0%;background-color:;margin:0px;padding-top:10%;height:100%;padding-bottom:10%;">
                <center>
                    
                    <img src="/gms/img/SEARCH.png" class="img-fluid hidden-sm-down" width="15%">
                    <img src="/gms/img/SEARCH.png" class="img-fluid hidden-md-up" width="45%">
                    <br class="hidden-sm-down">
                    <br class="hidden-sm-down">
                    <br>
                    <form action="/gms/search/" method="get">
                        <div class="container-fluid">
                            <div class="col-md-6 col-sm-offset-3">
                                <input type="text" placeholder="Search Game or Type Category..." name="search_text" style="font-size:130%">
                                <button class="btn btn-lg btn-info" type="submit" style="margin-left:0px;margin-top:5%;" name="submit" value="submit"><i class="fa fa-search animated fadeInDown" aria-hidden="true"></i> Search</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                    <br>
                </center>
            </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- Main Content -->
    
<!-- Footer   -->
    <?php include ("footer.php"); ?>
<!-- Footer   -->
    <!-- SCRIPTS -->

    <!-- JQuery -->

    <script type="text/javascript">
        $(".button-collapse").sideNav();
    </script>
    <script type="text/javascript" src="/gms/js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/gms/js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/gms/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/gms/js/mdb.min.js"></script>


    
    <script>
function myFunction() {
    window.print();
}
</script>
</body>

</html>