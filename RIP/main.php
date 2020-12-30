<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
	<title> Web #1 </title>
	<meta charset = "UTF-8" >
	<link rel="stylesheet" type="text/css" href="test.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="checker.js" charset="utf-8"></script>
</head>
<body>

<script>



</script>

	<table border="0" cellpadding="0" cellspacing="0" width="100%" id = "container" align = center>
		<tr>
			<th colspan=2 id = "boxname">
				<div id = "work_num">  Лабораторная работа №1 по Веб-программированию</div>
				<div id = "variant"> Вариант №2207 </div>
				<div id = "StudentName"> Васильков Александр </div>
				<div id = "group"> P3211</div>
				<img src = "img/areas.png" id = "img1" width = "250px" height = "250px">
			</th>
		</tr>

    <tr>
      <th>
        <form method="get" action="main.php" onsubmit = "return check_submit()">


          			<p> Значение Х:
					<select name="X" id="SelectionX">
	          <option value="" hidden disabled selected>Выберите Х</option>
	          <option value="-5">-5</option>
	          <option value="-4">-4</option>
	          <option value="-3">-3</option>
	          <option value="-2">-2</option>
	          <option value="-1">-1</option>
	          <option value="0">0</option>
	          <option value="1">1</option>
	          <option value="2">2</option>
	          <option value="3">3</option>
          </select>
				</p>


          <p>
            <label for="textfieldY">Значение Y ∈ (-3;3):</label>
            <input type ="text" name = "Y" id = "textfieldY" autocomplete="off" maxlength = "15">
          </p>


          <p class = "InputR"> Значение R:
             <input type="radio" name="R" value="1">
             <label for="R0">1</label>
             <input type="radio" name="R" value="2">
             <label for="R1">2</label>
             <input type="radio" name="R" value="3">
             <label for="R2">3</label>
             <input type="radio" name="R" value="4">
             <label for="R3">4</label>
             <input type="radio" name="R" value="5">
             <label for="R4">5</label>
<button type="reset"  id = "reset_button"> <img src = "img/reset.png"> </button>
          </p>


          <p>
                <input type="submit" value= "Отправить"  class = "button_request">
		
		
          </p>
		<!--Невидимое поля для уникального Id --->
		<input type="hidden" name="uniqid" value="<?= uniqid() ?>">

	 </form>

      </th>
    </tr>



		<!-- Запуск php-скрипта. (Подготовка) -->
		<?php include "php_scripts/setup_script.php";	include "php_scripts/getResult.php";	?>
    <tr>
			<th>
				<table border="1" id = "answer";>
					<tr id ="bold">
						<td class = "col1">X</td>
						<td class = "col2">Y</td>
						<td class = "col3">R</td>
						<td class = "col4">Ответ</td>
						<td class = "col5">Время</td>
						<td class = "col6">Время работы скрипта (в мс)</td>
					</tr>



			
			<!--Обработка результата -->
					<?php


                    if($setup_script == true){
						$answer = getResult($x, $y, $r);

						//Высчитывание время исполнения скрипта
						setlocale(LC_ALL, 'ru_RU.UTF-8');
						$time = strftime(' %d %b %Y %H:%M:%S', time());
						$script_time = round((microtime(true) - $start) * 10 ** 3, 3);// время в мс
						$script_time = str_ireplace(",", ".", $script_time);
						$uniqid = $_GET['uniqid'];

							if ($history[0]["uniqid"] !== $uniqid) {
									array_unshift($history, [
											'X' => $x,
											'Y' => $y,
											'R' => $r,
											'Ans' => $answer,
											'time' => $time,
											'script' => $script_time,
											'uniqid' => $uniqid
												]);
							}

						$_SESSION['history'] = $history;
}

					//Заполнение таблицы
						foreach($history as $result){
							?>

				<tr>
					<td><?= $result['X'] ?></td>
					<td><?= $result['Y'] ?></td>
					<td><?= $result['R'] ?></td>
					<td><?= $result["Ans"] ?></td>
					<td><?= $result["time"] ?></td>
					<td><?= $result["script"] ?></td>
				</tr>
				<?php			}?>

				</table>
			</th>
		</tr>
	</table>


</body>
</html>
