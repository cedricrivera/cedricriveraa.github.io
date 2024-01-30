<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Month Selection</title>
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
<div class="box-reports">
    <div class="box-combobox"> 
        <form method="post" action="">
            <label for="month">Choose Month:</label>
            <select name="month" id="month">
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August </option> 
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
            <button type="submit" name="selectmonth">Submit</button>
        </form>
    </div>
</div>

<?php
// Include PhpSpreadsheet
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['selectmonth'])) {
    // Get the selected month from the form
    $selectedMonth = $_POST['month'];

    // Associative array to map months to their respective start and end dates
    $monthDates = [
        "January" => ["start" => "2024-01-01", "end" => "2024-01-31"],
        "February" => ["start" => "2024-02-01", "end" => "2024-02-28"],
        "March" => ["start" => "2024-03-01", "end" => "2024-03-31"],
        "April" => ["start" => "2024-04-01", "end" => "2024-04-30"],
        "May" => ["start" => "2024-05-01", "end" => "2024-05-31"],
        "June" => ["start" => "2024-06-01", "end" => "2024-06-30"],
        "July" => ["start" => "2024-07-01", "end" => "2024-07-31"],
        "August" => ["start" => "2024-08-01", "end" => "2024-08-31"],
        "September" => ["start" => "2024-09-01", "end" => "2024-09-30"],
        "October" => ["start" => "2024-10-01", "end" => "2024-10-31"],
        "November" => ["start" => "2024-11-01", "end" => "2024-11-30"],
        "December" => ["start" => "2024-12-01", "end" => "2024-12-31"]
    ];

    // Check if the selected month is valid
    if (!array_key_exists($selectedMonth, $monthDates)) {
        echo "<p>Please select a valid month.</p>";
        exit;
    }

    // Extract start and end dates based on the selected month
    $startDate = $monthDates[$selectedMonth]["start"];
    $endDate = $monthDates[$selectedMonth]["end"];

    // MS SQL Server connection details
    $serverName = "NAVAREZ\SQLEXPRESS";
    $databaseName = "Backup";
    $username = ""; 
    $password = ""; 

    try {
        // Create a PDO instance
        $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to fetch data grouped by province/area
        $sql = "
            SELECT 
                place_expo,
                SUM(CASE WHEN Sex = 'Male' THEN 1 ELSE 0 END) AS male,
                SUM(CASE WHEN Sex = 'Female' THEN 1 ELSE 0 END) AS female,
                SUM(CASE WHEN Age < 15 THEN 1 ELSE 0 END) AS age_lt_15,
                SUM(CASE WHEN Age > 15 THEN 1 ELSE 0 END) AS age_gt_15,
                SUM(CASE WHEN source_expo = 'Dog' THEN 1 ELSE 0 END) AS dog,
                SUM(CASE WHEN source_expo = 'Stray Dog' THEN 1 ELSE 0 END) AS stray_dog,
                SUM(CASE WHEN source_expo = 'Cat' THEN 1 ELSE 0 END) AS cat,
                SUM(CASE WHEN source_expo = 'Stray Cat' THEN 1 ELSE 0 END) AS stray_cat,
                SUM(CASE WHEN source_expo = 'Others' THEN 1 ELSE 0 END) AS others,
                SUM(CASE WHEN cat_expo = 'I' THEN 1 ELSE 0 END) AS cat_i,
                SUM(CASE WHEN cat_expo = 'II' THEN 1 ELSE 0 END) AS cat_ii,
                SUM(CASE WHEN cat_expo = 'III' THEN 1 ELSE 0 END) AS cat_iii,
                SUM(CASE WHEN cat_expo = 'N/C' THEN 1 ELSE 0 END) AS nc,
                SUM(CASE WHEN post_expo = 'TCV' THEN 1 ELSE 0 END) AS tcv,
                SUM(CASE WHEN post_expo = 'HRIG' THEN 1 ELSE 0 END) AS hrig,
                SUM(CASE WHEN post_expo = 'ERIG' THEN 1 ELSE 0 END) AS erig
            FROM 
                patient_records
            INNER JOIN 
                patient_details ON patient_records.patient_detID = patient_details.patient_detID
            WHERE 
                CAST(date_expo AS DATE) BETWEEN ? AND ?
            GROUP BY 
                place_expo;
        ";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);
        $stmt->execute([$startDate, $endDate]);

        // Initialize totals array
        $totals = array_fill_keys(
            ['male', 'female', 'age_lt_15', 'age_gt_15', 'dog', 'stray_dog', 'cat', 'stray_cat', 'others', 'cat_i', 'cat_ii', 'cat_iii', 'nc', 'tcv', 'hrig', 'erig'],
            0
        );

        // Fetch the data for the first time and store it in an array
        $dataArray = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $dataArray[] = $row;
        }

        // Display the results in the HTML table
        echo "<table>";
        echo "<tr>
                <th>Province/Area</th>
                <th>Male</th>
                <th>Female</th>
                <th>Age &lt; 15</th>
                <th>Age &gt; 15</th>
                <th>Dog</th>
                <th>Stray Dog</th>
                <th>Cat</th>
                <th>Stray Cat</th>
                <th>Others</th>
                <th>Cat I</th>
                <th>Cat II</th>
                <th>Cat III</th>
                <th>N/C</th>
                <th>TCV</th>
                <th>HRIG</th>
                <th>ERIG</th>
            </tr>";

        foreach ($dataArray as $row) {
            echo "<tr>";
            echo "<td>{$row['place_expo']}</td>";
            foreach ($totals as $key => $value) {
                echo "<td>{$row[$key]}</td>";
                $totals[$key] += $row[$key]; // Update totals
            }
            echo "</tr>";
        }

        // Display totals row
        echo "<tr><td>Total</td>";
        foreach ($totals as $total) {
            echo "<td>$total</td>";
        }
        echo "</tr>";

        echo "</table>";

        // Create a PhpSpreadsheet instance
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $columnHeaders = ['Province/Area', 'Male', 'Female', 'Age < 15', 'Age > 15', 'Dog', 'Stray Dog', 'Cat', 'Stray Cat', 'Others', 'Cat I', 'Cat II', 'Cat III', 'N/C', 'TCV', 'HRIG', 'ERIG'];
        $columnIndex = 1;
        foreach ($columnHeaders as $header) {
            $sheet->setCellValueByColumnAndRow($columnIndex++, 1, $header);
        }

        // Populate data into the spreadsheet using the stored array
        $rowIndex = 2;
        foreach ($dataArray as $row) {
            $columnIndex = 1;
            foreach ($row as $value) {
                $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $value);
            }
            $rowIndex++;
        }

        // Provide download link
        $writer = new Xlsx($spreadsheet);
        $filename = 'report_' . $selectedMonth . '.xlsx';
        $writer->save($filename);
        echo "<a href='$filename' download>Download Excel</a>";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close connection
    $conn = null;
}
?>
</body>
</html>
