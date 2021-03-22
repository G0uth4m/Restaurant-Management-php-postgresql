<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$sql = "SELECT S.Name, Y.NoOfOrders  from Staff S, (SELECT OrderTakenBy, COUNT (OrderTakenBy) NoOfOrders from OrderDetails group by OrderTakenBy) as Y where Y.OrderTakenBy=S.EmployeeID";
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
      <h2>No. of orders taken by each employee (waiter)</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr class="bg-secondary text-light">
          <th>Name</th>
          <th>No of Orders</th>
          
        </tr>
        <?php foreach($menu as $item): ?>
          <tr>
            <td><?= htmlspecialchars($item->Name); ?></td>
            <td><?= htmlspecialchars($item->NoOfOrders); ?></td>
            
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
