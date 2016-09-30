<?php

namespace app\controllers;
use vendor\core\base\Controller;

class Posts extends Controller {

    public function indexAction(){
        debug($this->route);
		echo "Posts::index";
	}

	public function testAction(){
		echo "Posts::test";
	}
}
