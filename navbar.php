<link rel="stylesheet" href="navbar.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<nav class="navbar">
        <img src="Image/Logo2.png" alt="" srcset="" id="logo">
        <ul>
            <li><a href="Menu.php#Home">Home</a></li>
            <li><a href="Menu.php#Records">Records</a></li>
            <li><a href="Menu.php#Appointment">Appointment</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <button type="button" id="btn-log">Logout</button>
        </ul>
</nav>

<script>
  const btn = document.getElementById('btn-log');

  btn.addEventListener('click', () => {
    Swal.fire({
      title: 'Are you sure you want to logout?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href="log.php";
      }
    });
  });
</script>
