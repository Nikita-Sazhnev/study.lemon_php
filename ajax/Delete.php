<?php

require_once __DIR__ . '/../core/library/Db.class.php';
$db = \library\Db::getDb();
$table = $_POST['table'];
$id = $_POST['id'];
$sql = "DELETE FROM `" . $table . "` WHERE `id` =?";
$exec = [$id];
$db->execPdo($sql, $exec);