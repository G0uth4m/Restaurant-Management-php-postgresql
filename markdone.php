<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$orderid = $_GET['orderid'];
$sql = "UPDATE orderdetails set orderstatus='Done' where orderid=:orderid";
$statement = $connection->prepare($sql);
if ($statement->execute([':orderid' => $orderid])) {
  header("Location: /pro/pending.php");
}