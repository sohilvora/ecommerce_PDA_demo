<?php
require_once "../../class/Crud.php";
$obj = new Crud();

    if($_POST['action'] == 'edit')
    {
        $cat_id = $_POST['cat_id'];
        $a = $obj->custom_get('category',"WHERE category_id = '$cat_id'");
        foreach($a as $row)
        {
            echo json_encode($row);
            
        }
    }
    if($_POST['action'] == 'delete')
    {
        $cat_id = $_POST['cat_id'];
        $q = $obj->delete('category',"WHERE category_id = '$cat_id'");

        if($q == true)
        {
            $data = [
                'status' => 200,
                'data' => 'category_' . $cat_id,
                'message' => 'Category is Deleted'
            ];
        }
        else{
            $data = [
                'status' => 203,
                'message' => 'Something Went Wrong'
            ];
        }
        echo json_encode($data); 
    }
?>