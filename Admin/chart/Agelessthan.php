<?php
    include 'connection/connection.php';

    $query = "SELECT
        SUM(CASE WHEN age < 15 THEN 1 ELSE 0 END) AS total_age_less_than_15,
        SUM(CASE WHEN age > 15 THEN 1 ELSE 0 END) AS total_age_greater_than_15
        FROM
        patient_details
        GROUP BY age";

    $stmt = $conn->prepare($query);
    $stmt->execute();  
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Age Range', 'Count'],
            <?php foreach($arr as $key=>$val) {?>
                ['Age < 15', <?php echo $val['total_age_less_than_15']?>],
                ['Age > 15', <?php echo $val['total_age_greater_than_15']?>],
            <?php } ?>
            ]);

            var options = {
            title: 'Distribution of Ages',
            pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

            chart.draw(data, options);
        }
</script>