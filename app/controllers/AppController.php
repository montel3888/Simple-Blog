<?php

namespace app\controllers;

/**
 * Description of App
 *
 */
class AppController extends \hc\core\base\Controller{
    public $menu;
    public $meta = [];
    
    public function __construct($route) {
        parent::__construct($route);
        
        new \app\models\Main;
    }
    
    protected function setMeta($title = '', $desc = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
    
}
