<?php

namespace Core;

class Router
{
    protected static $routes;
    protected static $route;

    /**
     * @param $regex
     * @param array $route
     */
    public static function add($regex, $route = [])
    {
        self::$routes[$regex] = $route;
    }

    /**
     * @return mixed
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * @return mixed
     */
    public static function getRoute()
    {
        return self::$route;
    }

    protected static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Перенаправляет  запрос по нужному маршруту
     * @param $url
     * @throws \Exception
     * @return void
     */
    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            $controllerName = 'App\\Controllers\\' . self::upperCamelCase(self::$route['controller']) . 'Controller';
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controller, $action)) {
                    $controller->$action();
                } else {
                    throw new \Exception("<br><strong>Метод $controllerName::$action не найден</strong>");
                }
            } else {
                throw new \Exception("<strong>Контроллер $controllerName не найден</strong>");
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }

    /**
     * @param $name
     * @return string
     */
    protected static function upperCamelCase($name)
    {
        $name = str_replace('-', ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);
        return $name;
    }

    /**
     * @param $name
     * @return string
     */
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }
}