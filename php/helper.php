<?php
function goBack(){
    $location = $_SERVER['HTTP_REFERER'];
    header("Location: $location");
}
?>