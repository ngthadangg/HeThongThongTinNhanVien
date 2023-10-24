<!DOCTYPE html>
<html>
    <head>
        <title>Xem thông tin nhân viên của phòng ban</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

    <?php
    include 'db_connect.php';

    // $IDPB = $_GET['IDPB'];

    // $sql = "SELECT * FROM nhanvien WHERE IDPB='$IDPB'";
    // $result = mysqli_query($conn, $sql);
    $IDPB = $_GET['IDPB'];

    $stmt = $conn->prepare("SELECT * FROM nhanvien WHERE IDPB=?");
    $stmt->bind_param("s", $IDPB); // s : tham số kiểu string

    $stmt->execute();

    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        echo "<table style='border: 1px solid black; border-collapse: collapse;'>
        <tr>
            <th style='border: 1px solid black; padding: 10px;'>IDNV</th>
            <th style='border: 1px solid black; padding: 10px;'>Họ tên</th>
            <th style='border: 1px solid black; padding: 10px;'>Địa chỉ</th>
        </tr>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["IDNV"]. "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["TenNV"]. "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["Diachi"]. "</td>
            </tr>";
        }
    } else {
        echo "Không có dữ liệu";
    }

    mysqli_close($conn); // Đóng kết nối CSDL
    ?>

    </table>

    </body>
</html>