<?php
    include("config.php");

    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        // Delete the product from the database
        $sql = "DELETE FROM product WHERE prod_id = $productId";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error deleting product: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
?>
