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

        input {
            width: 200px;
        }

        select {
            width: 208px;
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
            <li><a class="active" href="/product.php">Products</a></li>
            <li><a href="./giohang.php">Cart</a></li>
        </ul>
    </header>
    
    <form action="./add_product.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label>Tên hàng: </label>
                </td>
                <td>
                    <input type="text" name="tenHang"/> <br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nhóm hàng: </label>
                </td>
                <td>
                    <select name="nhomHang">
                    <?php 
                        include 'db_connect.php'; 
    
                        $conn = OpenCon();
            
                        $sql = "SELECT * FROM tblcategory";
                        //kiểm tra
                        if ($result = mysqli_query($conn, $sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?= $row['maNhom'] ?>"><?= $row['tenNhom'] ?></option>
                                <?php
                            }
                        } 
                        $conn = OpenCon();

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Số lượng: </label>
                </td>
                <td>
                    <input type="text" name="soLuong"/> <br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Đơn giá: </label>
                </td>
                <td>
                    <input type="text" name="donGia"/> <br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Hình ảnh: </label>
                </td>
                <td>
                    <input type="file" name="hinhAnh" /> <br>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                   <input type="submit" name="createProduct" value="Tạo sản phẩm" />
                </td>
            </tr>
        </table>

    </form>

    <a href="./giohang.php">
        <button>
        Giỏ hàng
        </button>
    </a>
    <table>
        <tr>
            <th>Mã hàng</th>
            <th>Tên hàng</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Hình ảnh</th>
            <th>Hoạt động</th>
        </tr>   
        <?php 
    
            $conn = OpenCon();

            $sql = "SELECT * FROM tblproduct";
            //kiểm tra
            if ($result = mysqli_query($conn, $sql)) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?= $row['maHang'] ?></td>
                        <td><?= $row['tenHang'] ?></td>
                        <td><?= $row['soLuong'] ?></td>
                        <td><?= $row['donGia'] ?></td>
                        <td>
                            <img src="<?= $row['hinhAnh'] ?>" alt="Ảnh minh họa"/>
                        </td>
                        <td>
                            <a href="./add_cart.php?maHang=<?= $row['maHang'] ?>&tenHang=<?= $row['tenHang'] ?>&soLuong=<?= $row['soLuong'] ?>&donGia=<?= $row['donGia'] ?>&hinhAnh=<?= $row['hinhAnh'] ?>">
                                <button>
                                Mua
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            } 
            $conn = OpenCon();
        ?>
    <table>
</body>
</html>
