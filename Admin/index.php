<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>    
    <?php include 'php/stats.php' ?>
    <?php include "nav.php" ?>
    <?php include 'chart/Agetopbite.php' ?>
    <?php include 'chart/Agelessthan.php' ?>
    <main class="main">
        <div id="Dashboard">

            <!-- TOTAL UESR ACCOUNTS -->
            <div class="user-account">
                <?php include 'chart/user-accounts.php' ?>
            </div>

            <!-- TOTAL APPOINTMENTS -->
            <div class="appointment-records">
                <?php include 'chart/tot-appoint.php' ?>
            </div>

            <!-- TOTAL UESR PATIENTS -->
            <div class="total-patients">
                <?php include 'chart/tot-patients.php' ?>
            </div>

            <!-- AGE GOT BITEN -->
            <div id="piechart1"></div>

            <!-- MOST AGE BITEN -->
            <div id="piechart2"></div>
            
            
        </div>
    </main>
</body>
</html>

