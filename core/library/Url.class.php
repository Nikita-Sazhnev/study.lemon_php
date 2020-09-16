<?php
namespace library;

/**
 *Class Url
 *@package library
 */

class Url
{
    /** Получает сегменты текушей ссылки и формирует из них массив
     *@return array
     */
    protected static function getSegmentsFromUrl()
    {
        $segments = explode('/', $_GET['url']);

        if (empty($segments[count($segments) - 1])) {
            unset($segments[count($segments) - 1]);
        }
        $segments = array_map(function ($v) {
            return preg_replace('/[\'\\\*]/', '', $v);
        }, $segments);

        return $segments;
    }

    /** Возращает требуемый GET параметр
     *@param string $paramName
     *@return string
     */
    public static function getParam($paramName)
    {
        return addslashes($_GET[$paramName]);
    }

    /** Возвращает сегмент ссылки по её номеру
     * @param int $n
     * @return int|null
     */
    public static function getSegmentByNumber($n)
    {
        $segments = self::getSegmentsFromUrl();
        return $segments[$n];
    }

    /** Возвращает массив с сегментами ссылки
     * @return array
     */
    public static function getAllSegments()
    {
        return self::getSegmentsFromUrl();
    }

    /** Возращает полную строку ссылки со всеми сегментами и параметрами
     * @return string
     */
    public static function getUrlString()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
