<?php namespace library;

class Content
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getDb();
    }

    /** Отправлет запрос к бд
     * @param sting $table Имя талбицы mySQL
     * @param int $limit Лимит полученых данных
     * @return array
     */
    public function getContent($table, $limit)
    {
        $sql = "SELECT * FROM `$table` ORDER BY `id` DESC LIMIT $limit";
        $result = $this->db->sendQuery($sql)->fetchAll();
        return $result;
    }

    /** Возвращает три последнии статьи в зависимости от сложности
     * @param sting $diff Сложность статьи 'easy' || 'middle' || 'hard'
     * @return array
     */
    public function getArticleByDiff($diff)
    {
        $sql = "SELECT * FROM `posts` WHERE `difficult` = '$diff' ORDER BY `id` DESC LIMIT 3";
        $result = $this->db->sendQuery($sql)->fetchAll();
        return $result;
    }

    /** Получает столбец из таблицы бд по ид пользователя
     * @param string $col Имя столбца
     * @param int $id Ид пользователя
     * @return array
     */
    public function getInfoById($col, $id)
    {
        $sql = "SELECT `$col` FROM `users` WHERE `id` = $id LIMIT 1";
        $result = $this->db->sendQuery($sql)->fetch();
        return $result[$col];
    }

    public function getColsFromPosts($cols)
    {
        $sql = "SELECT $cols FROM `posts` WHERE 1";
        $result = $this->db->sendQuery($sql)->fetchAll();
        return $result;
    }

    /** Получает всю запись из бд, в случае отсутствия такой записи перенаправляет на страницу 404
     * @param string $from Имя таблицы
     * @param int $id Ид записи
     * @return array||void
     */
    public function getAllInfoById($from, int $id)
    {
        $sql = "SELECT * FROM `$from` WHERE `id` = $id LIMIT 1";
        $result = $this->db->sendQuery($sql)->fetch();
        if ($result == 0) {
            header("Location: /main/404", 404);
        } else {
            return $result;
        }

    }

    /** Получает ид статьи из таблицы Хайлайтов
     * @param string Тип хайлайта
     * @return int
     */
    public function getHighlightId(string $type)
    {
        $sql = "SELECT * FROM `highlights` WHERE `type` = '$type' LIMIT 1";
        $result = $this->db->sendQuery($sql)->fetch();
        return (int) $result['post_id'];
    }

    /** Делает проверку на наличие лайка от пользователя, если запись существует выводит класс активности
     * @param string $user Логин пользователя
     * @param int $id Ид лайка
     * @param string $type Тип лайка (Статья, Комментарий и т.д.)
     * @return void
     */
    public function isActiveLike($user, $id, $type)
    {
        if (!empty($user)) {
            $sql = "SELECT * FROM `likes` WHERE `user_id` = $user AND `item_id` = $id AND `type` = '$type'";
            $result = $this->db->sendQuery($sql);
            if ($result->fetch() > 0) {
                echo "active-like";
            }}
    }

    /** Получает все лайки к записи и выводит их количество
     * @param int $id Ид записи для которой нужно вывести количсетво лайков
     * @param string $type Тип записи
     * @return void
     */
    public function likeAmount($id, $type)
    {
        $sql = "SELECT * FROM `likes` WHERE `item_id` = $id AND `type` = '$type'";
        $result = $this->db->sendQuery($sql);
        echo $result->rowCount();
    }

    /** Выводит количество комментрариев
     * @param int $id Ид статьи для которой оставлен комментарий, 0 - главная
     * @return void
     */
    public function commentsAmount($id)
    {
        $sql = "SELECT * FROM `comments` WHERE `place_id` = $id";
        $result = $this->db->sendQuery($sql);
        echo $result->rowCount();
    }

    /** Выводит количество просмотров
     * @param int $id Ид статьи
     * @return void
     */
    public function viewsAmount($id)
    {
        $sql = "SELECT * FROM `posts` WHERE `id` = $id";
        $result = $this->db->sendQuery($sql)->fetch();
        echo $result['views'];
    }
}
