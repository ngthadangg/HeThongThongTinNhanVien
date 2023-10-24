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
            .notifi{
                color:  red;
                font-weight: bolder;
            }
        </style>
    </head>
    <body>
        <form action="" method="POST" >

            <h1>Nhập thông tin phòng ban cần thêm</h1>

            <table>
                <tr class="input-box">
                    <td><label for="IDPB">IDPB: </label></td>
                    <td><input type="text" name="IDPB" value="" ><br></td>
                </tr>

                <tr class="input-box">
                    <td><label for="TenPB">Ten PB: </label></td>
                    <td><input type="text" name="TenPB" value="" ><br></td>
                </tr>


                <tr class="input-box">
                    <td><label for="Mota">Mô tả:  </label></td>
                    <td><textarea name="Mota" rows="2" cols="20" ></textarea></td>
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
                    $IDPB = $_POST['IDPB'];
                    $TenPB = $_POST['TenPB'];
                    $Mota = $_POST['Mota'];
                    
                    if(empty($IDPB))
                    {
                        echo "<p style='color:red;'>Vui lòng nhập IDPB</p>";
                        return;
                    }
                    $sql = "INSERT INTO phongban(IDPB, TenPB, Mota) VALUES ('$IDPB', '$TenPB',  '$Mota')";

                    $result = mysqli_query($conn, $sql);

                    if ($result)
                    {
                        echo "Them phong ban thanh cong";
                    }
                    else{
                        echo "Da xay ra loi: '$result'";
                    }
                }

                
                mysqli_close($conn);

                
            ?>
        </form>

    </body>

    

</html>