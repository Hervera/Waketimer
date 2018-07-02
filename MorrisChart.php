<?php 
	// Include connection file
	require_once 'connection.php';
	
	// Attempt select query execution
	$query = "SELECT * FROM sensor_values";
	$result = mysqli_query($con, $query);
	$chart_data = '';
	while($row = mysqli_fetch_array($result))
	{
		$chart_data .="{ acceleration:'".$row['acceleration']."', time:'".$row['time']."'}, ";	
	}
	
	$chart_data = substr ($chart_data, 0, -2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/morris.css">
    <style type="text/css">
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="clearfix">
                        <h2 class="pull-left">Sensor values</h2>
                    </div>
                    <?php
					// Include connection file
					require_once 'connection.php';
					
					// Attempt select query execution
					$query = "SELECT * FROM sensor_values";
                    if($result = mysqli_query($con, $query)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>No</th>";
                                        echo "<th>Acceleration</th>";
                                        echo "<th>Time</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
								$no=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . $row['acceleration'] . "</td>";
                                        echo "<td>" . $row['time'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
                    }
 
                    // Close connection
                    mysqli_close($con);
                    ?>
                </div>
				<div class="col-md-6">
				<h2 class="text-center">Morris chart</h2>
				<div id="chart"></div>
					
				</div>
            </div>        
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/raphael.min.js"></script>
	<script src="js/morris.min.js"></script>  
	<script type="text/javascript">
		Morris.Bar({
			
			element : 'chart',
			data:[<?php echo $chart_data; ?>],
			xkey: 'time',
			ykeys: ['acceleration'],
			labels: ['acceleration'],
			hideHover: 'auto',
			
		});
    </script>
</body>
</html>