<?php require_once('inc/header.php'); ?>
<?php require_once('inc/nav.php'); 
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
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $file = fopen("data/products.csv", 'r');
            while ($res = fgets($file)):
                $rwoData = explode(',', $res); ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <div style=" height:300px;"> 
                        <img class="card-img-top img-fluid" src="<?php echo $rwoData[1] ?>" alt="..." />
                        </div>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $rwoData[2] ?></h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">

                                    <?php for ($i = 0; $i < $rwoData[3]; $i++): ?>
                                        <div class="bi-star-fill"></div>
                                    <?php endfor; ?>

                                </div>
                                <!-- Product price-->
                                <?php echo "$" . $rwoData[4]; ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="handeller/addToCard.php?id=<?php echo $rwoData[0]; ?>">Add to cart</a>
                            </div>
                        </div>

                    </div>
                </div>

            <?php

            endwhile;
            fclose($file);
            ?>
        </div>
    </div>
</section>


<?php require_once('inc/footer.php'); ?>