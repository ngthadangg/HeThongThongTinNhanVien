<?php
    include 'db_connect.php';
    $sql = "SELECT nhanvien.IDNV, nhanvien.TenNV, nhanvien.IDPB, nhanvien.Diachi, phongban.TenPB, phongban.Mota FROM  nhanvien INNER JOIN phongban ON nhanvien.IDPB = phongban.IDPB";
    $result = $conn->query($sql);

    if (!$result)
    {
        die("Loi truy van: ".mysqli_error($conn));
    }
    else
    {
        echo "<table style='border: 1px solid black; border-collapse: collapse;'>
            <tr>
                <th style='border: 1px solid black; padding: 10px;'>IDNV</th>
                <th style='border: 1px solid black; padding: 10px;'>TenNV</th>
                <th style='border: 1px solid black; padding: 10px;'>Diachi</th>
                <th style='border: 1px solid black; padding: 10px;'>IDPB</th>
                <th style='border: 1px solid black; padding: 10px;'>TenPB</th>
                <th style='border: 1px solid black; padding: 10px;'>Mota</th>
            </tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr>
                    <td style='border: 1px solid black; padding: 10px;'>".$row["IDNV"]."</td>
                    <td style='border: 1px solid black; padding: 10px;'>".$row["TenNV"]."</td>
                    <td style='border: 1px solid black; padding: 10px;'>".$row["Diachi"]."</td>
                    <td style='border: 1px solid black; padding: 10px;'>".$row["IDPB"]."</td>
                    <td style='border: 1px solid black; padding: 10px;'>".$row["TenPB"]."</td>
                    <td style='border: 1px solid black; padding: 10px;'>".$row["Mota"]."</td>
                </tr>";
        }
        echo "</table>";
    }
    mysqli_free_result($result);
    mysqli_close($conn);

    // $conn->close();
?>