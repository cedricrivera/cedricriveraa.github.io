<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/patient_details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Patient Details</title>
</head>
<body>
    <?php include 'php-records/patient.php'?>
    <?php include 'connection/connection.php'?>
    <?php include 'nav.php' ?>
    <?php 
        $patient_detid = $_GET['patientid']; 
        $query = "SELECT * FROM patient_details where patient_detID = $patient_detid";
        $res = $conn->prepare($query);
        $res->execute();
        $row1 = $res->fetch();
    ?>
        <main>
            <div id="patient-details">
                <div class="p-1">
                    <h2>Patient Name:</h2>
                    <h3><?php echo $row1['fname'] . ' ' . $row1['lname']; ?></h3>

                    <h2>Patient ID No:</h2>
                    <h3><?php echo $row1['patient_detID']; ?></h3>
                </div>
            
                <div class="p-2">
                    <h1>PATIENT DETAILS</h1>
                    <h3>Firstname: <br><span><?php echo $row1['fname']; ?></span></h3>
                    <h3>Lastname: <br><span><?php echo $row1['lname']; ?></span></h3>
                    <h3>Age: <br><span><?php echo $row1['age']; ?></span></h3>
                    <h3>Gender: <br><span><?php echo $row1['Sex']; ?></span></h3>
                    <h3>Email: <br><span><?php echo $row1['email']; ?></span></h3>
                    <h3>Address: <br><span><?php echo $row1['address']; ?></span></h3>
                    <h3>Contact Number: <br><span><?php echo $row1['cnum']; ?></span></h3>
                    <h3>Date Registered: <br><span><?php echo $row1['Date_Added']; ?></span></h3>
                </div>
            <div class="p-3">
                <h1>Add Records</h1>
                <div class="btn">
                    <button type="button" id='btn-nr'><i class="fa-solid fa-plus"></i> Add New Record</button>   
                    <i class="fa-solid fa-arrow-left" id="btn-back" onclick="goBack('patient-records.php')"></i>
                </div>
                
                <div class="t-3">
                    <div id="scroll">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Category of Exposure</th>
                                <th>Remarks</th>
                                <th>Date Consulted</th>
                                <th>Action</th>

                                <?php
                                    $query = "SELECT patient_records.*, patient_details.patient_detID
                                            FROM patient_records
                                            INNER JOIN patient_details ON patient_records.patient_detID = patient_details.patient_detID
                                            WHERE patient_details.patient_detID = $patient_detid ;";

                                    $res = $conn->prepare($query);
                                    $res->execute();
                                    $rows = $res->fetchAll();

                                    if (!empty($rows)) { 
                                        foreach ($rows as $row) {
                                           
                                            ?>
                                            <tr>
                                                <td><a href="view-records.php?patientid=<?php echo $row['patient_detID'] ?>&recordid=<?php echo $row['patientID'] ?>"><?php echo $row['patientID'] ?></a></td>
                                                <td><?php echo $row['cat_expo'] ?></td>
                                                <td><?php echo $row['remark'] ?></td>
                                                <td><?php echo $row['Date_Added'] ?></td>
                                                <td>
                                                    <i class="fa-solid fa-trash" style="color: #eb3824;" id="btn-del" data-patientrecordID="<?php echo $row['patientID'] ?>" data-patientdetID="<?php echo $row['patient_detID'] ?>"></i>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                       
                                        ?>
                                        <tr>
                                            <td>0 Results</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ADD RECORDS MODAL -->
            <dialog class="n-modal">
                <div class="n-modal-content">
                    <h2>Add New Record</h2>
                    <form action="" method="POST" autocomplete="off">
                        <label for="e-date">Date of Exposure</label>
                            <input type="date" name="e-date" id="date">

                            <label for="p-expo">Place of Exposure</label>
                            <select name="p-expo" id="p-expo">
                                <option value="Victoria">Victoria</option>
                                <option value="Tunasan">Tunasa</option>
                                <option value="Poblacion">Poblacion</option>
                                <option value="Southville">Southville</option>
                                <option value="Putatan Main">Putatan Main</option>
                                <option value="Putatan Annex">Putatan Annex</option>
                                <option value="Bayanan Main">Bayanan Main</option>
                                <option value="Bayanan Annex">Bayanan Annex</option>
                                <option value="Alabang">Alabang</option>
                                <option value="Ayala">Ayala</option>
                                <option value="Cupang">Cupang</option>
                                <option value="Buli">Buli</option>
                                <option value="Sucat">Sucat</option>
                                <option value="Bagong Silang">Bagong Silang</option>
                                <option value="Sitio Sto. Niño">Sitio Sto. Niño</option>
                            </select>

                            <label for="t-expo">Type of Exposure</label>
                            <input type="text" name="t-expo" id="" placeholder="Enter Type of Exposure" required>

                            <label for="s-expo">Source of Exposure</label>
                            <select name="s-expo" id="">
                                <option value="Stray Dog">Stray Dog</option>
                                <option value="Dog">Dog</option>
                                <option value="Stray Cat">Stray Cat</option>
                                <option value="Cat">Cat</option>
                                <option value="Others">Others</option>
                            </select>

                            <label for="c-expo">Category of Exposure</label>
                            <select name="c-expo" id="gender" required>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                            </select>

                            <label for="post-expo">Post Exposure Prophylaxis</label>
                            <input type="text" name="post-expo" id="" placeholder="Enter Post Exposure Prophylaxis">

                            <br>
                                <label for="washing-bite">Washing of Bite Wound</label>
                                <select name="washing-bite" id="gender" required>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                
                                <label for="d-rig">Date RIG Given</label>
                                <input type="date" name="d-rig" id="">
                                
                            <h2>Anti-Rabies Vaccine</h2>

                            <label for="generic-name">Generic Name</label>
                            <input type="text" name="generic-name" id="" placeholder="Enter Generic Name" required>

                            <label for="brand-name">Brand Name</label>
                            <input type="text" name="brand-name" id="" placeholder="Enter Brand Name" required>

                            <label for="route">Route</label>
                                <select name="route" id="route" required>
                                    <option value="id">ID</option>
                                    <option value="im">IM</option>
                                </select>
                            
                            <label for="d-3">Day 3</label>
                            <input type="date" name="d-3" id="">

                            <label for="d-7">Day 7</label>
                            <input type="date" name="d-7" id="">

                            <label for="d-14">Day 14 (IM)</label>
                            <input type="date" name="d-14" id="">

                            <label for="d-14"><span>*</span>Day 28/30<span>*</span></label>
                            <input type="date" name="d-28" id="">

                            <p><span>*</span>Proceed with day 28/30 if dog is not alive after 14 days of observation</p>
                            <br>
                            <label for="staus-animal">Status Animal after D14 of Exposure</label>
                            <input type="text" name="staus-animal" id="" placeholder="Entet Status of Animal">

                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" id="" cols="40" rows="3"></textarea>

                            <label for="doc">Select Doctor</label>
                                <select name="doc" id="doc" required>
                                    <option value="doc1">Doc 1</option>
                                    <option value="doc2">Doc 2</option>
                                    <option value="doc2">Nurse 1</option>
                                    <option value="doc2">Nurse 1</option>
                                    <option value="doc2">Nurse 1</option>
                                    <option value="doc2">Nurse 1</option>
                                </select>

                            <button type="submit" name='AddnewRecord'id="modal-button">Save</button>
                     </form>
                        <i class="fa-solid fa-rectangle-xmark" id="n-close-button"></i>
                </div>
            </dialog>
            
        </div>
    </main>
    <script src="js/v-modal.js"></script>
    <?php include 'php-records/add-new-record.php'?>
    <?php include 'php/message.php' ?>
    <script>
        function goBack(a) {
            window.location.href=a;
        };
    </script>
   <script>
        const btndelete = document.querySelectorAll('#btn-del')

        btndelete.forEach((btn) => {
            btn.addEventListener('click', () => {
                Swal.fire({
                    title: 'Are you sure you want to delete?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                }).then((result) => {
                    if (result.isConfirmed) {
                        const patientrecordID = btn.getAttribute('data-patientrecordID');
                        const patientdetID = btn.getAttribute('data-patientdetID');
                        window.location.href = `php-records/del-records.php?deletepid=${patientrecordID}&patientdetID=${patientdetID}`;
                    }
                });
               
            });
        });
    </script>

<?php
    if(isset($_GET['msg'])){
        ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Successfuly Deleted',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        <?php
    }
?>
</body>
</html>