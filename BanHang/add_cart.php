<?php
    session_start();

    $_SESSION['cart'] = array();

    $maHang = $_GET['maHang'];
    $tenHang = $_GET['tenHang'];
    $soLuong = $_GET['soLuong'];
    $donGia = $_GET['donGia'];
    $hinhAnh = $_GET['hinhAnh'];

    if (isset($_SESSION['cart'][$maHang])) {
        $_SESSION['cart'][$maHang]['quantity']++;
    } else {
        $_SESSION['cart'][$maHang] = array(
            "tenHang" => $tenHang,
            "soLuong" => 1,
            "donGia" => $donGia,
            "hinhAnh" => $hinhAnh,
        );
    }
    
    
    if (isset($_POST['remove_id'])) {
        $product_id = $_POST['remove_id'];
        unset($_SESSION['cart'][$product_id]);
    }

    header('Location: '."http://localhost/BanHang/giohang.php");

?>
