<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OH3AC</title>
    <link rel="stylesheet" href="styles/styles.css">

    <style>
        

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-top: 0;
            font-size: 1.2em;
            color: #007BFF;
        }

        .card p {
            color: #555;
        }

        .card button {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .card button:hover {
            background-color: #0056b3;
        }

        /* MODAALI */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
        }

        .modal-content {
            position: relative;
            width: 90%;
            height: 90%;
            background: white;
            overflow: hidden;
            border-radius: 10px;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            color: #aaa;
            cursor: pointer;
            z-index: 10000;
        }

        .modal-close:hover {
            color: white;
        }

        .pdf-viewer {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>

    <script>
        function paivitaPDF() {
            var select = document.getElementById("pdfValitsin");
            var pdfObject = document.getElementById("pdfNaytin");
            var selectedValue = select.value || 'about:blank';

            pdfObject.innerHTML = '<p>Ladataan...</p>';
            pdfObject.data = selectedValue;
        }

        function avaaSivulta(pdfPolku) {
            const modal = document.getElementById('pdfModal');
            const viewer = document.getElementById('modalPdfViewer');

            viewer.src = pdfPolku;
            modal.style.display = 'flex';
        }

        function suljeModal() {
            const modal = document.getElementById('pdfModal');
            const viewer = document.getElementById('modalPdfViewer');

            viewer.src = '';
            modal.style.display = 'none';
        }

        // Lataa ensimmäinen PDF automaattisesti sivun latautumisessa
        window.onload = function () {
            paivitaPDF();
        };
    </script>
</head>

<body>
<?php include 'components/header.php'; ?>

<div class="hero-container">
    <h2>Uusimmat kerhokirjeet</h2>

    <div class="cards-container">
        <div class="card">
            <h3>Kerhokirje syyskuu 2024</h3>
            <p>Tarkista viimeisimmät tapahtumat, uudet jäsenet ja ohjelmat.</p>
            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2024/OH3AC_Kerhokirje_2024-1.pdf')">Lue lisää</button>
        </div>

        <div class="card">
            <h3>Kerhokirje kesäkuu 2024</h3>
            <p>Uusi toiminta-ajatus ja kevät tapahtumat.</p>
            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2024/OH3AC_Kerhokirje_2024-2.pdf')">Lue lisää</button>
        </div>

        <div class="card">
            <h3>Kerhokirje maaliskuu 2024</h3>
            <p>Vuoden aloitus, tulevat kurssit ja tapahtumat.</p>
            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2024/OH3AC_Kerhokirje_2024-3.pdf')">Lue lisää</button>
        </div>

        <div class="card">
            <h3>Kerhokirje lokakuu 2023</h3>
            <p>Syksyn tapahtumat, kilpailut ja radioamatöörien päivä.</p>
            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2023/OH3AC_Kerhokirje_2023-1.pdf')">Lue lisää</button>
        </div>

        <div class="card">
            <h3>Kerhokirje helmikuu 2023</h3>
            <p>Tekniikkakilpailut, jäsenkokous ja tulevaisuussuunnitelmat.</p>
            <button onclick="avaaSivulta('pdf/Kerhokirjeet 2023/OH3AC_Kerhokirje_2023-2.pdf')">Lue lisää</button>
        </div>
    </div>

    <!-- MODAALI -->
    <div id="pdfModal" class="modal-overlay">
        <div class="modal-content">
            <span class="modal-close" onclick="suljeModal()">&times;</span>
            <iframe id="modalPdfViewer" class="pdf-viewer" type="application/pdf"></iframe>
        </div>
    </div>

    <!-- Vanha PDF-näkymä (voit pitää sen näkyvissä tarvittaessa) -->
    <!--
    <div id="pdfNaytinContainer">
        <object id="pdfNaytin" type="application/pdf" width="100%" height="600px">
            <p>PDF-tiedoston näyttäminen ei onnistu selaimellasi.</p>
        </object>
    </div>
    -->

</div>

<?php include 'components/footer.php'; ?>
</body>
</html>