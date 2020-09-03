






<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Quantity'],


@php
 foreach($soldproductday as $sd) {
    
    
    echo "['".$sd->day."', ".$sd->total."],";

 }
	@endphp


        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart.draw(data, {width: 600, height: 240, legend: 'bottom', title: 'Sales By Day'  });
      }
    </script>
  </head>

  <body>
    <div id="chart_div2"></div>
  </body>
</html>