<?php 
    if(!isset($_SESSION))
    session_start();

    if(isset($_GET['appointid'])){
        include 'connection/connection.php';
        $appointID = $_GET['appointid'];

        $sql = "SELECT * FROM Appointment WHERE AppointID = '$appointID'";
        $result = $conn->prepare($sql);
        $result->execute();

        $row = $result->fetch();
    };
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Appointment</h1>
    <form action="">
        <label>Firstname</label>
        <input type="text" name="fname" id="" value="<?php echo $row['fname'] ?> " disabled>

        <label>Lastname</label>
        <input type="text" name="lname" id="" value="">

        <label>Middle Name</label>
        <input type="text" name="mname" id="" value="">

        <label>Contact Number</label>
        <input type="text" name="cnum" id="" value="">

        <label>Address</label>
        <input type="text" name="address" id="" value="">

        <label>Age</label>
        <input type="text" name="age" id="" value="">

        <label>Sex</label>
        <input type="text" name="sex" id="" value="">

        <label>Email</label>
        <input type="email" name="email" id="" value="">

        <input type="button" value="Submit">
    </form>
</body>
</html>