<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Print Reports</title>
  <link rel="stylesheet" href="stylesheets/default.css">
  <link rel="stylesheet" href="stylesheets/printreport.css">
  <style type="text/css" media="print">
     .no-print { display: none; }
  </style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <?php include "chart.php"?>
</head>
<body>
  <div class="container-fluid">
  <div class="no-print">
  <nav class="navbar navbar-dark bg-dark">
    <span class="navbar-text">
      Print Reports
    </span>
    <button type="button" class="btn btn-secondary" onclick="window.print();">Print Report</button>
  </nav>
  </div>
  <div class="container" style="position: relative;">
  <div class="row justify-content-center" style="width: 1200px;">
  <div class="table table-responsive">
  <table class="table">
    <tr>
      <th><div id="barchart" style="width: 500px;"></div>
      <td><table class="table table-bordered" style="margin-top: 2rem;">
        <thead class="thead-dark">
        <tr>
          <th scope="col">Day</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
        <?php
          require "includes/conn.php";
          $sqlT1 = "SELECT DAYNAME(odatetime) As Day, SUM(netamount) AS Total FROM `orders` GROUP By DAYNAME(odatetime) ORDER By DAYNAME(odatetime)";
          $queryT1 = mysqli_query($con,$sqlT1);
          while($resultT1 = mysqli_fetch_array($queryT1))
          {
        ?>
        <tr>
          <td><?php echo $resultT1['Day']?></td>
          <td><?php echo $resultT1['Total']?></td>
        </tr>
      <?php } ?>
      </table>
    </td>
    </tr>
    <tr>
      <th><div id="piechart" style="width: 500px;"></div>
      <td><table class="table table-bordered" style="margin-top: 2rem;">
        <thead class="thead-dark">
        <tr>
          <th scope="col">Type</th>
          <th scope="col">TotalSold</th>
        </tr>
      </thead>
        <?php
          $sql1 = "SELECT m.Type as Type,  Sum(o.quantity) as TotalSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid Group By m.Type";
          $query1 = mysqli_query($con,$sql1);
          while($result1 = mysqli_fetch_array($query1))
          {
        ?>
        <tr>
          <td><?php echo $result1['Type']?></td>
          <td><?php echo $result1['TotalSold']?></td>
        </tr>
      <?php } ?>
      </table>
    </td>
    </tr>
    <tr>
      <th><div id="curve_chart" style="width: 500px;"></div>
      <td><table class="table table-bordered" style="margin-top: 2rem;">
        <thead class="thead-dark">
        <tr>
          <th scope="col">Time</th>
          <th scope="col">Number of Customer</th>
        </tr>
      </thead>
        <?php
          $sql2 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '10:00:00' AND '12:00:00'";
          $query2 = mysqli_query($con,$sql2);
          while($result2 = mysqli_fetch_array($query2))
          {
          ?>
        <tr>
          <td><?php echo '10 AM ~ 12 AM' ?></td>
          <td><?php echo $result2['TotalCustomer']?></td>
        </tr>
      <?php } ?>
      <?php
        $sql2 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '12:00:00' AND '14:00:00'";
        $query2 = mysqli_query($con,$sql2);
        while($result2 = mysqli_fetch_array($query2))
        {
        ?>
      <tr>
        <td><?php echo '12 AM ~ 2 PM' ?></td>
        <td><?php echo $result2['TotalCustomer']?></td>
      </tr>
    <?php } ?>
    <?php
      $sql2 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '14:00:00' AND '16:00:00'";
      $query2 = mysqli_query($con,$sql2);
      while($result2 = mysqli_fetch_array($query2))
      {
      ?>
    <tr>
      <td><?php echo '2 AM ~ 4 PM' ?></td>
      <td><?php echo $result2['TotalCustomer']?></td>
    </tr>
  <?php } ?>
  <?php
    $sql2 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '16:00:00' AND '18:00:00'";
    $query2 = mysqli_query($con,$sql2);
    while($result2 = mysqli_fetch_array($query2))
    {
    ?>
  <tr>
    <td><?php echo '4 AM ~ 6 PM' ?></td>
    <td><?php echo $result2['TotalCustomer']?></td>
  </tr>
<?php } ?>
<?php
  $sql2 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '18:00:00' AND '20:00:00'";
  $query2 = mysqli_query($con,$sql2);
  while($result2 = mysqli_fetch_array($query2))
  {
  ?>
<tr>
  <td><?php echo '6 AM ~ 8 PM' ?></td>
  <td><?php echo $result2['TotalCustomer']?></td>
</tr>
<?php } ?>
<?php
  $sql2 = "SELECT COUNT(customername) as TotalCustomer FROM orders WHERE TIME(odatetime) BETWEEN '20:00:00' AND '22:00:00'";
  $query2 = mysqli_query($con,$sql2);
  while($result2 = mysqli_fetch_array($query2))
  {
  ?>
<tr>
  <td><?php echo '8 AM ~ 10 PM' ?></td>
  <td><?php echo $result2['TotalCustomer']?></td>
</tr>
<?php } ?>
      </table>
    </td>
    </tr>
    <tr>
      <th><div id="combochart" style="width: 500px;"></div>
      <td><table class="table table-bordered" style="margin-top: 2rem;">
        <thead class="thead-dark">
        <tr>
          <th scope="col">Month</th>
          <th scope="col">Food</th>
          <th scope="col">Appertizers</th>
          <th scope="col">Drinks</th>
          <th scope="col">Desserts</th>
          <th scope="col">Average</th>
        </tr>
      </thead>
      <?php
      $sqlMonth = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
      $queryMonth = mysqli_query($con,$sqlMonth);
      $sqlFood = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalFoodSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE m.Type = 'Food' Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
      $queryFood = mysqli_query($con,$sqlFood);
      $sqlAppertizers = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalAppertizersSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE m.Type = 'Appertizers' Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
      $queryAppertizers = mysqli_query($con,$sqlAppertizers);
      $sqlDesserts = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalDessertsSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE m.Type = 'Desserts' Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
      $queryDesserts = mysqli_query($con,$sqlDesserts);
      $sqlDrinks = "SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalDrinksSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid WHERE m.Type = 'Drinks' Group By DATE_FORMAT(u.odatetime,'%Y/%c')";
      $queryDrinks = mysqli_query($con,$sqlDrinks);
      $sqlAverage = "SELECT Month, TotalSold/4 AS Average FROM (SELECT DATE_FORMAT(u.odatetime,'%Y/%c') AS Month, Sum(o.quantity) as TotalSold From menu m left join order_detail o on m.Item_ID = o.Item_ID left join orders u on o.orderid = u.orderid Group By DATE_FORMAT(u.odatetime,'%Y/%c')) AS Average GROUP BY Month";
      $queryAverage = mysqli_query($con,$sqlAverage);
      while(($resultM = mysqli_fetch_array($queryMonth)) && ($resultF = mysqli_fetch_array($queryFood)) && ($resultA = mysqli_fetch_array($queryAppertizers)) && ($resultD = mysqli_fetch_array($queryDesserts)) && ($resultO = mysqli_fetch_array($queryDrinks)) && ($resultR = mysqli_fetch_array($queryAverage)))
      {
      ?>
        <tr>
          <td><?php echo $resultM['Month']?></td>
          <td><?php echo $resultF['TotalFoodSold']?></td>
          <td><?php echo $resultA['TotalAppertizersSold']?></td>
          <td><?php echo $resultD['TotalDessertsSold']?></td>
          <td><?php echo $resultO['TotalDrinksSold']?></td>
          <td><?php echo $resultR['Average']?></td>
        </tr>
      <?php } ?>
      </table>
    </td>
    </tr>
 </table>
</div>
</div>
</div>
</div>
</body>
</html>
