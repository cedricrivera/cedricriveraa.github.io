<?php
    if(!session_id()){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/patient_records.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").on("keyup", function(){
                    var value =$(this).val().toLowerCase();
                    $("#mytable tr").filter(function(){
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    <title>Patient Records</title>
</head>
<body>

    <?php include "nav.php";?>

    <main class="main">
        <div id="Patient-Records">
            <div class="patient-box">
                <div class="title">
                    <h1>Patient Records</h1>
                </div>

                <div class="search">
                    <form action="" method="post">
                        <input type="text" name="search" id="search" placeholder="Search:">
                    </form>
                </div>

                <div class="btn"> 
                    <button type="button" id="open-button"><i class="fa-solid fa-user-plus"></i> Add Patient</button>
                </div>

                <div class="t-patient">
                    <div id="scroll">
                        <table>
                            <tr>
                                <th>Patient ID No.</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Contact No.</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                            
                            <?php 
                            include 'connection/connection.php';
                            $sql = "select * from patient_details";
                            $res = $conn->prepare($sql);
                            $res->execute();
                            $rows = $res->fetchAll();

                            if(!empty($rows)){ 
                                $count = 0;
                                foreach($rows as $row){
                                    $count++;
                            ?>
                            <tbody id="mytable">
                                <tr>
                                    <td id="link-table"><a href="patient-details.php?patientid=<?php echo $row['patient_detID']?>"><?php echo $row['patient_detID']?></a></td>
                                    <td><?php echo $row['lname']?></td>
                                    <td><?php echo $row['fname']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['Sex']?></td>
                                    <td><?php echo $row['age']?></td>
                                    <td><?php echo $row['cnum']?></td>
                                    <td><?php echo $row['Date_Added']?></td>
                                    <td>
                                        <i class="fa-solid fa-pen-to-square" style="color: #26ab66;" id="btn-edit"></i>
                                        <i class="fa-solid fa-trash" style="color: #eb3824;" id="btn-delete" data-deleteid="<?php echo $row['patient_detID'] ?>"></i>
                                    </td>
                                </tr>
                                    
                                <?php } } else{ ?>    
                                    <td>0 Results</td>
                                <?php 
                                } ?>
                            </tbody>
                        </table>
                    </div> 
                </div>

                <dialog class="modal" id="modal">
                    <div class="modal-content">
                    <h2>Add Patient Record</h2>
                        <form action="" method="post">

                            <label for="PatientID">Patient ID no.</label>
                            <input type="text" name="" id="" disabled>

                            <label for="name">Lastname</label>
                            <input type="text" name="lname" id="" placeholder="Enter your Lastname" required>

                            <label for="name">Firstname</label>
                            <input type="text" name="fname" id="" placeholder="Enter your Firstname" required>

                            <label for="name">Middle Name</label>
                            <input type="text" name="mname" id="" placeholder="Enter your Middle Name" required>
                            
                            <label for="name">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter your Email" required>

                            <label for="name">Address</label>
                            <input type="text" name="address" id="" placeholder="Enter your Address" required>

                            <label for="name">Age</label>
                            <input type="text" name="age" id="" placeholder="Enter your Age" required>

                            <label for="contact">Contact Number</label>
                            <input type="text" name="cnum" id="" placeholder="Enter your Contact Number" required>

                            <label for="sex">Sex</label>
                            <select name="sex" id="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>


                            <h2>History of Exposure</h2>
                            
                            <label for="e-date">Date of Exposure</label>
                            <input type="date" name="e-date" id="" value="">

                            <label for="p-expo">Place of Exposure</label>
                            <select name="p-expo" id="p-expo">
                                <option value="Victoria">Victoria</option>
                                <option value="Tunasan">Tunasa</option>
                                <option value="Poblacion">Poblacion</option>
                                <option value="Southville">Southville</option>
                                <option value="Putatan_Main">Putatan Main</option>
                                <option value="Putatan_Annex">Putatan Annex</option>
                                <option value="Bayanan_Main">Bayanan Main</option>
                                <option value="Bayanan_Annex">Bayanan Annex</option>
                                <option value="Alabang">Alabang</option>
                                <option value="Ayala">Ayala</option>
                                <option value="Cupang">Cupang</option>
                                <option value="Buli">Buli</option>
                                <option value="Sucat">Sucat</option>
                                <option value="Bagong_Silang">Bagong Silang</option>
                                <option value="Sitio_Sto._Niño">Sitio Sto. Niño</option>
                            </select>

                            <label for="t-expo">Type of Exposure</label>
                            <input type="text" name="t-expo" id="" placeholder="Enter Type of Exposure" >

                            <label for="s-expo">Source of Exposure</label>
                            <select name="s-expo" id="">
                                <option value="Stray Dog">Stray Dog</option>
                                <option value="Dog">Dog</option>
                                <option value="Stray Cat">Stray Cat</option>
                                <option value="Cat">Cat</option>
                                <option value="Others">Others</option>
                            </select>

                            <label for="c-expo">Category of Exposure</label>
                            <select name="c-expo" id="gender" >
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                            </select>

                            <label for="post-expo">Post Exposure Prophylaxis</label>
                            <input type="text" name="post-expo" id="" placeholder="Enter Post Exposure Prophylaxis">

                            <br>
                                <label for="washing-bite">Washing of Bite Wound</label>
                                <select name="washing-bite" id="" >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                
                                <label for="d-rig">Date RIG Given</label>
                                <input type="date" name="d-rig" id="">
                                
                            <h2>Anti-Rabies Vaccine</h2>

                            <label for="generic-name">Generic Name</label>
                            <input type="text" name="generic-name" id="" placeholder="Enter Generic Name" >

                            <label for="brand-name">Brand Name</label>
                            <input type="text" name="brand-name" id="" placeholder="Enter Brand Name" >

                            <label for="route">Route</label>
                                <select name="route" id="route" >
                                    <option value="ID">ID</option>
                                    <option value="IM">IM</option>
                                </select>
                            
                            <label for="d-3">Day 3</label>
                            <input type="date" name="d-3" id="">

                            <label for="d-7">Day 7</label>
                            <input type="date" name="d-7" id="">

                            <label for="d-14">Day 14 (IM)</label>
                            <input type="date" name="d-14" id="">

                            <label for="d-28"><span>*</span>Day 28/30<span>*</span></label>
                            <input type="date" name="d-28" id="">

                            <p><span>*</span>Proceed with day 28/30 if dog is not alive after 14 days of observation</p>
                            <br>
                            <label for="staus-animal">Status Animal after D14 of Exposure</label>
                            <input type="text" name="status-animal" id="" placeholder="Entet Status of Animal">

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
                            <button type="submit" name="save" id="modal-button">Save</button>
                        </form>
                        <i class="fa-solid fa-rectangle-xmark" id="close-button"></i>
                    </div>
                </dialog>
            </div>
        </div>
    </main>
    <script src="js/patient-records.js"></script>
    <?php include 'php-records/add-p.php'?>
    <?php include 'php/message.php' ?>
</body>
</html>