<?php 	
	require_once 'config.php';
	if ($_POST) {
		$title = $_POST['title'];
		$desc = $_POST['description'];

		$sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
		$pdostatement = $pdo->prepare($sql);
		$result = $pdostatement->execute(
			array(
 				':title' =>$title,
 				':description' =>$desc
			)
		);
		if ($result) {
		echo "<script>alert('new todo is added ');window.location.href='index.php'</script>";
	}
	}
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Create ToDo</title>
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Grandstander:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
		<div class="card">	
			<div class="card-body">	
				<h2 class="font-gr font-50 text-center font-weight-bold">Create New ToDo</h2>
				<form action="" method="post">
					<div class="form-group font-gr">
						<label for="">Title</label>
						<input type="text" class="form-control" name="title" value="">
					</div>
					<div class="form-group font-gr">
						<label for="">Description</label>
						<textarea class="form-control" name="description" ></textarea>
					</div>
					<div class="form-group font-gr">								
	                   <input type="submit" value="Submit" class="btn btn-info mr-2 py-2 font-16">	
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