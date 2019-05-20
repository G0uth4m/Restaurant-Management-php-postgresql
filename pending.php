<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$sql = "SELECT M.DishID, O.OrderID, M.name, O.Quantity from Menu M, OrderDetails OD, OrderDishes O where OD.OrderID=O.OrderID and O.DishID=M.DishID and OD.OrderStatus='Not Done'";
$statement = $connection->prepare($sql);
$statement->execute();
$pending = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class = "jumbotron mt-5 text-center">
    <h1>Restaurant</h1>
    <p>Made with love</p>
  </div>
  <div class="card mt-5 mb-5 bg-light">
    <div class="card-header">
      <h2>Pending Orders</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr class="bg-secondary text-light">
          
          <th>Item</th>
          <th>Quantity</th>
          <th>Action</th>
          
        </tr>
        <?php foreach($pending as $item): ?>
          <tr>
            
            <td><?= $item->name; ?></td>
            <td><?= $item->quantity; ?></td>
            <td><a href="markdone.php?orderid=<?= $item->orderid ?>" class="btn btn-info">Mark Done</a>
            
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
