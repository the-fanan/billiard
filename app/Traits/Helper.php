<?php
namespace billiard\Traits;


use billiard\Constants\Constants;

trait Helper
{
    /**
    * Returns all errors in the validator array as a string
    * @param $errors
    *
    * @return string
    */
    public function validationMessagesToString($errors)
    {
        $erroMessage = "";
        foreach ($errors->toArray() as $key => $value) {
            $erroMessage .= title_case($value[0]) . " ";
        }
        return $erroMessage;
    }

    /**
    * Perform json_decode on a strng only if string is of type JSON
    * @param $value
    *
    * @return string|array
    */
    public function decodeIfJson($value)
    {
        if ($this->isJSON($value)) {//check if value is JSON
            $decoded_string = json_decode($value);
        } else {
            $decoded_string = $value;
        }
        return $decoded_string;
    }

    /**
    * Check if a particular string is JSON
    * @param $string
    *
    * @return bool
    */
    public function isJSON($string)
    {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }
    
}
