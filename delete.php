<?php
include 'db_connect.php';

if(isset($_POST['tick'])){
    $idList = $_POST['tick'];

    foreach($idList as $id){
        $id = mysqli_real_escape_string($conn, $id); // Escape the string to prevent SQL injection
        $sql = "DELETE FROM nhanvien WHERE IDNV = '$id'";

        if(mysqli_query($conn, $sql)){
            echo "Nhân viên có ID: $id đã được xoá thành công.";
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
} else {
    echo "Không có nhân viên nào được chọn để xoá.";
}

mysqli_close($conn);
?>
