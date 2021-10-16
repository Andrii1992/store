<?php
require_once '../settings.php';

require_once BASE_DIR . '/template/header.php';

if (!Me::IsLoggedIn()) {
   http_response_code(403);
   exit('Error: User not logged in');
}

?>
<form class="card my-5" method="POST" action="/api/user/saveEmail.php">
   <div class="form-group mx-3 mt-3">
      <label for="username">Username</label>
      <input id="username" class="form-control" value="<?= Me::GetUser()->GetData()['username'] ?>" type="text" readonly>
   </div>

   <div class="form-group mx-3">
      <label for="email">Email</label>
      <input id="email" name="email" class="form-control" value="<?= Me::GetUser()->GetData()['email'] ?>" type="text">
   </div>

   <div class="form-group mx-3">
      <button class="float-right btn btn-secondary">Save</button>
   </div>
</form>

<form class="card my-5" method="POST" action="/api/user/savePassword.php">
   <div class="form-group mx-3 mt-3">
      <label for="current_password">Current password</label>
      <input type="password" class="form-control" name="current_password" id="current_password" placeholder="current password" required>
   </div>

   <div class="form-group mx-3">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
   </div>

   <div class="form-group mx-3">
      <label for="confirm_password">Confirm password</label>
      <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="confirm password" required>
   </div>

   <div class="form-group mx-3">
      <button class="float-right btn btn-secondary">Save</button>
   </div>
</form>

<form class="card my-5" method="POST" action="/api/user/deleteAccount.php">
   <div class="form-group mx-3 mt-3">
      <button class="float-right btn btn-danger">Delete account</button>
   </div>
</form>
<?php

require_once BASE_DIR . '/template/footer.php';
