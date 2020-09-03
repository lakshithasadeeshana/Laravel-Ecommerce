<?php
 $current_month = date('M');
 $last_month = date('M',strtotime("-1 month"));
 $last_to_last_month = date('M',strtotime("-2 month"));

$dataPoints = array(
    array("y" =>$last_to_last_month_product, "label" => $last_to_last_month),
    array("y" =>$last_month_product, "label" =>  $last_month),
	array("y" =>$current_month_product, "label" => $current_month)
	

);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<br><br>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Monthly Sales",
		color: "#7ECEF3"
	},
	backgroundColor: "transparent",
	axisY: {
		title: "Quantity"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 200px; width: 350px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 