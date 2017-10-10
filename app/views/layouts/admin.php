<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php hc\core\base\View::getMeta(); ?>
    <!-- Bootstrap CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="/css/smoothness-theme.css" rel="stylesheet" type="text/css">    
    <link href="/css/blog-home.css" rel="stylesheet" type="text/css"/>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="main">Products</a>
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
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?= $content; ?>
        </div>          
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Админ панель</h5>
            <div class="card-body">
              Вы зашли как <b><?php echo htmlspecialchars( $_SESSION['user']['login']) ?></b>.
              <br/> <br/> 
             <a href="admin/admin/view"><i class="fa fa-plus-circle"></i> Создать Товар c помощью Ajax</a>
             <br/> <br/> 
            </div>
          </div>

        </div>          
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->          
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Website 2017</p>
    </div>
  </footer> 
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/js/jquery.min.js" type="text/javascript"></script>
  <script src="/js/tablesorter/js/jquery.tablesorter.js"></script>
  <script src="/js/tablesorter/js/jquery.tablesorter.widgets.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Pager plugin JS -->
  <script src="/js/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
    <?php
        foreach ($scripts as $script){
            echo $script;
        }
    ?>  
  </body>  
</html>