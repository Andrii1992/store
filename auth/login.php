<?php
require_once "../settings.php";
?>

<?php require_once BASE_DIR . '/template/header.php'; ?>

<div class="container">
  <form class="row my-5" method="POST" action="/api/auth/login.php">
    <div class="col-lg-7 my-1 col-12 mx-auto">
      <div class="form-group">
        <input type="text" class="form-control" name="usernameOrEmail" id="usernameOrEmail" placeholder="username or email" required>
      </div>
    </div>
    <div class="col-lg-7 my-1 col-12 mx-auto">
      <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
      </div>
    </div>
    <div class="col-lg-7 my-1 col-12 mx-auto">
      <div class="form-group">
        <input type="submit" class="btn btn-secondary d-block ml-auto" name="submit" id="submit" value="submit">
      </div>
    </div>
  </form>
</div>


<?php require_once BASE_DIR . '/template/footer.php'; ?>