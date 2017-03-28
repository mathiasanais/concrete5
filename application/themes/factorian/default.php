<?php $view->inc('elements/header.php');

     $a = new Area('Contenu');
     $a->enableGridContainer();
     $a->display($c);

 $view->inc('elements/footer.php');
 ?>