<?php
require 'db.php';
$sql = 'SELECT * FROM restaurants';
$statement = $connection->prepare($sql);
$statement->execute();
$restaurants = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>

<footer class="page-footer font-small pt-4 text-dark bg-light">
	<br>
    <div class="container-fluid text-center text-md-left">
      <div class="row">
      	<div class="col-md-1">
      		
      	</div>
        <div class="col-md-6 mt-md-2 mt-3">
          <h5 class="text-uppercase"> Restaurant</h5>
          <p> Made with love</p>
          <h5 class="text-uppercase"> Contact</h5>
          <p> 1-800-900-700</p>
          <h5 class="text-uppercase"> Email</h5>
          <p> test@test.com</p>
        </div>

        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-3 mb-md-0 mb-3">
            <h5 class="text-uppercase">Our Branches</h5>

            <ul class="list-unstyled">
              <?php foreach($restaurants as $restaurant): ?>
              <li>
                <a href="https://google.com/maps/" class="list-group-item text-dark"><?= htmlspecialchars($restaurant->Address); ?></a>
              </li>
              <?php endforeach; ?>            
            </ul>
          </div>
          </div>
      </div>
   </div>
  <br>
    <div class=" bg-dark text-light footer-copyright text-center py-3">© 2019 Copyright:
      <a href="mailto:test@test.com" class="text-light"> test.com</a>
    </div>

  </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  </body>
</html>