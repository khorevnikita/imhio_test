<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019-04-14
 * Time: 15:48
 */

class MainController extends Controller
{
    /**
     * render index page
     */
    function index()
    {
        $this->view->generate('form.php', 'layout.php');
    }
}