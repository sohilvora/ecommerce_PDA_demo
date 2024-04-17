<?php
include "class/Crud.php";
$obj = new Crud();

$data = [
    'name'  =>  'Sohil Vora',
    'age'   =>  23
];

$obj->insert('register',$data);
?>