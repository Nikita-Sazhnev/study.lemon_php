<?php
namespace models;

use base\BaseForm;

class CommentForm extends BaseForm
{
    public $body;
    public $parent_id;
    public $author_id;
    public $place_id;

    public function getRules()
    {
        return [
            'body' => ['requaired'],
            'author_id' => ['requaired'],
            'comment_id' => ['requaired'],
        ];
    }

    public function postComment()
    {
        $sql = "INSERT INTO `comments` (`body`,`author_id`,`parent_id`,`place_id`) VALUES (?,?,?,?)";
        $exec = array($this->_data['body'], $this->_data['author_id'], $this->_data['parent_id'], $this->_data['place_id']);
        $this->_db->execPdo($sql, $exec);
    }
}