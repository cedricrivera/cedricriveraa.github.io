<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['AdminID'])){
        echo"<script>
            window.location.href='../Login.php';
        </script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reports.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Reports</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <main>
        <div id="reports">
            <div class="reports-box">
                <h1>Reports</h1>
                <div class="table">
                    <div class="search">
                        <select name="select" id="select">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="May">June</option>
                            <option value="May">July</option>
                            <option value="May">August</option>
                            <option value="May">September</option>
                            <option value="May">October</option>
                            <option value="May">November</option>
                            <option value="May">December</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>