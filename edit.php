<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$dishid = $_GET['dishid'];
$sql = 'SELECT * FROM menu WHERE dishid=:dishid';
$statement = $connection->prepare($sql);
$statement->execute([':dishid' => $dishid ]);
$item = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['price']) ) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $sql = 'UPDATE menu SET name=:name, price=:price WHERE dishid=:dishid';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':price' => $price, ':dishid' => $dishid])) {
    header("Location: /pro/");
  }
}


 ?>
<?php require 'header.php'; ?>
<div class="container">
    <div class = "jumbotron mt-5 text-center">
    <h1>Restaurant</h1>
    <p>Made with love</p>
  </div>
  <div class="card mt-5">
    <div class="card-header">
      <h2>Edit</h2>
    </div>
    <div class="card-body">
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= htmlspecialchars($item->Name); ?>" type="text" name="name" dishid="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="price">price</label>
          <input type="price" value="<?= htmlspecialchars($item->Price); ?>" name="price" dishid="price" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>
<br><br>
<?php require 'footer.php'; ?>
