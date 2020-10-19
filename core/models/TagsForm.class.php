<?php
namespace models;

class TagsForm extends \base\BaseForm
{
    public $tag;
    public $id;

    public function getRules()
    {
        return [
            'tag' => ['requaired'],
            'id' => ['requaired'],
        ];
    }
    public function insert()
    {
        $sql = "INSERT INTO `tags` (`tag`) VALUES (?)";
        $exec = [$this->_data['tag']];
        $this->_db->execPdo($sql, $exec);
    }
    public function update()
    {
        $sql = "UPDATE `tags` SET `tag`=? WHERE `id` =?";
        $exec = [$this->_data['tag'], $this->_data['id']];
        $this->_db->execPdo($sql, $exec);
    }
}