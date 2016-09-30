<?php

error_reporting(-1);
use vendor\core\Router;

$query = $_SERVER['QUERY_STRING'];

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('APP', dirname(__DIR__) . '/app');
define('ROOT', dirname(__DIR__));

//require_once '../vendor/core/Router.php';
require_once '../vendor/libs/functions.php';
// require_once '../app/controllers/Main.php';
// require_once '../app/controllers/Posts.php';
// require_once '../app/controllers/PostsNew.php';

spl_autoload_register(function($class){
	$file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
	if(is_file($file)) {
		require_once($file);
	}
});

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// Defaults routes

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);