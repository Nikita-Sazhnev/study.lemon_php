<?php
namespace library;

class Validator
{
    protected $_errors = [];
    protected $_rules = [];
    protected $_fields = [];
    protected $_data = [];

    public function __construct($data, $rules)
    {
        $this->_rules = $rules;
        $this->_data = $data;

        $this->_fields = array_keys($rules);
    }

    protected function required($field)
    {
        if (!empty($this->_data[$field])) {
            $this->addError($field, 'Поле должно быть установлено');
        }
    }

    public function addError($field, $error)
    {
        $this->_errors[$field] = $error;
    }

    public static function unique($field, $value)
    {
        $sql = "SELECT * FROM `users` WHERE $field = '$value'";
        $res = Db::getDb()->sendQuery($sql);
        if ($res->rowCount() > 0) {
            return false;
        } else {
            return true;
        }

    }

    public static function confirm($pass, $pass_confirm)
    {
        return $pass == $pass_confirm;
    }

    public function getError($field)
    {
        return $this->_errors[$field];
    }
    public function getErrors()
    {
        return $this->_errors;
    }

    public function valdateThis()
    {
        foreach ($this->_rules as $field => $rules) {
            foreach ($rules as $rule) {
                if (method_exists($this, $rule)) {
                    if (is_null($this->getError($field))) {
                        $this->$rule($field);
                    }
                } else {
                    throw new \Exception("Не известное правило " . $rule);
                }
            }
        }
        if (!empty($this->_errors)) {
            return false;
        }
    }
}