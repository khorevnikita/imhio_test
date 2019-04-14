<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019-04-14
 * Time: 16:27
 */

class Validator
{
    /**
     * Init method
     *
     * Validate a request using rules
     *
     * @param $request array
     * @param $rules array
     * @return array
     */
    public function make($request, $rules)
    {
        $response = [];
        foreach ($rules as $key => $rule) {
            // Находим нужное поле в массиве запроса
            $error = $this->validateItem($request, $rule, $key);

            if ($error) {
                $response[$key] = $error;
            }
        }
        return $response;
    }

    /**
     * Validate a parameter
     *
     * @param $request
     * @param $rule
     * @param $key
     * @return string|void
     */

    protected function validateItem($request, $rule, $key)
    {
        $ruleArray = explode("&", $rule);

        if (in_array("required", $ruleArray) && !isset($request[$key])) {
            return "Field " . $key . " is required";
        }

        foreach ($ruleArray as $r) {

            if (!method_exists($this, $r)) {
                return "Unknown rule";
            }
            $checkRule = $this->{$r}($request[$key]);
            if ($checkRule) {
                return $checkRule;
            }
        }

        return;
    }

    /**
     * Required rule
     *
     * @param $v
     * @return string|null
     */

    function required($v)
    {
        return ($v) ? null : "Field is required";
    }

    /**
     *  Is string rule
     *
     * @param $v
     * @return string|null
     */

    function string($v)
    {
        return !is_string($v) ? "This field must be a string" : null;
    }

    /**
     *  Is email rule
     *
     * @param $v
     * @return string|null
     */

    function email($v)
    {
        return filter_var($v, FILTER_VALIDATE_EMAIL) ? null : "This field must be a valid email";
    }
}