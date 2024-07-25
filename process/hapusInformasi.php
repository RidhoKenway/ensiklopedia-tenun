<?php
include_once './../src/c.php';
session_start();
if($_SESSION['status']!="login"){
    header("location:./login.php?pesan=belum_login");
}
header("Content-type: application/json; charset=utf-8");
if ($_SERVER['REQUEST_METHOD'] == "DELETE" && isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $sql_query = "SELECT * FROM informasi where id='$id'";
    $result = mysqli_query($connection, $sql_query);
    if ($res = $result->fetch_object()) {
        $sql_query = "DELETE FROM informasi where id='$id'";
        $del = mysqli_query($connection, $sql_query);
        http_response_code(200);
        $message = [
            'message' => 'Data berhasil dihapus'
        ];
        echo json_encode($message);exit;
    }
    http_response_code(404);
    $message = [
        'error' => 'Data gagal dihapus'
    ];
    echo json_encode($message);exit;
}
 