<?php
$my_name=$_POST['my_name'];
$cl_name=$_POST['cl_name'];
$n_block=$_POST['n_block'];
$edit=$_POST['edit'];


//echo $edit;

//echo "<br>$my_name<br>$cl_name<br>$n_block<br>";

$con=mysqli_connect('localhost','root','l0vvbksql0v','call_script1');

$test=mysqli_query($con,'set names cp1251');

$mysql="select * from script1 where num_sect=$n_block order by sort";
//echo $mysql;
$result=mysqli_query($con,$mysql);
$numrows=mysqli_num_rows($result);
//echo $numrows;

//echo "<span>Назад</span><br>";

while($row=mysqli_fetch_assoc($result)){
$text_section=$row['text_section'];
$ref_next=$row['ref_next'];
$text_section = mb_convert_encoding($text_section, "utf-8", "windows-1251");
if ($edit==0) {
$text_section = str_replace('$my_name', ' ' . $my_name . ' ', $text_section);
$text_section = str_replace('$cl_name', ' ' . $cl_name . ' ', $text_section);
}
//$text_section = mb_convert_encoding($text_section, "windows-1251", "utf-8");
if ($ref_next !=0) {
	echo "<br><span onclick=\"start_scr($ref_next, $edit)\">$text_section</span>";
    } else {
	if ($edit==0) {
//	    echo "<br>$text_section<br>";
	    echo "<textarea id=\"con_targ\" cols=200 rows=10>$text_section</textarea>";
	} else {
	    echo "<textarea id=\"con_targ\" cols=200 rows=10>$text_section</textarea>";
	}
    }
}

if ($numrows < 2) {
	echo "<br><span onclick=\"finish_scr()\"><br>В Начало<br></span>";
}

mysqli_close($con);
?>
