<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật nhân viên </title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <form action="" method="POST" >

    <h1>Nhập thông tin nhân viên cần thêm</h1>
    <?php

        include 'db_connect.php';
        if (isset($_GET['IDNV'])) {
            $IDNV = $_GET['IDNV'];
    
            $sql = "SELECT * FROM nhanvien WHERE IDNV = '$IDNV'";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $Hoten = $row['TenNV'];
                $IDPB = $row['IDPB'];
                $DiaChi = $row['Diachi'];
            } else {
                die("Loi truy van: ". mysqli_error($conn));
            }
        }
        mysqli_close($conn);

    ?>
        
    <table>
        <tr class="input-box">
            <td><label for="IDNV">IDNV: </label></td>
            <td><input type="text" name="IDNV" value="<?php echo $IDNV; ?>" disabled><br></td>
        </tr>

        <tr class="input-box">
            <td><label for="Hoten">Ho ten: </label></td>
            <td><input type="text" name="Hoten" value="<?php echo $Hoten; ?>"><br></td>
        </tr>

        <tr class="input-box">
            <td><label for="IDPB">IDPB: </label></td>
            <td><input type="text" name="IDPB" value="<?php echo $IDPB; ?>" disabled><br></td>
        </tr>
                
        <tr class="input-box">
            <td><label for="DiaChi">Địa chỉ:  </label></td>
            <td><textarea name="DiaChi" rows="2" cols="20"><?php echo $DiaChi; ?></textarea></td>
        </tr >

    </table>
            

    <br>
    <div class="button-submit">
        <button type="submit">Cập nhật</button>
        <button type="reset">Reset</button>
    </div>

    <?php
        include 'db_connect.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $Hoten = $_POST['Hoten'];
            $DiaChi = $_POST['DiaChi'];
    
            $sql = "UPDATE nhanvien SET TenNV='$Hoten', Diachi='$DiaChi' WHERE IDNV='$IDNV'";
    
            if (mysqli_query($conn, $sql)) {
                echo "Cập nhật nhân viên thành công";
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
    
        mysqli_close($conn);
    ?>

    </form>
</body>
</html>