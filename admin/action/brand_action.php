<?php
require_once "../../class/Crud.php";
$obj= new Crud();

if($_POST['form_type'] == 'save')
{
    if(empty($_POST['category_name']))
    {
        $data['msg_error'] = "Please select a Category";
        $data['status'] = 0;
    }
    else if(empty($_POST['brand_name']))
    {
        $data['msg_error'] = "Please Fill the Brand Field";
        $data['status'] = 0;
    }
    else{
        $data = [
            'brand_name' => $_POST['brand_name'],
            'brand_slug_url' => $obj->slugify($_POST['brand_name'], 'brand_slug_url', 'brand'),
            'brand_category_id' => $_POST['category_name'],
            'brand_created_at' => date('Y-m-d H:i:s'),

        ];
        $exec =  $obj->insert('brand', $data);
        if ($exec = 1) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
    }
    echo json_encode($data);
}
?>