<?php 	

		require_once 'config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>ToDo</title>
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Grandstander:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 	
		$pdostatement = $pdo -> prepare("SELECT * FROM todo ORDER BY id DESC");
		$pdostatement->execute();
		$result = $pdostatement -> fetchAll();
	 ?>
	<div class="card">
		<div class="card-body">
			<h2 class="font-50 font-gr text-center font-weight-bold "><i class="fa fa-home mr-3 text-danger" aria-hidden="true"></i>ToDO Home Page</h2>
			<a href="add.php" class="btn btn-success my-2 font-gr py-2 font-16 mb-3">Create New</a>
			<table class="table  table-striped font-ca font-22" style="letter-spacing: 2px;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Description</th>
						<th>Created</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				    $i = 1;
					if ($result) {
						foreach ($result as $value) {
				?>
					<tr>
						<td><?php echo $i; ?></td>						
						<td><?php echo $value['title'] ?></td>
						<td><?php echo $value['description'] ?></td>
						<td><?php echo date('Y-M-D',strtotime($value['created_at'])) ?></td>
						<td>
							<a type="button" class="btn btn-outline-success mr-3 font-19" href="edit.php?id=<?php echo $value['id']; ?>">Edit</a>
							<a type="button" class="btn btn-outline-danger font-19" href="delete.php?id=<?php echo $value['id']; ?>">Delete</a>
						</td>
					</tr>
				<?php	
					$i++;		
						}
					}
					
				 ?>	
					
					</tbody>	
			</table>
		</div>
	</div>


	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>