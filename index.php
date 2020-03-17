<?php
// Скрипт для подключения к базе и вывода с базы информации
$host = 'localhost'; // адрес сервера.
$db_name = 'test'; // имя базы данных
$db_user = 'non-root'; // имя пользователя
$db_pass = '1234'; // пароль<-->

$mysqli = new mysqli($host, $db_user, $db_pass, $db_name); // подключаемся к базе MySQL

if (mysqli_connect_errno()) { // проверяем подключение
     printf("Connect failed: %s\n", mysqli_connect_error());
 exit();
}



$query = "SELECT * FROM users"; // запрос

	if ($result = $mysqli->query($query)) {
	    echo '<table border="1"><tr>';
	while ($obj = $result->fetch_assoc()) { // выборка данных и помещение их в объекты
//<---->print_r($obj['email']);
	    echo "<tr>
    <td>".$obj['id']."</td>
    <td>".$obj['username']."</td>
    <td>".$obj['email']."</td>
    <td>".$obj['role']."</td>
    <td>".$obj['created']."</td>
    <td>".$obj['updated']."</td>
    </tr>";
    }
	    echo '</table>';
$result->close(); // очищаем результирующий набор.
}

?>
