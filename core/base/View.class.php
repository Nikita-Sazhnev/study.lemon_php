<?php
namespace base;

class View
{
    public $basePath = __DIR__ . '/../views/templates/';

    protected $title;
    protected $seo = [];
    protected $css = [];
    protected $js = [];
    protected $_layout;

    public function setLayout($layout)
    {
        $this->_layout = __DIR__ . '/../views/layout/' . $layout . '.php';
    }

    public function render($tplName, $data)
    {
        include $this->_layout;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setCss($css)
    {
        $this->css[] = $css;
    }

    public function setJs($js)
    {
        $this->js[] = $js;
    }

    public function setSeo($seo)
    {
        $this->seo[] = $seo;
    }

}