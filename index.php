<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testi PDF</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            paivitaPDF(); 
        });

        function paivitaPDF() {
            var select = document.getElementById("pdfValitsin");
            var pdfObject = document.getElementById("pdfNaytin");
            pdfObject.data = select.value || 'about:blank';
        }
    </script>
</head>
<body>

    <?php include 'components/menu.php'; ?>

    <div class="container">
        <div class="select-container">
            <?php
            $kansio = 'pdf/';
            
            $pdfTiedostot = glob($kansio . "*.pdf");
            $tiedostotJaAjat = [];

            foreach ($pdfTiedostot as $tiedosto) {
                $nimi = basename($tiedosto);
                if (preg_match('/_(\d{2})\.(\d{2})\.(\d{4})\.pdf$/', $nimi, $osat)) {
                    $paiva = $osat[1];
                    $kuukausi = $osat[2];
                    $vuosi = $osat[3];
                    $aika = strtotime("$vuosi-$kuukausi-$paiva");
                    $tiedostotJaAjat[$tiedosto] = $aika;
                }
            }

            
            arsort($tiedostotJaAjat);
            $järjestetytTiedostot = array_keys($tiedostotJaAjat);
            ?>
            
            <select id="pdfValitsin" onchange="paivitaPDF()">
                <option value="">Valitse PDF...</option>
                <?php foreach ($järjestetytTiedostot as $index => $tiedosto): ?>
                    <option value="<?php echo $tiedosto; ?>"
                        <?php echo ($index === 0) ? 'selected' : ''; ?>>
                        <?php echo basename($tiedosto); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <object id="pdfNaytin" type="application/pdf">
            <p>PDF-tiedoston näyttäminen ei onnistu selaimellasi.</p>
        </object>
    </div>
</body>
</html>