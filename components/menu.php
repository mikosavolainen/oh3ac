<!-- menu.php -->

<html>
<div id="mySidenav" class="sidenav menu">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Etusivu</a>
    <a href="about.php">Esittely</a>
    <a href="services.php">Jäsensivut</a>
    <a href="contact.php">OH3R</a>
    <a href="contact.php">Valokuvat</a>
    <a href="contact.php">RA-Kurssi</a>
    <a href="sdr.php">Kerhon SDR</a>
    <a href="contact.php">Sanastoa</a>



    <a href="contact.php">Arkisto</a>
    
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
</html>