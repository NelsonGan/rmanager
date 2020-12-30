
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart1);
google.charts.setOnLoadCallback(drawChart2);
google.charts.setOnLoadCallback(drawChart3);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Sales per Day'],
  ['Monday', 8000],
  ['Tuesday', 7000],
  ['Wednesday', 4000],
  ['Thursday', 2000],
  ['Friday', 10000],
  ['Saturday',12000],
  ['Sunday',10000]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Sales Reports', 'width':600, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.BarChart(document.getElementById('barchart'));
  chart.draw(data, options);
}
function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          width: '600',
          height: '400',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Expenditures', 'Amount per month'],
          ['Salary',   40000],
          ['Ingredients', 20000],
          ['Rent',  15000],
          ['Tax', 7000],
          ['Others', 8000]
        ]);

        var options = {
          title: 'Montly Expenditures',
          width: '600',
          height: '400'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

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
