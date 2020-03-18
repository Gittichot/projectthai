<?php 
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM stock_product WHERE P_id = '".$_GET["id"]."' ");
                $itemArray = array($productByCode[0]["P_id"]=>array('name'=>$productByCode[0]["P_name"], 'id'=>$productByCode[0]["P_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["P_price"],));

            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["P_id"], array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                        if($productByCode[0]["P_id"] == $k) {
                            if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                $_SESSION["cart_item"][$k]["quantity"] = 0;
                            }
                            $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
        break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["id"] == $k)
                    unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                    unset($_SESSION["cart_item"]);
                }
            }
            else {
                unset($_SESSION["cart_item"]);
            }
        break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;
    }
}
?>