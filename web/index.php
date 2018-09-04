<?php
require_once __DIR__ . "/../Thing.php";

$things = Thing::getAll();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Todidit</title>
</head>
<body>
<h1>Todidit</h1>
<h2>Things</h2>
<table>
<?php foreach ($things as $thing) { ?>
	<tr><td><?= htmlspecialchars(var_export($thing, true)) ?></td></tr>
<?php } ?>
</table>
</body>
</html>