<!DOCTYPE html>
<html lang="fi">
    <head>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css ">
    </head>
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
        <a href="historia.php">Kerhon historia</a>
    </div>

    <a href="jasensivu.php">Jäsensivut</a>
    <a href="oh3r.php">OH3R</a>
    <a href="galleria.php">Valokuvat</a>

    <button class="dropdown-btn" onclick="toggleDropdown(this)">RA-Kurssi</button>
    <div class="dropdown-container">
        <a href="ra-kurssit.php">Tulevat kurssit</a>
        <a href="ra-materiaali.php">Materiaali</a>
    </div>
    <a href="pikasivu.php">Pikasivu</a>
    <a href="kauppa.php">Myynnissä</a>
    <a href="sdr.php">Kerhon SDR</a>
    <a href="kerhokirjeet.php">Kaikki kerhokirjeet</a>
    <a href="https://wiki.sral.fi/wiki/Etusivu" target="_blank">Radio WIKI</a>
    <a href="https://vanhat.oh3ac.fi">Arkisto</a>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.querySelector('.reorderB').style.display = 'none';
    document.querySelector('.closeB').style.display = 'block';
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.querySelector('.reorderB').style.display = 'block';
    document.querySelector('.closeB').style.display = 'none';
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