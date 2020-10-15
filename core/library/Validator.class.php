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

    /** Проверка на обязательность поля
     * @param string $field Поле для проверки
     * @return void
     */
    protected function required($field)
    {
        if (!empty($this->_data[$field])) {
            $this->addError($field, 'Поле должно быть установлено');
        }
    }
    /** Вслучаи ошибки добавляет её в массив с ошибками
     * @param string $field Поля в котром случилась ошибка
     * @param string $error Описание ошибки
     * @return void
     */
    public function addError($field, $error)
    {
        $this->_errors[$field] = $error;
    }

    /** Проверка на уникальноть
     *@param string $field Поле для проверки на уникальность
     *@param string $value Значение поля
     *@return bool
     */
    public static function unique($field, $value)
    {
        $sql = "SELECT * FROM `users` WHERE $field = '$value'";
        $res = Db::getDb()->sendQuery($sql);
        return $res->rowCount() > 0;
    }

    /** Проверка совпадения пароля
     *  @param string $pass Первое вхожения пароля
     *  @param string $pass_confirm Повторое вхождения пароля
     *  @return bool
     */
    public static function confirm($pass, $pass_confirm)
    {
        return $pass == $pass_confirm;
    }

    /** Возвращает ошибку
     * @param string Поля в котором нужно получить ошибку
     * @return string
     */
    public function getError($field)
    {
        return $this->_errors[$field];
    }

    /** Возвращает все случившиеся ошибки
     * @return array
     */
    public function getErrors()
    {
        return $this->_errors;
    }

    /** Производит валидацию полей формы
     *  @return void||bool
     */
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