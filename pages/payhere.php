<?php

//echo 'connected';
//$price = $_POST['total'];
$amount = 300;
$order_id = uniqid();
$merchant_id = "1224569";
$currency = "LKR";
$merchant_secret = "MTA0ODY2ODc5MzE3NjUwODQxODMyMTExNzQ2OTM4MTk1Mjc3OTUxMA==";
$hash = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        number_format($amount, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchant_secret)) 
    ) 
);
$array = [];


$array = [];
$array["first_name"] = "Saman";
$array["item"] = "Door bell wireles";
$array["last_name"] = "Perera";
$array["email"] = "samanp@gmail.com";
$array["phone"] = "0771234567";
$array["address"] = "No.1, Galle Road";

$array["amount"] = $amount;
$array["merchant_id"] = $merchant_id;
$array["order_id"] = $order_id;
$array["currency"] = $currency;
$array["hash"] = $hash;

$jsonObj = json_encode($array);


echo $jsonObj;



