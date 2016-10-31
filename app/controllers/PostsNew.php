<?php
namespace app\controllers;
use vendor\core\base\Controller;

class PostsNew extends App {
	public function indexAction(){
		echo "PostsNew::index.php";
	}

	public function testAction(){
		echo "PostsNew::test";
	}

	public function testPageAction(){
		echo "PostsNew::testPage";
	}

	public function before(){
		echo "PostsNew::before";
	}
}