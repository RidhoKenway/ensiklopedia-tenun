<?php
include_once './../src/c.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nama = htmlspecialchars($_POST['nama']);
    $parent_id = htmlspecialchars($_POST['parent_id']);
    $deskripsi = htmlspecialchars($_POST['comment']);
    $date = date("Y-m-d h:i:s");

    header("Content-type: application/json; charset=utf-8");
    if ($nama == '' || $deskripsi == '') {
        $message = [
            'error' => 'Mohon lengkapi data terlebih dahulu'
        ];
        http_response_code(422);
        echo json_encode($message);exit;
    }
    try{
        if($parent_id){
            $create = mysqli_query($connection, "INSERT INTO testimoni VALUES(NULL,'$nama','$parent_id','$deskripsi','$date')");
        }else{
            $create = mysqli_query($connection, "INSERT INTO testimoni VALUES(NULL,'$nama',NULL,'$deskripsi','$date')");
        }
        $message = [
            'message' => 'Data berhasil disimpan'
        ];
        http_response_code(201);
        echo json_encode($message);exit;
    }catch(Exception $ex){
        $message = [
            'message' => 'Data gagal disimpan'
        ];
        http_response_code(421);
        echo json_encode($message);exit;
    }
}else{
    // header('location:./../testimoni/index.php');
}