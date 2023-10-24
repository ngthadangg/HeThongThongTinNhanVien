<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim kiếm nhân viên</title>

    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        form-box{
            display: flex;
            align-items: center;
        }
        .btn_action{
            display : flex;
            justify-content: space-around;
            align-items: center;
        }
        #OK{
            color : blue;
            font-style : bold;
        }
        #RESET{
            color: red;
        }
    </style>
    
</head>
<body>
    <div class="form-box">
        <form action="" id = "form-login" method="post">
            <h1>Tìm kiếm thông tin nhân viên </h1>
            <table>
                <tr class="input-box">
                    <td><label >Tìm kiếm theo : </label></td>
                    <td> 
                        <input type="radio" name ="btn_group" value = "IDNV"> <label for="IDNV">IDNV</label> 
                        <input type="radio" name ="btn_group" value = "TenNV"> <label for="TenN">Họ tên</label> 
                        <input type="radio" name ="btn_group" value = "Diachi"> <label for="DiaChi">Địa chỉ</label> 
                    </td> 
                </tr> 
                <tr class="input-box"> 
                    <td><label for="txt_find">Nhập từ khoá tìm kiếm: </label></td> 
                    <td><input type="text" name="txt_find" value="" ><br></td> 
                </tr> 
            </table> 
            <div class = "btn_action"> 
                <button type = "submit" id = "OK" >OK</button> 
                <button type = "reset" id = "RESET" >RESET</button> 
            </div> 
            <br>
            <br>

            <?php
                include 'db_connect.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {


                    try{
                        if(isset($_POST['btn_group'])){
                            $searchType = $_POST['btn_group'];
                            $searchKeyword = $_POST['txt_find'];
                        } else {
                            echo "<p style='color:red;'>Vui lòng chọn một tùy chọn tìm kiếm.</p>";
                            return;
                        }
                        $sql = "SELECT * FROM nhanvien WHERE $searchType = '$searchKeyword' ";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) 
                        {
                            echo "<table style='border: 1px solid black; border-collapse: collapse;'>
                            <tr>
                                <th style='border: 1px solid black; padding: 10px;'>IDNV</th>
                                <th style='border: 1px solid black; padding: 10px;'>Họ tên</th>
                                <th style='border: 1px solid black; padding: 10px;'>Địa chỉ</th>
                            </tr>";

                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo "<tr>
                                        <td style='border: 1px solid black; padding: 10px;'>" . $row["IDNV"]. "</td>
                                        <td style='border: 1px solid black; padding: 10px;'>" . $row["TenNV"]. "</td>
                                        <td style='border: 1px solid black; padding: 10px;'>" . $row["Diachi"]. "</td>
                                </tr>";
                            }
                        } 
                        else {
                            echo "Không tìm thấy kết quả";
                        }
                    }
                    catch (mysqli_sql_exception $e){
                        echo "Đã xảy ra lỗi: " . $e->getMessage();
                    }
                }

                mysqli_close($conn);
            ?>

        </form> 
    </div>

    

</body>
</html>
