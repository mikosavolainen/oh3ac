<!DOCTYPE html>
<html lang="fi">
<body>
<!-- Sidenav -->
<div id="mySidenav" class="menu">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Etusivu</a>

   
    <button class="dropdown-btn" onclick="toggleDropdown(this)">Esittely</button>
    <div class="dropdown-container">

        <a href="laitteisto.php">OH3AC Laitteisto</a>
        <a href="toistimet.php">Toistimet</a>
        <a href="Hallitus.php">Hallitus</a>
        <a href="about.php">Kerhon historia</a>
    </div>

    <a href="services.php">Jäsensivut</a>
    <a href="contact.php">OH3R</a>
    <a href="galleria.php">Valokuvat</a>
    <a href="contact.php">RA-Kurssi</a>
    <a href="sdr.php">Kerhon SDR</a>
    <a href="https://wiki.sral.fi/wiki/Etusivu" target="_blank">Radio WIKI</a>
    <a href="https://vanhat.oh3ac.fi">Arkisto</a>
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function toggleDropdown(button) {
        const container = button.nextElementSibling;
        if (container.style.display === "block") {
            container.style.display = "none";
            button.classList.remove("active");
        } else {
            container.style.display = "block";
            button.classList.add("active");
        }
    }
</script>


</body>
</html>