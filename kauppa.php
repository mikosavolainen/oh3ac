<?php include 'components/header.php'; ?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kauppa</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="kauppa"> 
        <h1>Kauppa</h1>

        <section>
            <div class="kauppa-tuotteet" id="tuotteet">
                <p>Ladataan tuotteita... odota hetki</p>
            </div>
        </section>
    </div>

    <?php include 'components/footer.php'; ?>

    <script>
    fetch('https://oh3acvarasto.oh3cyt.com/products')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('tuotteet');
            container.innerHTML = ''; 

            
            const saatavillaOlevat = data.filter(tuote => tuote.quantity > 0);

            if (saatavillaOlevat.length === 0) {
                container.innerHTML = '<p>Ei tuotteita saatavilla.</p>';
                return;
            }

            saatavillaOlevat.forEach(tuote => {
                const div = document.createElement('div');
                div.className = 'kauppa-tuote';

                div.innerHTML = `
                    <h3>${tuote.name}</h3>
                    <p class="kauppa-hinnoittelu">Hinta: ${tuote.price} €</p>
                    <span class="kauppa-varastossa">Saatavilla: ${tuote.quantity} kpl</span>
                `;

                container.appendChild(div);
            });
        })
        .catch(error => {
            console.error('Virhe ladattaessa tuotteita:', error);
            document.getElementById('tuotteet').innerHTML = 
                '<p>Tuotteita ei voitu ladata. Kokeile myöhemmin uudelleen. jos ongelma toistuu ota yhteyttä oh3ac@oh3ac.fi</p>';
        });
</script>
</body>
</html>