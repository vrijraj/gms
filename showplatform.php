<?php
    include ("check.php");
//error_reporting(0);
    //Query For Show all Category
    $query ="SELECT GT_NAME,GT_ID FROM game_type order by GT_TIME DESC";
	//Get results
	 $result = $db->query($query) or die($mysqli->error.__LINE__);
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Manage Platform | vGMS</title>
    <link rel="shortcut icon" href="/gms/img/fav.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/gms/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/gms/css/mdb.min.css" rel="stylesheet">
    <!-- Coustom JS    -->
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

<body style="background-color:">

<!-- Navbar -->
<?php require 'nav.php';?>
<!-- Navbar -->
    
<br>
<!-- Heading -->
<div class="container-fluid animated fadeInUp">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5" style="background-color:">
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-puzzle-piece animated fadeInDown" aria-hidden="true"></i> Manage Gamess Platform</h4>
            <p style="font-size:11px;margin-top:0px">Overview & status, more. Home Page for Over all view. </p>
        </div>
        <div class="col-md-5 hidden-sm-down" style="background-color:">
            <img src="/gms/img/gms.png" class="pull-xs-right img-fluid" width="30%">
        </div>
        <div class="col-md-1"></div>
    </div>
    
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="background-color:">
            <hr style="margin:0.2%" class="no-print">
        </div>
        <div class="col-md-1"></div>
    </div>
    
</div>
<!-- Heading -->

<!-- Get Notification Showing data -->
<div class="container-fluid animated flipInX">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php if(isset($_GET['msg'])){
			echo '<div id="hide-on" class="msg card no-print" style="background-color:#00C851;color:white;padding:.5%;opacity:0.8"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;'.$_GET['msg'].'   
           <button type="button" class="close" aria-label="Close" onclick="asd()">
  <span aria-hidden="true">&times;</span>
</button></div>';
            }
            ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- Get Notification Showing data -->

<!-- Action Menu -->
<div class="container-fluid animated fadeInUp">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <ul class="list-inline" style="margin:0px">
                <li class="list-inline-item">
                    <button onclick="myFunction()" class="btn btn-default btn-sm no-print" style="margin:0px;"><i class="fa fa-print" aria-hidden="true"></i> Print this page</button>
                </li>
                <li class="list-inline-item">
                    <a href="/gms/addplatform" class="btn-sm btn btn-info no-print"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Platform</a>
                </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
    </div>
</div> 
<!-- Action Menu -->

<!-- Data Content -->
<div class="container-fluid animated fadeInUp">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="table-responsive">
                <table class="table table-striped table-hover ">
                    <tr style="background-color:#4a148c;color:white ">
                        <th>Name</th>
                        <th class="no-print">Edit</th>
                        <th class="no-print">Delete</th>
                    </tr>
                    <?php 
                        //Check if at least one row is found
                        if($result->num_rows > 0) {
                        //Loop through results
                        while($row = $result->fetch_assoc()){
                            //Display customer info
                            $output ='<tr>';
                            $output .='<td style="font-size:120%;">'.$row['GT_NAME'].'</td>';
                            $output .='<td class="no-print"><a style="margin:0px" href="/gms/editplatform/'.$row['GT_ID'].'" class="btn btn-warning btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>';
                            $output .='<td class="no-print"><a style="margin:0px" onclick="pop()" href="/gms/delete_platform/'.$row['GT_ID'].'" class="btn btn-danger btn"><i class="fa fa-remove" aria-hidden="true"></i> Delete</a></td>';
                            $output .='</tr>';

                            //Echo output
                            echo $output;
                        }
                    } else {
                        echo "Sorry, no Data were found";
                    }
                    ?>
            </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- Data Content -->

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