<?php

require_once __DIR__ . '/../core/library/Db.class.php';
$db = \library\Db::getDb();
$type = $_POST['type'];
$exec = [$_POST['id']];
$sql = "UPDATE `highlights` SET `post_id` =? WHERE `type` = '$type'";
$db->execPdo($sql, $exec);