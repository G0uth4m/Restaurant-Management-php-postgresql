<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$dishid = $_GET['dishid'];
$sql = 'DELETE FROM menu WHERE dishid=:dishid';
$statement = $connection->prepare($sql);
if ($statement->execute([':dishid' => $dishid])) {
  header("Location: /pro/");
}