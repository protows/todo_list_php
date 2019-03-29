<?php
require_once 'app/init.php';



$itemsQuery = $db->prepare("
	SELECT id, name, done
	FROM items_all
	WHERE id = :id
");

$itemsQuery->execute([
	'id' => $_GET['item']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];



?>

<!DOCTYPE html>
<html lang="<En">
<head>
    <meta charset="utf-8">
     <title>To Do</title>
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
   
 
    <link rel="stylesheet" type="text/css" href="css/main.css">

 </head>
<body>
<div class="list">
	<?php foreach($items as $item): ?>
<form class="item-add" action="edit2.php" method="post">
			<p class="item">Текущее значение: <?php echo $item['name']; ?></p><br>
			<p class="item">Введите новое значение </p>
			<input type="text" name="name" placeholder="Type a new ittem here." class="input" autocomplete="off" required>
			<input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>


			
			<input type="submit" class="btn btn-success" value="Add" class="submit">
			
			

		</form>
	<?php endforeach; ?>
</div>

</body>
</html>
<?php
	