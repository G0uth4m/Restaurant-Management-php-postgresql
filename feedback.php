<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$messag = '';

$sql2 = 'SELECT * FROM menu order by dishid';
$statement2 = $connection->prepare($sql2);
$statement2->execute();
$menu = $statement2->fetchAll(PDO::FETCH_OBJ);

if (isset ($_POST['name'])  && isset($_POST['email'])  && isset($_POST['favourite']) && isset($_POST['message']))  {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $favourite = $_POST['favourite'];
  $message = $_POST['message'];

  $sql = 'INSERT INTO contact(name, email, favourite, message) VALUES(:name, :email, :favourite, :message)';
  $statement = $connection->prepare($sql);

  if ($statement->execute([':name' => $name, ':email' => $email, ':favourite' => $favourite, ':message' => $message])) {
    $messag = 'Feedback Sent';
  }
  else{
    $messag = 'Error';
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
      <h2>Provide your suggestions</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($messag)): ?>
        <div class="alert alert-success">
          <?= $messag; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
         <div class="form-group">
  <label for="favourite">Your favourite food:</label>
  <select class="form-control" id="favourite" name="favourite">

        <?php foreach($menu as $item): ?>
          <option><?= htmlspecialchars($item->Name); ?></option>
        <?php endforeach; ?>
    
  </select>
</div> 
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" name="message" rows="7"></textarea>
          
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Send</button>
        </div>
      </form>
    </div>
  </div>
  <br><br>
<?php require 'footer.php'; ?>
