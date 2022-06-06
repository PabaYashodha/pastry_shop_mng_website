<?php
session_start();

    $foodItemId = base64_decode($_POST["foodItemId"]); //get the selected item id
    if (isset($_SESSION["shopping_cart"])) { // check the cart is available
        $item_array_id = array_column($_SESSION["shopping_cart"],"food_item_id"); // col name you want to get data
        if (in_array($foodItemId, $item_array_id)) {
            foreach($_SESSION["shopping_cart"] as $key => $value){
                if ($value["food_item_id"] == $foodItemId){
                    $_SESSION["shopping_cart"][$key]["item_qty"] = $value["item_qty"] + 1;//increase the count when click add to cart again and again
                }
            }
            echo json_encode(1);
        }else{ //add an item
            $item_array = array( 
                'food_item_id'=>$foodItemId,
                'item_qty'=>1,
            );
            $itemCount = count($_SESSION["shopping_cart"]); //available items in 
            $_SESSION["shopping_cart"][$itemCount] = $item_array; //next item data 
            echo json_encode(2);
        }
    }
    else{ //new shopping cart session
        $item_array = array(
            'food_item_id'=>$foodItemId,
            'item_qty'=>1,
        );
        $_SESSION["shopping_cart"][0] = $item_array; //save the cart details in shopping_cart session variable ith 0 th index in an item array
       echo json_encode(3);
    }
?>