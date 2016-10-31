<?php
namespace app\controllers;
use vendor\core\base\Controller;

class Main extends App {
	public function indexAction(){
//        $this->layout = false;
        $data['name'] = 'nick';
        $data['hi'] = 'hello';
        $data['key'] = '1d4s487qasd34';
        $this->set($data);
	}
}
