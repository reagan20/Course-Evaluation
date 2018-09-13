<?php
$servername="localhost";
$username="root";
$password="";
$dbname="evaluation";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo"no connection".mysqli_error($name);
}
else{
    //echo"connection created";
}
?>