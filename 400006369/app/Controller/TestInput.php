<?php
namespace Controller;
trait testInput{
function test_inputs($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
}
?>

<!-- Make this a trait -->