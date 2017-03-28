<?php $view->inc('elements/header.php') ;?>
<body>
<div class="row diapo">
  <div class="col-md-12">
    <?php 
     $a = new Area('Diaporama');
   
     $a->display($c);
     ?>
  </div>
</div>

<div class="container coltrois">
  <div class="row">
    <div class="col-md-4">
     <?php 
     $a = new Area('Col1');
     $a->display($c);
     ?>
   </div>
   <div class="col-md-4">
     <?php 
     $a = new Area('Col2');
     $a->display($c);
     ?>
    </div>
    <div class="col-md-4">
     <?php 
     $a = new Area('Col3');
     $a->display($c);
     ?>
    </div>
  </div>
</div>

<div class="row CTA">
  <div class="container">
    <div class="col-md-12">
      <?php 
     $a = new Area('CTA');
     $a->enableGridContainer();
     $a->display($c);
     ?>
    </div>
 </div>
</div>


<div class="container">
  <div class="row">
      <div class="col-md-12" style="text-align:center; margin-bottom:3%;">
        <?php 
       $a = new Area('contenu');
       $a->enableGridContainer();
       $a->display($c);
       ?>
    </div>
  </div>
</div>

</body>
<?php $view->inc('elements/footer.php') ;?>