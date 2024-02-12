<?php
$pageName = "Home";
require_once "header.php";
?>

<div class="container">
    <h2>Welcome to the Color Palette Generator</h2>
    <p>This tool allows you to generate a custom color palette.</p>
    <p>Simply choose how many colors you want in your palette and click "Generate".</p>

    <form action="generatePalette.php" method="post">
        <div class="form-group">
            <label for="numColors">Number of Colors (1-10):</label>
            <input type="number" id="numColors" name="numColors" min="1" max="10" required>
        </div>
        <button type="submit" class="btn">Generate</button>
    </form>
</div>

<?php
require_once "footer.php";
?>
