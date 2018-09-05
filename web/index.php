<?php
require_once __DIR__ . "/../Thing.php";

$things = Thing::getAll();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Todidit</title>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<link rel='stylesheet' type='text/css' href='index.css'>
<body>
<div class="container">
	<h1>Todidit</h1>
	<h2>Todos</h2>
	<p><input type="button" value="Add a new todo" id="add-todo-button"></p>
	<table class='todos-table'>
		<thead>
			<tr>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($things as $thing) { ?>
				<tr>
					<td><?= htmlspecialchars($thing['description']) ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<div id="add-todo-dialog" title="Add a new todo" style="display: none">
		<form>
			<p><label>
				Description
				<input type="text" name="description">
			</label></p>
			<p><input type="submit" value="Add"></p>
		</form>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="index.js"></script>
</body>
</html>