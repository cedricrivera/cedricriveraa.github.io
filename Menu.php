<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
$email = $_SESSION['Email'];
include "Admin/connection/connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="user-css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Menu</title>
</head>
<body>
    <?php
        if(isset($_SESSION['UserID'])) {
            $pid = $_SESSION['UserID'];
            // Check if the success message has already been displayed
            if (!isset($_SESSION['LoginSuccessDisplayed'])) {
                echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Login Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
                
                // Set a session variable to indicate that the success message has been displayed
                $_SESSION['LoginSuccessDisplayed'] = true;
            }
        } 
        else {
            // Redirect to the login page using PHP header
            header("Location: Login.php");
            exit;
        }
    ?>
    <?php include 'navbar.php' ?>

    <div class="main-container">
        <section id="Home">
            <img src="Image/Welcome.png" alt="">
            <div class="left">
                <h1>ANIMAL BITE CENTER</h1>
                <p>Animal Bite Treatment Centers (ABTC)- are health facilities owned and operated by either the National or Local Government Units (LGUs), providing Post-Exposure Prophylaxis (PEP) to rabies exposures in accordance with the DOH recommended management protocol.</p>
                <li><a href="Menu.php#footer">Contact Us</a></li>
            </div>
        </section>

        <section id="Appointment">
            <div data-aos="zoom-in" class="title">
                <h1>APPOINTMENT SCHEDULE</h1>
            </div>
            
            <div class="form">
                <div data-aos="zoom-in-right">
                <form action="appoint.php" method="POST">

                    <div class="input">
                        <label for="">Firstname</label>
                        <input type="text" name="fname" id="" placeholder="Enter Firstname" required>

                    </div>
                    <div class="input">
                        <label for="">Lastname</label>
                        <input type="text" name="lname" id="" placeholder="Enter Lastname" required>
                    </div>

                    <div class="input">
                        <label for="">Middlename</label>
                        <input type="text" name="mname" id="" placeholder="Enter Middlename">
                    </div>

                    <div class="input">
                        <label for="">Contact No. </label>
                        <input type="number" name="cnum" id="" placeholder="Enter Contact Number" required>
                    </div>

                    <div class="input">
                        <label for="">Reason</label>
                        <select name="reason" id="">
                            <option value="Bite">Bite</option>
                            <option value="Scratch">Scratch</option>
                        </select>
                    </div>

                    <div class="input">
                        <label>Accident Date</label>
                        <input type="date" name="accident-d" id="">
                    </div>

                    <div class="input">
                        <label>Symptoms</label>
                        <textarea name="symptoms" id="" cols="50" rows="3"></textarea>
                    </div>

                    <div class="btn">
                        <button type="submit" name="submit" id="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
            </div>

            <div class="status">
            <div data-aos="zoom-in-left">
                <table>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Reason</th>
                        <th>Date Appointment</th>
                        <th>Contact No.</th>
                        <th>Remarks</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM Appointment WHERE email = '$email'";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                    
                    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                    if ($result) {
                        foreach ($result as $row) {
                            ?>
                            <tr>
                                <td><?= $row->AppointID; ?></td>
                                <td><?= $row->reason; ?></td>
                                <td><?= $row->appointdate; ?></td>
                                <td><?= $row->cnum; ?></td>
                                <td><?= $row->remarks; ?></td>
                                <td><?= $row->status; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6">No Records</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                </div>
            </div>
        </section>

        <section id="Records">
            <div data-aos="fade-right">
                <h1>RECORDS</h1>
            </div>
            <div class="table">
                <div data-aos="zoom-in-up">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Remarks</th>
                                <th>Date Consulted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php 
                            $query = "SELECT patient_records.*, patient_details.email
                                    FROM patient_records
                                    LEFT JOIN patient_details ON patient_records.patient_detID = patient_details.patient_detID
                                    WHERE patient_details.email = '$email'";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();

                                $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                                if ($result) {
                                    foreach ($result as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row->patientID; ?></td>
                                            <td><?= $row->remark; ?></td>
                                            <td><?= $row->Date_Added; ?></td>
                                            <td>
                                                <i class="fa-solid fa-eye" id="show-modal" data-patientID="<?= $row->patientID; ?>"></i>
                                            </td>
                                        </tr>
                                <?php
                                        }
                                } else {
                                ?>
                                    <tr>
                                        <td colspan="3"> No Records </td>
                                    </tr>
                                <?php
                                }
                        ?>
                    </table>
                </div>
            </div>
        </section>
        
        <?php include 'footer.php' ?>
        <?php include 'message.php' ?>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="UserJS/user.js"></script>
</html>