<?php
require_once '../../class/Crud.php';

$obj = new Crud();

$data  = [
    'category_name' => $_POST['category_name'],
    'category_slug_url' => $obj->slugify($_POST['category_name'], 'category_slug_url', 'category'),
];
$exe =  $obj->insert('category', $data);

if ($exe = 1) {
    echo 'success';
} else {
    echo "fail";
}
