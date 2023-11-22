<?php
session_start();
require_once '../Classes/CartNew.php';

use Classes\CartNew;

$cart_list = "";
$cartObj = new Classes\CartNew();

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
$cartObj->setUser($user);

$cart_list = explode(" | ", $cartObj->getCartItems());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove'])) {
        $cartObj->setSoftwareid($_POST['sofw_id']);
        if ($cartObj->removeCartItem($cart_list)) {
            header("Location:../pages/cart_process_New.php?status=RemoveSuccess");
        } else {
            header("Location:../pages/cart_process_New.php?status=RemoveFail");
        }
    } else {
        header("Location:../pages/cart_process_New.php?status=BtnError");
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
        <title>Cart</title>

        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="../css/cart.css">
    </head>
    <body class="bg-light">
        
       <!----------------------------------------------------------- nav bar start ---------------------------------------------------------->
        
        <!------------------------------------------------------------ nav bar end ----------------------------------------------------------->

        <div class="container-fluid">
            <div class="row px-5">
                <div class="col-md-6">
                    <div class="shopping-cart">
                        <h2>My Cart</h2>
                        <hr>

                        <?php
                        $total = 0;
                        $count = 0;
                        if (empty($cart_list[0])) {
                            echo "<h5>Cart is Empty</h5>";
                        } else {
                            foreach ($cart_list as $sofw_id) {
                                $sofw_id = trim($sofw_id);
                                $item_arr = $cartObj->getSoftwareDetail($sofw_id);
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
                                                $imagePath = '../img/sw/' . $item_arr->Sid . '/logo'; // Base path without extension

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

                                    <h6>$<?php echo $total; ?></h6>
                                </div>


                            </div>
                        </div>
                        <div class="my-2 mx-auto" style="width: fit-content;">

                            <button type="button" class="btn btn-success" id="checkout">Checkout</button>

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
        
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                var price = "<?=$total ?>";
                console.log(price);
                $('#checkout').click(function () {
                    $.ajax({
                        url: "payhere.php",
                        data : {total: price},
                        method: 'POST',
                        success: function (data) {
                            //alert(data);
                            var obj = $.parseJSON(data);
                            // Put the payment variables here
                            var payment = {
                                "sandbox": true,
                                "merchant_id": "1224569", // Replace your Merchant ID
                                "return_url": "http://localhost/SoftDex/pages/cart_process_New.php", // Important
                                "cancel_url": "http://localhost/SoftDex/pages/cart_process_New.php", // Important
                                "notify_url": "http://sample.com/notify",
                                "order_id": obj['order_id'],
                                "items": obj['item'],
                                "amount": obj['amount'],
                                "currency": obj['currency'],
                                "hash": obj['hash'], // *Replace with generated hash retrieved from backend
                                "first_name": obj['first_name'],
                                "last_name": obj['last_name'],
                                "email": "",
                                "phone": "",
                                "address": "",
                                "city": "",
                                "country": "Sri Lanka",
                                "delivery_address": "",
                                "delivery_city": "",
                                "delivery_country": "Sri Lanka",
                                "custom_1": "",
                                "custom_2": ""
                            };
                            payhere.startPayment(payment);

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log("Error", jqXHR.status, jqXHR.statusText);
                            console.log("Error msg", jqXHR.responseText);
                        }
                    });
                });
            });
        </script>
    </body>
</html>

