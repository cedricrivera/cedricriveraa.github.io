<?php

include 'Admin/connection/connection.php';

$query1 = "SELECT count(*) as total_count_Dog from patient_records where source_expo = 'Dog'";
$stmt = $conn->prepare($query1);
$stmt->execute();
$stmttotalDog = $stmt->fetch(PDO::FETCH_ASSOC);

$query2 = "SELECT count(*) as total_count_Straydog from patient_records where source_expo = 'Stray Dog'";
$stmt = $conn->prepare($query2);
$stmt->execute();
$stmttotalstrayDog = $stmt->fetch(PDO::FETCH_ASSOC);

$query3 = "SELECT count(*) as total_count_Cat from patient_records where source_expo = 'Cat'";
$stmt = $conn->prepare($query3);
$stmt->execute();
$stmttotalCat = $stmt->fetch(PDO::FETCH_ASSOC);

$query4 = "SELECT count(*) as total_count_StrayCat from patient_records where source_expo = 'Stray Cat'";
$stmt = $conn->prepare($query4);
$stmt->execute();
$stmttotalstrayCat = $stmt->fetch(PDO::FETCH_ASSOC);

// dog exposure 
$totalDogs = $stmttotalDog['total_count_Dog'] + $stmttotalstrayDog['total_count_Straydog'];
// cat exposre 
$totalCats = $stmttotalCat['total_count_Cat'] + $stmttotalstrayCat['total_count_StrayCat'];

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
            var data = google.visualization.arrayToDataTable([
                ['Source', 'Count'],
                ['Dog', <?php echo $stmttotalDog['total_count_Dog']; ?>],
                ['Stray Dog', <?php echo $stmttotalstrayDog['total_count_Straydog']; ?>],
                ['Cat', <?php echo $stmttotalCat['total_count_Cat']; ?>],
                ['Stray Cat', <?php echo $stmttotalstrayCat['total_count_StrayCat']; ?>]
            ]);

            var options = {
                title: 'Patient Records by Source of Exposure',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="piechart2" style="width: 900px; height: 500px;"></div>

        <div>
            <p>Total Dog Exposure: <?php echo $totalDogs; ?></p>
            <p>Total Cat Exposre: <?php echo $totalCats; ?> </p>
        </div>

</body>
</html>
