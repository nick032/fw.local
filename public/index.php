<?php


// echo "Процесс начался....</br>";
// for($i = 0; $i < 5000; $i++) {

// 	$a = file_get_contents('http://mjzhsyloonvxi33emf4s44tv.cmle.ru/2016090940808/incidents/V-Bryanske-rassmotryat-delo-legendarnogo-eks-chinovnika-Poleschenko.html', NULL, NULL, 100, 20);
// }
// echo "Done!";
// exit();
$query = $_SERVER['QUERY_STRING'];

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('APP', dirname(__DIR__) . '/app');
define('ROOT', dirname(__DIR__));

require_once '../vendor/core/Router.php';
require_once '../vendor/libs/functions.php';
// require_once '../app/controllers/Main.php';
// require_once '../app/controllers/Posts.php';
// require_once '../app/controllers/PostsNew.php';

spl_autoload_register(function($class){
	$file = APP . "/controllers/$class.php";
	if(is_file($file)) {
		require_once($file);
	}
});

Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Posts']);

// Defaults routes

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);