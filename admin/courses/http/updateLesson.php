<?php
require '../../../class/db.php';
$db = new DB();

$id = $_POST['id'];
$name = $_POST['name'];
$duration = $_POST['duration'];
$date = $_POST['date'];
$location = $_POST['location'];
$price = $_POST['price'];
$description = $_POST['description'];

$update = "UPDATE `lessons` SET 
		           `name`='{$name}',
		           `duration`='{$duration}',
		           `date`='{$date}',
		           `location`='{$location}',
		           `price`='{$price}',
		           `short_desc`='{$description}'
					WHERE id = $id";

$db->action($update);


