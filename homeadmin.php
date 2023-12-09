<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>

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
            align-self: center;

        }
        nav a{
            display: flex;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            line-height: 1;
        }
        .dropdown {
            display: flex;
            text-align: center;
            text-decoration: none;
            margin-left: 0px;
            line-height: 1;

        }

        .dropdown-content {
            display: none;
            position: absolute;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <nav>
        <h2>Xin chào Admin</h2>
        <a href="#" onclick="loadPage('xemTT_NV.php')">Xem thông tin nhân viên</a>
        <a href="#" onclick="loadPage('xemTT_PB.php')" >Xem thông tin phòng ban</a>
        <a href="#" onclick="loadPage('timkiem_NV.php')">Tìm kiếm nhân viên</a>
        <div class="dropdown">
            <a href="#">Chèn thông tin</a>
            <div class="dropdown-content">
                <a href="#" onclick="loadPage('chenTT_NV.php')">Chèn thông tin nhân viên</a>
                <a href="#" onclick="loadPage('chenTT_PB.php')">Chèn thông tin phòng ban</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">Cập nhật thông tin</a>
            <div class="dropdown-content">
                <a href="#" onclick="loadPage('capnhatTT_NV.php')">Cập nhật thông tin nhân viên</a>
                <a href="#" onclick="loadPage('capnhatTT_PB.php')">Cập nhật thông tin phòng ban</a>
            </div>
        </div>
        <a href="#" onclick="loadPage('xoaNV.php')">Xoá nhân viên</a>
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