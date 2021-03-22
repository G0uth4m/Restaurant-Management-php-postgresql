<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$sql = "SELECT i.name from (SELECT i.dateofpurchase,'2019/03/26'-i.dateofpurchase as Duration from ingredients i) as d, ingredients i where d.duration>15 and i.dateofpurchase=d.dateofpurchase";
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
      <h2>Expired Stock</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr class="bg-secondary text-light">
          <th>Name</th>
        </tr>
        <?php foreach($menu as $item): ?>
          <tr>
            <td><?= htmlspecialchars($item->Name); ?></td>
            
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
