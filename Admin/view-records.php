<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/view-records.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <title>Document</title>
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
            <div class="p-1">
                <h2>Patient Name:</h2>
                <h3><?php echo $row['fname'] . " " . $row['lname'] ?></h3>

                <h2>Patient ID No:</h2>
                <h3><?php echo $row['patient_detID'] ?></h3>
            </div>

            <div class="row2">
            <div class="p-3">
                <form action="php-records/update-records.php?idnew=<?php echo $row['patientID'] ?>&patientid=<?php echo $row['patient_detID'] ?>" method="POST">
                    <div class="history-exposure">
                        <i class="fa-solid fa-arrow-left" id="back"></i>

                        <h1>HISTORY EXPOSURE</h1>
                        <br>

                        <div class="input-group">
                            <div class="form-label">
                                <label for="e-date">Date of Exposure</label>
                                <input type="date" name="e-date" id="e-date" value="<?php echo $row['date_expo'] ?>">
                            </div>
                            <div class="form-label">
                                <label for="p-expo">Place of Exposure</label>
                                <select name="p-expo" id="p-expo">
                                    <option value="Victoria" <?php echo($row['place_expo'] == "Victoria")? 'selected' : ''; ?>>Victoria</option>
                                    <option value="Tunasan" <?php echo($row['place_expo'] == "Tunasan")? 'selected' : ''; ?>>Tunasan</option>
                                    <option value="Poblacion" <?php echo($row['place_expo'] == "Poblacion")? 'selected' : ''; ?>>Poblacion</option>
                                    <option value="Southville" <?php echo($row['place_expo'] == "Southville")? 'selected' : ''; ?>>Southville</option>
                                    <option value="Putatan Main" <?php echo($row['place_expo'] == "Putatan Main")? 'selected' : ''; ?>>Putatan Main</option>
                                    <option value="Putatan Annex" <?php echo($row['place_expo'] == "Putatan Annex")? 'selected' : ''; ?>>Putatan Annex</option>
                                    <option value="Bayanan Main" <?php echo($row['place_expo'] == "Bayanan Main")? 'selected' : ''; ?>>Bayanan Main</option>
                                    <option value="Bayanan Annex" <?php echo($row['place_expo'] == "Bayanan Annex")? 'selected' : ''; ?>>Bayanan Annex</option>
                                    <option value="Alabang" <?php echo($row['place_expo'] == "Alabang")? 'selected' : ''; ?>>Alabang</option>
                                    <option value="Ayala" <?php echo($row['place_expo'] == "Ayala")? 'selected' : ''; ?>>Ayala</option>
                                    <option value="Cupang" <?php echo($row['place_expo'] == "Cupang")? 'selected' : ''; ?>>Cupang</option>
                                    <option value="Buli" <?php echo($row['place_expo'] == "Buli")? 'selected' : ''; ?>>Buli</option>
                                    <option value="Sucat" <?php echo($row['place_expo'] == "Sucat")? 'selected' : ''; ?>>Sucat</option>
                                    <option value="Bagong Silang" <?php echo($row['place_expo'] == "Bagong Silang")? 'selected' : ''; ?>>Bagong Silang</option>
                                    <option value="Sitio Sto. Niño" <?php echo($row['place_expo'] == "Sitio Sto. Niño")? 'selected' : ''; ?>>Sitio Sto. Niño</option>
                                </select>
                            </div>

                            <div class="form-label">
                                <label for="t-expo">Type of Exposure</label>
                                <input type="text" name="t-expo" id="t-expo" placeholder="Enter Type of Exposure"
                                    value="<?php echo $row['type_expo'] ?>">
                            </div>

                            <div class="form-label">
                                <label for="s-expo">Source of Exposure</label>
                                <select name="s-expo" id="">
                                    <option value="Stray Dog" <?php echo ($row['source_expo'] == "Stray Dog")? 'selected' : ''; ?>>Stray Dog</option>
                                    <option value="Dog" <?php echo ($row['source_expo'] == "Dog")? 'selected' : ''; ?>>Dog</option>
                                    <option value="Stray Cat" <?php echo ($row['source_expo'] == "Stray Cat")? 'selected' : ''; ?>>Stray Cat</option>
                                    <option value="Cat" <?php echo ($row['source_expo'] == "Cat")? 'selected' : ''; ?>>Cat</option>
                                </select>
                            </div>

                            <div class="form-label">
                                <label for="c-expo">Category of Exposure</label>
                                <select name="c-expo" id="c-expo" required>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                </select>
                            </div>

                            <div class="form-label">
                                <label for="post-expo">Post Exposure Prophylaxis</label>
                                <input type="text" name="post-expo" id="post-expo" placeholder="Enter Post Exposure Prophylaxis"
                                    value="<?php echo $row['post_expo'] ?>">
                            </div>

                            <div class="form-label">
                                <label for="washing-bite">Washing of Bite Wound</label>
                                <select name="washing-bite" id="washing-bite" required>
                                    <option value="I">Yes</option>
                                    <option value="II">No</option>
                                </select>
                            </div>

                            <div class="form-label">
                                <label for="d-rig">Date RIG Given</label>
                                <input type="date" name="d-rig" id="d-rig" value="<?php echo $row['date_rig'] ?>">
                            </div>
                        </div>

                        <h1>Anti-Rabies Vaccine</h1>
                        <br>
                        <div class="input-group2">

                            <div class="form-label">
                                <label for="generic-name">Generic Name</label>
                                <input type="text" name="generic-name" id="generic-name"
                                    placeholder="Enter Generic Name" value="<?php echo $row['gen_name'] ?>">
                            </div>

                            <div class="form-label">
                                <label for="brand-name">Brand Name</label>
                                <input type="text" name="brand-name" id="brand-name" placeholder="Enter Brand Name"
                                    value="<?php echo $row['brand_name'] ?>">
                            </div>

                            <div class="form-label">
                                <label for="route">Route</label>
                                <select name="route" id="route" required>
                                    <option value="id">ID</option>
                                    <option value="im">IM</option>
                                </select>
                            </div>

                            <div class="form-label">
                                <label for="d-3">Day 3</label>
                                <input type="date" name="d-3" id="d-3" value="<?php echo $row['day3'] ?>">
                            </div>

                            <div class="form-label">
                                <label for="d-7">Day 7</label>
                                <input type="date" name="d-7" id="d-7" value="<?php echo $row['day7'] ?>">
                            </div>

                            <div class="form-label">
                                <label for="d-14">Day 14 (IM)</label>
                                <input type="date" name="d-14" id="d-14" value="<?php echo $row['day14_IM'] ?>">
                            </div>

                            <div class="form-label">
                                <label for="d-28_30"><span>*</span>Day 28/30<span>*</span></label>
                                <input type="date" name="d-28_30" id="d-28_30"
                                    value="<?php echo $row['day28_30'] ?>">
                                <p><span>*</span>Proceed with day 28/30 if dog is not alive after 14 days of observation</p>
                            </div>

                            <div class="form-label" id="status">
                                <label for="status-animal">Status Animal after D14 of Exposure</label>
                                <input type="text" name="status-animal" id="status-animal"
                                    value="<?php echo $row['Status'] ?>">
                            </div>

                            <div class="form-label" id="remarks">
                                <label for="remarks">Remarks</label>
                                <textarea name="remarks" id="remarks" cols="40" rows="3"><?php echo $row['remark'] ?></textarea>
                            </div>

                            <div class="form-label" id="doctor">
                                <label for="doc">Select Doctor</label>
                                <select name="doc" id="doc" required>
                                    <option value="doc1">Doc 1</option>
                                    <option value="doc2">Doc 2</option>
                                    <option value="doc3">Nurse 2</option>
                                    <option value="doc4">Nurse 3</option>
                                    <option value="doc5">Nurse 4</option>
                                    <option value="doc6">Nurse 5</option>
                                </select>
                                
                            </div> 
                               
                                <div id="v-btn">
                                    <button type="submit" name="update-btn" id="vs-btn">Save</button>
                                </div> 
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</main>
    <script>
         const backButton = document.querySelector('#back')
            backButton.addEventListener('click', () => {
                const patientID = <?php echo json_encode($row['patient_detID']); ?>; // Make sure $row['patient_detID'] is defined in your PHP context.
                window.location.href = `./patient-details.php?patientid=${patientID}`;
            });
    </script>

  
</body>

</html>