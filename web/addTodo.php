<?php

require_once __DIR__ . "/../Thing.php";

$thing = array(
	"description" => $_POST["description"]
);
Thing::add($thing);

echo json_encode(array('ok' => true, 'thing' => $thing));