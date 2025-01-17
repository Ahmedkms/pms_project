<?php require_once('inc/header.php');
require_once('inc/nav.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
// if(!isset($_SESSION['authentication'])){
//     header("location: login.php");
// }
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
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                            <?php
                            if (isset($_SESSION['cartData'])):
                                $sumOftotalPrice = 0;
                                foreach ($_SESSION['cartData'] as $index => $item):
                                    $totalprice = $item['quantity'] * $item['price'];
                                    $sumOftotalPrice += $totalprice;
                            ?>
                                    <li class="border p-2 my-1"> <?= $item['category']; ?>
                                        <span class="text-success mx-2 mr-auto bold">
                                            <?= $item['quantity'] ?> * <?= $item['price']; ?>$</span>
                                    </li>
                            <?php endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <h3> <?php echo $sumOftotalPrice; ?></h3>
                </div>
            </div>
            <div class="col-8">
                <?php if (isset($_SESSION["errors"])) :
                    foreach ($_SESSION["errors"] as $error):
                ?>
                        <div class="alert alert-danger ">
                            <?= $error ?>
                        </div>
                <?php endforeach;
                endif;
                unset($_SESSION["errors"]);
                ?>
                <form action="handeller/handelCheckOutForm.php" method="POST" class="form border my-2 p-3">
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
                            <label for="">Address</label>
                            <input type="text" name="address" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="note" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>