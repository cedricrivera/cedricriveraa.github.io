<?php
include 'Admin/connection/connection.php';

$query = "SELECT COUNT(age) AS tcount, age FROM patient_details GROUP BY age";

$stmt = $conn->prepare($query);
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>

    <div id="piechart1" style="width: 900px; height: 500px;"></div>
</body>
</html>
