<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('inc/header.php');
require_once('inc/nav.php'); ?>

<div class="container">
    <h1 class="my-4">Register New Account</h1>
    <?php if (isset($_SESSION['errors'])):
        foreach ($_SESSION['errors'] as $error):
    ?>
            <div class="alert alert-danger"> <?= $error ?></div>
    <?php endforeach;
    endif;
    unset($_SESSION['errors']);
    ?>
    <form method="POST" action="handeller/handelRegister.php">

        <div class="mb-3">
            <label for="name" class="form-label"> Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">User Type</label>
            <select class="form-control" id="type" name="type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
       <button alertype="submit" class="btn btn-primary">Register</button>
    </form>
    <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
</div>

<?php require_once('inc/footer.php'); ?>