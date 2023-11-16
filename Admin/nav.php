<link rel="stylesheet" href="css/navbar.css">

<nav class = "sidebar">
  <a href="#" class = "logo">Admin</a>
    <div class="menu-content">

      <ul>
        <li class="item">
          <a href="index.php">Dashboard</a>
        </li>

        <li class="item">
          <a href="patient-records.php">Patient Records</a>
        </li>

        <li class="item">
          <a href="manage-user.php">Manage User</a>
        </li>

        <li class="item">
          <a href="manage-admin.php">Manage Admin</a>
        </li>

        <li class="item">
          <a href="#">Reports</a>
        </li>

        <li class="item">
          <a href="appointment.php">Appointment</a>
        </li>
      </ul>

    <button id="logout" type="submit">Logout</button>
  </div>
</nav>

<script>
  
</script>

<!-- <nav class="sidebar">
  <a href="#" class="logo">Admin</a>
        <div class="menu-content">
          
        </div> -->

       

        <script>
          const btn = document.querySelector('#logout')
          btn.addEventListener('click', () =>{
            Swal.fire({
                    title: 'Are you sure you want to logout?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href="php/logout.php";
                    }
                });
          });
        </script>
</nav>
  
  
