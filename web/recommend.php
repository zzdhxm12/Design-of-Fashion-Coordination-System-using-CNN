<?php
$input = $_REQUEST["q"];
//$input = "jean_bottom";
// Create connection
$conn = new mysqli('localhost', 'root', '1234', 'fashion');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT img FROM recommend WHERE input='".$input."' order by RAND() LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["img"];
    }
} else {
    echo $input;
}
$conn->close();
?>
