<?php

namespace Classes;

require_once 'BaseCartWishlist.php';
use Classes\BaseCartWishlist;

class WishListNew extends BaseCartWishlist{
    
    public function getWishListItems(){
        return parent::getItems("wishlist");
    }
    
    public function addItemToWishList($text){
        parent::addItem("wishlist", $text);
    }

    public function removeWishListItem($list) {
        return parent::removeItem("wishlist", $list);
    }

}
