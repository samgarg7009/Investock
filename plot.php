<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var dataPoints = [];
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	zoomEnabled: true,
	title: {
		text: "Bitcoin Price - 2017"
	},
	axisY: {
		title: "Price in USD",
		titleFontSize: 24,
		prefix: "$"
	},
	data: [{
		type: "line",
		yValueFormatString: "$#,##0.00",
		dataPoints: dataPoints
	}]
});
 
function addData(data) {
	var clpr;
    var trdate;
	for (var i = 0; i < data.length; i++) {
		dataPoints.push({
			x: data[i][0],
			y: dps[i][2]
		});
	}
	chart.render();
}
 
$.getJSON("http://54.188.231.51:5000/Stock_Price_Time_Series_Weekly/?ticker=ABB.BSE&start_date=2022-10-01&end_date=2022-10-10", addData);
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>