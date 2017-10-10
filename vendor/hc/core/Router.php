<?php

namespace hc\core;

/**
 * Description of Router
 *
 */
class Router {
    
    /**
     * routes table
     * @var array
     */
    protected static $routes = [];
    
    /**
     * current route
     * @var array
     */
    protected static $route = [];
    
    /**
     * adds route to the table
     * 
     * @param string $regexp regexp of route
     * @param array $route route ([controller, action, params])
     */
    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }
    
    /**
     * returns table of routes
     * 
     * @return array
     */
    public static function getRoutes() {
        return self::$routes;
    }
    
    /**
     * returns current route (controller, action, [params])
     * 
     * @return array
     */
    public static function getRoute() {
        return self::$route;
    }
    
    /**
     * looks for URL in table of routes
     * @param string $url in URL
     * @return boolean
     */
    public static function matchRoute($url) {
        foreach(self::$routes as $pattern => $route){
            if(preg_match("#$pattern#i", $url, $matches)){
                foreach($matches as $k => $v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                // prefix for admin controllers
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }else{
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    
    /**
     * redirect URL to the correct route
     * @param string $url in URL
     * @return void
     */
    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if(class_exists($controller)){
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($cObj, $action)){
                    $cObj->$action();
                    $cObj->getView();
                }else{
//                    echo "Method <b>$controller::$action</b> is not found";
                    throw new \Exception("Method <b>$controller::$action</b> is not found", 404);
                }
            }else{
//                echo "Controller <b>$controller</b> is not found";
                throw new \Exception("Controller <b>$controller</b> is not found", 404);
            }
        }else{
//            http_response_code(404);
//            include '404.html';
            throw new \Exception("Page not found", 404);
        }
    }
    
    /**
     * changes names to CamelCase
     * @param string $name line for changing
     * @return string
     */
    protected static function upperCamelCase($name) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    
    /**
     * changes names to camelCase
     * @param string $name line for changing
     * @return string
     */
    protected static function lowerCamelCase($name) {
        return lcfirst(self::upperCamelCase($name));
    }
    
    /**
     * returns line without GET parameters
     * @param string $url Request URL
     * @return string
     */
    protected static function removeQueryString($url) {
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }
    
}
