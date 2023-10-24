<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login form</title>
        
        <style>
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height:  100vh;
                margin: 0;

            }
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

            <table>
                <tr class="input-box">
                    <td><label for="IDNV">IDNV: </label></td>
                    <td><input type="text" name="IDNV" value="" ><br></td>
                </tr>

                <tr class="input-box">
                    <td><label for="Hoten">Ho ten: </label></td>
                    <td><input type="text" name="Hoten" value="" ><br></td>
                </tr>

                <tr class="input-box">
                    <td><label for="IDPB">IDPB: </label></td>
                    <td><input type="text" name="IDPB" value="" ><br></td>
                </tr>
                           
                <tr class="input-box">
                    <td><label for="DiaChi">Địa chỉ:  </label></td>
                    <td><textarea name="DiaChi" rows="2" cols="20" ></textarea></td>
                </tr >

            </table>
                    

            <br>
            <div class="button-submit">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
            <?php
                include 'db_connect.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    $IDNV = $_POST['IDNV'];
                    $Hoten = $_POST['Hoten'];
                    $IDPB = $_POST['IDPB'];
                    $DiaChi = $_POST['DiaChi'];
                    
                    if (empty($IDNV) &&  empty($IDPB))
                    {
                        echo "<p style='color:red;'>Vui lòng nhập IDNV và IDPB</p>";
                        return;
                    } elseif(empty($IDNV))
                    {
                        echo "<p style='color:red;'>Vui lòng nhập IDNV</p>";
                        return;
                    } elseif(empty($IDPB))
                    {
                        echo "<p style='color:red;'>Vui lòng nhập IDPB</p>";
                        return;
                    }

                    $sql_check = "SELECT * FROM phongban where IDPB = '$IDPB'";
                    $result_check = mysqli_query($conn, $sql_check);

                    if(mysqli_num_rows($result_check) == 0){
                        echo "<p style='color:red;'>Phong ban không tồn tại!!</p>";
                        return;
                    }

                    $sql = "INSERT INTO nhanvien(IDNV, TenNV, IDPB, Diachi) VALUES ('$IDNV', '$Hoten', '$IDPB', '$DiaChi')";

                    try {
                        $result = mysqli_query($conn, $sql);
                        if ($result)
                        {
                            echo "Them nhan vien thanh cong";
                        }
                    } catch (mysqli_sql_exception $e) {
                        if ($e->getCode() == 1062) { // Mã lỗi 1062 tương ứng với lỗi trùng khóa chính
                            echo "Nhân viên có ID: ".$IDNV." đã tồn tại";
                        } else {
                            echo "Đã xảy ra lỗi: " . $e->getMessage();
                        }
                    }
                }
              
                mysqli_close($conn);

                
            ?>
        </form>

    </body>

    

</html>