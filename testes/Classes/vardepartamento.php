<?php

if(isset($_POST['id'])){
    $id= filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $id=0;
}
if(isset($_POST['departamento'])){
    $departamento= filter_input(INPUT_POST,'departamento',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $depratamento="";
}