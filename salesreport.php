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
  <!-- <script type="text/javascript" src="javascripts/salesreport.js"></script> -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="stylesheets/sidebar.css">
  <script src="javascripts/sidebar.js"></script>
  <style>
  body > div.sidebar > ul > li{
        height: 49.600px;
    }

    body > div.sidebar > ul > li> a{
        height: 17.6px;
    }

    body > div.mainbody > div.topbar{
        height:52px;
    }
  </style>

  <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  google.charts.setOnLoadCallback(drawChart1);
  google.charts.setOnLoadCallback(drawChart2);
  google.charts.setOnLoadCallback(drawChart3);

  function drawChart() {
  var data = new google.visualization.arrayToDataTable([
    ['Day','Sales Per Day'],
  <?php
  require "includes/conn.php";
  if(isset($_GET["filterbtn"])){
  $Month = $_GET["monthfilter"];
  $Week = $_GET["weekfilter"];
  $sql = "SELECT DAYNAME(odatetime) As Day, SUM(netamount) AS Total FROM `orders` Where DATE_FORMAT(odatetime, '%Y-%m') = '$Month' AND DATE_FORMAT(odatetime, '%Y-W%U') = '$Week' GROUP By DAYNAME(odatetime) ORDER By DAYNAME(odatetime)";
  }Else{
  $sql = "SELECT DAYNAME(odatetime) As Day, SUM(netamount) AS Total FROM `orders` GROUP By DAYNAME(odatetime) ORDER By DAYNAME(odatetime)";
  }
  $query = mysqli_query($con,$sql);
  while($result = mysqli_fetch_array($query))
  {
  echo "['".$result['Day']."',".(double)$result['Total']."],";
  }
  ?>
]);


  var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));
  chart.draw(data, {title:'Sales Report',width: 600, height: 400});
  }

function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Quantity Sold'],
          <?php
          $sql1 = "SELECT m.Type as Type,  Sum(o.quantity) as TotalSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid Group By m.Type";
          $query1 = mysqli_query($con,$sql1);
          while($result1 = mysqli_fetch_array($query1))
          {
          echo "['".$result1['Type']."',".(int)$result1['TotalSold']."],";
          }
          ?>
        ]);

        var options = {
          title: 'Sales Summary',
          pieHole: 0.4,
          width: 600,
          height: 400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

  function drawChart2() {

          var data = google.visualization.arrayToDataTable([
            ['Time', 'Number of Customer'],
            <?php
            $sql2 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '10:00:00' AND '12:00:00'";
            $query2 = mysqli_query($con,$sql2);
            while($result2 = mysqli_fetch_array($query2))
            {
              echo "['10 AM ~ 12 AM',".(int)$result2['TotalCustomer']."],";
            }
            ?>
            <?php
            $sql3 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '12:00:00' AND '14:00:00'";
            $query3 = mysqli_query($con,$sql3);
            while($result3 = mysqli_fetch_array($query3))
            {
              echo "['12 AM ~ 2 PM',".(int)$result3['TotalCustomer']."],";
            }
            ?>
            <?php
            $sql4 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '14:00:00' AND '16:00:00'";
            $query4 = mysqli_query($con,$sql4);
            while($result4 = mysqli_fetch_array($query4))
            {
              echo "['2 PM ~ 4 PM',".(int)$result4['TotalCustomer']."],";
            }
            ?>
            <?php
            $sql5 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '16:00:00' AND '18:00:00'";
            $query5 = mysqli_query($con,$sql5);
            while($result5 = mysqli_fetch_array($query5))
            {
              echo "['4 PM ~ 6 PM',".(int)$result5['TotalCustomer']."],";
            }
            ?>
            <?php
            $sql6 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '18:00:00' AND '20:00:00'";
            $query6 = mysqli_query($con,$sql6);
            while($result6 = mysqli_fetch_array($query6))
            {
              echo "['6 PM ~ 8 PM',".(int)$result6['TotalCustomer']."],";
            }
            ?>
            <?php
            $sql7 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '20:00:00' AND '22:00:00'";
            $query7 = mysqli_query($con,$sql7);
            while($result7 = mysqli_fetch_array($query7))
            {
              echo "['8 PM ~ 10 PM',".(int)$result7['TotalCustomer']."],";
            }
            ?>
          ]);

          var options = {
            title: 'Customer Frequency',
            width: '600',
            height: '400',
            curveType: 'function',
            legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

          chart.draw(data, options);
        }

function drawChart3() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Starters', 'Brunch', 'Main', 'Pasta', 'Drinks', 'Average'],
          ['2020/05',  165,      938,         522,             998,           450,      614.6],
          ['2020/06',  135,      1120,        599,             1268,          288,      682],
          ['2020/07',  157,      1167,        587,             807,           397,      623],
          ['2020/08',  139,      1110,        615,             968,           215,      609.4],
          ['2020/09',  136,      691,         629,             1026,          366,      569.6]
        ]);

        var options = {
          title : 'Monthly Revenue by Menu',
          vAxis: {title: 'Revenue'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}},
          width: '600',
          height: '400'
        };

        var chart = new google.visualization.ComboChart(document.getElementById('combochart'));
        chart.draw(data, options);
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
        <th><div id="piechart"></div>
        <th rowspan="2">
          <div class="container mx-2 mt-3 p-2 bg-white border">
          <form action="salesreport.php" method="GET">
          <h2>Filter:</h2>
          Month: <input type="month" name="monthfilter"><br><br>
          Week: <input type="week" name="weekfilter"<br><br><br>
          <input name="filterbtn" type="submit">
          <input type="reset" name="reset" value ="Reset">
        </form>

        </div>
      </tr>
      <tr>
        <th><div id="curve_chart"></div>
        <th><div id="combochart"></div>
      </tr>
    </table>
  </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="javascripts/salesreport.js"></script>





</body>

</html>
