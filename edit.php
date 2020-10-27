<?php 	
	 require_once 'config.php';

	 if ($_POST) 
	 {
	 $title = $_POST['title'];
	 $desc = $_POST['description'];
	 $id = $_POST['id'];

	 $pdostatement = $pdo->prepare("UPDATE todo SET title = '$title' , description = '$desc' where id = '$id' ");
	 $result = $pdostatement->execute();
	if ($result) {
		echo "<script>alert('todo is updated');window.location.href='index.php';</script>";
	}

	 }else
	 {
	 	$pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id =".$_GET['id']);
	 	$pdostatement ->execute();
	 	$result = $pdostatement -> fetchAll();

	 	
	 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Edit ToDo</title>
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Grandstander:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
		<div class="card">	
			<div class="card-body">	
				<h2 class="font-gr font-50 text-center font-weight-bold">Edit New ToDo</h2>
				<form action="" method="post">
					<input type="hidden" name="id" value="<?php echo $result[0]['id'] ?> ">
					<div class="form-group font-gr">
						<label for="">Title</label>
						<input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?> ">
					</div>
					<div class="form-group font-gr">
						<label for="">Description</label>
						<textarea class="form-control" name="description"> <?php echo $result[0]['description'] ?></textarea>
					</div>
					<div class="form-group font-gr">								
	                   <input type="submit" value="Update" class="btn btn-info mr-2 py-2 font-16">	
						<a href="index.php" class="btn btn-dark py-2 font-16">
							Go Back
						</a>
					</div>

				</form>
			</div>	
		</div>			
	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>