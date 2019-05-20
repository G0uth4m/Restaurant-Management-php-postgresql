<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['price']))  {
  $name = $_POST['name'];
  $price = $_POST['price'];
 
  $sql = 'INSERT INTO menu(name, price) VALUES(:name, :price)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':price' => $price])) {
    $message = 'New food item added to menu';
  }
  else{
    $message = 'Error';
  }
}
?>

<?php require 'header.php'; ?>
<div class="container">
	<div class = "jumbotron mt-5 text-center">
    <h1>Restaurant </h1>
    <p>Made with love</p>
  </div>
  <div class="card mt-5 bg-light">
    <div class="card-header">
      <h2>Add food item</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="price" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="price" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Add</button>
        </div>
      </form>
    </div>
  </div>
  <br><br>
<?php require 'footer.php'; ?>
