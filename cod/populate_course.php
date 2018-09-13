<?php
require_once('../config/dbconnect.php');
$prog = $_POST['cour'];
if(isset($prog)) {
    // fetch state details
    $stmt = $conn->query("SELECT * FROM course WHERE program_id='$prog' ORDER BY course_name ASC");
    echo '<option value="">~~Select Course~~</option>';
    while($row = mysqli_fetch_assoc($stmt)) {
        echo '<option value="' . $row['course_code'] . '">' . $row['course_name'] . '</option>';
    }
}


?>