<?php

include_once './../src/c.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id']))
{
    $id = htmlspecialchars($_GET['id']);
    $title = htmlspecialchars($_POST['title']);
    $deskripsi = $_POST['description'];
    $temp = $_POST['temp_file'];
    $date = date("Y-m-d h:i:s");
    $fname = $temp;
    
    $deskripsi = str_ireplace("'","''",$deskripsi);

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['cover']['name'];
    $ukuran = $_FILES['cover']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $slug = slugify($title);

    header("Content-type: application/json; charset=utf-8");
    $sql_query = "SELECT * FROM informasi where id='$id'";
    $result = mysqli_query($connection, $sql_query);
    if ($res = $result->fetch_object()) {
        if (isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != null) {
            if(!in_array($ext,$ekstensi) ) {
                http_response_code(422);
                $message = [
                    'error' => 'Extensi harus berupa png,jpg,jpeg, atau gif'.$_FILES['cover']['name']
                ];
                echo json_encode($message);exit;
            }
            if($ukuran > 1044070){	
                $message = [
                    'error' => 'Ukuran file tidak boleh lebih dari 1Mb'
                ];
                http_response_code(422);
                echo json_encode($message);exit;
            }
            $fname = $rand.'_'.$filename;
            move_uploaded_file($_FILES['cover']['tmp_name'], './../dist/images/informasi/'.$rand.'_'.$filename);
        }
        mysqli_query($connection, "UPDATE informasi SET judul='$title', slug='$slug', deskripsi='$deskripsi', cover='$fname', updated_at='$date' WHERE id='$id'");
        $message = [
            'message' => 'Data berhasil disimpan'
        ];
        $code = 201;
        http_response_code(201);
        echo json_encode($message);exit;
    }else{
        http_response_code(422);
        $message = [
            'error' => 'Data tidak ditemukan'
        ];
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