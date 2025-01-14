<?php require_once('inc/header.php'); 
require_once('inc/nav.php'); 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['authentication'])){
    header("location: login.php");
}
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <?php 
                if(isset($_SESSION["errors"])):
                    foreach ($_SESSION["errors"] as $value):
                ?>
                <div class="alert alert-danger"> 
                    <?=$value?>
                </div>
                <?php endforeach;
                endif; 
                unset($_SESSION["errors"]);
                ?>
                <?php if (isset($_SESSION["success"])): ?>
                    <div class="alert alert-success"> 
                    <?=$_SESSION["success"];
                    endif;
                    unset($_SESSION["success"]);
                    ?>
                </div>

                <form action="handeller/handelContact.php" method="POST" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Message</label>
                            <textarea name="message" id="" class="form-control" rows="7"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>