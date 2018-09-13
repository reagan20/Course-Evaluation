<?php
include_once('../config/dbconnect.php');
$dept = $_POST['prog'];
if(isset($dept)) {
    // fetch state details
    $stmt = $conn->query("SELECT * FROM programmes WHERE dept_id='$dept' ORDER BY program_name ASC");
    echo '<option value="">~~Select Programme~~</option>';
    while($row = mysqli_fetch_assoc($stmt)) {
        echo '<option value="' . $row['program_id'] . '">' . $row['program_name'] . '</option>';
    }
}


?>