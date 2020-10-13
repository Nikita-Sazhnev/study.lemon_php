<?php

require_once __DIR__ . '/core/library/Db.class.php';
$db = \library\Db::getDb();

$sql = "UPDATE `posts` SET `views` = `views` + 1 WHERE `id` =?";
$exec = [$_POST['id']];
$db->execPdo($sql, $exec);