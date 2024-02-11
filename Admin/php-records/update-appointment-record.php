<div class="row2">
    <div class="p-3">
        <form action="php-records/update-records.php?recordidnew=<?php echo $row['patientID'] ?>&appointid=<?php echo $row['AppointID'] ?>" method="POST">
            <div class="history-exposure">
                <i class="fa-solid fa-arrow-left" id="back"></i>

                <div class="status_rec">
                    <label>Status</label>
                    <select name="status_rec" id="">
                        <option value="INCOMPLETE" <?php echo($row['status_record'] == 'INCOMPLETE')? 'selected' : ''; ?>>INCOMPLETE</option>
                        <option value="COMPLETED" <?php echo($row['status_record'] == 'COMPLETED')? 'selected' : ''; ?>>COMPLETED</option>
                    </select>
                </div>

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
                            <option value="Pet Dog" <?php echo ($row['source_expo'] == "Pet Dog")? 'selected' : ''; ?>>Dog</option>
                            <option value="Stray Cat" <?php echo ($row['source_expo'] == "Stray Cat")? 'selected' : ''; ?>>Stray Cat</option>
                            <option value="Pet Cat" <?php echo ($row['source_expo'] == "Pet Cat")? 'selected' : ''; ?>>Cat</option>
                        </select>
                    </div>

                    <div class="form-label">
                        <label for="c-expo">Category of Exposure</label>
                        <select name="c-expo" id="c-expo" required onchange="slc1()">
                            <option value="II" <?php echo ($row['cat_expo'] == "II") ? 'selected' : ''; ?>>II</option>
                            <option value="III" <?php echo ($row['cat_expo'] == "III") ? 'selected' : ''; ?>>III</option>
                        </select>
                    </div>

                    <div class="form-label">
                        <label for="post-expo">Post Exposure Prophylaxis</label>
                        <select name="post-expo" id="post_expo">
                            <option value="TCV ONLY" <?php echo ($row['post_expo']=="TCV ONLY")? 'selected' : '' ?>>TCV ONLY</option>
                            <option value="TCV + RIG" <?php echo ($row['post_expo']=="TCV + RIG")? 'selected' : '' ?>>TCV + RIG</option>
                            <option value="TCV + HRIG" <?php echo ($row['post_expo']=="TCV + HRIG")? 'selected' : '' ?>>TCV + HRIG</option>
                        </select>
                    </div>

                    <div class="form-label">
                        <label for="washing-bite">Washing of Bite Wound</label>
                        <select name="washing-bite" id="washing-bite" required>
                            <option value="Yes" <?php echo($row['washing_bite'] == "Yes")? 'selected' : '' ?>>Yes</option>
                            <option value="No" <?php echo($row['washing_bite'] == "No")? 'selected' : '' ?>>No</option>
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
                            <option value="ID" <?php echo($row["route"] == 'ID')? 'selected' : '' ?>>ID</option>
                            <option value="IM" <?php echo($row["route"] == 'IM')? 'selected' : '' ?>>IM</option>
                        </select>
                    </div>

                    <div class="form-label">
                        <label for="d-0">Day 0</label>
                        <input type="date" name="d-0" id="d-0" value="<?php echo $row['day0'] ?>">
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
                        <input type="text" name="d-28_30" id="d-28_30" placeholder="YYYY-MM-DD"
                            value="<?php echo $row['day28_30'] ?>">
                        <small>Proceed with day 28/30 if dog is not alive after 14 days of observation</small>
                    </div>

                    <div class="form-label" id="status">
                        <label for="staus-animal">Status Animal after D14 of Exposure</label>
                        <select name="status-animal" id="">
                            <option value="Alive" <?php echo($row['Status'] == 'Alive')? 'selected' : '' ?>>Alive</option>
                            <option value="Dead" <?php echo($row['Status'] == 'Dead')? 'selected' : '' ?>>Dead</option>
                        </select>
                    </div>

                    <div class="form-label" id="doctor">
                        <label for="doc">Select Doctor</label>
                        <select name="doc" id="doc" required>
                            <option value="Eleanor Gumiran-Dacir, MD - Medical Officer III" <?php echo($row['Doctor'] == 'Eleanor Gumiran-Dacir, MD - Medical Officer III')? 'selected' : ''; ?>>Eleanor Gumiran-Dacir, MD - Medical Officer III</option>
                            <option value="Cherry H. Navidad, MD - Medical Officer V" <?php echo($row['Doctor'] == 'Cherry H. Navidad, MD - Medical Officer V')? 'selected' : ''; ?>>Cherry H. Navidad, MD - Medical Officer V</option>
                        </select>
                    </div> 

                    <div class="form-label" id="remarks" style="grid-column: span 2">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" cols="40" rows="3"><?php echo $row['remark'] ?></textarea>
                    </div>
                    <div id="v-btn">
                        <button type="submit" name="update-btn" id="vs-btn">Save</button>
                    </div> 
                    </div>
                </div>
            </form>
        </div>
    </div>