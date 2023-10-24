<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *,html{
            padding: 0;
            margin: 10px;
            box-sizing: border-box;

        }
        body{
            background-color: #e4e4e4
        }
        nav{
            background-color : white;
            overflow: hidden;
            display: flex;
            justify-content: space-between ;
            align-self: center;

        }
        nav h2{
            display: flex;
            color: tomato;
        }
        nav a{
            
            display: flex;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        
        }
    </style>
</head>
<body>
    <nav>
        <h2>Xin chào Guest</h2>
        <a href="#" onclick="loadPage('xemTT_NV.php')">Xem thông tin nhân viên</a>
        <a href="#" onclick="loadPage('xemTT_PB.php')" >Xem thông tin phòng ban</a>
        <a href="#" onclick="loadPage('timkiem_NV.php')">Tìm kiếm nhân viên</a>
    </nav>
    <iframe id="content" style="width:100%;height:80vh;border:none;"></iframe>

    <script>
        function loadPage(page) {
            var iframe = document.getElementById('content');
            iframe.src = page;
        }
    </script>
</body>
</html>