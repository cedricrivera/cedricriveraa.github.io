<?php

include 'Admin/connection/connection.php';
// Assuming you have a database connection

// Fetch the count of male patients from the database
$query = "SELECT
pr.place_expo,
pd.Sex,
(SELECT COUNT(*) FROM patient_details WHERE Sex = 'Male' And place_expo = 'Victoria') as maleCount
FROM
patient_details pd
INNER JOIN
patient_records pr ON pd.patient_detID = pr.patient_detID;";
$result = $conn->prepare($query);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

// Check if the query was successful
if ($row) {
    $maleCount = $row['maleCount'];
} else {
    // Handle the case when the query fails
    $maleCount = 0;
}

// Fetch the count of female patients from the database
$q2 = "SELECT Count(Sex) as femaleCount From patient_details Where Sex = 'Female'";
$re = $conn->prepare($q2);
$re->execute();
$row = $re->fetch(PDO:: FETCH_ASSOC);

if($row){
    $femaleCount = $row['femaleCount'];
}else{
    $femaleCount = 0;
}

// less 15 age 
$queryLessThan15 = "SELECT COUNT(*) AS total FROM patient_details WHERE age < 15";
$stmtLessThan15 = $conn->prepare($queryLessThan15);
$stmtLessThan15->execute();  
$row = $stmtLessThan15->fetch(PDO::FETCH_ASSOC);

if($row){
    $less15 = $row['total'];
}else{
    $less15 = 0;
}

// greater 15 age
$queryGreaterThan15 = "SELECT COUNT(*) AS total FROM patient_details WHERE age > 15";
$stmtGreaterThan15 = $conn->prepare($queryGreaterThan15);
$stmtGreaterThan15->execute();  
$row = $stmtGreaterThan15->fetch(PDO::FETCH_ASSOC);

if($row){
    $greater15 = $row['total'];
}else{
    $greater15 = 0;
}

// Dog Expo
$queryDog = "SELECT COUNT(*) as total_count_Dog FROM patient_records WHERE source_expo = 'Dog'";
$stmt = $conn->prepare($queryDog);
$stmt->execute();
$row = $totalDog = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $dogc = $row['total_count_Dog'];
}else{
    $dogc = 0;
}

// Stray Dog
$queryStrayDog = "SELECT COUNT(*) as total_count_Straydog FROM patient_records WHERE source_expo = 'Stray Dog'";
$stmt = $conn->prepare($queryStrayDog);
$stmt->execute();
$row = $totalStrayDog = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $straydog = $row['total_count_Straydog'];
}else{
    $straydog = 0;
}

// pet cat
$queryCat = "SELECT COUNT(*) as total_count_Cat FROM patient_records WHERE source_expo = 'Cat'";
$stmt = $conn->prepare($queryCat);
$stmt->execute();
$row = $totalCat = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $petcat = $row['total_count_Cat'];
}else{
    $petcat = 0;
}

// stray cat
$queryStrayCat = "SELECT COUNT(*) as total_count_StrayCat FROM patient_records WHERE source_expo = 'Stray Cat'";
$stmt = $conn->prepare($queryStrayCat);
$stmt->execute();
$row = $totalStrayCat = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $straycat = $row['total_count_StrayCat'];
}else{
    $straycat = 0;
}

// Cat - 1
$querycat1 = "SELECT COUNT(*) as total_count_Cat1 from patient_records Where cat_expo = 'I'";
$stmt = $conn->prepare($querycat1);
$stmt->execute();
$row = $totalcat1 = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $cat1 = $row['total_count_Cat1'];
}else{
    $cat1 = 0;
}

// Cat - 2
$querycat2 = "SELECT COUNT(*) as total_count_Cat2 from patient_records Where cat_expo = 'II'";
$stmt = $conn->prepare($querycat2);
$stmt->execute();
$row = $totalcat2 = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $cat2 = $row['total_count_Cat2'];
}else{
    $cat2 = 0;
}

// Cat - 3 
$querycat3 = "SELECT COUNT(*) as total_count_Cat3 from patient_records Where cat_expo = 'III'";
$stmt = $conn->prepare($querycat3);
$stmt->execute();
$row = $totalcat3 = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $cat3 = $row['total_count_Cat3'];
}else{
    $cat3 = 0;
}

// TCV 
$querytcv = "SELECT COUNT(*) as tcv from patient_records Where post_expo = 'TCV'";
$stmt = $conn->prepare($querytcv);
$stmt->execute();
$row = $totaltcv = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $tcv = $row['tcv'];
}else{
    $tcv = 0;
}

// HRIG
$queryhrig = "SELECT COUNT(*) as hrig from patient_records Where post_expo = 'HRIG'";
$stmt = $conn->prepare($queryhrig);
$stmt->execute();
$row = $totalhrig = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $hrig = $row['hrig'];
}else{
    $hrig = 0;
}

// ERIG
$queryerig = "SELECT COUNT(*) as erig from patient_records Where post_expo = 'ERIG'";
$stmt = $conn->prepare($queryerig);
$stmt->execute();
$row = $totalerig = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    $erig = $row['erig'];
}else{
    $erig = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provinces/Areas Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Province/Area</th>
            <th>Male</th>
            <th>Female</th>
            <th> < 15 </th>
            <th> > 15 </th>
            <th>Pet Dog</th>
            <th>Stray Dog</th>
            <th>Pet Cat</th>
            <th>Stray Cat</th>
            <th>Others</th>
            <th>Cat I</th>
            <th>Cat II </th>
            <th>Cat III</th>
            <th>N/C</th>
            <th>TCV</th>
            <th>HRIG</th>
            <th>ERIG</th>
            <!-- Add other columns as needed -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Victoria</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
            <!-- Add other cells as needed -->
        </tr>
        <tr>
            <td>Tunasan</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Poblacion</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>SouthVille</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Putatan Main</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Putatan Annex</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Bayanan Main</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Bayanan Annex</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Alabang</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Ayala</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Cupang</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Buli</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Sucat</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>B.Silang</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Sitio Sto.Nino</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><?php echo $maleCount; ?></td>
            <td><?php echo $femaleCount; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greater15; ?></td>
            <td><?php echo $dogc; ?></td>
            <td><?php echo $straydog; ?></td>
            <td><?php echo $petcat; ?></td>
            <td><?php echo $straycat; ?></td>
            <td> </td>
            <td><?php echo $cat1; ?></td>
            <td><?php echo $cat2; ?></td>
            <td><?php echo $cat3; ?></td>
            <td> </td>
            <td><?php echo $tcv; ?></td>
            <td><?php echo $hrig; ?></td>
            <td><?php echo $erig; ?></td>
        </tr>

        <!-- Add more rows as needed -->
    </tbody>
</table>

</body>
</html>
