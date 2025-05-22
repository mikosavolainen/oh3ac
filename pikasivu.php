
  <?php include 'components/header.php'; ?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<div class="container">

   

    <!-- Vasen pikasivu-sarake -->
    <aside class="pikasivu">

        <!-- Logo ja teksti -->
        <img src="ACLogo-1tyhja.png" width="240" height="165" alt="OH3AC Logo">
        <p class="vuosiluku">1930 - 2025</p>
        <hr>

        <!-- Äänitoisto -->
        <audio id="radioac" hidden>
            <source src="https://pasiradio.com:8443/rinnakkainen.mp3 " type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <!-- Lähetyksen info -->
        <a href="http://www.oh3ac.fi/ra-kurssi.html" target="_blank">
            <img src="RadioOH3AC-Etu1-01.png" alt="Radio OH3AC">
        </a>
        <p class="lahetysaika">22.8. - 22.10.2024</p>
        <p class="lahetystiedot">Perjantaisin ei lähetystä</p>
        <p class="lahetystiedot">00–24 (Suomen aikaa)</p>
        <p class="lahetystiedot">Lahti 106,7 MHz</p>
        <p class="lahetystiedot">Nastola 107,0 MHz</p>
        <p class="lahetystiedot">Kouvola 95,2 MHz</p>
        <p class="lahetystiedot">Utti 92,5 MHz</p>
        <p class="lahetystiedot">Raahe 96,6 MHz</p>

        <!-- Toistolinkit -->
        <div id="rRsoi" style="display:block;">
            <p class="toistoteksti">KUUNTELE:</p>
            <button onclick="radioPlay()" class="play-btn">▶️ Kuuntele suoratoistoa</button>
        </div>
        <div id="rReisoi" style="display:none;">
            <p class="toistoteksti">EI TOISTOA:</p>
            <button onclick="radioEiPlay()" class="pause-btn">⏸️ Ei toistoa</button>
        </div>

        <hr>

        <!-- Osoite ja yhteystiedot -->
        <address class="yhteystiedot">
            Lahden Radioamatöörikerho ry<br>
            Radiomäenkatu 43<br>
            15100 LAHTI<br><br>
            Puhelin: <a href="tel:0447001599">044 7001 599</a><br>
            Sähköposti: <a href="mailto:oh3ac@oh3ac.fi">oh3ac@oh3ac.fi</a><br><br>
            Kerhoillat: Ma klo 18:00 alkaen<br>
            Vanha Radioasema, Lahti
        </address>

        <hr>

        <!-- Karttalinkki -->
        <p class="centered">Katso sijaintimme</p>
        <a href="kuvat/OH3ACkartta2.jpg"><img src="kuvat/karttatmb.jpg" alt="Sijaintikartta"></a>
        <hr>

        <!-- Fieldset-lohkot / Pikalinkit -->
        <fieldset class="info-box">
            <legend>OH3AC KESKUSTELUPALSTA</legend>
            <a href="palsta/index.php">Mene tästä!</a>
        </fieldset>

        <fieldset class="info-box">
            <legend>KAIKKI MAIDEN PREFIKSIT</legend>
            <a href="http://www.oh3ac.fi/Radioamatoorien_kansainv%C3%A4liset_prefiksit.pdf">Päivitetty PDF-tiedosto</a>
        </fieldset>

        <fieldset class="info-box">
            <legend>VARAUTUMINEN SÄHKÖKATKOON</legend>
            <a href="http://www.oh3ac.fi/Sahkokatkoon_varautumisen_muistilista.pdf">Muistilista varautumiseen</a>
        </fieldset>

        <fieldset class="info-box">
            <legend>HAE LUPAA ANTENNILLE</legend>
            <a href="http://www.oh3ac.fi/OH3AC_antennihakemus.pdf">Antennihakemus (malli)</a><br>
            <a href="http://www.oh3ac.fi/Antennihakemus.html">Neuvoja hakemiseen</a>
        </fieldset>

        <fieldset class="info-box">
            <legend>SUUNTAKARTAT</legend>
            <a href="http://www.oh3ac.fi/Suuntakartta KP20TX.pdf">Maailmansuuntakartta</a><br>
            <a href="http://ns6t.net/azimuth/azimuth.html">Luo oma suuntakartta</a>
        </fieldset>

        <fieldset class="info-box">
            <legend>NETTIRADIO</legend>
            <a href="http://websdr.org/">Websdr.org – verkko-SDR-radiot</a>
        </fieldset>

        <fieldset class="info-box">
            <legend>HAE QTH-LOKAATTORISI</legend>
            <a href="http://www.k7fry.com/grid/?qth=KP20TX75na">QTH-laskuri</a>
        </fieldset>

        <fieldset class="info-box">
            <legend>RADIOKELOSUHTEET</legend>
            <center>
                <a href="https://www.hamqsl.com/solar.html ">
                    <img src="https://www.hamqsl.com/solar100sc.php " alt="Solar-Terrestrial Data">
                </a>
            </center>
        </fieldset>

    </aside>

      <?php include 'components/footer.php'; ?>

</div>

<!-- JavaScript äänitoisto -->
<script>
function radioPlay() {
    const audio = document.getElementById("radioac");
    audio.play().catch(e => alert("Automaattinen soitto estetty. Klikkaa 'Kuuntele' uudelleen."));
}

function radioEiPlay() {
    const audio = document.getElementById("radioac");
    audio.pause();
}
</script>

</body>
</html>