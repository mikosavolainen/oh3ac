<?php include 'components/header.php'; ?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerhokirppis</title>
    
</head>
<body>
    <div class="kauppa"> 
        <h1>Kerhokirppis</h1>

        <!-- Parannettu valintalaatikko -->
        <div class="valinta-container">
            <label for="tuotevalinta">Näytä tuotteet:</label>
            <select id="tuotevalinta">
                <option value="kaikki">Kaikki</option>
                <option value="uudet">Uudet</option>
                <option value="kaytetyt">Käytetyt</option>
            </select>
        </div>

        <section>
            <div class="kauppa-tuotteet" id="tuotteet">
                <p>Ladataan tuotteita... odota hetki</p>
            </div>
        </section>
    </div>

    <?php include 'components/footer.php'; ?>

    <script>
        const valikkoelementti = document.getElementById('tuotevalinta');
        let kaikkiTuotteet = [];

        
        fetch('https://oh3acvarasto.oh3cyt.com/products')
            .then(response => response.json())
            .then(data => {
                kaikkiTuotteet = data.filter(tuote => tuote.quantity > 0);
                näytäTuotteet();
            })
            .catch(error => {
                console.error('Virhe ladattaessa tuotteita:', error);
                document.getElementById('tuotteet').innerHTML = 
                    '<p>Tuotteita ei voitu ladata. Kokeile myöhemmin uudelleen. Jos ongelma toistuu, ota yhteyttä oh3ac@oh3ac.fi</p>';
            });

       
        function näytäTuotteet() {
            const valinta = valikkoelementti.value;
            const container = document.getElementById('tuotteet');
            container.innerHTML = '';

            let suodatetut = [];

            if (valinta === 'uudet') {
                suodatetut = kaikkiTuotteet.filter(tuote => tuote.vanha == 0);
            } else if (valinta === 'kaytetyt') {
                suodatetut = kaikkiTuotteet.filter(tuote => tuote.vanha == 1);
            } else {
                suodatetut = kaikkiTuotteet;
            }

            if (suodatetut.length === 0) {
                container.innerHTML = '<p>Ei tuotteita saatavilla.</p>';
                return;
            }

            suodatetut.forEach(tuote => {
                const div = document.createElement('div');
                div.className = 'kauppa-tuote';

                div.innerHTML = `
                    <h3>${tuote.name}</h3>
                    <p class="kauppa-hinnoittelu">Hinta: ${tuote.price} €</p>
                    <span class="kauppa-varastossa">Saatavilla: ${tuote.quantity} kpl</span>
                    ${tuote.vanha == 1 ? '<span class="kaytetty-tag">[KÄYTETTY]</span>' : ''}
                `;

                container.appendChild(div);
            });
        }

        
        valikkoelementti.addEventListener('change', näytäTuotteet);
    </script>
</body>
</html>