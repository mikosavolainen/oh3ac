<?php
// Määritellään kansiopolku
$baseDir = 'images/galleria/'; // Varmista, että tämä polku on oikein!
$folders = [];

if (is_dir($baseDir)) {
    foreach (scandir($baseDir) as $folder) {
        if ($folder !== '.' && $folder !== '..') {
            $folders[$folder] = $baseDir . $folder;
        }
    }
}

// Tarkistetaan, näytetäänkö tietty kansio
$viewFolder = isset($_GET['folder']) ? $_GET['folder'] : null;
$validFolder = null;

if ($viewFolder) {
    $path = realpath($baseDir . $viewFolder);
    if ($path && strpos($path, realpath($baseDir)) === 0 && is_dir($path)) {
        $validFolder = $path;
    }
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Valokuvia - OH3AC</title>
    <style>
        body {
            font-family: Verdana, Geneva, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background: #1a457a;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            margin-top: 0;
            font-size: 2em;
        }

        .gallery-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .folder-card {
            width: 220px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            transition: transform 0.2s;
        }

        .folder-card:hover {
            transform: translateY(-5px);
        }

        .folder-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .folder-card a {
            display: block;
            text-decoration: none;
            color: inherit;
            padding: 10px;
            text-align: center;
        }

        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .image-gallery img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #0066cc;
            text-decoration: none;
            font-weight: bold;
        }

        hr {
            margin: 40px 0;
            border: none;
            border-top: 1px solid #ccc;
        }

        footer {
            text-align: center;
            padding: 20px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>

<header>
    <h1>OH3AC - Valokuvia</h1>
</header>

<div class="container">

<?php if (!$validFolder): ?>
    <!-- Etusivu - listataan kansiot -->
    <h1>Kuvagalleriat</h1>
    <div class="gallery-grid">
        <?php foreach ($folders as $name => $path): 
            $cover = file_exists($path . '/cover.jpg') ? $path . '/cover.jpg' : 'images/default_cover.jpg';
        ?>
            <div class="folder-card">
                <a href="?folder=<?= urlencode($name) ?>">
                    <img src="<?= htmlspecialchars($cover) ?>" alt="<?= htmlspecialchars($name) ?>">
                    <h3><?= htmlspecialchars(ucfirst($name)) ?></h3>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

<?php else: ?>
    <!-- Yksittäisen kansion kuvat -->
    <h1><?= htmlspecialchars(basename($validFolder)) ?></h1>
    <a href="gallery.php" class="back-link">← Takaisin</a>
    <div class="image-gallery">
        <?php
        $images = glob($validFolder . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        if (empty($images)): ?>
            <p>Ei kuvia tässä kansiossa.</p>
        <?php else:
            foreach ($images as $image):
                $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $image);
        ?>
            <img src="<?= htmlspecialchars($relativePath) ?>" alt="Kuva">
        <?php endforeach; endif; ?>
    </div>
<?php endif; ?>

</div>

<hr>

<footer>
    &copy; <?= date('Y') ?> OH3AC - Lahden radioamatöörikerho ry.<br>
    Palaute: <a href="mailto:oh3ac@oh3ac.fi">oh3ac@oh3ac.fi</a>
</footer>

</body>
</html>