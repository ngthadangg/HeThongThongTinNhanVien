<?php

include 'db_connect.php';

$sql = "SELECT * FROM phongban";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Loi truy van: ". mysqli_error($conn));
} else{
    echo "<table style='border: 1px solid black; border-collapse: collapse;'> 
    <tr> 
        <th style='border: 1px solid black; padding: 10px;'>IDPB</th> 
        <th style='border: 1px solid black; padding: 10px;'>TenPB</th> 
        <th style='border: 1px solid black; padding: 10px;'>Mota</th> 
        <th style='border: 1px solid black; padding: 10px;'>Xem NV</th> 
    </tr>";

    
    while($row = $result->fetch_assoc()) {
        echo "<tr> 
            <td style='border: 1px solid black; padding: 10px;'>".$row["IDPB"]."</td> 
            <td style='border: 1px solid black; padding: 10px;'>".$row["TenPB"]."</td> 
            <td style='border: 1px solid black; padding: 10px;'>".$row["Mota"]."</td> 
            <td style='border: 1px solid black; padding: 10px;'><a href= 'xemTT_NVPB.php?IDPB=" . $row["IDPB"] . "'>xxx</a></td>
        </tr>";
    }
    echo "</table>";
}
//Giai phogn tap cac ban ghi trong result
mysqli_free_result($result);
mysqli_close($conn);
?>
