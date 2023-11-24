<?php
include 'connection/connection.php';

$query = "SELECT COUNT(age) AS tcount, age FROM patient_details GROUP BY age";

$stmt = $conn->prepare($query);
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Age');
            data.addColumn('number', 'tcount');

            <?php foreach($arr as $val) { ?>
                data.addRow(['Age = <?php echo $val['age']; ?>', <?php echo $val['tcount']; ?>]);
            <?php } ?>

            var options = {
                title: 'Top Most Age Bitten'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>