<?php
require_once 'header.php';

echo "<h2>Saved Color Palettes</h2>";

try {
    // gets palettes form database
    $sql = "SELECT * FROM palettes ORDER BY created_at DESC";
    $stmt = $pdo->query($sql);

    if ($stmt->rowCount() > 0) {
        //displays each palette
        while ($row = $stmt->fetch()) {
            echo "<div class='palette'>";
            $colors = json_decode($row['colors']);
            foreach ($colors as $color) {
                echo "<div style='background-color: {$color};'></div>";
            }
            // Delete form for each palette
            echo "<form action='deletePalette.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit' class='btn delete-btn'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "No palettes found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

require_once 'footer.php';
?>
