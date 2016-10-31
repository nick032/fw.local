<?php
namespace app\controllers;

use vendor\core\base\Controller;
class Page extends App{
    public function viewAction() {
        debug($this->route);
        debug($_GET);
        echo 'Page::view';
    }
}