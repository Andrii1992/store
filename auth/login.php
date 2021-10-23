<?php
require_once "../settings.php";
?>

<?php require_once BASE_DIR . 'template/header.php'; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function onSubmit(token) {
    document.getElementById("login-form").submit();
  }
</script>

<div class="container">
  <form id="login-form" class="row my-5" method="POST" action="<?php echo PREFIX_URL; ?>api/auth/login.php">
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
        <button data-callback="onSubmit" data-sitekey="<?=CAPTCHA_SITE_KEY; ?>" type="submit" class="btn btn-secondary d-block ml-auto g-recaptcha">submit</button>
      </div>
    </div>
  </form>
</div>


<?php require_once BASE_DIR . 'template/footer.php'; ?>