<?php
//print_r($_POST);
require_once 'app/init.php';


	if(isset($_POST['name'], $_POST['id'])) {
		$name = $_POST['name'];
		$id = $_POST['id'];

		
		
				$doneQuery = $db->prepare("
					UPDATE `items_all`
					SET `name` = :name
					WHERE `id` = :id
					
				");
				$doneQuery->execute([
					'name' => $name,
					'id' => $id
				]);
				

				
	
	}


header('Location: index.php');


// $sth = $dbh->prepare("UPDATE `category` SET `name` = :name WHERE `id` = :id");
// $sth->execute(array('name' => 'Виноград', 'id' => 22));