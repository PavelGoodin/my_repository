<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Павел Агафонов"><!--Автор-->
    <meta name="description" content="База данных оборудования"><!--Описание-->
    <meta name="keywords" content="тип,проверка,оборудование"><!--ключевые слова-->
    <link rel="stylesheet" href="css/main.css"><!--Подключаем стили-->
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <?PHP  
    	//подключаем файлы с функциями
       require 'handquery.php';
       require 'handling.php';
       //объявляем константы
       define("LOCALHOST", "localhost");
       define("USERNAME", "root");
       define("PASSWORD","");
       define("DATA_BASE","equipment_db");
     ?>

    <!-- название страницы-->
    <title>Тестовое задание</title>
  </head>



  <body>
  	<!--ШАПКА-->
<header>
    
    <div id="header">
		<h1>База оборудования</h1>
    </div>

</header>

  <!--Основная страница-->
<section id="main">

  <!--Создаем Таблицу тип оборудования-->
  <table border="1" width="500" >

        <thead>
          <tr>
            <th></th>
            <th>Тип оборудования</th>
            <th>Маска SN</th>
          </tr>

        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>TP-Link TL-WR74</td>
            <td>XXAAAAAXAA</td>
          </tr>

          <tr>
            <td>2</td>
            <td>D-Link DIR-300</td>
            <td>NXXAAXZXaa</td>
          </tr>

          <tr>
            <td>3</td>
            <td>D-Link DIR-300 S</td>
            <td>NXXAAXZXXX</td>
          </tr>


        </tbody>

        <table/>
<p>N – цифра от 0 до 9,
A – прописная буква латинского алфавита,
a – строчная буква латинского алфавита,<br>
X – прописная буква латинского алфавита либо цифра от 0 до 9,
Z –символ из списка: “-“, “_”, “@”.
</p>


<!--Создаем форму -->
    <form name ="user_form"  method="post">
      
<!--Поле для ввода серийных номеров-->
      <label>Введите серийный номер:</label><br>
      <textarea name ="txt_a"  rows="5" cols="50"></textarea><br><br>

    	<!--Кнопка "Добавить"-->
    	<input  name = "myButton" type="submit"  value = "Добавить"/>
    <br><br>

   

    <!--загружаем в переменныую $result = (id , тип оборудования, маска SN) из БД-->
	<?PHP

	$db = new mysqli( LOCALHOST, USERNAME, PASSWORD, DATA_BASE );//подключение к БД
  	mysqli_query($db, "SET NAMES 'utf8'");//Установить кодировку
	//Обработка ошибок
	if(mysqli_error($db)){ echo 'Error: '.mysqli_error($db).'<br>';
                        echo 'Error Number: '.mysqli_errno($db);
                      }else {
                        echo "Успешное подключение к базе данных (equipment_db)";

                      }
                
  						$result = mysqli_query( $db, "SELECT `id`,`Тип оборудования`,`Маска SN` FROM `type_eq`");

  	$db->close();//Отключаемся от БД

	?>

<!--Загружаем Тип оборудования из базы данных в выпадающий список-->

  <select name="mySelect" >
  <?PHP

  while ($row = mysqli_fetch_array($result))
    {

  	echo '<option>'.$row['id'].'-'.$row['Тип оборудования'].'</option>';
 	$mask[$row['id']] = $row['Маска SN'];//Загружаем маску (регул выражение) в массив

    }
  ?>
  </select>

	</form>


<?PHP

   //Забираем строку из textarea
    if( isset($_POST['txt_a']) ) 	
    {

    	$txt = $_POST['txt_a'];

    	//обрабатываем запрос введеный пользователем
		handling_Query($txt);

    }


 ?>
   

  </section>

	
  </body>


  	


</html>
