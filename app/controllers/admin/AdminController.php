<?php
/**
 * User: Admin
 */

namespace app\controllers\admin;
use hc\core\base\View;
use app\models\User;

class AdminController extends AppController{

    public function indexAction(){
        View::setMeta('Админка :: Главная страница', 'Описание админки', 'Ключевики админки');
        if(isset($_SESSION['user']['login'])){
            $user = new User();
            $products = \R::findAll('products');
            $this->set(compact('products')); 
            $this->layout = 'admin';       
        }else{
            $this->layout = 'login';
            $this->view = 'login';
        }
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $products = \R::findAll('products');
                $this->set(compact('products')); 
                $this->view = 'index';
            }else{
                $_SESSION['error'] = 'Login/Password is not correct';                
                redirect();
            }
        }
        View::setMeta('Админка :: Вход', '', '');                 
    }
    
    public function viewAction() {
        if (isset($_GET["id"])) {
            $user = new User();
            $id = $_GET["id"];
            $product_view = \R::findOne('products', 'id = ? LIMIT 1', [$id]);
            $this->set(compact('product_view'));
        }
        $this->view = 'product';
        View::setMeta('Create Product', 'Description', 'Keywords');
    }
    
    public function addProductAction() {
      if($this->isAjax()){
        $user = new User();
        $date_created = date("Y-m-d");
        $product=$_POST["product"];
        $description=$_POST["description"];
        $file="../public/MyUploadImages/".$_FILES["file"]["name"];           
        $uploadOk = 1;
        $imageFileType = pathinfo($file,PATHINFO_EXTENSION);
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
//          trigger_error ("Attempt to insert an non image file.", E_USER_ERROR);
          $uploadOk = 0;
          $_SESSION['status'] = '<div class="alert alert-warning" id="success">'
                . 'Пожайлуста вставьте изображение(png, jpg, jpeg).'
                .'</div>';
        }else {
          if (!empty($_POST["id"])) {
            $id = $_POST["id"];
            $product_image = \R::findOne('products', 'id = ? LIMIT 1', [$id]);
            unlink($product_image['image_path']);
            \R::exec( "UPDATE `products` SET `product`='$product', `description`= '$description', `date` = '$date_created', `imagePath` = '$file'  WHERE id = $id");
            $_SESSION['status'] = '<div class="alert alert-info" id="success">'
                  . 'Данные о товаре изменены.'
                  .'</div>';
          }else{
            move_uploaded_file($_FILES["file"]["tmp_name"],"../public/MyUploadImages/" . $_FILES["file"]["name"]);
            $insert_product=\R::dispense('products');
            $insert_product->product = $product;
            $insert_product->description = $description;
            $insert_product->date = $date_created;
            $insert_product->imagePath = $file;   
            \R::store($insert_product);
            $_SESSION['status'] = '<div class="alert alert-success" id="success">'
                  . 'Товар успешно создан.'
                  .'</div>';
          }          
        }
        die;
      }
    }
    public function deleteAction() {
        if($this->isAjax()){
            $user = new User();
            \R::trash( 'products', $_POST['id'] );
            die;
        }
    }        

}