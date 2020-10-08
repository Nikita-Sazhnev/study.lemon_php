<?php

require_once __DIR__ . '/core/library/Db.class.php';
$db = \library\Db::getDb();

switch ($_POST) {
    case isset($_POST['commentId']):
        $type = 'comment_id';
        $param = $_POST['commentId'];
        break;
    case isset($_POST['postId']):
        $type = 'post_id';
        $param = $_POST['postId'];
        break;
    default:
        throw new Exception("Unfamiliar type of content");
        break;
}

$params = [$_POST['userId'], $param];

if (!empty($_POST['userId'])) {
    $sql = "SELECT * FROM `likes` WHERE `user_id` = $params[0] AND `" . $type . "` = $param";
    $result = $db->sendQuery($sql);
    if ($result->fetch() > 0) {
        $delete = "DELETE FROM `likes` WHERE `user_id` =? AND `" . $type . "` =?";
        $db->execPdo($delete, $params);
    } else {
        $insert = "INSERT INTO `likes`(`user_id`, `" . $type . "`) VALUES (?,?)";
        $db->execPdo($insert, $params);
    }
}
$sql = "SELECT * FROM `likes` WHERE `" . $type . "` = $param";
$result = $db->sendQuery($sql);
echo $result->rowCount();