<?php

include_once './../src/c.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $title = htmlspecialchars($_POST['title']);
    $deskripsi = $_POST['description'];
    $date = date("Y-m-d h:i:s");

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['cover']['name'];
    $ukuran = $_FILES['cover']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $slug = slugify($title);

    header("Content-type: application/json; charset=utf-8");
    
    if(!in_array($ext,$ekstensi) ) {
        http_response_code(422);
        $message = [
            'error' => 'Extensi harus berupa png,jpg,jpeg, atau gif'
        ];
        echo json_encode($message);exit;
    }else{
        if($ukuran < 1044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['cover']['tmp_name'], './../dist/images/informasi/'.$rand.'_'.$filename);
            mysqli_query($connection, "INSERT INTO informasi VALUES(NULL,'$title','$slug','$deskripsi','$xx','$date','$date')");
            $message = [
                'message' => 'Data berhasil disimpan'
            ];
            $code = 201;
            http_response_code(201);
            echo json_encode($message);exit;
        }else{
            $message = [
                'error' => 'Ukuran file tidak boleh lebih dari 1Mb'
            ];
            http_response_code(422);
            echo json_encode($message);exit;
        }
    }
}else{
    header('location:./../admin/informasi/add.php');
}

function slugify($text){
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
   
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
   
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
   
    // trim
    $text = trim($text, '-');
   
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
   
    // lowercase
    $text = strtolower($text);
     
    return $text;
  }