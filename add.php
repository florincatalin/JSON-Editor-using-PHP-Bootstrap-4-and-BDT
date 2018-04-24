<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    
	<title>Adăugare câmp JSON TipueSearch folosind PHP</title>
</head>
<body>
<br/>
<div class="container">
<form method="POST">
	<p><a class="btn btn-primary btn-lg btn-sm" href="index.php">Înapoi</a></p>
	<p>
		<label for="title">Title</label>
		<input type="text" class="form-control" id="title" name="title">
	</p>
	<p>
		<label for="text">Text</label>
		<input type="text" class="form-control" id="text" name="text">
	</p>
	<p>
		<label for="tags">Tags</label>
		<input type="text" class="form-control" id="tags" name="tags">
	</p>
	<p>
		<label for="url">URL</label>
		<input type="text" class="form-control" id="url" name="url">
	</p>
	<input class="btn btn-primary btn-lg btn-sm" type="submit" name="save" value="Salvare">
</form>
</div>

<?php
	if(isset($_POST['save'])){
		//open the json file
		$data = file_get_contents('lista.json');
		$data = json_decode($data);

		//data in out POST
		$input = array(
			'title' => $_POST['title'],
			'text' => $_POST['text'],
			'tags' => $_POST['tags'],
			'url' => $_POST['url']
		);

		//append the input to our array
		$data[] = $input;
		//encode back to json
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('lista.json', $data);

		header('location: index.php');
	}
?>
</body>
</html>