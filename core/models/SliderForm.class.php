<?php
namespace models;

use base\BaseForm;

class SliderForm extends BaseForm
{
    public $id;
    public $img_src;
    public $title;
    public $description;
    public $article_url;
    public $active;
    public $default_name;

    /** Устанавливает правила валидации формы
     * @return array
     */
    public function getRules()
    {
        return [
            'titde' => ['requaired'],
            'id' => ['requaired'],
            'author_id' => ['requaired'],
        ];
    }
    /** Записывает комментарий в бд
     * @return void
     */

    public function update()
    {
        if (!empty($_FILES['img_src']['name'])) {
            $imageName = $_FILES['img_src']['name'];
            UploadForm::uploadImage($_FILES['img_src'], $imageName);
        } else {
            $imageName = $this->_data['default_name'];
        }
        $sql = "UPDATE `slider` SET `title`=?, `description`=?, `article_url`=?, `img_src` =? WHERE `id` =?";
        $exec = [$this->_data['title'], $this->_data['description'], $this->_data['article_url'], $imageName, $this->_data['id']];

        $this->_db->execPdo($sql, $exec);
    }
}