<?php
session_start();
if($_SESSION['admin'] !=""){
    session_destroy();
    header('Location:index');
}

elseif($_SESSION['student']){
    session_destroy();
    header('Location:index');
}

elseif($_SESSION['dean']){
    session_destroy();
    header('Location:index');
}

elseif($_SESSION['cod']){
    session_destroy();
    header('Location:index');
}

else{
    session_destroy();
    header('Location:index');
}
?>