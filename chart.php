<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart1);
google.charts.setOnLoadCallback(drawChart2);
google.charts.setOnLoadCallback(drawChart3);

function drawChart() {
var data = new google.visualization.arrayToDataTable([
  ['Day','Sales Per Day (RM)'],
<?php
require "includes/conn.php";
if(isset($_GET["filterbtn"])){
$Month = $_GET["monthfilter"];
$Week = $_GET["weekfilter"];
$sql = "SELECT DAYNAME(odatetime) As Day, SUM(netamount) AS Total FROM `orders` Where DATE_FORMAT(odatetime, '%Y-%m') = '$Month' AND DATE_FORMAT(odatetime, '%Y-W%U') = '$Week' AND  paidstatus = 'PAID' GROUP By DAYNAME(odatetime) ORDER By DAYNAME(odatetime)";
}Else{
$sql = "SELECT DAYNAME(odatetime) As Day, SUM(netamount) AS Total FROM `orders` WHERE paidstatus = 'PAID' GROUP By DAYNAME(odatetime) ORDER By DAYNAME(odatetime)";
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
        $sql1 = "SELECT m.Type as Type,  Sum(o.quantity) as TotalSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE u.paidstatus = 'PAID' Group By m.Type";
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
                ['Month', 'Food', 'Appetizers', 'Desserts', 'Drinks', 'Average'],
                <?php
                $sqlMonth = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE u.paidstatus='PAID' Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
                $queryMonth = mysqli_query($con,$sqlMonth);
                $sqlFood = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalFoodSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE m.Type = 'Food' AND u.paidstatus='PAID' Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
                $queryFood = mysqli_query($con,$sqlFood);
                $sqlAppertizers = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalAppertizersSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE m.Type = 'Appetizers' AND u.paidstatus='PAID' Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
                $queryAppertizers = mysqli_query($con,$sqlAppertizers);
                $sqlDesserts = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalDessertsSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE m.Type = 'Desserts' AND u.paidstatus='PAID' Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
                $queryDesserts = mysqli_query($con,$sqlDesserts);
                $sqlDrinks = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalDrinksSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE m.Type = 'Drinks' AND u.paidstatus='PAID' Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
                $queryDrinks = mysqli_query($con,$sqlDrinks);
                $sqlAverage = "SELECT Month, TotalSold/4 AS Average FROM (SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE u.paidstatus = 'PAID' Group By DATE_FORMAT(u.odatetime,'%Y/%c')) AS Average GROUP BY Month";
                $queryAverage = mysqli_query($con,$sqlAverage);
                while(($resultM = mysqli_fetch_array($queryMonth)) && ($resultF = mysqli_fetch_array($queryFood)) && ($resultA = mysqli_fetch_array($queryAppertizers)) && ($resultD = mysqli_fetch_array($queryDesserts)) && ($resultO = mysqli_fetch_array($queryDrinks)) && ($resultR = mysqli_fetch_array($queryAverage)))
                {
                echo "['".$resultM['Month']."',".(int)$resultF['TotalFoodSold'].",".(int)$resultA['TotalAppertizersSold'].",".(int)$resultD['TotalDessertsSold'].",".(int)$resultO['TotalDrinksSold'].",".(double)$resultR['Average']."],";
                }
                ?>
              ]);

              var options = {
                title : 'Montly Item Sold by Menu',
                vAxis: {title: 'Quantity'},
                hAxis: {title: 'Month'},
                seriesType: 'bars',
                series: {4: {type: 'line'}},
                width: '600',
                height: '400'
              };

              var chart = new google.visualization.ComboChart(document.getElementById('combochart'));
              chart.draw(data, options);
            }

</script>
