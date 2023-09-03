<?php
require_once ('../Classes/wishlistCls.php');
require_once ('../Classes/DbConnector.php');

use Classes\wishlistCls;
use Classes\DbConnector;

$wishObj = new wishlistCls();
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
$wishObj->wishlistCls1($user);
$sw = explode("|", $wishObj->getwishlist());

// create connection
$con_obj = new Classes\DbConnector();
$con = $con_obj->getConnection();

$wishlistProducts = array();
$total = 0;

//if (isset($_POST['remove'])){
//  if ($_GET['action'] == 'remove'){
//      foreach ($_SESSION['cart'] as $key => $value){
//          if($value["product_id"] == $_GET['id']){
//              unset($_SESSION['cart'][$key]);
//              echo "<script>alert('Product has been Removed...!')</script>";
//              echo "<script>window.location = 'cart.php'</script>";
//          }
//      }
//  }
//}
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
                        <h6>My Wishlist</h6>
                        <hr>

                        <?php
                        $total = 0;
                        $count = 0;
                        if (empty($sw)) {
                            echo "<h5>Wishlist is Empty</h5>";
                        } else {
                            foreach ($sw as $value) {
                                $value = rtrim($value);
                                foreach ($wishObj->getwishlistsw($value) as $value2) {
                                    $total += (int)$value2->amount;
                                    $count++;
                                    ?>


                        <form action="wishlist_process.php?action=remove&id=$productid" method="post" class="cart-items">
                                        <div class="border rounded">
                                            <div class="row bg-white p-3">
                                                <div class="col-md-3 pl-0">
                                                    <?php
                                                $imageFormats = ['png', 'jpg']; // List of possible image formats
                                                $imagePath = '../img/sw/' . $value .'/logo'; // Base path without extension

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
                                                    <h5 class="pt-2"><?php echo $value2->name; ?></h5>
                                                    <small class="text-secondary">by <?php echo $value2->username; ?></small>
                                                    <p>by <?php echo $value2->shortdescription; ?></p>
                                                    <h5 class="pt-2"><?php echo $value2->amount; ?></h5><br>
                                                    <button type="submit" class="btn btn-warning">Buy</button>
                                                    <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
                                                </div>

                                                <div class="col-md-3 py-5">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                }
                            }
                        }
                        ?>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="offset-md-1 border rounded mt-5 bg-white p-3" style="height: fit-content;">
                        <div class="pt-4">
                            <h6 style="font-size: 1.3rem;"><b>PRICE DETAILS</b></h6>
                            <hr>
                            <div class="row price-details">
                                <div class="col-md-6">
                                    <p>Total Count of Softwares : </p>

                                    <hr>
                                    <h6>Amount Payble</h6>
                                </div>

                                <div class="col-md-6" style="width: fit-content;">
                                    <h6><?php echo $count; ?></h6>

                                    <hr>

                                    <h6>$<?php echo $total;?></h6>
                                </div>


                            </div>
                        </div>
                        <div class="my-2 mx-auto" style="width: fit-content;">
                            <form method="post">
                                <input type="hidden" name="checkout" value="true">
                                <button type="submit" class="btn btn-success">Checkout</button>
                            </form>
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

