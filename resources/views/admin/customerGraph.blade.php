

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Number of Customers'],


@php
 foreach($customerchart as $cc) {
    
    
    echo "['".$cc->month."', ".$cc->customercount."],";

 }
	@endphp


        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_divcustomers'));
        chart.draw(data, {width: 600,  height: 240, legend: 'bottom', title: 'Customer Registration 2020' ,backgroundColor: '#AEDAC3 '  });
      }
    </script>



    <div id="chart_divcustomers"></div>
 
