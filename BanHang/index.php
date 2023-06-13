<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
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
            <li><a class="active" href="index.php">Categories</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="giohang.php">Cart</a></li>
        </ul>
    </header>

    <form action="category.php" method="POST">
        <table>
            <tr>
                <td>
                    <label>Tên nhóm: </label>
                </td>
                <td>
                    <input type="text" name="tenNhom" /> <br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Mô tả: </label>
                </td>
                <td>
                    <input type="text" name="moTa" /> <br>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="createCategory" value="Tạo danh mục" />
                </td>
            </tr>
        </table>
    </form>

    <table>
        <tr>
            <th>STT</th>
            <th>Tên nhóm</th>
            <th>Mô tả</th>
        </tr>
        <?php 
            include 'db_connect.php'; 
    
            $conn = OpenCon();

            $sql = "SELECT * FROM tblcategory";
            //kiểm tra
            if ($result = mysqli_query($conn, $sql)) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?= $row['maNhom'] ?></td>
                        <td><?= $row['tenNhom'] ?></td>
                        <td><?= $row['moTa'] ?></td>
                    </tr>
                    <?php
                }
            } 
            CloseCon($conn);
        ?>
    </table>
</body>

</html>