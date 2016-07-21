<?php

namespace Lib;

class Validate
{
    /**
     * Validate $data delete spaces, html tags, and special chars.
     *
     * @param mixed $data
     * @return string $data
     */
    public function validateClear($data) {
        $data = htmlspecialchars(strip_tags(trim($data)));
        return $data;
    }

    /**
     * Validate 'sku' field. If return null, show message on front.
     *
     * @param $data
     * @return null
     */
    public function validateSku($data)
    {
        if(strlen($data) > 255){
            return null;
        } else {
            return $data;
        }
    }

    /**
     * Validate 'name' and 'description' fields.
     *    If returned null, show message on front.
     *    Else return $data.
     *
     * @param $data
     * @return null
     */
    public function validateLength($data)
    {
        if(strlen($data) > 65535) {
            return null;
        } else {
            return $data;
        }
    }

    /**
     * Validate 'price' field.
     *    If return null, show message on front.
     *    Else return $data.
     *
     * @param $data
     * @return null
     */
    public function validatePrice($data)
    {
        if((strlen($data) > 15) || ($data < 0)) {
            return null;
        } else {
            return number_format($data, 2, '.', ' ');
        }
    }

    /**
     * Validate checkbox field.
     *    Return true or false, that we'll write to database.
     *
     * @param $data
     * @return null
     */
    public function validateIsSaleable($data)
    {
        if($data == 'on') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Validate form.
     *    Return true to write to database.
     *    Else return message to front.
     *
     * @param $data
     * @return null
     */
    public function validateAll($data)
    {
        foreach($data as $value) {
            if($value !== null) {
                continue;
            } else {
                return 'Oh nooo, something wrong';
            }
        }
        return true;
    }
}
