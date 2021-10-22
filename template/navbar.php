<nav class="px-3 navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <span class="navbar-text">
            <a class="nav-link p-0" href="<?php echo PREFIX_URL; ?>">Home</a>
        </span>
        <ul class="navbar-nav ml-auto">
            <?php
            if (Me::IsLoggedIn()) : ?>
                <li class="nav-item">
                    <a href="<?php echo PREFIX_URL; ?>cart.php" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo PREFIX_URL; ?>stor.php" class="nav-link">Stor</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo PREFIX_URL; ?>user/settings.php" class="nav-link">Settings</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo PREFIX_URL; ?>user/logout.php" class="nav-link">Logout</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a href="<?php echo PREFIX_URL; ?>auth/register.php" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo PREFIX_URL; ?>auth/login.php" class="nav-link">Login</a>
                </li>
            <?php endif; ?>



        </ul>

    </div>
</nav>