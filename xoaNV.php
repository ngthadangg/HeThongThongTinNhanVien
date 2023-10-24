<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoa Nhan  vien </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
    <div id="tableDiv">
        <!-- Table will be loaded here -->
    </div>

    <div class = "btn_action">
        <input type="checkbox" id="selectAll" onclick = selectAll()>
        <label for="selectALl">Chọn tất cả</label>
        
        <button onclick="deleteSelected()">xoá</button>
    </div>

    <script>
        function loadTable() {
            $.get('load_table_xoa.php', function(data) {
                $('#tableDiv').html(data);
            });
        }

        function selectAll()
        {
            var items = document.getElementsByName('tick[]');
            var selectAllCheckbox = document.getElementById('selectAll');
            for (var i=0; i<items.length; i++){
                if (selectAllCheckbox.checked == true){
                    items[i].checked = true;
                } else {
                    items[i].checked = false;
                }
            }
        }

        function deleteSelected() {
            var idList = [];
            $("input:checkbox[name='tick[]']:checked").each(function(){
                idList.push($(this).val());
            });

            $.post('delete.php', { 'tick[]': idList }, function() {
                loadTable();
            });
        }

        $(document).ready(function() {
            loadTable();
        });
    </script>

    
</body>
</html>
