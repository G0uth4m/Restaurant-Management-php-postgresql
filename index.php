<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$sql = 'SELECT * FROM menu order by dishid';
$statement = $connection->prepare($sql);
$statement->execute();
$menu = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class = "jumbotron mt-5 text-center">
    <h1>Restaurant</h1>
    <p>Made with love</p>
  </div>
  <div class="card mt-5 mb-5 bg-light">
    <div class="card-header">
      <h2>Menu card</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr class="bg-secondary text-light">
          <th>ID</th>
          <th>Item</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
        <?php foreach($menu as $item): ?>
          <tr>
            <td><?= $item->DishId; ?></td>
            <td><?= htmlspecialchars($item->Name); ?></td>
            <td><?= htmlspecialchars($item->Price); ?></td>
            <td>
            <a href="delete.php?dishid=<?= $item->DishId ?>" class="btn btn-danger">Delete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a href="edit.php?dishid=<?= $item->DishId ?>" class="btn btn-success">Edit price</a></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
