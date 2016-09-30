<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 30.09.2016
 * Time: 8:52
 */

namespace vendor\core\base;


abstract class Controller
{
    public $route = [];
    public $view;

    public function __construct($route){
        $this->route = $route;
    }
}