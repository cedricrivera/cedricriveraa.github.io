<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/view-appoint.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>View Appointment</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <?php include 'patient-appointment/patient-appoint.php' ?>
    <?php
        $row = $res->fetch();

        if($row){

    ?>
    <main>
        <div id="view">
            <div class="box-view">
                <h1>View Appointment</h1>
                <i class="fa-solid fa-solid fa-arrow-left" id="btn-back"></i>
                <form action="patient-appointment/update-appoint.php?appid=<?php echo $row['AppointID'] ?>" method="post">
                    <div class="input">
                        <label>Firstname</label>
                        <input type="text" name="fname" value="<?php echo $row['fname']?>" disabled>
                    </div>
                    <div class="input">
                    <label>Middlename</label>
                        <input type="text" name="mname" value="<?php echo $row['mname']?>" disabled>
                    </div>
                    <div class="input">
                    <label>Lastname</label>
                        <input type="text" name="lname" value="<?php echo $row['lname']?>" disabled>
                    </div>
                    <div class="input">
                        <label>Reason</label>
                        <input type="text" name="" id="" value="<?php echo $row['reason'] ?>" disabled>
                    </div>
                    <div class="input">
                    <label>Email</label>
                        <input type="email" name="email" value="<?php echo $row['email']?>" disabled>
                    </div>
                    
                    <div class="input">
                        <label for="">Set Apointment Date</label>
                        <input type="date" id="not-d" name="appointdate" value="<?php echo $row['appointdate'] ?>">
                    </div>
                    <div class="input">
                        <label for="">Remarks</label>
                        <textarea name="remarks" id="not-d" cols="30" rows="3"><?php echo $row['remarks'] ?></textarea>
                    </div>
                    <div class="input">
                        <label for="">Status</label>
                        <select name="status" id="not-d">
                            <option value="PENDING" <?php echo ($row['status'] == "PENDING")? 'selected' : ''; ?>>PENDING</option>
                            <option value="APPROVE" <?php echo ($row['status'] == "APPROVE")? 'selected' : ''; ?>>APPROVE</option>
                            <option value="DECLINED" <?php echo ($row['status'] == "DECLINED")? 'selected' : ''; ?>>DECLINED</option>
                        </select>
                    </div>
                    <div class="btn">
                        <button type="submit" id="btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php } 
       
    ?>
    
    
    <script>
        const btnback = document.querySelector('#btn-back')

        btnback.addEventListener('click', ()=>{
            window.location.href="appointment.php"; 
        })
    </script>
</body>
</html>