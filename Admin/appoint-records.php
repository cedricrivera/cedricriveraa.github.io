<?php 
    if(!isset($_SESSION))
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/appoint-records.css">
    <title>Appointment-Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include 'nav.php' ?>

    <main>
        <div class="appointrecords-box">
            <?php  
                if(isset($_GET['appointid'])){
                    include 'connection/connection.php';
                    $appointID = $_GET['appointid'];

                    $sql = "SELECT * FROM Appointment WHERE AppointID = '$appointID'";
                    $result = $conn->prepare($sql);
                    $result->execute();

                    $row = $result->fetch();
                }; 
            ?>
            <div class="top">
                <h2>Patient Name:</h2>
                <h3>sample</h3>
                <h2>Appointment ID No:</h2>
                <h3>202020</h3>
            </div>
            <div class="fillup">
                <h1>Add Records</h1>
                <hr>
                <form action="">
                    <div class="form-label">
                        <label>Firstname</label>
                        <input type="text" name="fname" id="" value="<?php echo $row['fname'] ?> " disabled>
                    </div>
                    
                    <div class="form-label">
                        <label>Lastname</label>
                        <input type="text" name="lname" id="" value="<?php echo $row['lname'] ?>" disabled>
                    </div>

                    <div class="form-label">
                        <label>Middle Name</label>
                        <input type="text" name="mname" id="" value="<?php echo $row['mname'] ?>" disabled>
                    </div>

                    <div class="form-label">
                        <label>Contact Number</label>
                        <input type="number" name="cnum" id="" value="<?php echo $row['cnum'] ?>" disabled>
                    </div>
                   
                    <div class="form-label">
                        <label>Address</label>
                        <input type="text" name="address" id="" value="<?php echo $row['mname'] ?>" disabled>
                    </div>
                    
                    <div class="form-label">
                        <label>Age</label>
                        <input type="text" name="age" id="" value="">
                    </div>
                    
                    <div class="form-label">
                        <label>Sex</label>
                        <input type="text" name="sex" id="" value="">
                    </div>
                    
                    <div class="form-label">
                        <label>Email</label>
                        <input type="email" name="email" id="" value="">
                    </div>
                    

                    <input type="button" value="Submit">
                </form>
            </div>
        </div>
    </main>
</body>
</html>