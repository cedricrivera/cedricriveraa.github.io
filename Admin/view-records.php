<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/view-records.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <title>Patient View Records</title>
</head>
<body>
    <?php include 'connection/connection.php'?>
    <?php include 'nav.php' ?>
    <?php include 'php-records/get-info.php' ?>
<main>
    <?php 
        $row = $res->fetch(); 
        if($row) {
    ?>
        <div id="view-records">
            <?php 
                if(isset($_GET['appointID'])){
                    ?>
                        <div class="p-1">
                            <h2>Patient Name:</h2>
                            <h3><?php echo $_SESSION['Fname'] . " " . $_SESSION['Lname'] ?></h3>

                            <h2>Patient ID No:</h2>
                            <h3><?php echo $row['AppointID'] ?></h3>
                        </div>
                    <?php
                    include 'php-records/update-appointment-record.php';
                    
                } else{
                    ?>
                        <div class="p-1">
                            <h2>Patient Name:</h2>
                            <h3><?php echo $row['fname'] . " " . $row['lname'] ?></h3>

                            <h2>Patient ID No:</h2>
                            <h3><?php echo $row['patient_detID'] ?></h3>
                        </div>
                    <?php
                    include 'php-records/update-patient-records.php';
                }
            ?>
            
           
            
           <?php } ?>
        </div>
</main>
<script>
    <?php
    // Assuming $row['patient_detID'] and $row['AppointID'] are properly defined in PHP
    if (isset($_GET['patientid'])) {
        $patientID = json_encode($row['patient_detID']);
        echo "const patientID = $patientID;";
    } else {
        $appointId = json_encode($row['AppointID']);
        echo "const appointId = $appointId;";
    }
    ?>

    const backButton = document.querySelector('#back');
    backButton.addEventListener('click', () => {
        if (typeof patientID !== 'undefined') {
            window.location.href = `./patient-details.php?patientid=${patientID}`;
        } else if (typeof appointId !== 'undefined') {
            window.location.href = `./patient-details.php?appointID=${appointId}`;
        }
    });
</script>


    <script>
        
        function slc1() {
            var expo = document.querySelector('#c-expo');
            var post_expo = document.querySelector('#post_expo');

            post_expo.options.length = 0;

            if (expo.value == "II") {
                var optionArray = ['TCV ONLY'];
            } else if (expo.value == "III") {
                var optionArray = ['TCV + RIG', 'TCV + HRIG'];
            }

            for (var i = 0; i < optionArray.length; i++) {
                var newoption = document.createElement("option");
                newoption.value = optionArray[i];
                newoption.text = optionArray[i];

                // Set selected attribute based on PHP value
                if ('<?php echo $row['post_expo']; ?>' === optionArray[i]) {
                    newoption.selected = true;
                }

                post_expo.add(newoption);
            }
    

            // Call the function initially to populate options based on the default selection
            slc1();
        }
        
    </script>

  
</body>

</html>