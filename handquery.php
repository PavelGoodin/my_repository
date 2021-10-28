<?PHP
//Функция обработки запроса от пользователя
function handling_Query($txt)
{	
	global $mask;

  // разбиваем весь техт - textarea на строки и помещаем в массив $Serial_nums
  $Serial_nums = preg_split('#[\r\n]+#',$txt);
  $count_ser_n = count($Serial_nums);//количество серийных номеров в массиве
  $index = $_POST['mySelect'];//Смотрим Какой тип оборудования выбрал пользователь
  
  $index = (int)$index;
  $maska_SN = $mask[$index];//достаем нужную маску из массива
  echo "<br> Маска = $maska_SN";//Отображаем пользователю по какой маске идет сравнение

  $maska_SN = transform_SN($maska_SN);//преобразуем маску SN в рег выражение с помощью собственной функции



   $db = new mysqli("localhost","root","","equipment_db");//подключение к БД
   mysqli_query($db,"SET NAMES 'utf8'");//Установить кодировку
   	//$db-> query("ALTER TABLE `db_eq` AUTO_INCREMENT = 1");
   	//Обработка ошибок
   if(mysqli_error($db))
   		{ 	echo 'Error: '.mysqli_error($db).'<br>'; 
        	echo 'Error Number: '.mysqli_errno($db);
        }
        else 
        {
            $Serial='';
            $stmt = mysqli_prepare($db, "INSERT INTO `db_eq`(`id_type`,`Serial_num`) VALUES( ? , ? ) ");//подготавливаем запрос
            mysqli_stmt_bind_param($stmt,'is', $index, $Serial);//привязываем переменные к подготовленному запросу   

   // "Добавление в базу данных с помощью цикла for;

   for ($i=0; $i<$count_ser_n; $i++)

     	{
        	$Serial = $Serial_nums[$i];//достанем серийный номер из массива

    //   Проверяем совпадение Серийного номера с маской
       if(   preg_match (  $maska_SN,   $Serial )    )
             {
             	
             	$result = mysqli_stmt_execute($stmt);//выполняем запрос

              //$result = mysqli_query($db,"INSERT INTO `db_eq`(`id_type`,`Serial_num`) VALUES('$index','$Serial') ");

               if(!$result){               echo '<br>Error: ' . mysqli_error($db) . '<br>';
                                           echo 'Error Number: ' . mysqli_errno($db);
                            }
                            else
                            {
               					echo "<br> Серийный номер:<b> $Serial </b> добавлен в базу!";                
           					}
               }
         else
         
         		{
           			echo '<div style ="color:red"> Серийный номер:<b>'.$Serial.'</b> не совпадает с маской!</div>';
       			}


      	}

			$db->close();//отключаемся от БД


        }

}

?>