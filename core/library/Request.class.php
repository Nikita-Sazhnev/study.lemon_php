<?php
namespace library;

class Request
{
    /** Если POST запрос возвращает TRUE
     * @return bool
     */
    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /** Возвращает $_POST
     * @return array
     */
    public static function getPost()
    {
        return $_POST;
    }

    /** Получает Поисковый запрос и делает его безопасным
     * @return string
     */
    public static function getSearch()
    {
        return (string) Db::getSafeData(($_GET['search_string']));
    }

    /** Возвращает ид из GET запроса
     * @return int
     */
    public static function getPageById()
    {
        return (int) Db::getSafeData(($_GET['id']));
    }

    /** Проверяет пустой ли поисковый запрос
     * @return bool
     */
    public static function isSearchEmpty()
    {
        return empty($_GET['search_string']);
    }

    /** Проверяет пустой ли ид в GET запросe
     * @return bool
     */
    public static function isIdEmpty()
    {
        return empty($_GET['id']);
    }

}