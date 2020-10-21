<?php
namespace models;

class SocialForm extends \base\BaseForm
{
    public $url;
    public $icon;
    public $id;

    public function getRules()
    {
        return [
            'icon' => ['requaired'],
            'url' => ['requaired'],
        ];
    }
    public function insert()
    {
        $sql = "INSERT INTO `social` (`icon`,`url`) VALUES (?,?)";
        $exec = [$this->_data['icon'], $this->_data['url']];
        $this->_db->execPdo($sql, $exec);
    }
    public function update()
    {
        $sql = "UPDATE `social` SET `icon`=?,`url`=? WHERE `id` =?";
        $exec = [$this->_data['icon'], $this->_data['url'], $this->_data['id']];
        $this->_db->execPdo($sql, $exec);
    }
}