<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Sales Reports</title>
  <link rel="stylesheet" href="stylesheets/default.css">
  <link rel="stylesheet" href="stylesheets/salesreport.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="javascripts/salesreport.js"></script>

  <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
  var jsonData = $.ajax({
  url: 'php/saleschart.php',
  dataType:"json",
  async: false,
  success: function(jsonData)
  {
  var data = new google.visualization.arrayToDataTable(jsonData);


  var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));
  chart.draw(data, {title:'Sales Report',width: 600, height: 400});

  }
  }).responseText;
  }


  </script>

</head>
<body>
  <div style="flex: 1";>
    <?php include "sidebar.php";?>
  </div>
  <div class="mainbody">
    <div class="topbar">
      <span>Sales Reports</span>
    </div>
    <div class="container-fluid">
    <div class="table-responsive">
    <table class="table">
      <tr>
        <th><div id="barchart"></div>
        <th><div id="curve_chart"></div>
        <th rowspan="2">
          <div class="container mx-2 mt-3 p-2 bg-white border">
          <h2>Filter:</h2>
          Month: <input type="month"><br>
          Date: <input type="date"><br><br>
          <input type="submit">


        </div>
      </tr>
      <tr>
        <th><div id="piechart"></div>
        <th><div id="combochart"></div>
      </tr>
    </table>
  </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="javascripts/salesreport.js"></script>





</body>

</html>
