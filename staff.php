<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$sql1 = "SELECT * FROM staff where position='Manager' order by salary";
$sql2 = "SELECT * FROM staff where position='Cashier' order by salary";
$sql3 = "SELECT * FROM staff where position='Chef' order by salary";
$sql4 = "SELECT * FROM staff where position='Waiter' order by salary";
$sql5 = "SELECT * FROM staff where position='Busboy' order by salary";

$statement1 = $connection->prepare($sql1);
$statement1->execute();
$managers = $statement1->fetchAll(PDO::FETCH_OBJ);

$statement2 = $connection->prepare($sql2);
$statement2->execute();
$cashiers = $statement2->fetchAll(PDO::FETCH_OBJ);

$statement3 = $connection->prepare($sql3);
$statement3->execute();
$chefs = $statement3->fetchAll(PDO::FETCH_OBJ);

$statement4 = $connection->prepare($sql4);
$statement4->execute();
$waiters = $statement4->fetchAll(PDO::FETCH_OBJ);

$statement5= $connection->prepare($sql5);
$statement5->execute();
$busboys = $statement5->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class = "jumbotron mt-5 text-center">
    <h1>Restaurant</h1>
    <p>Made with love</p>
  </div>
  <div class="card mt-5 mb-5 bg-light">
    <div class="card-header">
      <h2>Our shining stars (Ranking)</h2>
    </div>
    <div class="card-body">
    	<div align="center">
    <div>
    	<h2>Managers</h2>
    	<ul class="list-unstyled">
    <?php foreach($managers as $manager): ?>
       <li><h4><?= htmlspecialchars($manager->Name); ?></h4></li>

    <?php endforeach; ?>
    </ul>
    <hr>
	</div>
    <div>
    	<h2>Chefs</h2>
    	<ul class="list-unstyled">
    <?php foreach($chefs as $chef): ?>
       <li><h4><?= htmlspecialchars($chef->Name); ?></h4></li>
    <?php endforeach; ?>
    </ul>
    <hr>
</div>
<div>
	<h2>Cashiers</h2>
	<ul class="list-unstyled">
    <?php foreach($cashiers as $cashier): ?>
       <li><h4><?= htmlspecialchars($cashier->Name); ?></h4></li>
    <?php endforeach; ?>
    </ul>
    <hr>
    </div>
    <div>
    	<h2>Waiters</h2>
    	<ul class="list-unstyled">
    <?php foreach($waiters as $waiter): ?>
       <li><h4><?= htmlspecialchars($waiter->Name); ?></h4></li>
    <?php endforeach; ?>
    </ul>
    <hr>
</div>
	<div>
		<h2>Busboys</h2>
		<ul class="list-unstyled">
    <?php foreach($busboys as $busboy): ?>
       <li><h4><?= htmlspecialchars($busboy->Name); ?></h4></li>
    <?php endforeach; ?>
    </ul>
</div>
</div>
  </div> 
  </div> 
</div>


<?php require 'footer.php'; ?>