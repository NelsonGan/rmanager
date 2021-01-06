
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.load("current", {'packages':["calendar"]});
google.charts.setOnLoadCallback(drawChart1);
google.charts.setOnLoadCallback(drawChart2);
google.charts.setOnLoadCallback(drawChart3);
google.charts.setOnLoadCallback(drawAttendance);

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
function drawAttendance() {
 var dataTable = new google.visualization.DataTable();
 dataTable.addColumn({ type: 'date', id: 'Date' });
 dataTable.addColumn({ type: 'number', id: 'Attended/Leave' });
 dataTable.addRows([
    [ new Date(2020, 3, 13), 20 ],
    [ new Date(2020, 3, 14), 30 ],
    [ new Date(2020, 3, 15), 40 ],
    [ new Date(2020, 3, 16), 20 ],
    [ new Date(2020, 3, 17), 30 ],
    // Many rows omitted for brevity.
    [ new Date(2021, 9, 4), 20 ],
    [ new Date(2021, 9, 5), 30 ],
    [ new Date(2021, 9, 12), 40 ],
    [ new Date(2021, 9, 13), 28 ],
    [ new Date(2021, 9, 19), 34 ],
    [ new Date(2021, 9, 23), 40 ],
    [ new Date(2021, 9, 24), 10 ],
    [ new Date(2021, 9, 30), 30 ]
  ]);

 var chart = new google.visualization.Calendar(document.getElementById('Attendacechart'));

 var options = {
   title: "Staff Attendance",
   width: '1200',
   height: '550'
 };

 chart.draw(dataTable, options);
}
