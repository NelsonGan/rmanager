
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

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
  var options = {'title':'Sales Reports', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.BarChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
