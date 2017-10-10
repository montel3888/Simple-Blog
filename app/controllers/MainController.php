<?php

namespace app\controllers;
use hc\core\base\View;

/**
 * Description of Main
 *
 */
class MainController extends AppController{

    public function indexAction() {
        View::setMeta('Main Page', 'Description', 'Keywords');
        $products = \R::findAll('products');
        $this->set(compact('products'));
    }
    public function viewAction() {
        if (isset($_GET["details"])) {
            $product_one =\R::findOne('products', "id = {$_GET['details']}");
            $this->set(compact('product_one'));
            $this->view = 'details';
        }
    }       
    public function deleteAction() {
        if($this->isAjax()){
            \R::trash( 'projects', $_POST['id'] );
            die;
        }
    }     
}
