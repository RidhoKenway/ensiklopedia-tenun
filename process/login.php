<?php 
include_once './../src/c.php';
session_start();

if(isset($_POST['submit']))
{
    $email = htmlspecialchars($_POST['email']);
    $sandi = htmlspecialchars($_POST['password']);

    $kueri = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($kueri) > 0) {
        // echo password_hash("admin123", PASSWORD_BCRYPT);exit;
        $data = mysqli_fetch_object($kueri);
        $verifikasi = password_verify($sandi, $data->password);
        if ($verifikasi === true) {
            $_SESSION['status'] = 'login';
            $_SESSION['iduser'] = $data->id;
            $_SESSION['nama'] = $data->name;
            return header('location:../admin/home.php');
        } else {
            $_SESSION['pesan'] = "Password yang anda masukkan tidak sesuai!";
        }
    } else {
        $_SESSION['pesan'] = "Email yang anda masukkan tidak ada!";
    }
}else{
    header('location:../admin/login.php');
}
