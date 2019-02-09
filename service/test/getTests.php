<?php
include '../../repository/database.php';

$testId = filter_input(INPUT_POST, 'id');

//$comment = $_POST('comments');
//htmlspecialchars($comment);
//nl2br()

$db = new Database();
$db->connect();

$sql = "SELECT * FROM tests";
$db->execute($sql);

if ($db->$result->num_rows > 0) {
    // output data of each row
    while($row = $db->$result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>