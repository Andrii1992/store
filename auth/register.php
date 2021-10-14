<?php 
    require_once "../settings.php";
?>

<?php require_once BASE_DIR . '/template/header.php'; ?>

<div class="container">
    <form class="row my-5" method="POST" action="">
        <div class="col-lg-7 my-1 col-12 mx-auto">
            <div class="form-group">
              <input type="text" class="form-control" name="username" id="username" placeholder="username" maxlength="<?=USER_USERNAME_MAX?>" required>
            </div>
        </div>
        <div class="col-lg-7 my-1 col-12 mx-auto">
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
            </div>
        </div>
        <div class="col-lg-7 my-1 col-12 mx-auto">
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
            </div>
        </div>
        <div class="col-lg-7 my-1 col-12 mx-auto">
            <div class="form-group">
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="confirm password" required>
            </div>
        </div>
        <div class="col-lg-7 my-1 col-12 mx-auto ">
          <label class="form-check-label ml-4">
            <input type="checkbox" class="form-check-input" name="accept_check" id="accept_check" required>      
            <span>I accept <a target="_blank" class="text-secondary" href="https://legal.thomsonreuters.com/en/insights/articles/how-your-personal-information-is-protected-online">statute</a></span>      
          </label>
        </div>
        <div class="col-lg-7 my-1 col-12 mx-auto">
            <div class="form-group">
              <input type="submit" class="btn btn-secondary d-block ml-auto" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</div>


<?php require_once BASE_DIR . '/template/footer.php'; ?>