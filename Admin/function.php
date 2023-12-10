<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Include necessary files and initialize your variables here
include 'connection/connection.php';
include 'reportfile/Sex.php';
include 'reportfile/Age.php';
include 'reportfile/dog_exposure.php';
include 'reportfile/cat_exposure.php';
include 'reportfile/cat_1.php';
include 'reportfile/protst_exposure.php';
include 'reportfile/totalreport.php';

// Organize your data in an array
$data = [
         ['Victoria', $mv, $fv, $less15, $greatervictoria, $victoria1, $strayvictoria1, $victoria, $strayvictoria, null, $cat1victoria, $cat2victoria, $cat3victoria, null, $tcvvictoria, $hrigvictoria, $erigVictoria],
        ['Tunasan', $mt, $ft, $Tunasan, $greatertunasan, $Tunasan1, $strayTunasan1, $Tunasan, $strayTunasan, null, $cat1tunasan, $cat2tunsan, $cat3tunsan, null, $tcvTunasan, $hrigTunasan, $erigTunasan],
        ['Poblacion', $mp, $fp, $Poblacion, $greaterPoblacion, $Poblacion1, $strayPoblacion1, $Poblacion, $strayPoblacion, null, $cat1Poblacion, $cat2Poblacion, $cat3Poblacion, null, $tcvPoblacion, $hrigPoblacion, $erigPoblacion],
        ['SouthVille', $ms, $fs, $Southville, $greaterSouthville, $Southville1, $straySouthville1, $Southville, $straySouthville, null, $cat1Southville, $cat2Southville, $cat3Southville, null, $tcvSouthville, $hrigSouthville, $erigSouthville],
        ['Putatan Main', $mpu, $fpu, $Putatan_Main, $greaterPutatan_Main, $Putatan_Main1, $strayPutatan_Main1, $Putatan_Main, $strayPutatan_Main, null, $cat1Putatan_Main, $cat2Putatan_Main, $cat3Putatan_Main, null, $tcvPutatan_Main, $hrigPutatan_Main, $erigPutatan_Main],
        ['Putatan Annex', $mpua, $fpua, $Putatan_Annex, $greaterPutatan_Annex, $Putatan_Annex1, $strayPutatan_Annex1, $Putatan_Annex, $strayPutatan_Annex, null, $cat1Putatan_Annex, $cat2Putatan_Annex, $cat3Putatan_Annex, null, $tcvPutatan_Annex, $hrigPutatan_Annex, $erigPutatan_Annex],
        ['Bayanan Main', $mb, $fb, $Bayanan_Main, $greaterBayanan_Main, $Bayanan_Main1, $strayBayanan_Main1, $Bayanan_Main, $strayBayanan_Main, null, $cat1Bayanan_Main, $cat2Bayanan_Main, $cat3Bayanan_Main, null, $tcvBayanan_Main, $hrigBayanan_Main, $erigBayanan_Main],
        ['Bayanan Annex', $mbannex, $fbannex, $Bayanan_Annex, $greaterBayanan_Annex, $Bayanan_Annex1, $strayBayanan_Annex1, $Bayanan_Annex, $strayBayanan_Annex, null, $cat1Bayanan_Annex, $cat2Bayanan_Annex, $cat3Bayanan_Annex, null, $tcvBayanan_Annex, $hrigBayanan_Annex, $erigBayanan_Annex],
        ['Alabang', $ma, $fa, $Alabang, $greaterAlabang, $Alabang1, $strayAlabang1, $Alabang, $strayAlabang, null, $cat1Alabang, $cat2Alabang, $cat3Alabang, null, $tcvAlabang, $hrigAlabang, $erigAlabang],
        ['Ayala', $mayala, $fayala, $Ayala, $greaterAyala, $Ayala1, $strayAyala1, $Ayala, $strayAyala, null, $cat1Ayala, $cat2Ayala, $cat3Ayala, null, $tcvAyala, $hrigAyala, $erigAyala],
        ['Cupang', $mc, $fc, $Cupang, $greaterCupang, $Cupang1, $strayCupang1, $Cupang, $strayCupang, null, $cat1Cupang, $cat2Cupang, $cat3Cupang, null, $tcvCupang, $hrigCupang, $erigCupang],
        ['Buli', $mb, $fb, $Buli, $greaterBuli, $Buli1, $strayBuli1, $Buli, $strayBuli, null, $cat1Buli, $cat2Buli, $cat3Buli, null, $tcvBuli, $hrigBuli, $erigBuli],
        ['Sucat', $msu, $fsu, $Sucat, $greaterSucat, $Sucat1, $straySucat1, $Sucat, $straySucat, null, $cat1Sucat, $cat2Sucat, $cat3Sucat, null, $tcvSucat, $hrigSucat, $erigSucat],
        ['B.Silang', $msilang, $fsilang, $Bagong_Silang, $greaterBagong_Silang, $Bagong_Silang1, $strayBagong_Silang1, $Bagong_Silang, $strayBagong_Silang, null, $cat1Bagong_Silang, $cat2Bagong_Silang, $cat3Bagong_Silang, null, $tcvBagong_Silang, $hrigBagong_Silang, $erigBagong_Silang],
        ['Sitio Sto.Nino', $mnino, $fnino, $Sitio, $greaterSitio, $Sitio1, $straysitio1, $Sitio, $straysitio, null, $cat1sitio, $cat2sitio, $cat3sitio, null, $tcvtSitio, $hrigSitio, $erigSitio],
        ['Total', $totalMale, $totalFemale, $totalLess15, $totalGreater15, $totalPetDog, $totalStrayDog, $totalPetCat, $totalStrayCat, null, $totalCat1, $totalCat2, $totalCat3, null, $totalTCV, $totalHRIG, $totalERIG],  
];

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Set the active sheet
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();

// Add headers to the sheet
$headers = ['Province/Area', 'Male', 'Female', '< 15', '> 15', 'Pet Dog', 'Stray Dog', 'Pet Cat', 'Stray Cat', 'Others', 'Cat I', 'Cat II', 'Cat III', 'N/C', 'TCV', 'HRIG', 'ERIG'];
foreach ($headers as $columnIndex => $header) {
    $sheet->setCellValueByColumnAndRow($columnIndex + 1, 1, $header);
}

// Add data to the sheet
foreach ($data as $rowIndex => $row) {
    foreach ($row as $columnIndex => $cellData) {
        $sheet->setCellValueByColumnAndRow($columnIndex + 1, $rowIndex + 2, $cellData);
    }
}

// Save the spreadsheet to a file
$writer = new Xlsx($spreadsheet);
$writer->save('exported_data.xlsx');

// Provide a link to download the generated Excel file
$downloadLink = 'exported_data.xlsx';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reports.css">
    <title>Reports</title>
</head>
<body>
<?php include 'nav.php' ?>
<main>
    <div class="box-reports">
        <div class="dlbtn">
            <h1>Reports</h1>
            <a href="<?php echo $downloadLink; ?>" download="exported_data.xlsx">Download Excel</a>
        </div>

        <div class="table">
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <?php foreach ($row as $cell): ?>
                                <td><?php echo $cell; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</main>
</body>
</html>
