
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Factorian</title>

  <link href="<?php echo $view->getThemePath(); ?>/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $view->getThemePath(); ?>/style.css" rel="stylesheet">

  <script src="<?php echo $view->getThemePath(); ?>/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <?php Loader::element('header_required') ;?>
</head>

<body>
  <div class="<?= $c->getPageWrapperClass()?>">
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#">Factorian</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li><?php
          $a = new GlobalArea('Menu');
          $a->display($c);
          ?></li>
        </ul>
      </div><!-- /.navbar-collapse -->
  </nav>
</div>
</body>
</html>
