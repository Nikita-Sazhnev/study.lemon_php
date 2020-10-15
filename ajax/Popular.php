<?php

require_once __DIR__ . '/../core/library/Db.class.php';
$db = \library\Db::getDb();
$sql = "UPDATE `highlights` SET `post_id` =? WHERE `type` = 'popular'";
$exec = [$_POST['id']];
$db->execPdo($sql, $exec);