<?php

namespace app\controllers;
use vendor\core\base\Controller;

class Posts extends App {

    public function indexAction(){
        debug($this->route);
		echo "Posts::index.php";
	}

	public function testAction(){
		echo "Posts::test";
	}
}
