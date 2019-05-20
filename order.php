<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$message = '';

if (isset ($_POST['name'])  && isset($_POST['dish']))  {
  $name = $_POST['name'];
  $dish = $_POST['dish'];
  $quantity = $_POST['quantity'];
 
  $sql = 'INSERT INTO orders(name, dish, quantity) VALUES(:name, :dish, :quantity)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':dish' => $dish, ':quantity' => $quantity])) {
    $message = 'Order success';
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
          <input type="dish" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="dish">Dish</label>
          <input type="dish" name="dish" id="dish" class="form-control">
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="quantity" name="quantity" id="quantity" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Submit order</button>
        </div>
      </form>
    </div>
  </div>
  <br><br>
<?php require 'footer.php'; ?>
