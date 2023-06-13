<?php 
    include 'db_connect.php'; 

    $conn = OpenCon();

    $tenNhom = $_POST["tenNhom"];
    $moTa = $_POST["moTa"];

    if(isset($_POST['createCategory'])) {
        $sql = "INSERT INTO tblcategory (tenNhom, moTa) 
        VALUES ('$tenNhom', '$moTa')";
    } 
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    CloseCon($conn);

    header('Location: '."http://localhost/BanHang/index.php");

?>

