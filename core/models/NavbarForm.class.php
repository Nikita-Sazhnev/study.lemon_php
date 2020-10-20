<?php
namespace models;

class NavbarForm extends \base\BaseForm
{
    public $name;
    public $url;
    public $id;

    public function getRules()
    {
        return [
            'name' => ['requaired'],
            'url' => ['requaired'],
        ];
    }
    public function insert()
    {
        $sql = "INSERT INTO `navbar` (`name`,`url`) VALUES (?,?)";
        $exec = [$this->_data['name'], $this->_data['url']];
        $this->_db->execPdo($sql, $exec);
    }
    public function update()
    {
        $sql = "UPDATE `navbar` SET `name`=?,`url`=? WHERE `id` =?";
        $exec = [$this->_data['name'], $this->_data['url'], $this->_data['id']];
        $this->_db->execPdo($sql, $exec);
    }
}