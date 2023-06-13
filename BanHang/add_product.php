<?php 
    include 'db_connect.php'; 

    $conn = OpenCon();

    $tenHang = $_POST["tenHang"];
    $nhomHang = $_POST["nhomHang"];
    $soLuong = $_POST["soLuong"];
    $donGia = $_POST["donGia"];
    // $hinhAnh = $_POST["hinhAnh"];


    if(isset($_POST['createProduct'])) {
        if (($_FILES["hinhAnh"]['name'] != "")){
            // Where the file is going to be stored
            $target_dir = "images/";
            $file = $_FILES["hinhAnh"]['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES["hinhAnh"]['tmp_name'];
            $path_filename_ext = $target_dir . $filename . "." . $ext;
            
            $hinhAnh = "./" . $path_filename_ext;
    
            // Check if file already exists
            // if (file_exists($path_filename_ext)) {
            //     echo "Sorry, file already exists.";
            // } else {
            //     move_uploaded_file($temp_name,$path_filename_ext);
            //     echo "Congratulations! File Uploaded Successfully.";
            // }
    
            if (!file_exists($path_filename_ext)) {
                move_uploaded_file($temp_name, $path_filename_ext);
            }
        }
        $sql = "INSERT INTO tblproduct (tenHang, nhomHang, soLuong, donGia, hinhAnh) 
        VALUES ('$tenHang', '$nhomHang', '$soLuong', '$donGia', '$hinhAnh')";  
    }
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    CloseCon($conn);

    header('Location: '."http://localhost/BanHang/product.php");
?>