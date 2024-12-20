<?php
session_start();
require_once '../Classes/WishListNew.php';

use Classes\WishListNew;

$wish_list = "";
$wishListObj = new Classes\WishListNew();

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
$wishListObj->setUser($user);

$wish_list = explode(" | ", $wishListObj->getWishListItems());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove'])) {
        $wishListObj->setSoftwareid($_POST['sofw_id']);
        if ($wishListObj->removeWishListItem($wish_list)) {
            header("Location:../pages/wishlist_process_New.php?status=RemoveSuccess");
        } else {
            header("Location:../pages/wishlist_process_New.php?status=RemoveFail");
        }
    } else {
         header("Location:../pages/wishlist_process_New.php?status=BtnError");
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Wishlist</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="../css/cart.css">
        

    </head>
    <body class="bg-light">

        <div class="container-fluid">
            <div class="row px-5">
                <div class="col-md-6">
                    <div class="shopping-cart">
                        <h2>My Wishlist</h2>
                        <hr>

                        <?php
                        $total = 0;
                        $count = 0;
                        if (empty($wish_list[0])) {
                            echo "<h5>Wishlist is Empty</h5>";
                        } else {
                            foreach ($wish_list as $sofw_id) {
                                $sofw_id = trim($sofw_id);
                                $item_arr = $wishListObj->getSoftwareDetail($sofw_id);
                                $price = trim($item_arr->amount);
                                    $total += intval($price);
                                    $count++;
                                    ?>

                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="cart-items">
                                        <div class="border rounded">
                                            <div class="row bg-white p-3">
                                                <div class="col-md-3 pl-0">
                                                    <?php
                                                $imageFormats = ['png', 'jpg']; // List of possible image formats
                                                $imagePath = '../img/sw/' . $item_arr->Sid .'/logo'; // Base path without extension

                                                foreach ($imageFormats as $format) {
                                                    $imageUrl = $imagePath . '.' . $format;

                                                    if (file_exists($imageUrl)) {
                                                        echo '<img class="d-block mx-auto mb-3 mt-3" src="' . $imageUrl . '" height="150px" alt="Logo Image" />';
                                                        break; // Stop when the first valid image format is found
                                                    }
                                                }
                                                ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="pt-2"><?php echo $item_arr->name; ?></h5>
                                                    <small class="text-secondary">by <?php echo $item_arr->username; ?></small>
                                                    <p>by <?php echo $item_arr->shortdescription; ?></p>
                                                    <h5 class="pt-2"><?php echo $item_arr->amount; ?></h5><br>
                                                    <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
                                                    <input type="hidden" name="sofw_id" value="<?php echo $item_arr->Sid ?>" >
                                                </div>

                                                <div class="col-md-3 py-5">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                            }
                        }
                        ?>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="offset-md-1 border rounded mt-5 bg-white p-3" style="height: fit-content;">
                        <div class="pt-4">
                            <h6 style="font-size: 1.3rem;"><b>SOFTWARE DETAILS</b></h6>
                            <hr>
                            <div class="row price-details">
                                <div class="col-md-6">
                                    <p>Total Count of Softwares : </p>

                                    <hr>
                                   
                                </div>

                                <div class="col-md-6" style="width: fit-content;">
                                    <h6><?php echo $count; ?></h6>

                                    <hr>

                                    
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>

        </div>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

