<nav class="px-3 navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <span class="navbar-text">
            <a class="nav-link p-0" href="/">Home</a>
        </span>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">

            </li>
            <?php

            if (Me::IsLoggedIn()) : ?>
                <li class="nav-item">
                    <a href="/stor.php" class="nav-link">Stor</a>
                </li>
                <li class="nav-item">
                    <a href="/user/settings.php" class="nav-link">Settings</a>
                </li>
                <li class="nav-item">
                    <a href="/user/logout.php" class="nav-link">Logout</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a href="/auth/register.php" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="/auth/login.php" class="nav-link">Login</a>
                </li>
            <?php endif; ?>



        </ul>

    </div>
</nav>