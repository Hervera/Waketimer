<?php 
	// Include connection file
	require_once 'connection.php';
	
	// Attempt select query execution
	$query = "SELECT * FROM sensor_values";
	$result = mysqli_query($con, $query);
	$chart_data = '';
	
	while($row = mysqli_fetch_array($result))
	{
		$time = $row['time'];
		$parsed = date_parse($time);
		$seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
		
		$chart_data .="[".$seconds." , ".$row['acceleration']."], ";	
	}
	
		$chart_data = substr ($chart_data, 0, -2);
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
									
									$time = $row['time'];
									$parsed = date_parse($time);
									$seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
									
                                    echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . $row['acceleration'] . "</td>";
                                        echo "<td>" .gmdate('H:i:s', $seconds). "</td>";
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
				<h2 class="text-center">Flot chart</h2>
				<div id="chart" style="width:600px; height:300px;"></div>
					
				</div>
            </div>        
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.time.min.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		var values =[<?php echo $chart_data; ?>];
		//var d1 = [[1, 10], [2, 20], [3, 30], [4, 40], [5, 50], [6, 60]];
	
		$.plot($("#chart"), [values], { 
			yaxis: {},
			xaxis: {
				
			},
			
			"lines" : {"show": "true"},
			"points" : {"show": "true"},
			clickable:true,
			hovarable: true
		});
	
	});
		
    </script>
</body>
</html>