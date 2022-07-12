<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Скрипт обзвона</title>
<style>
textarea {
	resize: none; /* Запрещаем изменять размер */
}
</style>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>


<script>

function finish_scr(){
 location.reload();
}

function start_scr(n_block,edit) {

var my_name=$('#my_name').val();
var cl_name=$('#cl_name').val();
//alert(my_name + ' test ' + cl_name);
    $.post("script.php",
        {'my_name': my_name,
        'cl_name' : cl_name,
        'n_block' : n_block,
        'edit' : edit,
        },
        function (result){
            $("#script").html(result);
        }
    );
}

</script>
</head>
<body>
<?php
if (is_null($_GET['edit'])) {
$edit=0;
} else {
$edit=1;
}
?>
<div id="data_up">
<table>
<tr>
<td><span>Менеджер</span></td><td><input type="text" name="my_name" id="my_name" size=10></td>
</tr><tr>
<td><span>Клиент</span></td><td><input type="text" name="cl_name" id="cl_name" size=150></td>
</tr><tr>
<td><span onclick="start_scr('6',<?php echo $edit; ?>)"> Начать </span></td>
</tr>
</table>
</div>


<div id="script">
</div>
</body>
</html>