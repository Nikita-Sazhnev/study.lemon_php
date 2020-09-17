<?php
namespace base;

abstract class BaseForm
{
    protected $_db;

    public function __construct()
    {
        $this->_db = \library\Db::getDb();
    }

    abstract public function validate();
    abstract public function load($data);
}
