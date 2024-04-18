<?php
require_once '../../class/Crud.php';

$obj = new Crud();
if (empty($_POST['category_name'])) {
    $data['msg_error'] = "Category name is required";
    $data['status'] = 0;
} else {
    $data  = [
        'category_name' => $_POST['category_name'],
        'category_slug_url' => $obj->slugify($_POST['category_name'], 'category_slug_url', 'category'),
    ];
    $exec =  $obj->insert('category', $data);
    if ($exec = 1) {
        $data['status'] = 1;
    } else {
        $data['status'] = 0;
    }
}
echo json_encode($data);