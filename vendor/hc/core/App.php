<?php

namespace hc\core;

use hc\core\Registry;
use hc\core\ErrorHandler;

/**
 * Description of App
 *
 */
class App {
    
    public static $app;
    
    public function __construct() {
        session_start();
        self::$app = Registry::instance();
        new ErrorHandler();
    }
    
}
