
    <?php
    include_once('config.php');

            $conn = new mysqli ($servername, $username, $password, $dbname);

            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Product ID</th><th>Product Name</th><th>Product Description</th>";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['prod_id'] . "</td>";
                    echo "<td>" . $row['prod_name'] . "</td>";
                    echo "<td>" . $row['prod_desc'] . "</td>";
                    echo "<td>" . $row['prod_desc'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
?>