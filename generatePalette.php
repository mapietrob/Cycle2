<?php
require_once "header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if generating a new palette or saving one
    if (isset($_POST['numColors']) && !isset($_POST['savePalette'])) {
        $numColors = intval($_POST['numColors']);
        $palette = [];
        for ($i = 0; $i < $numColors; $i++) {
            $palette[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }

        // Display the generated palette
        echo "<h2>Generated Palette</h2><div style='margin-bottom: 20px;'>";
        foreach ($palette as $color) {
            echo "<div style='background-color: {$color}; width: 100px; height: 100px; display: inline-block; margin-right: 5px;'></div>";
        }
        echo "</div>";

        // Save the palette
        echo "<form action='generatePalette.php' method='post'>";
        echo "<input type='hidden' name='palette' value='".json_encode($palette)."'>";
        echo "<input type='hidden' name='savePalette' value='true'>";
        foreach ($palette as $color) {
            echo "<input type='hidden' name='colors[]' value='{$color}'>";
        }
        echo "<button type='submit'>Save Palette</button>";
        echo "</form>";
    } elseif (isset($_POST['savePalette'])) {
        // Save the palette to the database
        $paletteName = "Palette_" . date("Y-m-d_H:i:s");
        $colors = isset($_POST['colors']) ? json_encode($_POST['colors']) : '';
        $created_at = date("Y-m-d H:i:s");

        $query = $pdo->prepare("INSERT INTO palettes (palette_name, colors, created_at) VALUES (?, ?, ?)");
        $result = $query->execute([$paletteName, $colors, $created_at]);

        if ($result) {
            echo "Palette saved successfully!";
        } else {
            echo "Error saving palette.";
        }
    }
} else {
    // Redirect back to the form if the page is accessed without posting form data
    header('Location: index.php');
    exit;
}
?>
