<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoa Nhan  vien </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
    <div id="tableCapNhat">

    </div>

    <script>
        function loadTable() {
            $.get('load_table_capnhat.php', function(data) {
                $('#tableCapNhat').html(data);
            });
        }

        $(document).ready(function() {
            loadTable();
        });
    </script>

    
</body>
</html>
