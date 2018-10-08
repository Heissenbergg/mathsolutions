<?php
require '../../../class/db.php';
$db = new DB();

$courseId = $_POST['courseId'];
$icon = $_POST['nameOfImage'];
$name = $_POST['name'];
$duration = $_POST['duration'];
$date = $_POST['date'];
$location = $_POST['location'];
$price = $_POST['price'];
$short_desc = $_POST['shortDesc'];
$teach1 = $_POST['teach1'];
$teach2 = $_POST['teach2'];
$teach3 = $_POST['teach3'];


$db->action("INSERT into `lessons` (`courseID`,
                                    `icon`,
                                    `name`,
                                    `duration`,
                                    `date`,
                                    `location`,
                                    `price`,
                                    `short_desc`,
                                    `teach1`,
                                    `teach2`,
                                    `teach3`
                                    ) 
                                    VALUES (
                                    '{$courseId}',
                                    '{$icon}',
                                    '{$name}',
                                    '{$duration}',
                                    '{$date}',
                                    '{$location}',
                                    '{$price}',
                                    '{$short_desc}',
                                    '{$teach1}',
                                    '{$teach2}',
                                    '{$teach3}'
                                    )");
