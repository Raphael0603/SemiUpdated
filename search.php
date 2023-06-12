<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <?php
    include_once('config.php');

            $conn = new mysqli ($servername, $username, $password, $dbname);

            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Check if the search form is submitted
            if (isset($_POST['search'])) {
                // Get the search term entered by the user
                $searchTerm = $_POST['searchTerm'];

                // Prepare the SQL statement with a placeholder for the search term
                $sql = "SELECT * FROM product WHERE prod_name LIKE '{$searchTerm}%'";

                // Execute the query
                $searchResult = $conn->query($sql);

                if ($searchResult->num_rows > 0) {
                    echo "<h2>Search Results:</h2>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Product ID</th><th>Product Name</th><th>Product Description</th>";
                    echo "</tr>";
                    while ($row = $searchResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['prod_id'] . "</td>";
                        echo "<td>" . $row['prod_name'] . "</td>";
                        echo "<td>" . $row['prod_desc'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No matching results found.";
                }
            }
    ?>
    <form method="POST" action="index.php">
        <div class="backBtn"><input type="submit" id="BACKbtn" name="search" value="BACK"></div>
    </form>
</body>
</html>