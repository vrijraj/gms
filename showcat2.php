<?php
    include ("check.php");

$query ="SELECT 
			 B.B_ID,
             B.B_NAME,
             B.BC_ID,
             BC.BC_ID,
             B_ISBN,
             B.AUTHOR_ID,
             B.B_STAUS,
             BC.BC_NAME,
             auth.AUTHOR_ID,
             auth.AUTHOR_NAME
			 FROM book_cat AS BC,book_data AS B,author_data as auth
             WHERE B.BC_ID=BC.BC_ID and B.AUTHOR_ID=auth.AUTHOR_ID
             ORDER BY B_TIME DESC;
             
             ";
	//Get results
	$result = $db->query($query) or die($db->error.__LINE__);


//Counting number row
   $sql="SELECT * FROM book_data";

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

  
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Material Design Bootstrap</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <script>
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        })
    </script>
    
    <script>
        function asd()
        {
        document.getElementById('hide-on').style.display='none';
            
        }
    </script>

</head>

<body style="background-color:">

  <?php require 'nav.php';?>

    <div class="container">
        
        <h4 style="margin-top:1%;margin-bottom:0px"><i class="fa fa-book" aria-hidden="true"></i> Manage Books</h4>
        <p style="font-size:11px;margin-top:0px;margin-bottom:0px">Overview & status, more. Home Page for Over all view. </p>
       
        <hr>
        <?php if(isset($_GET['msg'])){
			echo '<div id="hide-on" class="msg card animated flipInX" style="background-color:#76ff03 ;color:white;padding:.5%"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;'.$_GET['msg'].'   
           <button type="button" class="close" aria-label="Close" onclick="asd()">
  <span aria-hidden="true">&times;</span>
</button></div>';

		}
		?>
        </div>
        
    <div class="container animated slideInDown">
        <div class="row">
<!--
            <div class="col-md-12">
                <button onclick="myFunction()" class="btn btn-default btn-sm" style="margin:0px;margin-right:0%">Print this page</button>  
                <a href="addBook.php" class="btn-sm btn btn-info"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Book</a>
                Total Number of Result :<?php echo $rowcount; ?>
            </div>
-->

<!--
            <div class="col-md-4">
                <form>
                    <input type="search" placeholder="Search Book">     
                </form>
            </div>
-->
        </div>
    </div>
    
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Total Number of Result :<?php echo $rowcount; ?></p>
            </div>
        </div>
    </div>
		
    <div class="container">
        <div class="row" style="background-color:">
            
            <div class="col-md-4">
                <div class="search">
                    <select  id="columns" onchange="sorter.search('query')"></select>
                    <input  type="text" id="query" onkeyup="sorter.search('query')" placeholder="Search On the Table" />
                </div>
            </div>
            
            <div class="col-md-4" style="padding-top:0.5%">
                <span class="details">
                    Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span>&nbsp;
                    <a href="javascript:sorter.reset()" class="btn btn-sm btn-info" style="margin:0px"><i class="fa fa-share-square" aria-hidden="true"></i>&nbsp;&nbsp;Reset</a>
                </span>
            </div>
            
            <div class="col-md-4">
<!--                <button onclick="myFunction()" class="btn btn-default btn-sm pull-xs-right" style=""><i class="fa fa-print" aria-hidden="true"></i>&nbsp;&nbsp;Print this page</button>-->
                <a href="addBook.php" class="btn-sm btn btn-info pull-xs-right" style=""><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;&nbsp;Add Book</a>
            </div>
            
        </div>
        
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>
    </div>    	
            
      
        
        
    <div class="container">
        <div class="row">
            <div class="col-md-12 animated slideInUp">
                
        <table id="table" class=" table table-striped table-hover table-sm ">
            <thead style="padding:0px;background-color:#4a148c;color:white">
                <tr>
<!--                    <th class="nosort"><h3>ID</h3></th>-->
                    <th><h3  STYLE="font-size:110%">Book Name</h3></th>
                    <th><h3 STYLE="font-size:110%">Author</h3></th>
                    <th><h3 STYLE="font-size:110%">Catergory</h3></th>
                    <th><h3 STYLE="font-size:110%"> Status</h3></th>
