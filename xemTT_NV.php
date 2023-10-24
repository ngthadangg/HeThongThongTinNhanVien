<?php
    include 'db_connect.php';

    $sql = "SELECT * FROM nhanvien";
    $result = mysqli_query($conn,$sql);

    if (!$result)
    {
        die("Loi truy van SQL:".mysqli_error($conn));
    }
    else
    {
        echo "<strong>Bang thong tin nhan vien</strong> ";
        echo "<table style='border: 1px solid black; border-collapse: collapse;'> 
        <tr> 
            <th style='border: 1px solid black; padding: 10px;'>IDNV</th> 
            <th style='border: 1px solid black; padding: 10px;'>TenNV</th> 
            <th style='border: 1px solid black; padding: 10px;'>IDPB</th> 
            <th style='border: 1px solid black; padding: 10px;'>Diachi</th> 
        </tr>";

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr> 
                <td style='border: 1px solid black; padding: 10px;'>".$row["IDNV"]."</td> 
                <td style='border: 1px solid black; padding: 10px;'>".$row["TenNV"]."</td> 
                <td style='border: 1px solid black; padding: 10px;'>".$row["IDPB"]."</td> 
                <td style='border: 1px solid black; padding: 10px;'>".$row["Diachi"]."</td> 
            </tr>";
        }
        echo "</table>";
    }
    
    mysqli_free_result($result);
    mysqli_close($conn);
?>