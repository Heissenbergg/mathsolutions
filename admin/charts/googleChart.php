<p id="totalNumberOfViews" style="display:none;"><?php echo $d->numOfViews(); ?></p>
<script type="text/javascript">
	google.charts.load('current', {packages: ['corechart', 'line']});
	google.charts.setOnLoadCallback(drawBasic);

	var arr = JSON.parse('<?php echo JSON_encode($date);?>');
	var totalViews = parseInt(document.getElementById("totalNumberOfViews").innerHTML);
	function drawBasic() {
		var data = new google.visualization.DataTable();
		data.addColumn('number', 'Dan');
		data.addColumn('number', 'Broj posjeta ');
		for(var i = 0; i<arr.length; i++){
			data.addRows([
			    [parseInt(arr[i]),parseInt(arr[++i])]
			]);
		}
		var options = {
		    hAxis: {
			   title: 'Ukupan broj posjeta ' + totalViews
		    },
		        vAxis: {
		        title: 'Broj posjeta'
		}
	};

 	var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

	 chart.draw(data, options);
}
</script>