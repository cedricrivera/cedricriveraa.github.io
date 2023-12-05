<?php

include 'Admin/connection/connection.php';
include 'Sex.php';
include 'Age.php';
include 'dog_exposure.php';
include 'cat_exposure.php';
include 'cat_1.php';
include 'protst_exposure.php';
include 'totalreport.php';
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
            <td><?php echo $mv; ?></td>
            <td><?php echo $fv; ?></td>
            <td><?php echo $less15; ?></td>
            <td><?php echo $greatervictoria; ?></td>
            <td><?php echo $victoria1; ?></td>
            <td><?php echo $strayvictoria1; ?></td>
            <td><?php echo $victoria; ?></td>
            <td><?php echo $strayvictoria; ?></td>
            <td> </td>
            <td><?php echo $cat1victoria; ?></td>
            <td><?php echo $cat2victoria; ?></td>
            <td><?php echo $cat3victoria; ?></td>
            <td> </td>
            <td><?php echo $tcvvictoria; ?></td>
            <td><?php echo $hrigvictoria; ?></td>
            <td><?php echo $erigVictoria; ?></td>
            <!-- Add other cells as needed -->
        </tr>
        <tr>
            <td>Tunasan</td>
            <td><?php echo $mt; ?></td>
            <td><?php echo $ft; ?></td>
            <td><?php echo $Tunasan; ?></td>
            <td><?php echo $greatertunasan; ?></td>
            <td><?php echo $Tunasan1; ?></td>
            <td><?php echo $strayTunasan1; ?></td>
            <td><?php echo $Tunasan; ?></td>
            <td><?php echo $strayTunasan; ?></td>
            <td> </td>
            <td><?php echo $cat1tunasan; ?></td>
            <td><?php echo $cat2tunsan; ?></td>
            <td><?php echo $cat3tunsan; ?></td>
            <td> </td>
            <td><?php echo $tcvTunasan; ?></td>
            <td><?php echo $hrigTunasan; ?></td>
            <td><?php echo $erigTunasan; ?></td>
        </tr>
        <tr>
            <td>Poblacion</td>
            <td><?php echo $mp; ?></td>
            <td><?php echo $fp; ?></td>
            <td><?php echo $Poblacion; ?></td>
            <td><?php echo $greaterPoblacion; ?></td>
            <td><?php echo $Poblacion1; ?></td>
            <td><?php echo $strayPoblacion1; ?></td>
            <td><?php echo $Poblacion; ?></td>
            <td><?php echo $strayPoblacion; ?></td>
            <td> </td>
            <td><?php echo $cat1Poblacion; ?></td>
            <td><?php echo $cat2Poblacion; ?></td>
            <td><?php echo $cat3Poblacion; ?></td>
            <td> </td>
            <td><?php echo $tcvPoblacion; ?></td>
            <td><?php echo $hrigPoblacion; ?></td>
            <td><?php echo $erigPoblacion; ?></td>
        </tr>
        <tr>
            <td>SouthVille</td>
            <td><?php echo $ms; ?></td>
            <td><?php echo $fs; ?></td>
            <td><?php echo $Southville; ?></td>
            <td><?php echo $greaterSouthville; ?></td>
            <td><?php echo $Southville1; ?></td>
            <td><?php echo $straySouthville1; ?></td>
            <td><?php echo $Southville; ?></td>
            <td><?php echo $straySouthville; ?></td>
            <td> </td>
            <td><?php echo $cat1Southville; ?></td>
            <td><?php echo $cat2Southville; ?></td>
            <td><?php echo $cat3Southville; ?></td>
            <td> </td>
            <td><?php echo $tcvSouthville; ?></td>
            <td><?php echo $hrigSouthville; ?></td>
            <td><?php echo $erigSouthville; ?></td>
        </tr>
        <tr>
            <td>Putatan Main</td>
            <td><?php echo $mpu; ?></td>
            <td><?php echo $fpu; ?></td>
            <td><?php echo $Putatan_Main; ?></td>
            <td><?php echo $greaterPutatan_Main; ?></td>
            <td><?php echo $Putatan_Main1; ?></td>
            <td><?php echo $strayPutatan_Main1; ?></td>
            <td><?php echo $Putatan_Main; ?></td>
            <td><?php echo $strayPutatan_Main; ?></td>
            <td> </td>
            <td><?php echo $cat1Putatan_Main; ?></td>
            <td><?php echo $cat2Putatan_Main; ?></td>
            <td><?php echo $cat3Putatan_Main; ?></td>
            <td> </td>
            <td><?php echo $tcvPutatan_Main; ?></td>
            <td><?php echo $hrigPutatan_Main; ?></td>
            <td><?php echo $erigPutatan_Main; ?></td>
        </tr>
        <tr>
            <td>Putatan Annex</td>
            <td><?php echo $mpua; ?></td>
            <td><?php echo $fpua; ?></td>
            <td><?php echo $Putatan_Annex; ?></td>
            <td><?php echo $greaterPutatan_Annex; ?></td>
            <td><?php echo $Putatan_Main1; ?></td>
            <td><?php echo $strayPutatan_Annex1; ?></td>
            <td><?php echo $Putatan_Annex; ?></td>
            <td><?php echo $strayPutatan_Annex; ?></td>
            <td> </td>
            <td><?php echo $cat1Putatan_Annex; ?></td>
            <td><?php echo $cat2Putatan_Annex; ?></td>
            <td><?php echo $cat3Putatan_Annex; ?></td>
            <td> </td>
            <td><?php echo $tcvPutatan_Annex; ?></td>
            <td><?php echo $hrigPutatan_Annex; ?></td>
            <td><?php echo $erigPutatan_Annex; ?></td>
        </tr>
        <tr>
            <td>Bayanan Main</td>
            <td><?php echo $mb; ?></td>
            <td><?php echo $fb; ?></td>
            <td><?php echo $Bayanan_Main; ?></td>
            <td><?php echo $greaterBayanan_Main; ?></td>
            <td><?php echo $Bayanan_Main1; ?></td>
            <td><?php echo $strayBayanan_Main1; ?></td>
            <td><?php echo $Bayanan_Main; ?></td>
            <td><?php echo $strayBayanan_Main; ?></td>
            <td> </td>
            <td><?php echo $cat1Bayanan_Main; ?></td>
            <td><?php echo $cat2Bayanan_Main; ?></td>
            <td><?php echo $cat3Bayanan_Main; ?></td>
            <td> </td>
            <td><?php echo $tcvBayanan_Main; ?></td>
            <td><?php echo $hrigBayanan_Main; ?></td>
            <td><?php echo $erigBayanan_Main; ?></td>
        </tr>
        <tr>
            <td>Bayanan Annex</td>
            <td><?php echo $mbannex; ?></td>
            <td><?php echo $fbannex; ?></td>
            <td><?php echo $Bayanan_Annex; ?></td>
            <td><?php echo $greaterBayanan_Annex; ?></td>
            <td><?php echo $Bayanan_Annex1; ?></td>
            <td><?php echo $strayBayanan_Annex1; ?></td>
            <td><?php echo $Bayanan_Annex; ?></td>
            <td><?php echo $strayBayanan_Annex; ?></td>
            <td> </td>
            <td><?php echo $cat1Bayanan_Annex; ?></td>
            <td><?php echo $cat2Bayanan_Annex; ?></td>
            <td><?php echo $cat3Bayanan_Annex; ?></td>
            <td> </td>
            <td><?php echo $tcvBayanan_Annex; ?></td>
            <td><?php echo $hrigBayanan_Annex; ?></td>
            <td><?php echo $erigBayanan_Annex; ?></td>
        </tr>
        <tr>
            <td>Alabang</td>
            <td><?php echo $ma; ?></td>
            <td><?php echo $fa; ?></td>
            <td><?php echo $Alabang; ?></td>
            <td><?php echo $greaterAlabang; ?></td>
            <td><?php echo $Alabang1; ?></td>
            <td><?php echo $strayAlabang1; ?></td>
            <td><?php echo $Alabang; ?></td>
            <td><?php echo $strayAlabang; ?></td>
            <td> </td>
            <td><?php echo $cat1Alabang; ?></td>
            <td><?php echo $cat2Alabang; ?></td>
            <td><?php echo $cat3Alabang; ?></td>
            <td> </td>
            <td><?php echo $tcvAlabang; ?></td>
            <td><?php echo $hrigAlabang; ?></td>
            <td><?php echo $erigAlabang; ?></td>
        </tr>
        <tr>
            <td>Ayala</td>
            <td><?php echo $mayala; ?></td>
            <td><?php echo $fayala; ?></td>
            <td><?php echo $Ayala; ?></td>
            <td><?php echo $greaterAyala; ?></td>
            <td><?php echo $Ayala1; ?></td>
            <td><?php echo $strayAyala1; ?></td>
            <td><?php echo $Ayala; ?></td>
            <td><?php echo $strayAyala; ?></td>
            <td> </td>
            <td><?php echo $cat1Ayala; ?></td>
            <td><?php echo $cat2Ayala; ?></td>
            <td><?php echo $cat3Ayala; ?></td>
            <td> </td>
            <td><?php echo $tcvAyala; ?></td>
            <td><?php echo $hrigAyala; ?></td>
            <td><?php echo $erigAyala; ?></td>
        </tr>
        <tr>
            <td>Cupang</td>
            <td><?php echo $mc; ?></td>
            <td><?php echo $fc; ?></td>
            <td><?php echo $Cupang; ?></td>
            <td><?php echo $greaterCupang; ?></td>
            <td><?php echo $Cupang1; ?></td>
            <td><?php echo $strayCupang1; ?></td>
            <td><?php echo $Cupang; ?></td>
            <td><?php echo $strayCupang; ?></td>
            <td> </td>
            <td><?php echo $cat1Cupang; ?></td>
            <td><?php echo $cat2Cupang; ?></td>
            <td><?php echo $cat3Cupang; ?></td>
            <td> </td>
            <td><?php echo $tcvCupang; ?></td>
            <td><?php echo $hrigCupang; ?></td>
            <td><?php echo $erigCupang; ?></td>
        </tr>
        <tr>
            <td>Buli</td>
            <td><?php echo $mb; ?></td>
            <td><?php echo $fb; ?></td>
            <td><?php echo $Buli; ?></td>
            <td><?php echo $greaterBuli; ?></td>
            <td><?php echo $Buli1; ?></td>
            <td><?php echo $strayBuli1; ?></td>
            <td><?php echo $Buli; ?></td>
            <td><?php echo $strayBuli; ?></td>
            <td> </td>
            <td><?php echo $cat1Buli; ?></td>
            <td><?php echo $cat2Buli; ?></td>
            <td><?php echo $cat3Buli; ?></td>
            <td> </td>
            <td><?php echo $tcvBuli; ?></td>
            <td><?php echo $hrigBuli; ?></td>
            <td><?php echo $erigBuli; ?></td>
        </tr>
        <tr>
            <td>Sucat</td>
            <td><?php echo $msu; ?></td>
            <td><?php echo $fsu; ?></td>
            <td><?php echo $Sucat; ?></td>
            <td><?php echo $greaterSucat; ?></td>
            <td><?php echo $Sucat1; ?></td>
            <td><?php echo $straySucat1; ?></td>
            <td><?php echo $Sucat; ?></td>
            <td><?php echo $straySucat; ?></td>
            <td> </td>
            <td><?php echo $cat1Sucat; ?></td>
            <td><?php echo $cat2Sucat; ?></td>
            <td><?php echo $cat3Sucat; ?></td>
            <td> </td>
            <td><?php echo $tcvSucat; ?></td>
            <td><?php echo $hrigSucat; ?></td>
            <td><?php echo $erigSucat; ?></td>
        </tr>
        <tr>
            <td>B.Silang</td>
            <td><?php echo $msilang; ?></td>
            <td><?php echo $fsilang; ?></td>
            <td><?php echo $Bagong_Silang; ?></td>
            <td><?php echo $greaterBagong_Silang; ?></td>
            <td><?php echo $Bagong_Silang1; ?></td>
            <td><?php echo $strayBagong_Silang1; ?></td>
            <td><?php echo $Bagong_Silang; ?></td>
            <td><?php echo $strayBagong_Silang; ?></td>
            <td> </td>
            <td><?php echo $cat1Bagong_Silang; ?></td>
            <td><?php echo $cat2Bagong_Silang; ?></td>
            <td><?php echo $cat3Bagong_Silang; ?></td>
            <td> </td>
            <td><?php echo $tcvBagong_Silang; ?></td>
            <td><?php echo $hrigBagong_Silang; ?></td>
            <td><?php echo $erigBagong_Silang; ?></td>
        </tr>
        <tr>
            <td>Sitio Sto.Nino</td>
            <td><?php echo $mnino; ?></td>
            <td><?php echo $fnino; ?></td>
            <td><?php echo $Sitio; ?></td>
            <td><?php echo $greaterSitio; ?></td>
            <td><?php echo $Sitio1; ?></td>
            <td><?php echo $straysitio1; ?></td>
            <td><?php echo $Sitio; ?></td>
            <td><?php echo $straysitio; ?></td>
            <td> </td>
            <td><?php echo $cat1sitio; ?></td>
            <td><?php echo $cat2sitio; ?></td>
            <td><?php echo $cat3sitio; ?></td>
            <td> </td>
            <td><?php echo $tcvtSitio; ?></td>
            <td><?php echo $hrigSitio; ?></td>
            <td><?php echo $erigSitio; ?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><?php echo $totalMale; ?></td>
            <td><?php echo $totalFemale; ?></td>
            <td><?php echo $totalLess15; ?></td>
            <td><?php echo $totalGreater15; ?></td>
            <td><?php echo $totalPetDog; ?></td>
            <td><?php echo $totalStrayDog; ?></td>
            <td><?php echo $totalPetCat; ?></td>
            <td><?php echo $totalStrayCat; ?></td>
            <td><?php ?></td>
            <td><?php echo $totalCat1; ?></td>
            <td><?php echo $totalCat2; ?></td>
            <td><?php echo $totalCat3; ?></td>
            <td><?php ?></td>
            <td><?php echo $totalTCV; ?></td>
            <td><?php echo $totalHRIG; ?></td>
            <td><?php echo $totalERIG; ?></td>
        </tr>
    

        <!-- Add more rows as needed -->
    </tbody>
</table>

</body>
</html>
