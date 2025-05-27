<?php
// get_pdfs.php

ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

if (!isset($_GET['vuosi']) || !is_numeric($_GET['vuosi'])) {
    echo json_encode([]);
    exit;
}

$vuosi = intval($_GET['vuosi']);
$kansio = "pdf/Kerhokirjeet {$vuosi}/";

if (!is_dir($kansio)) {
    echo json_encode([]);
    exit;
}

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
    } else {
        $tiedostot[] = [
            "nimi" => $nimi,
            "polku" => $tiedosto,
            "vuosi" => $vuosi,
            "ajankohta" => filemtime($tiedosto)
        ];
    }
}

// Järjestetään uusin ensin
usort($tiedostot, function($a, $b) {
    return $b['ajankohta'] <=> $a['ajankohta'];
});

echo json_encode($tiedostot);
exit;