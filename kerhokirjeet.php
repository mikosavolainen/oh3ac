<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OH3AC</title>
    <link rel="stylesheet" href="styles/styles.css">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            paivitaVuodet();
            haePdfTiedostot(); // Ladataan ensimmäisenä nykyisen vuoden PDF:t
        });

        function paivitaVuodet() {
            const valitsimenVuosi = new Date().getFullYear();
            const vuosiValitsin = document.getElementById("vuosiValitsin");

            for (let i = valitsimenVuosi; i >= 2020; i--) {
                let option = document.createElement("option");
                option.value = i;
                option.text = i;
                vuosiValitsin.appendChild(option);
            }

            vuosiValitsin.value = valitsimenVuosi;
        }

        function haePdfTiedostot() {
            const valittuVuosi = document.getElementById("vuosiValitsin").value;
            $vuosi = valittuVuosi;

            // Tyhjennetään vanhat vaihtoehdot
            const pdfValitsin = document.getElementById("pdfValitsin");
            pdfValitsin.innerHTML = '<option value="">Valitse PDF...</option>';

            // Haetaan kaikki PDF-tiedostot PHP:n tuottamasta JSON-datasta
            const kaikkiPdfTiedostot = <?php
            
                $kansio = "pdf/" .$vuosi. "/";
                $pdfTiedostot = glob($kansio . "*.pdf");
                $tiedostot = [];

                foreach ($pdfTiedostot as $tiedosto) {
                    $nimi = basename($tiedosto);
                    if (preg_match('/_(\d{4})-(\d+)\.pdf$/', $nimi, $osat)) {
                        $tiedostot[] = [
                            "nimi" => $nimi,
                            "polku" => $tiedosto,
                            "vuosi" => $osat[1],
                            "ajankohta" => filemtime($tiedosto)
                        ];
                    }
                }

                echo json_encode($tiedostot);
            ?>;

            // Suodatetaan valitun vuoden mukaan
            const suodatetut = kaikkiPdfTiedostot
                .filter(pdf => pdf.vuosi === valittuVuosi)
                .sort((a, b) => b.ajankohta - a.ajankohta); // Uusin ensin

            // Lisätään vaihtoehdot
            suodatetut.forEach((pdf, index) => {
                let option = document.createElement("option");
                option.value = pdf.polku;
                option.textContent = pdf.nimi;
                if (index === 0) option.selected = true;
                pdfValitsin.appendChild(option);
            });

            // Päivitetään PDF-näkymä
            paivitaPDF();
        }

        function paivitaPDF() {
            var select = document.getElementById("pdfValitsin");
            var pdfObject = document.getElementById("pdfNaytin");
            var selectedValue = select.value || 'about:blank';

            // Näytä latausindikaattori
            pdfObject.innerHTML = '<p>Ladataan...</p>';
            pdfObject.data = selectedValue;
        }
    </script>
</head>

<body>
<?php include 'components/header.php'; ?>

<div class="etusivu-container">
    <div class="etusivu-select-container">
        <!-- Vuoden valitsimen dropdown -->
        <label for="vuosiValitsin">Valitse vuosi:</label>
        <select id="vuosiValitsin" onchange="haePdfTiedostot()">
            <!-- Vuodet lisätään JavaScriptillä -->
        </select>

        <br><br>

        <!-- PDF-valitsimen dropdown -->
        <select id="pdfValitsin" onchange="paivitaPDF()">
            <option value="">Valitse PDF...</option>
            <!-- Vaihtoehdot täytetään JS:llä -->
        </select>
    </div>

    <div id="pdfNaytinContainer">
        <object id="pdfNaytin" type="application/pdf" width="100%" height="600px">
            <p>PDF-tiedoston näyttäminen ei onnistu selaimellasi.</p>
        </object>
    </div>
</div>

<?php include 'components/footer.php'; ?>
</body>
</html>