<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
//        var data = google.visualization.arrayToDataTable([
//            ['Year', 'Sales', 'Expenses'],
//            ['2004',  1000,      400],
//            ['2005',  1170,      460],
//            ['2006',  660,       1120],
//            ['2007',  1030,      540]
//        ]);

        var data = google.visualization.arrayToDataTable([
            ['Date', 'Offer Hits'],
            <?php print offerSeries() ?>
        ]);

        var options = {
            title: '',
            hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
            vAxis: {title:'Offer Hits',minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
