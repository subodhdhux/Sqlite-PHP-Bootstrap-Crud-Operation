<?php
  require_once "vendor/autoload.php";
  use Myclasses\Crud\Crud;

  $crud = new Crud();

  include_once 'header.php'; 

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    
    if($crud->delete('tasks',$id))
      $deleted = true;
    else
      $deleted = false;
  }
  else
  {
    header("Location: index.php");
  }

?>

<div class="clearfix"></div>

  <div class="container">

    <?php if($deleted): ?>
      <div class="alert alert-success">
        <strong>Success!</strong> record was deleted... 
        <a href="index.php" >Go Back </a>
      </div>
    <?php else: ?>
      <div class='alert alert-warning'>
        <strong>SORRY!</strong> Error While Deleting !
      </div>
    <?php endif; ?> 
  </div>
<?php include_once 'footer.php'; 