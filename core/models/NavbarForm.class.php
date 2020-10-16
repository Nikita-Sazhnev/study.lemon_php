<?php
namespace models;

class NavbarForm extends \base\BaseForm
{
    public $name;
    public $url;
    public function getRules()
    {
        return [
            'name' => ['requaired'],
            'url' => ['requaired'],
        ];
    }
    public function insert()
    {
        $name = $this->_data['name'];
        $url = $this->_data['url'];
        $sql = "INSERT INTO `navbar` (`name`,`url`) VALUES (?,?)";
        $exec = [$name, $url];
        $this->_db->execPdo($sql, $exec);
    }
}