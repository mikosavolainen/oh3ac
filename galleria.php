<?php include 'components/header.php';?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuva Galleria</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <div class="gallery-container">
        <h1>Kuva Galleria</h1>

        <?php
        // Kansiot, joiden sisällöt halutaan näyttää
        $folders = [
            "Antennit" => "images/Galleria/Antennit 28.9.2010/",
            "Galeria2" => "images/Galleria/Galeria2/",
            "test2" => "images/Galleria/Antennit"
        ];

        // Näytä kansikuvat
        echo '<div class="gallery-grid">';
        foreach ($folders as $folderName => $folderPath) {
            echo '<div class="gallery-folder">';
            echo '<h2>' . htmlspecialchars($folderName) . '</h2>';
            echo '<a href="?folder=' . urlencode($folderPath) . '" class="folder-link">';
            echo '<img src="' . htmlspecialchars($folderPath . 'cover.jpg') . '" alt="' . htmlspecialchars($folderName) . ' Cover" class="cover-image">';
            echo '</a>';
            echo '</div>';
        }
        echo '</div>';

        // Näytä valitun kansion sisältö
        if (isset($_GET['folder'])) {
            $folderPath = realpath($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['folder']);
            if (is_dir($folderPath)) {
                echo '<div class="image-gallery-page">';
                echo '<h1>' . htmlspecialchars(basename($_GET['folder'])) . '</h1>';
                echo '<div class="image-gallery">';
                $images = glob($folderPath . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                foreach ($images as $image) {
                    $relativePath = str_replace(realpath($_SERVER['DOCUMENT_ROOT']), '', $image);
                    echo '<img src="' . htmlspecialchars($relativePath) . '" alt="Gallery Image">';
                }
                echo '</div>';
                echo '<a href="index.php" class="back-link">Takaisin etusivulle</a>';
                echo '</div>';
            } else {
                echo '<p>Kansio ei löytynyt.</p>';
            }
        }
        ?>
    </div>
    <?php include 'components/footer.php';?>
</body>
</html>