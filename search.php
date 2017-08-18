<?php
    include ("check.php");
    error_reporting(0);
    $x= $_GET['search_text'];
    
    if(!empty($x))
    {
            $query="SELECT
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
            G.GC_ID=GC.GC_ID AND G.GSD_ID=GSA.GSD_ID AND G.GT_ID=GT.GT_ID
            AND ( G.G_NAME LIKE '%$x%' OR GC.GC_NAME LIKE '%$x%' OR GT.GT_NAME LIKE '%$x%')
            order by G_TIME DESC";
        
            $result = $db->query($query) or die($db->error.__LINE__);



            if ($result1=mysqli_query($db,$query))
              {
                  // Return the number of rows in result set
                  $rowcount=mysqli_num_rows($result1);
                  // printf("Result set has %d rows.\n",$rowcount);
                  // Free result set
                  mysqli_free_result($result1);
              }

            mysqli_close($db);
    }
    else
    {
        $query="SELECT
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
        $result = $db->query($query) or die($db->error.__LINE__);



            if ($result1=mysqli_query($db,$query))
              {
                  // Return the number of rows in result set
                  $rowcount=mysqli_num_rows($result1);
                  // printf("Result set has %d rows.\n",$rowcount);
                  // Free result set
                  mysqli_free_result($result1);
              }

            mysqli_close($db);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="/gms/img/fav.png" type="image/x-icon" />
   
    
    <title>Search Games | vGMS</title>

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
<!-- Heading -->
<div class="container-fluid animated fadeInUp">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5" style="background-color:">
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-puzzle-piece animated fadeInDown" aria-hidden="true"></i> Manage Games</h4>
            <p style="font-size:11px;margin-top:0px">Overview & status, more. Home Page for Over all view. </p>
        </div>
        <div class="col-md-5 hidden-sm-down" style="background-color:">
            <img src="/gms/img/gms.png" class="pull-xs-right img-fluid" width="30%">
        </div>
        <div class="col-md-1"></div>
    </div>
    <hr style="margin:0.2%" class="no-print">
</div>
<!-- Heading -->


<!-- Action Menu -->
<div class="container-fluid animated fadeInUp">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <ul class="list-inline" style="margin:0px">
                <li class="list-inline-item">
                    <button onclick="myFunction()" class="btn btn-default btn-sm no-print" style="margin:0px;"><i class="fa fa-print" aria-hidden="true"></i> Print this page</button>
                </li>
                <li class="list-inline-item">
                    <a href="/gms/addGame" class="btn-sm btn btn-info no-print"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Game</a>
                </li>
                
                <li class="list-inline-item">
                    Total Number of Result :<?php echo $rowcount; ?>
                </li>
            </ul>
        </div>
        
        <div class="col-md-5">
            <form action="/gms/search.php" method="get" name="search_form">
                <div class="input-group">
                    <input type="text" class="" placeholder="Search for..." name="search_text">
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" type="button">Go!</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- Action Menu -->

<!-- Main Content -->
<div class="container-fluid animated slideInUp " style="margin-bottom:1%">
    <div class="row">
       
            <div class="col-md-1"></div>
            <div class="col-md-10 " style=";background-color:;margin:0px;">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                    <tr style="background-color:#4a148c;color:white;padding:0px">
                        <th >Game Name</th>
                        <th >CATEGORY</th>
                        <th >Type</th>
                        <th >Size</th>
                        <TH style="no-print"></TH>
                        <TH STYLE="no-print"></TH>
                    </tr>
                <?php 
                            //Check if at least one row is found
                            if($result->num_rows > 0) {    
                        
                            //Loop through results
                            while($row = $result->fetch_assoc()){
                                //Display customer info
                                $output ='<tr>';
                                $output .='<td style="padding:.5%;font-size:120%">'.$row['G_NAME'].'</td>';
                                $output .='<td style="padding:.5%;font-size:120%">'.$row['GC_NAME'].'</td>';
                                $output .='<td style="padding:.5%;font-size:120%">'.$row['GT_NAME'].'</td>';
                                $output .='<td style="padding:.5%;font-size:120%">'.$row['G_SIZE'].' '.$row['GSD_NAME'].'</td>';
                                
                                $output .='<td style="padding:.5%" class="no-print"><a style="margin:0px" href="/gms/editGame/'.$row['G_ID'].'" class="btn btn-warning no-print"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>';
                                
                                $output .='<td style="padding:.5%" class="no-print"><a style="margin:0px" href="/gms/delete_game/'.$row['G_ID'].'" class="btn btn-danger style="no-print"" onClick="pop()"><i class="fa fa-remove" aria-hidden="true"></i> Delete</a></td>';
                                $output .='</tr>';

                                //Echo output
                                echo $output;
                                
                            }
}                       else {
                                echo "<br>";
                                echo "<br>";
                                echo "<h3><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Sorry, no Books were found</h3>";
                        }
                        ?>
                </table>
                </div>
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

</html>s