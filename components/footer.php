<!DOCTYPE html>
<html lang="fi">
<head>
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css ">
</head>
<body>

  <footer class="footer">

    <!-- ************* Uusi Sine-aalto animaatio ************* -->
    <div class="footer-sine-container">
      <svg class="footer-sine-svg" viewBox="0 0 1920 250" preserveAspectRatio="none">
        <defs>
          <filter id="glow">
            <feGaussianBlur result="coloredBlur" stdDeviation="4"></feGaussianBlur>
            <feMerge>
              <feMergeNode in="coloredBlur"></feMergeNode>
              <feMergeNode in="SourceGraphic"></feMergeNode>
            </feMerge>
          </filter>
        </defs>
        <path class="footer-sine-path" id="sine-wave"
              d="M0,125 C100,25 300,225 400,125 C500,25 700,225 800,125 C900,25 1100,225 1200,125 C1300,25 1500,225 1600,125 C1700,25 1900,225 1920,125"
              stroke="white" stroke-width="6" fill="none" opacity="0.6" filter="url(#glow)" />
      </svg>
    </div>

    <!-- ************* Footer sisältö ************* -->
    <div class="footer-content">
      
        <!-- Keskitetty logo-teksti -->
     <div class="footer_logo-text-container">
    <p class="footer_logo-text">OH3AC</p>
    <p class="footer_logo-text2">Lahden Radioamatöörikerho ry</p>

<div class="footer-contact-info">
        
        <p>Radiomäenkatu 43 <br> 15100 LAHTI</p>
        <p>Puhelin-nro: 044 7001 599 <br> Sähköposti: oh3ac@oh3ac.fi</p><br>
        <p>Kerhoillat avoimin ovin <br> joka ma alkaen klo 18:00</p>
      </div>
</div>
      
        
      <div class="solar-data" id="solar-data">
        <a href="https://www.hamqsl.com/solar.html " title="Click to add Solar-Terrestrial Data to your website!">
          <img src="https://www.hamqsl.com/solar100sc.php " alt="Solar Data">
        </a>
      </div>
      <p class="footer-copyright"> OH3AC &copy; 2020-<?php echo date("Y"); ?></p>
   
    </div>

  

  </footer>

  <!-- ************* Animaatiologiikka ************* -->
  <script>
    const sineWave = document.getElementById('sine-wave');
    let t = 0;

    function animateSineWave() {
      const pathData = generatePath(t);
      sineWave.setAttribute('d', pathData);
      t += 2;

      requestAnimationFrame(animateSineWave);
    }

    function generatePath(timeOffset) {
      const amplitude = 50; // Aallon korkeus
      const wavelength = 300; // Kuinka pitkä aallonpituus
      const baseY = 125;

      let points = [];

      for (let x = 0; x <= 1920; x++) {
        const y = baseY + amplitude * Math.sin((x + timeOffset) / wavelength * Math.PI);
        points.push(`${x},${y}`);
      }

      return 'M' + points.join(' L');
    }

    animateSineWave();
  </script>

</body>
</html>