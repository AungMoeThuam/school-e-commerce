<?php
function echoFirstWordOfString($word)
{
    $newWord = explode(" ", $word);
    echo $newWord[0];
}
?>

<style>
    #navbar {
        background-color: #000000;
    }

    #search:focus {
        outline: none !important;
    }
</style>

<nav id="navbar" class="navbar navbar-expand-lg navbar-dark sticky-top ">
    <div class="container-fluid">
        <a href="http://localhost/e-commerce" class=" navbar-brand">
            <img src="http://localhost/e-commerce/assets/logo.svg" width="250" alt="logo" class=" img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div style="width: 100%;" class="d-flex flex-column flex-lg-row  align-items-sm-start  justify-content-between align-items-lg-center  ">
                <ul class="navbar-nav  me-lg-5">
                    <li class="nav-item">
                        <a class="nav-link active" href="http://localhost/e-commerce/views/shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Help</a>
                    </li>
                </ul>
                <form style="height:40px;" class="form-control d-none d-lg-flex align-items-center me-lg-5 ms-lg-5  p-0">

                    <input class="border-0 flex-grow-1 ps-2" placeholder="search products..." type="text" name="search" id="search">
                    <button class="btn"><i class=" fas fa-search"></i></button>

                </form>
                <ul class="navbar-nav pe-lg-3 ms-lg-5 align-items-lg-center">

                    <li class="nav-item">
                        <a href="http://localhost/e-commerce/views/profile.php" class="nav-link  " style="font-size: 25px;color:aliceblue;">

                            <?php if (isset($_SESSION["auth"]["login_status"])) { ?>
                                <h6 class=" text-center fs-6"> <?php echoFirstWordOfString($_SESSION["auth"]["user"]["name"]); ?> </h6>
                            <?php } else { ?>
                                <i class="fas fa-user"></i>
                            <?php } ?>


                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/e-commerce/views/cart.php" class="nav-link" style="font-size: 25px;color:aliceblue;"><i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>

                <form style="height:40px;" class="form-control d-lg-none  d-flex align-items-center me-lg-5 ms-lg-5  p-0">

                    <input class="border-0 flex-grow-1 ps-2" placeholder="search products..." type="text" name="search" id="search">
                    <button class="btn"><i class=" fas fa-search"></i></button>

                </form>


            </div>
        </div>

    </div>
</nav>