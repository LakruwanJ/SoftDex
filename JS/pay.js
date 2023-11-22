/*function paymentGateway() {
 var xhttp = new XMLHttpRequest();
 var fprice = document.getElementById("price");
 xhttp.onreadystatechange = () => {
 if (xhttp.readyState == 4 && xhttp.status == 200) {
 alert(xhttp.responseText);
 var obj = JSON.parse(xhttp.responseText);
 // Payment completed. It can be a successful failure.
 payhere.onCompleted = function onCompleted(orderId) {
 console.log("Payment completed. OrderID:" + orderId);
 // Note: validate the payment and show success or failure page to the customer
 };
 
 // Payment window closed
 payhere.onDismissed = function onDismissed() {
 // Note: Prompt user to pay again or show an error page
 console.log("Payment dismissed");
 };
 
 // Error occurred
 payhere.onError = function onError(error) {
 // Note: show an error page
 console.log("Error:" + error);
 };
 
 // Put the payment variables here
 var payment = {
 "sandbox": true,
 "merchant_id": obj["merchant_id"], // Replace your Merchant ID
 "return_url": "http://localhost/Project-1/test1.php", // Important
 "cancel_url": "http://localhost/Project-1/test1.php", // Important
 "notify_url": "http://localhost/Project-1/index.php",
 "order_id": obj["order_id"],
 "items": obj["item"],
 "amount": obj["amount"],
 "currency": obj["currency"],
 "hash": obj["hash"], // *Replace with generated hash retrieved from backend
 "first_name": obj["first_name"],
 "last_name": obj["last_name"],
 "email": obj["email"],
 "phone": obj["phone"],
 "address": obj["address"],
 "city": obj["city"],
 "country": "Sri Lanka",
 "delivery_address": "",
 "delivery_city": "",
 "delivery_country": "",
 "custom_1": "",
 "custom_2": ""
 };
 payhere.startPayment(payment);
 
 }
 }
 xhttp.open("POST", "payhere.php", true);
 xhttp.send();
 
 
 }
 ;*/
$(document).ready(function () {

    $('#checkout').click(function () {
        let price = $('#total_price').val();
        $.ajax({
            url: "payhere.php",
            data: {total: price},
            method: 'POST',
            success: function (data) {
                //alert(data);
                
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("Error", jqXHR.status, jqXHR.statusText);
                console.log("Error msg", jqXHR.responseText);
            }
        });
    });
});

