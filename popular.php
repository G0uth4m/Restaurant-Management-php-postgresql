<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$sql = "SELECT favourite, COUNT(favourite) AS cnt FROM contact GROUP BY favourite ORDER by cnt DESC LIMIT 3";
$statement= $connection->prepare($sql);
$statement->execute();
$populars = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<style type="text/css">
  ol li:nth-child(1) a { 
  font-weight: bold;
  font-size: 40px;
   }
</style>
<div class="container">
  <div class = "jumbotron mt-5 text-center">
    <h1>Restaurant</h1>
    <p>Made with love</p>
  </div>
  <div class="card mt-5 mb-5 bg-light">
    <div class="card-header">
      <h2>People's Choice</h2>
    </div>
    <div class="card-body">
    	<div>
    <div>
    	<h2>Food Ranking (Top 3)</h2><br>
    	<ol type="1" id="custom">
    <?php foreach($populars as $pop): ?>
       <li><h4><?= htmlspecialchars($pop->favourite); ?>&nbsp;(<?= $pop->cnt; ?>&nbsp;likes)</h4></li>

    <?php endforeach; ?>
    </ol>
    <hr>
	</div>
    
</div>
  </div> 
  </div> 
</div>


<?php require 'footer.php'; ?>