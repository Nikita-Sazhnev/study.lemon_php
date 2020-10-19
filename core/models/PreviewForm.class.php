<?php
namespace models;

class PreviewForm extends \base\BaseForm
{
    public $title;
    public $img_src;
    public $default_name;
    public $read_time;
    public $id;
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
        $sql = "INSERT INTO `previews` (`title`,`read_time`,`url`,`img_src`) VALUES (?,?,?,?)";
        $exec = [$this->_data['title'], $this->_data['read_time'], $this->_data['url'], $imageName];
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
        $sql = "UPDATE `previews` SET `title`=?, `read_time`=?, `url`=?, `img_src` =? WHERE `id` =?";
        $exec = [$this->_data['title'], $this->_data['read_time'], $this->_data['url'], $imageName, $this->_data['id']];

        $this->_db->execPdo($sql, $exec);
    }
}