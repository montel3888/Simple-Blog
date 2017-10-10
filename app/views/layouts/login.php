<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php hc\core\base\View::getMeta(); ?>
    <!-- Bootstrap CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Custom CSS -->
    <link href="/css/smoothness-theme.css" rel="stylesheet" type="text/css">    
    <link href="/css/blog-home.css" rel="stylesheet" type="text/css"/>
    <link href="/css/login.css" rel="stylesheet">
<!--    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
     Custom CSS 
    <link href="css/smoothness-theme.css" rel="stylesheet" type="text/css">    
    <link href="css/blog-home.css" rel="stylesheet" type="text/css"/>
    <link href="css/login.css" rel="stylesheet">    -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/main">Products</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="/main">Гость <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="/admin">Админ</a></li>
      </ul>
    </div>
    </nav>        
  </head>
  <body>       
      <?=$content ?>
  </body>  
</html>