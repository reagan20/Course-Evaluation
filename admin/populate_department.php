<?php
include_once('../config/dbconnect.php');
 $schd = $_POST['fid'];
if(isset($schd)) {
    // fetch state details
    $stmt = $conn->query("SELECT * FROM departments WHERE school_id='$schd' ORDER BY dept_name ASC");
    echo '<option value="">Select Department Name</option>';
    while($row = mysqli_fetch_assoc($stmt)) {
        echo '<option value="' . $row['dept_id'] . '">' . $row['dept_name'] . '</option>';
    }
}


?>