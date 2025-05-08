<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="UTF-8" />
  <title>Footer - OH3AC</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <footer class="footer">

    <!-- Aaltoviiva -->
    <div class="footer-wave-container">
      <svg class="footer-svg" viewBox="0 0 1920 300" preserveAspectRatio="none" id="wave-svg">
        <defs>
          <filter id="glow">
            <feGaussianBlur class="blur" result="coloredBlur" stdDeviation="4"></feGaussianBlur>
            <feMerge>
              <feMergeNode in="coloredBlur"></feMergeNode>
              <feMergeNode in="SourceGraphic"></feMergeNode>
            </feMerge>
          </filter>
        </defs>
        <path class="footer-path" id="wave"
          d="M0,150 C300,0 600,300 960,150 C1320,0 1620,300 1920,150 L1920,300 L0,300 Z"
          opacity="0.6"
          stroke="white"
          stroke-width="2"
          filter="url(#glow)" />
      </svg>
    </div>

    <!-- Footer sisältö -->
    <div class="footer-content">
      <div class="contact-info">
        <h7 class="LogoFont_Musta">OH3AC</h7>
        <p>Lahden Radioamatöörikerho ry<br>
           Radiomäenkatu 43<br>
           15100 LAHTI</p><br>
        <p>Puhelin-nro: 044 7001 599<br>
           Sähköposti: oh3ac@oh3ac.fi</p><br>
        <p>Kerhoillat avoimin ovin<br>
           joka ma alkaen klo 18:00</p>
      </div>
      <div class="solar-data" id="solar-data">
        <a href="https://www.hamqsl.com/solar.html " title="Click to add Solar-Terrestrial Data to your website!">
          <img src="https://www.hamqsl.com/solar100sc.php " alt="Solar Data">
        </a>
      </div>
    </div>

    <div class="footer-copyright">
      <p>OH3AC &copy; 2020-<?php echo date("Y"); ?></p>
    </div>

  </footer>

  <script>
    const wave = document.getElementById('wave');
    const svg = document.getElementById('wave-svg');
    let t = 0;

    // Laske korkeus footerin mukaan
    function getWaveHeight() {
      return window.innerHeight * 0.05 + 80; // Mobiilille pienempi korkeus, desktopille enemmän
    }

    function animateWave() {
      const pathHeight = getWaveHeight();
      const amplitude = 40; // Aallon "korkeus"
      const points = [];

      for (let i = 0; i <= 1920; i += 10) {
        const y = pathHeight / 2 + amplitude * Math.sin((i + t) / 20);
        points.push(`${i},${y}`);
      }

      const pathData = `M0,${pathHeight / 2} L${points.join(" L")} L1920,${pathHeight} L0,${pathHeight} Z`;
      wave.setAttribute('d', pathData);
      t += 1;

      requestAnimationFrame(animateWave);
    }

    function resizeSVG() {
      const height = getWaveHeight();
      svg.setAttribute('viewBox', `0 0 1920 ${height}`);
    }

    window.addEventListener('resize', resizeSVG);

    // Käynnistä animaatio
    animateWave();
    resizeSVG();
  </script>

</body>
</html>