<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Inventory', 'Hours per Day'],
          ['Available',<?php echo  $totalinventory?>],
          ['Sold Out', <?php echo  $totalsoldproduct?>],

        ]);

        var options = {
          title: 'Inventory Management ',
          backgroundColor: 'transparent',
          'width':400,
          'height':300
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 400px; height: 300px;"></div>
  </body>
</html>
