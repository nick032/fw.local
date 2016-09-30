<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 30.09.2016
 * Time: 9:01
 */

namespace app\controllers;


use vendor\core\base\Controller;
class Page extends Controller
{
    public function viewAction() {
        debug($this->route);
        debug($_GET);
        echo 'Page::view';
    }
}