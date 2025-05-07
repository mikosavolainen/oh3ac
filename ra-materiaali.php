<?php include 'components/header.php'; ?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Radioamatööriksi Opiskelu</title>
    <link rel="stylesheet" href="../styles/styles.css" />
</head>
<body class="ra-body">

    <main class="ra-main-container">

        <!-- Johdanto -->
        <section class="ra-hero">
            <h1>Opiskelumateriaali Radioamatöörin Perusluokan ja Yleisluokan Tutkintoihin</h1>
            <p>Tämä sivu auttaa sinua valmistautumaan radioamatööritutkintoihin Suomessa. Kattaa K-moduulin (lainsäädäntö), T1:n perusteet ja T2:n yleisluokan tiedot.</p>
        </section>

        <!-- Moduulit: Perus & Yleis -->
        <section class="ra-modules-section">
            <div class="ra-module-card ra-basic">
                <h2>Perusluokka (K + T1)</h2>
                <p class="ra-power">Max teho: 120 W</p>
                <ul>
                    <li>Lainsäädäntö</li>
                    <li>Kutsumerkit & Q-koodit</li>
                    <li>Radiotekniikan perusteet</li>
                    <li>Hätäviestintä</li>
                </ul>
                <h3>Suositeltava materiaali</h3>
                <ul>
                    <li><a href="https://www.sral.fi/harrastus/kouluttaudu-radioamatooriksi/" target="_blank">SRAL – Harrastajaopastus</a></li>
                    <li><a href="https://youtube.com/playlist?list=PLyWv_uSYjnZApGVNDreuYrh7CwE_rnNrH" target="_blank">OH3AC YouTube – Radioamatöörikurssi 2024</a></li>
                </ul>
            </div>

            <div class="ra-module-card ra-advanced">
                <h2>Yleisluokka (K + T2)</h2>
                <p class="ra-power">Max teho: 1500 W</p>
                <ul>
                    <li>Kansainväliset säädökset</li>
                    <li>Digitaalitekniikka & EMC</li>
                    <li>Edistynyt radiotekniikka</li>
                    <li>Hätäviestintä</li>
                </ul>
            </div>
        </section>

        <!-- Erot-taulukko -->
        <section class="ra-comparison-section">
            <h2>Errot Perusluokan ja Yleisluokan välillä</h2>
            <table class="ra-comparison-table">
                <thead>
                    <tr>
                        <th>Ominaisuus</th>
                        <th>Perusluokka (K + T1)</th>
                        <th>Yleisluokka (K + T2)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Ominaisuus">Taajuusalueet</td>
                        <td data-label="Perusluokka">HF, VHF, UHF, SHF</td>
                        <td data-label="Yleisluokka">HF, VHF, UHF, SHF</td>
                    </tr>
                    <tr>
                        <td data-label="Ominaisuus">Lähetysteho</td>
                        <td data-label="Perusluokka">Max 120 W</td>
                        <td data-label="Yleisluokka">Max 1500 W</td>
                    </tr>
                    <tr>
                        <td data-label="Ominaisuus">Digitaaliset lähetystavat</td>
                        <td data-label="Perusluokka">Kyllä</td>
                        <td data-label="Yleisluokka">Kyllä</td>
                    </tr>
                    <tr>
                        <td data-label="Ominaisuus">Satelliitti</td>
                        <td data-label="Perusluokka">Kyllä</td>
                        <td data-label="Yleisluokka">Kyllä</td>
                    </tr>
                    <tr>
                        <td data-label="Ominaisuus">Tutkinnon vaikeustaso</td>
                        <td data-label="Perusluokka">Alemman tason teknologia</td>
                        <td data-label="Yleisluokka">Korkeampi tekninen osaaminen</td>
                    </tr>
                </tbody>
            </table>
        </section>

<!-- Lainsäädäntö -->
<section class="ra-regulations-section">
    <h2>Radioamatöörin Säädökset ja Lainsäädäntö</h2>

    <!-- Pätevyystodistus -->
    <div class="regulation-card">
        <h3>Pätevyystodistus ja lupa</h3>
        <ul>
            <li>Pätevyystodistuksen myöntää Viestintävirasto.</li>
            <li>Pätevyystodistus on voimassa toistaiseksi.</li>
            <li>Voit työskennellä toisen aseman valvonnan alla, ennen omaa lupaa.</li>
        </ul>
    </div>

    <!-- Kutsumerkki -->
    <div class="regulation-card">
        <h3>Kutsumerkki ja Second Operator</h3>
        <ul>
            <li>Käytä aina sen aseman kutsumerkkiä, jolla työskentelet.</li>
            <li>Esimerkki: OH3AC:n asemalla → käytä "OH3AC", vaikka itse olisit OH2BU.</li>
            <li>"Second Operator" -työskentely sallittua, kun pätevä henkilö valvoo.</li>
        </ul>
    </div>

    <!-- Tehorajat -->
    <div class="regulation-card">
        <h3>Tehorajat ja Tekniset Vaatimukset</h3>
        <ul>
            <li><strong>Perusluokka:</strong> max 120 W</li>
            <li><strong>Yleisluokka:</strong> max 1500 W</li>
            <li><strong>Harhalähetteiden vaimennus:</strong> vähintään 40 dB alle 30 MHz</li>
            <li><strong>Harhalähetteiden teho:</strong> enintään 10 mW</li>
        </ul>
    </div>

    <!-- Häiriötilanteet -->
    <div class="regulation-card">
        <h3>Häiriötilanteet</h3>
        <ul>
            <li>Radioamatööriasemaa ei saa käyttää tahallaan häiritsemiseen.</li>
            <li>Jos aiheutat haitallisia häiriöitä turvallisuusviestinnälle, lähetyksen on välittömästi keskeytettävä.</li>
            <li>Viestintävirasto voi auttaa häiriöiden poistamisessa tai ratkaista kiistan.</li>
        </ul>
    </div>

    <!-- Erityistilanteet -->
    <div class="regulation-card">
        <h3>Erityistilanteet</h3>
        <ul>
            <li><strong>Meri-alukset:</strong> Sallittu käyttää asemaa suomalaisessa aluksessa, tarvitaan päällikön lupa.</li>
            <li><strong>Ilma-alukset:</strong> Sallittu alle 30 MHz ilman rajoja, yli 30 MHz vain pex-alueilla.</li>
            <li><strong>Kerhoasemat:</strong> Sallittu käyttää, kun joko sinulla on pätevyystodistus tai sinua valvovalla on pätevyystodistus.</li>
        </ul>
    </div>
</section>

        <!-- Hyödylliset linkit -->
        <section class="ra-resources-section">
            <h2>Hyödyllisiä Linkkejä</h2>
            <ul class="resource-list">
                <li><a href="https://youtube.com/playlist?list=PLyWv_uSYjnZApGVNDreuYrh7CwE_rnNrH" target="_blank">OH3AC Radioamatöörikurssi 2024</a></li>
                <li><a href="https://www.sral.fi/harrastus/kouluttaudu-radioamatooriksi/" target="_blank">SRAL – Kouluttaudu radioamatööriksi</a></li>
                <li><a href="https://www.ar-x.fi/" target="_blank">ar-x.fi – Harjoituskokeet</a></li>
                <li><a href="https://www.viestintavirasto.fi/fi/viestinta/radio/radioamatyoeri/radioamatyoerimaaaraykset.html" target="_blank">Viestintäviraston viralliset määräykset</a></li>
            </ul>
        </section>

    </main>

    <?php include 'components/footer.php'; ?>
</body>
</html>