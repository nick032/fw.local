<?php
require __DIR__."/../vendor/autoload.php";

\Core\Router::add('^page/?(?P<action>[a-z-]+)?$', ['controller'=> 'Posts']);

// defaults routes
\Core\Router::add('^$', ['controller'=> 'Main', 'action' => 'index']);
\Core\Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

$query = trim($_SERVER['REQUEST_URI'], '/');
try{
    \Core\Router::dispatch($query);
}catch (Exception $e) {
    echo $e->getMessage();
}
