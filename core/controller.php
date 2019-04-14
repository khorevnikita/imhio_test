<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019-04-14
 * Time: 15:42
 */

class Controller
{

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
    }

    /**
     *  Response maker
     *
     * @param int $status
     * @param array $data
     */

    function response($status = 1, $data = [])
    {
        echo json_encode([
            "status" => $status,
            "data" => $data,
        ]);
        return;
    }
}