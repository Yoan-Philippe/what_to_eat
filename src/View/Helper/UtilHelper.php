<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\I18n\Number;
use Cake\I18n\Time;

class UtilHelper extends Helper
{
    public $helpers = ['Html', 'Form', 'Url', 'Time'];

    public function linkTo($title, $path, $object = null, $options = []) {
        $params = ['_name' => $path];

        if(!is_null($object)) {
            if(is_array($object)) {
                $params = array_merge($object, ['_name' => $path]);
            }
            else {
                $params = array_merge(($object->slug ? ['slug' => $object->slug] : ['id' => $object->id]), ['_name' => $path]);
            }
        }

        return $this->Html->link($title, $params, $options);
    }

    public function urlTo($path, $object = null, $options = []) {
        $params = ['_name' => $path];

        if(!is_null($object)) {
            if(is_array($object)) {
                $params = array_merge($object, ['_name' => $path]);
            }
            else {
                $params = array_merge(($object->slug ? ['slug' => $object->slug] : ['id' => $object->id]), ['_name' => $path]);
            }
        }

        return $this->Url->build($params, $options);
    }

    // Add http to link if not specified
    public function formatLink($title, $url, $options){
        if (strpos($url, 'http') === false) {
            $url = 'http://' . $url;
        }
        return $this->Html->link($title, $url, $options);
    }

    // Add http to link if not specified
    public function formatUrl($url){
        if (strpos($url, 'http') === false) {
            $url = 'http://' . $url;
        }
        return $url;
    }

    // return price formated with two decimals
    public function formatPrice($price, $options = null){
        $formatedPrice = number_format($price, 2, ',',' ');
        if($options=='sup'){
            $arrPrice = explode(',', $formatedPrice);
            return $arrPrice[0] . '<sup>' . $arrPrice[1] . '$</sup>';
        }
        return $formatedPrice . '$';
    }

    public function currency($number = 0, $options = [])
    {
        $defaultOptions = [
            'precision' => 0,
            'forceEmpty' => false,
            'forceEmptyValue' => '-',
            'locale' => 'fr_CA',
        ];

        $options = array_merge($defaultOptions, $options);

        if (!is_numeric($number)) {
            $options['forceEmpty'] = true;
            $number = 0;
        }
        if ($number == 0 && $options['forceEmpty']) {
            return $options['forceEmptyValue'];
        }

        return Number::format($number, $options);
    }

    public function currency_($number = 0, $options = [])
    {
        $defaultOptions = [
            'currency' => 'HTG',
            //'pattern' => '#,###.00', // Marche pas
            'locale' => 'fr_CA',
            'forceEmpty' => false,
            'forceEmptyValue' => '-',
        ];

        $options = array_merge($defaultOptions, $options);

        if (!is_numeric($number)) {
            $options['forceEmpty'] = true;
            $number = 0;
        }
        if ($options['forceEmpty']) {
            $options['zero'] = $options['forceEmptyValue'];
        }

        return Number::currency($number, $defaultOptions['currency'], $options);
    }

    /**
     * @param string $string
     * @param int $length
     * @param string $space
     * @param bool $striptags
     *
     * @return string
     */
    public function slug($string = "", $length = 150, $space = '-', $striptags = true)
    {
        if ($striptags) {
            $string = strip_tags($string);
        }

        $id = strtr($string,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïñòóôõöøùúûüýÿÐ',
            'SZszYAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyyD');

        $id = preg_replace(
            [
                '`^[^A-Za-z0-9]+`',
                '`[^A-Za-z0-9]+$`',
                '`[^A-Za-z0-9]+`',
            ],
            ['', '', $space],
            $id);

        if ($length === false) {
            return strtolower($id);
        } else {
            return substr(strtolower($id), 0, $length);
        }
    }

    function date($format = '', $timestamp = null, $lang = 'eng')
    {
        if ($timestamp == null && ($lang == 'eng' || $lang == 'en_CA') ) {
            return date($format);
        } elseif ($lang == 'eng' || $lang == 'en_CA') {
            return date($format, $timestamp);
        } elseif ($lang == 'fre' || $lang == 'fr_CA') {
            $translations = array('January' => 'janvier',
                'February' => 'février',
                'March' => 'mars',
                'April' => 'avril',
                'May' => 'mai',
                'June' => 'juin',
                'July' => 'juillet',
                'August' => 'août',
                'September' => 'septembre',
                'October' => 'octobre',
                'November' => 'novembre',
                'December' => 'décembre',
                'Monday' => 'lundi',
                'Tuesday' => 'mardi',
                'Wednesday' => 'mercredi',
                'Thursday' => 'jeudi',
                'Friday' => 'vendredi',
                'Saturday' => 'samedi',
                'Sunday' => 'dimanche'
            );

            if ($timestamp == null) {
                return str_replace(array_keys($translations), array_values($translations), date($format));
            } else {
                return str_replace(array_keys($translations), array_values($translations), date($format, $timestamp));
            }
        }
    }
}