<?php
require_once 'app/init.php';




$uploaddir = 'images/';
// это папка, в которую будет загружаться картинка
$apend=date('YmdHis').rand(100,1000).'.jpg'; 
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения

// В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
// И не пустое
$types = array('image/gif', 'image/png', 'image/jpeg');
if(($_FILES['userfile']['type'] == 'image/gif' ||  in_array($_FILES['userfile']['type'], $types) || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 )) 
{ 

  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
   { 
   //Здесь идет процесс загрузки изображения 
   $size = getimagesize($uploadfile); 
   // с помощью этой функции мы можем получить размер пикселей изображения 
     if ($size[0] <= 320 && $size[1] <= 240) 
     { 








if (isset($_POST['name'])){
	$name = trim($_POST['name']);
	$guestname = trim($_POST['guestname']);
	$email = trim($_POST['email']);

	//echo $uploadfile; exit; 

	if(!empty($name)) {
		$addedQuery = $db->prepare("
			INSERT INTO items_all (guestname, name, user, done, created, email, image)
			VALUES (:guestname, :name, :user, 0, NOW(), :email, :image)
			");

		$addedQuery->execute([
			'guestname' => $guestname,
			'name' => $name,
			'user' => $_SESSION['user_id'],
			'email' => $email,
			'image' => $uploadfile
		]);
	}
}

header('Location: index.php');






















     // если размер изображения не более 500 пикселей по ширине и не более 1500 по  высоте 
     //echo "Файл загружен. Путь к файлу: <b>http:/yoursite.ru/".$uploadfile."</b>"; 
     } else {
     echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 320; высота не более 240) или изображения не соответствует формату JPG/GIF/PNG"; 
     unlink($uploadfile); 
     // удаление файла 
     } 
   } else {
   echo "Файл не загружен, вернитеcь и попробуйте еще раз";
   } 
} else { 
echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 320; высота не более 240) или изображения не соответствует формату JPG/GIF/PNG";
}



















