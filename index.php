<?php
require_once 'app/init.php';

$itemsQuery = $db->prepare("
	SELECT id, guestname, name, done
	FROM items_all
	WHERE user = :user
");

$itemsQuery->execute([
	'user' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

 



//  $itemsLimit= $db->prepare("
// 	SELECT id, guestname, name, done
// 	FROM items_all
// 	WHERE user = :user
// 	LIMIT 1
// ");

//  $itemsLimit->execute([
// 	'user' => $_SESSION['user_id']
// ]);

 // $items_limit8 = $itemsLimit->rowCount() ? $itemsQuery : [];

// foreach($items_limit8 as $item){

// 	echo $item['name'], '<br>';
// } 

// $items_count = $itemsLimit->rowCount(); 
// $element_per_page = 1;
// $number_pagination_page = $items_count / $element_per_page;

// if (isset($_GET['paged'])){
// 	$current_page = $_GET['paged'];
// 	} else{
// 		$current_page = 1;
// 	}



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
    <link rel="stylesheet" type="text/css" href="css/main2.css">

 </head>
<body>
</body>
<!-- <a class="btn btn-primary" href="login.php" role="button">Login</a> -->
<br>
	<div class="list">
		<h1 class="header">To do.</h1>
		<?php if(!empty($items)): ?>
		<ul class="items">
			<?php //foreach($items as $item): ?> 
			<?php foreach($items as $item): ?>
			<li>
				<span class="text-success"><?php echo $item['guestname']; ?></span>
				<span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name']; ?></span>
				<?php if(!$item['done']) : ?>
					<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
				<?php endif; ?>
				<a href="edit.php?item=<?php echo $item['id']; ?>" class="badge badge-primary">Edit</a>
			</li>

		<?php endforeach; ?>
		<!-- <li>
			<span class="item done">Learn PHP</span>
		</li> -->
		</ul>
	<?php else: ?>
		<p>You haven't added any items</p>
	<?php endif; ?>
<!-- name_tree -->

			<form class="item-add input" class="form-control" enctype="multipart/form-data" action="add.php" method="post">
			<input class="name_tree input" type="text" class="rim" name="guestname" placeholder="Type your name here." autocomplete="off" required>
			<input class="text_tree input" type="text" name="name" placeholder="Type a new message here." autocomplete="off" required>
			<input class="email_tree input" type="text" name="email" placeholder="Type an email here."  autocomplete="off" required>
			<input class="image_tree input" type="file" name="userfile">

			
			<input type="submit" class="btn btn-success" value="Add" class="submit">
			<div class=" btn button btn-success js-button-campaign"><span>Тake a look at the preview</span></div>
		</form>
	</div>



<!-- <nav aria-label="Page navigation example">
  <ul class="pagination"> -->
  	<?php //if($number_pagination_page > 3){
  		?>
  	<!-- <li class="page-item"><a class="page-link" href="/?paged=1">1</a></li>
    <li class="page-item"><a class="page-link" href="/?paged=2">2</a></li>
    <li class="page-item"><a class="page-link" href="/?paged=3">3</a></li> -->
   <?php
  	//} else if($number_pagination_page == 2) {
  		?>
  	<!-- <li class="page-item"><a class="page-link" href="/?paged=1">1</a></li>
  	<li class="page-item"><a class="page-link" href="/?paged=2">2</a></li> -->
   <?php
  	//} else{
  		?>
  		<!-- <li class="page-item"><a class="page-link" href="/?paged=1">1</a></li> -->
  		<?php
  	//}

  	?>
   
  
  </ul>
</nav>
</br>


<!-- <div class="button js-button-campaign"><span>Акция</span></div> -->
			
			<div class="overlay js-overlay-campaign">
				<div class="popup js-popup-campaign">
			<h2>Предварительный просмотр</h2></br>
			<h4 >Ваше имя: </h4 ><h4 class="name_tree1"></h4></br>
			<h4 class="item-add">Введенный текст: </h4>
			<h4 class="text_tree1"></h4></br>
			<h4 class="item-add">Ваш email: </h4>
			<h4 class="email_tree1"></h4></br>
			<h4 class="item-add">Названия картинки: </h4>
			<h4 class="image_tree1"></h4>

		</form>
					<div class="close-popup js-close-campaign"></div>
				</div>
			</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/main.js"></script>


</body>

</html>