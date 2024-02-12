<?php
require_once 'connect.php';
session_start();

// Check if the request is POST and the 'id' is set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        // Prepare and execute the delete statement
        $sql = "DELETE FROM palettes WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$id])) {
            $_SESSION['message'] = "Palette deleted successfully.";
        } else {
            $_SESSION['message'] = "Failed to delete the palette.";
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = "Error: " . $e->getMessage();
    }

    // Redirect back to the palettes view
    header("Location: viewPalettes.php");
    exit;
} else {
    header("Location: viewPalettes.php");
    exit;
}
?>
