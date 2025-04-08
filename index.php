<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OH3AC</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="images/Logot/oh3ac5.ico" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            paivitaPDF(); 
        });

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

            if (empty($tiedostotJaAjat)) {
                echo '<p>Ei saatavilla olevia PDF-tiedostoja.</p>';
            } else {
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
            <?php } ?>
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