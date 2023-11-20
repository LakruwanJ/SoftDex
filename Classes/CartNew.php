<?php

namespace Classes;

require_once 'BaseCartWishlist.php';
use Classes\BaseCartWishlist;

class CartNew extends BaseCartWishlist{

    public function getCartItems(){
        return parent::getItems("cart");
    }
    
    public function addItemToCart($text){
        parent::addItem("cart", $text);
    }

    public function removeCartItem($list) {
        return parent::removeItem("cart", $list);
    }        
}
