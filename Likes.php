<?php

require_once __DIR__ . '/core/library/Db.class.php';
$db = \library\Db::getDb();
$params = [$_POST['userId'], $_POST['likeId'], $_POST['dataType']];

if (!empty($_POST['userId'])) {
    $sql = "SELECT * FROM `likes` WHERE `user_id` = $params[0] AND `item_id` = $params[1] AND `type` = '$params[2]'";
    $result = $db->sendQuery($sql);
    if ($result->fetch() > 0) {
        $delete = "DELETE FROM `likes` WHERE `user_id` =? AND `item_id` =? AND `type` =?";
        $db->execPdo($delete, $params);
    } else {
        $insert = "INSERT INTO `likes`(`user_id`, `item_id`, `type`) VALUES (?,?,?)";
        $db->execPdo($insert, $params);
    }
}
$sql = "SELECT * FROM `likes` WHERE `item_id` = $params[1] AND `type` = '$params[2]'";
$result = $db->sendQuery($sql);
echo $result->rowCount();