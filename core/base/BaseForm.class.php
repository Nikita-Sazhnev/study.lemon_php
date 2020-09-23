<?php
namespace base;

use library\Db;

abstract class BaseForm
{
    protected $_db;
    protected $_errors = [];
    public $_data = [];
    protected $_validator = 0;

    public function __construct()
    {
        $this->_db = Db::getDb();
    }

    abstract public function getRules();

    public function validate()
    {
        $validator = new \library\Validator($this->_data, $this->getRules());
        if ($validator->valdateThis()) {
            $this->_errors = $validator->getErrors();
            return false;
        }
    }

    public function load($data)
    {
        foreach ($data as $propName => $propValue) {
            if (property_exists(static::class, $propName)) {
                $propValue = $this->_db->getSafeData($propValue);
                $this->_data[$propName] = $propValue;
            } else {
                return false;
            }

        }
    }

    public function getErrors()
    {
        return $this->_errors;
    }

}