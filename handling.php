<?php
//Функция преобразует строку Маска SN в регулярное выражение
function transform_SN($str_sn)

{

	$arr1 = str_split($str_sn);//разбиваем строку на подстроки
	//if(count($arr1)==10)

	foreach ($arr1 as &$value)

	{

		switch ($value) {
    case "N":
        $value = "[0-9]";
        break;
    case "A":
        $value = "[A-Z]";
        break;
    case "a":
        $value = "[a-z]";
        break;
    case "X":
        $value = "[A-Z0-9]";
        break;
    case "Z":
        $value = "[-_@]";
        break;
						}

	}



$str_sn = implode($arr1);//объединяем все строки в одну
$str_sn = '#'.$str_sn.'#';//Добовляем с двух сторон # #

return $str_sn;

}

?>