<!--                    <th><h3 style="font-size:20px">Book ISBN</h3></th>-->
                    <th><h3 STYLE="font-size:110%">Edit</h3></th>
                    <th><h3 STYLE="font-size:110%">Delete</h3></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                                //Check if at least one row is found
                                if($result->num_rows > 0) {
                                //Loop through results
                                while($row = $result->fetch_assoc()){
                                    //Display customer info
                                    $output ='<tr>';
                                    $output .='<td style="padding:.5%" class="text-fluid">'.$row['B_NAME'].'</td>';
                                    $output .='<td style="padding:.5%" class="text-fluid">'.$row['AUTHOR_NAME'].'</td>';
                                    $output .='<td style="padding:.5%" class="text-fluid">'.$row['BC_NAME'].'</td>';
                                    $output .='<td style="padding:.5%" class="text-fluid">'.$row['B_STAUS'].'</td>';
//                                    $output .='<td style="padding:.5%">'.$row['B_ISBN'].'</td>';
                                    $output .='<td style="padding:.5%"><a style="margin:0px" href="editBook.php?id='.$row['B_ID'].'" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>';
                                    $output .='<td style="padding:.5%"><a style="margin:0px" href="delete_book.php?id='.$row['B_ID'].'" class="btn btn-danger btn-sm"><i class="fa fa-remove" aria-hidden="true"></i> Delete</a></td>';
                                    $output .='</tr>';

                                    //Echo output
                                    echo $output;
                                }
                            } else {
                                echo "Sorry, no customers were found";
                            }
                            ?>
               
            </tbody>
        </table>
            </div>
        </div>
    </div>
        
    
    <div class="container">
        <div class="row">
            <div class="col-md-6" id="tablenav">
                
                <div>
                    <a href="#" onclick="sorter.move(-1,true)"><i style="font-size:22px;color:#01579b " class="fa fa-fast-backward" aria-hidden="true"></i></a>
                    &nbsp; &nbsp;
                    <a href="#" onclick="sorter.move(-1)"><i style="font-size:22px;color:#01579b " class="fa fa-step-backward" aria-hidden="true"></i></a>
                    &nbsp; &nbsp;
                    <a href="#" onclick="sorter.move(1)"><i style="font-size:22px;color:#01579b " class="fa fa-step-forward" aria-hidden="true"></i></a>
                    &nbsp; &nbsp;
                    <a href="#" onclick="sorter.move(1,true)"><i style="font-size:22px;color:#01579b " class="fa fa-fast-forward" aria-hidden="true"></i></a>
                    &nbsp; &nbsp;
<!--
                    <img src="images/first.gif" width="26" height="26" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
-->
                </div>
                <div>
                	<select id="pagedropdown"></select>
				</div>
                <div>
                	<a href="javascript:sorter.showall()">view all</a>
                </div>
            
            
            </div>
            
            <div class="col-md-6" id="tablelocation">
                    <div>
                        <select onchange="sorter.size(this.value)">
                        <option value="5">5</option>
                            <option value="10" selected="selected">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span>Entries Per Page</span>
                    </div>
                    <div class="page">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
            </div>
        </div>
    </div>
    
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <p>&copy; Library Management System.Created By Vrij Raj Singh</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- SCRIPTS -->

    <!-- JQuery -->

    <script type="text/javascript">
        $(".button-collapse").sideNav();
    </script>
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

  
	<script type="text/javascript" src="script.js"></script>
	
    <script type="text/javascript">
	var sorter = new TINY.table.sorter('sorter','table',{
		headclass:'head',
		ascclass:'asc',
		descclass:'desc',
		evenclass:'evenrow',
		oddclass:'oddrow',
		evenselclass:'evenselected',
		oddselclass:'oddselected',
		paginate:true,
		size:10,
		colddid:'columns',
		currentid:'currentpage',
		totalid:'totalpages',
		startingrecid:'startrecord',
		endingrecid:'endrecord',
		totalrecid:'totalrecords',
		hoverid:'selectedrow',
		pageddid:'pagedropdown',
		navid:'tablenav',
		sortcolumn:1,
		sortdir:1,
		sum:[8],
		avg:[6,7,8,9],
		columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
		init:true
	});
  </script>
    
    <script>
function myFunction() {
    window.print();
}
</script>
</body>

</html>