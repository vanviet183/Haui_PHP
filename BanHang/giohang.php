<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        body {
          font-size: 18px;
        }

        table {
            margin-top: 16px;
            text-align: left;
        }

        th, td {
            padding: 8px 16px;
        }
        
        ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #333;
          position: -webkit-sticky; /* Safari */
          position: sticky;
          top: 0;
        }
        
        li {
          float: left;
        }
        
        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }
        
        li a:hover {
          background-color: #111;
        }
        
        .active {
          background-color: #4CAF50;
        }
    </style>
</head>
<body>
    <header>
        <ul>
            <li><a href="./index.php">Categories</a></li>
            <li><a href="./product.php">Products</a></li>
            <li><a class="active" href="./giohang.php">Cart</a></li>
        </ul>
    </header>
    <table>
        <tr>
            <th>Tên hàng</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Hình ảnh</th>
        </tr>   
        <?php 
            $carts = $_SESSION['cart'];

            foreach ($carts as $cart) {
                ?>
                <tr>
                    <td><?= $cart['tenHang'] ?></td>
                    <td><?= $cart['soLuong'] ?></td>
                    <td><?= $cart['donGia'] ?></td>
                    <td>
                        <img src="<?= $cart['hinhAnh'] ?>" alt="Ảnh minh họa"/>
                    </td>
                </tr>
                <?php
            }
            ?>
    <table>
    
</body>
</html>
