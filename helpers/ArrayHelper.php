<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/14/21
 * @time: 2:00 PM
 */
namespace mhunesi\entegra\helpers;

use yii\helpers\ArrayHelper as BaseArrayHelper;

class ArrayHelper extends BaseArrayHelper
{
    public static function arrayFilterRecursive($array, $callback = null, $remove_empty_arrays = false)
    {
        foreach ($array as $key => & $value) { // mind the reference
            if (is_array($value)) {
                $value = self::arrayFilterRecursive($value, $callback, $remove_empty_arrays);
                if ($remove_empty_arrays && !(bool) $value) {
                    unset($array[$key]);
                }
            } else {
                if (is_string($callback) && !is_null($callback) && !$callback($value, $key)) {
                    unset($array[$key]);
                } elseif (!(bool) $value) {
                    unset($array[$key]);
                }
            }
        }
        unset($value);
        return $array;
    }
}