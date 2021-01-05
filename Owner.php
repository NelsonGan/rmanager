<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owner</title>
  <link rel="stylesheet" href="stylesheets/default.css">
  <link rel="stylesheet" href="stylesheets/owner.css">

</head>
<body>
  <div style="flex: 1";>
    <?php include "sidebar.php";?>
  </div>
  <div class="mainbody">
    <div class="topbar">
      <span>Sales Reports</span>
    </div>
    <center>
    <table class="columns">
      <tr>
        <th><div id="barchart"></div>
        <th><div id="curve_chart"></div>
      </tr>
      <tr>
        <th><div id="piechart"></div>
        <th><div id="combochart"></div>
      </tr>
    </table>
  </center>
  </div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="javascripts/owner.js"></script>





</body>

</html>
