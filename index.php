<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="save.php" method="POST">
        <div class="prod_id">Product ID: <input type="text" id="prod_id" name="prod_id" placeholder="Product ID" required><br></div>
        <div class="prod_name">Product Name: <input type="text" id="prod_name" name="prod_name" placeholder="Product Name" required><br></div>
        <div class="prod_desc">Product Description: <input type="text" id="prod_desc" name="prod_desc" placeholder="Product Description" required><br></div>
        <div class="subBtn"><input type="submit" id="AddBtn" name="submit" value="ADD DATA"></div>
    </form>

    <form method="POST" action="customer_info.php">
        <div class="cust_Info"><input type="submit" id="cust-info" name="customertable" value="Go to Customer Table"></div>
    </form>
    <form method="POST" action="search.php">
        <div class="search-input"><input type="text" id="search-term" name="searchTerm" placeholder="Search item..." required></div>
        <div class="seachBtn"><input type="submit" id="search-Btn" name="search" value="Search"></div>
    </form>
    <?php
        include("config.php");
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Product ID</th><th>Product Name</th><th>Product Description</th><th>Modify</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['prod_id'] . "</td>";
                echo "<td>" . $row['prod_name'] . "</td>";
                echo "<td>" . $row['prod_desc'] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['prod_id'] . "'>Edit</a> | ";
                echo "<a href='delete.php?id=" . $row['prod_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?>
</body>
</html>
