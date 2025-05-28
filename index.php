<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OH3AC</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css ">

    

    <script>
        function paivitaPDF() {
            var select = document.getElementById("pdfValitsin");
            var pdfObject = document.getElementById("pdfNaytin");
            var selectedValue = select.value || 'about:blank';

            pdfObject.innerHTML = '<p>Ladataan...</p>';
            pdfObject.data = selectedValue;
        }

        function avaaSivulta(pdfPolku) {
            const moduuli = document.getElementById('pdfmoduuli');
            const viewer = document.getElementById('moduuliPdfViewer');

            viewer.src = pdfPolku;
            moduuli.style.display = 'flex';
        }

        function suljemoduuli() {
            const moduuli = document.getElementById('pdfmoduuli');
            const viewer = document.getElementById('moduuliPdfViewer');

            viewer.src = '';
            moduuli.style.display = 'none';
        }

        window.onload = function () {
            paivitaPDF();
        };
    </script>
</head>

<body>
<?php include 'components/header.php'; ?>

<div class="index-hero-container">
    <h2 class="index-h2">Uusimmat kerhokirjeet</h2>

    <div class="index-cards-container">
        <div class="index-card">
            <h3>Kerhokirje syyskuu 2024</h3>
           
        <ul class="index-card-list">
            <li>Kaikkien OH-piirien käytössä olevat ja vapautuneet 2x2 -tunnukset</li>
            <li>Musiikkiin piilotettua sähkötystä ym: Mission Impossible, Kom. Morse</li>
            <li>Sähkömittarit uusitaan taas – mitä hammas kannattaa tehdä?</li>
            <li>Kolme tapaa lyhentää 80 m dipoli sopimaan paikkaan kuin paikkaan</li>
            <li>SRAL kesäleiri ”Ham Karelia 2024” Joensuussa to-su 25.–28.7.2024</li>
        </ul>

            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2024/OH3AC_Kerhokirje_2024-1.pdf')">Jatka lukemista tästä</button>
        </div>

        <div class="index-card">
            <h3>Kerhokirje kesäkuu 2024</h3>
            <p>Uusi toiminta-ajatus ja kevät tapahtumat.</p>
            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2024/OH3AC_Kerhokirje_2024-2.pdf')">Lue lisää</button>
        </div>

        <div class="index-card">
            <h3>Kerhokirje maaliskuu 2024</h3>
            <p>Vuoden aloitus, tulevat kurssit ja tapahtumat.</p>
            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2024/OH3AC_Kerhokirje_2024-3.pdf')">Lue lisää</button>
        </div>

        <div class="index-card">
            <h3>Kerhokirje lokakuu 2023</h3>
            <p>Syksyn tapahtumat, kilpailut ja radioamatöörien päivä.</p>
            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2023/OH3AC_Kerhokirje_2023-1.pdf')">Lue lisää</button>
        </div>

        <div class="index-card">
            <h3>Kerhokirje helmikuu 2023</h3>
            <p>Tekniikkakilpailut, jäsenkokous ja tulevaisuussuunnitelmat.</p>
            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2023/OH3AC_Kerhokirje_2023-2.pdf')">Lue lisää</button>
        </div>
    </div>


    <div id="pdfmoduuli" class="index-moduuli-overlay">
        <a href="#" class="index-MenucloseB" title="CLOSE MENU" onclick="suljemoduuli()">
            <i class="fa fa-close"></i>
        </a>
        <div class="index-moduuli-content">
            <iframe id="moduuliPdfViewer" class="index-pdf-viewer" type="application/pdf"></iframe>
        </div>
    </div>

</div>

<?php include 'components/footer.php'; ?>
</body>
</html>