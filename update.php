<?php
    include("config.php");

    if (isset($_POST['submit'])) {
        $prodId = $_POST['prod_id'];
        $prodName = $_POST['prod_name'];
        $prodDesc = $_POST['prod_desc'];

        // Update the product in the database
        $sql = "UPDATE product SET prod_name = '$prodName', prod_desc = '$prodDesc' WHERE prod_id = $prodId";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error updating product: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
?>
