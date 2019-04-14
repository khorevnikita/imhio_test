<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019-04-14
 * Time: 15:54
 */

require_once __DIR__."/../classes/Validator.php";

class EmailController extends Controller
{
    /**
     *  email validation method
     */
    public function check()
    {
        $validator = new Validator();
        $errors = $validator->make($_POST, [
            "email" => "required&string&email"
        ]);
        if ($errors) {
          return  $this->response(0, $errors);
        }
        return $this->response(1, [
            "validation"=>true
        ]);
    }
}