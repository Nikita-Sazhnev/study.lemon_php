<?php
namespace models;

class ArticleForm extends \base\BaseForm
{
    public $id;
    public $title;
    public $summary;
    public $preview_test;
    public $body;
    public $default_name;
    public $difficult;
    public $read_time;
    public $author_id;
    public $tags;
    public $url;

    public function getRules()
    {
        return [
            'title' => ['requaired'],
            'img_src' => ['requaired'],
            'url' => ['requaired'],
            'id' => ['requaired'],
        ];
    }
    public function insert()
    {
        $imageName = $_FILES['img_src']['name'];
        $sql = "INSERT INTO `posts` (`title`, `summary`, `preview_test`, `body`, `difficult`,`read_time`, `author_id`,`tags`, `img`) VALUES (?,?,?,?,?,?,?,?,?)";
        $exec = [
            $this->_data['title'],
            $this->_data['summary'],
            $this->_data['preview_test'],
            $this->_data['body'],
            $this->_data['difficult'],
            $this->_data['read_time'],
            $this->_data['author_id'],
            $this->_data['tags'],
            $imageName,
        ];
        UploadForm::uploadImage($_FILES['img_src'], $imageName);
        $this->_db->execPdo($sql, $exec);
    }
    public function update()
    {
        if (!empty($_FILES['img_src']['name'])) {
            $imageName = $_FILES['img_src']['name'];
            UploadForm::uploadImage($_FILES['img_src'], $imageName);
        } else {
            $imageName = $this->_data['default_name'];
        }
        $sql = "UPDATE `posts` SET `title`=?, `summary`=?, `preview_test`=?, `body`=?, `difficult`=?, `read_time`=?, `author_id`=?, `tags` =?, `img`=? WHERE `id` =?";
        $exec = [
            $this->_data['title'],
            $this->_data['summary'],
            $this->_data['preview_test'],
            $this->_data['body'],
            $this->_data['difficult'],
            $this->_data['read_time'],
            $this->_data['author_id'],
            $this->_data['tags'],
            $imageName,
            $this->_data['id'],
        ];
        $this->_db->execPdo($sql, $exec);
    }
}