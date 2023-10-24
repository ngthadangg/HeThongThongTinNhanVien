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

    <h1>Nhập thông tin phòng ban cần cập nhật</h1>
    <?php

        include 'db_connect.php';
        if (isset($_GET['IDPB'])) {
            $IDPB = $_GET['IDPB'];
    
            $sql = "SELECT * FROM phongban WHERE IDPB = '$IDPB'";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $TenPB = $row['TenPB'];
                $IDPB = $row['IDPB'];
                $Mota = $row['Mota'];
            } else {
                die("Loi truy van: ". mysqli_error($conn));
            }
        }
        mysqli_close($conn);

    ?>
        
    <table>
        <tr class="input-box">
            <td><label for="IDNV">IDPB: </label></td>
            <td><input type="text" name="IDPB" value="<?php echo $IDPB; ?>" disabled><br></td>
        </tr>

        <tr class="input-box">
            <td><label for="TenPB">TenPB: </label></td>
            <td><input type="text" name="TenPB" value="<?php echo $TenPB; ?>"><br></td>
        </tr>


                
        <tr class="input-box">
            <td><label for="Mota">Mô tả:  </label></td>
            <td><textarea name="Mota" rows="2" cols="20"><?php echo $Mota; ?></textarea></td>
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
            $TenPB = $_POST['TenPB'];
            $Mota = $_POST['Mota'];
    
            $sql = "UPDATE phongban SET TenPB='$TenPB', Mota='$Mota' WHERE IDPB='$IDPB'";
    
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