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
        nav li {
            /* display: inline-block;
            float: left;
            padding: 14px 16px;
            white-space: normal;
            width: auto; */
            display: flex;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            line-height: 1;
        }

        ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden; 
        }
        li{
            float: left;
        }
        li a, .dropbtn{
            display: inline-block;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li.dropdown{
            display: inline-block;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content{
            display: none;
            position: absolute;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px;
            z-index: 1000;
            background-color: LightPink;

        }
        .dropdown-content a{
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
    </style>
</head>
<body>
    <nav>
        <h2>Xin chào Admin</h2>
        <ul>
            <li><a href="#" onclick="loadPage('xemTT_NV.php')">Xem thông tin nhân viên</a></li>
            <li><a href="#" onclick="loadPage('xemTT_PB.php')" >Xem thông tin phòng ban</a></li>
            <li><a href="#" onclick="loadPage('timkiem_NV.php')">Tìm kiếm nhân viên</a></li>
            <li class = "dropdown">
                <a href="#" class = "dropbtn">Chèn thông tin</a>
                <div class="dropdown-content">
                    <a href="#" onclick="loadPage('chenTT_NV.php')">Chèn thông tin nhân viên</a>
                    <a href="#" onclick="loadPage('chenTT_PB.php')">Chèn thông tin phòng ban</a>
                </div>
            </li>
            <li class = "dropdown">
                <a href="#" class = "dropbtn">Cập nhật thông tin</a>
                <div class="dropdown-content">
                    <a href="#" onclick="loadPage('capnhatTT_NV.php')">Cập nhật thông tin nhân viên</a>
                    <a href="#" onclick="loadPage('capnhatTT_PB.php')">Cập nhật thông tin phòng ban</a>
                </div>
            </li>
            <li><a href="#" onclick="loadPage('xoaNV.php')">Xoá nhân viên</a></li>

        </ul>
    </nav>
    <iframe id="content" style="width:100%;height:80vh;border:none;"></iframe>

    <script>
        function loadPage(page) {
            var iframe = document.getElementById('content');
            iframe.src = page;
        }
        document.querySelector('.dropdown-content').addEventListener('mouseleave', function() {
            this.style.display = 'none';
        });
        var dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(function(dropdown) {
            dropdown.querySelector('.dropbtn').addEventListener('click', function() {
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === 'block') {
                    dropdownContent.style.display = 'none';
                } else {
                    dropdownContent.style.display = 'block';
                }
            });
            var dropdownLinks = dropdown.querySelectorAll('.dropdown-content a');
            dropdownLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    this.parentElement.style.display = 'none';
                });
            });
        });

    </script>
</body>
</html>